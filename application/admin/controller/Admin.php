<?php
namespace app\admin\controller;
//导入Controller
use think\Controller;
//导入Admins的model类
use app\admin\model\Admins;
//导入Db类
use think\Db;

class Admin extends Allow
{
    // 加载后台首页模板
    public function getindex(){
        return $this->fetch("Admin/index");
    }

    //管理员列表
    public function getlist(){
        //创建请求对象
        $request = request();
        //获取搜索词
        $keywords = $request->param('keywords');
        //实例化模型
        $admins = new Admins();
        //查询,
        $data = $admins->where("name","like",'%'.$keywords.'%')->order("id desc")->paginate(8);
        return $this->fetch("Admin/list",['data'=>$data,'keywords'=>$keywords,'request'=>$request->param()]);
    }

    //管理员添加 数据插入操作
    public function postinsert(){
        //创建请求对象
        $request = request();
        //获取添加数据
        $data = $request->only(["name","password",'repassword']);
        // echo "<pre>";
        // var_dump($data);die;
        //加载 Adminss 验证器类
        $result=$this->validate($request->param(),'Adminss');
        //对比数据验证
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        $admins = new Admins([
            "name"=>$data['name'],
            "password"=>md5($data['password']),
            "createtime"=>time()
        ]);
        //执行添加  判断
        if($admins->save()){
            $this->success("添加数据成功","/admin/list");
        }else{
            $this->error("添加数据失败");
        }
    }

    //单条数据删除管理员
    public function getdelete(){
        //创建请求对象
        $request = request();
        //获取删除数据的id
        $id = $request->param("id");
        //实例化模型类
        $admins = Admins::get($id);
        //执行删除并判断
        if($admins->delete()){
            //判断详情表是否有数据 有就执行删除
            if(Db::table("admin_info")->where("aid",$id)->find()){
                Db::tabel("admin_info")->where("aid",$id)->delete();
            }
            //判断后台用用户_角色 节点表是否有数据 有就执行删除
            if(Db::table("admin_role")->where("aid",$id)->find()){
                Db::table("admin_role")->where("aid",$id)->delete();
            }
            return true;
        }else{
            return false;
        }
    }

    //批量数据删除
    public function getmoredel(){
        $arr = isset($_GET['arr'])?$_GET['arr']:'';
        if($arr==''){
            return false;
        }
        foreach($arr as $v){
            if(Admins::where("id",$v)->delete()){
                //判断详情表是否有数据 有就执行删除
                if(Db::table("admin_info")->where("aid",$v)->select()){
                    Db::table("admin_info")->where("aid",$v)->delete();
                }
                //判断后台用用户_角色 节点表是否有数据 有就执行删除
                if(Db::table("admin_role")->where("aid",$v)->find()){
                    Db::table("admin_role")->where("aid",$v)->delete();
                }
            }
        }
        return true;
    }

    //管理员修改状态 启用与停用
    public function getchange(){
        //创建请求对象
        $request = request();
        //获取修改状态数据  id和status
        $id = $request->param('id');
        $status = $request->param('status');
        //实例化模型类
        $admins = new Admins();
        //执行修改
        $res = $admins->where('id', $id)->update(['status' => $status]);
        if($res){
            // $this->redirect($allurl);
            return true;
        }
    }

    //判断管理员的详情,没有就加载详情添加页面,有就加载详情信息修改页面
    public function getinfo(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        $name = $request->param('name');
        //实例化模型类
        $admins = new Admins();
        //查询管理员详情表
        $res = Db::table("admin_info")->where("aid",$id)->find();
        //判断详情表有没有对应id的数据
        if(!$res){
            //没有就加载 跳转添加详情页面
            $this->success("没有详情,请先添加详情","/admin/add/id/{$id}/name/{$name}");
        }else{
            //有数据就加载 跳转详情信息修改页面
            $this->redirect("/admin/edit/id/{$id}/name/{$name}");
        }
    }

    //加载添加详情页面
    public function getadd(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        //获取管理员名称
        $name = $request->param('name');
        //加载页面
        return $this->fetch("Admin/info_add",["id"=>$id,"name"=>$name]);
    }

    //执行数据插入  添加详情
    public function postaddinfo(){
        //创建请求对象
        $request = request();
        //获取添加数据
        $data = $request->only(["aid","sex","phone",'email',"content"]);
        //去html解析格式
        $data['content'] = htmlspecialchars($data['content']);
        //加载 AdminInfo 验证器类
        $result=$this->validate($request->param(),'AdminInfo');
        //对比数据验证
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        $res = Db::table("admin_info")->insert($data);
        //执行添加  判断
        if($res){
            $this->success("添加详情成功","/admin/list");
        }else{
            $this->error("添加详情失败");
        }
    }

    //加载修改详情页面
    public function getedit(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        //获取管理员名称
        $name = $request->param('name');
        //实例化模型类
        $admins = new Admins();
        //查询管理员详情表
        $res = Db::table("admin_info")->where("aid",$id)->find();
        //加载页面
        return $this->fetch("Admin/info_edit",["id"=>$id,"name"=>$name,"res"=>$res]);
    }

    //执行数据修改 详情页面
    public function postupdateinfo(){
        //创建请求对象
        $request = request();
        //获取修改数据的id
        $id = $request->param("id");
        //获取修改数据
        $data = $request->only(["sex","phone",'email',"content"]);
        //去html解析格式
        $data['content'] = htmlspecialchars($data['content']);
        //加载 AdminInfo 验证器类
        $result=$this->validate($request->param(),'AdminInfo');
        //对比数据验证
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        $res = Db::table("admin_info")->where("id",$id)->update($data);
        //执行添加  判断
        if($res){
            $this->success("修改详情成功","/admin/list");
        }else{
            $this->error("修改详情失败");
        }
    }

    //加载修改管理员名称和密码页面
    public function getpassword(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        $admins = Admins::get($id);
        return $this->fetch("Admin/password",["id"=>$id,"admins"=>$admins]);
    }

    //修改管理员密码操作
    public function postdopassword(){
        //创建请求对象
        $request = request();
        //获取id 和 密码
        $id = $request->param('id');
        $data = $request->only(["name","password"]);
        $data['password'] = md5($data["password"]);
        //加载 Adminss 验证器类
        $result=$this->validate($request->param(),'Adminss');
        //对比数据验证
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        //实例化模型
        $admins = new Admins();
        //执行修改 判断
        $res = $admins->where("id",$id)->update($data);
        if($res){
            $this->success("修改密码成功","/admin/list");
        }else{
            $this->error("修改密码失败");
        }
    }

    //分配角色
    public function getrolelist(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        //获取用户信息
        $info = Admins::where("id",$id)->find();
        //获取所有的角色信息
        $role = Db::table("role")->select();
        //获取当前用户的角色信息
        $data = Db::table("admin_role")->where("aid",$id)->select();
        //遍历数据
        $rids = array();
        foreach($data as $v){
            $rids[] = $v['rid'];
        }
        return $this->fetch("Admin/rolelist",["info"=>$info,'role'=>$role,'rids'=>$rids]);
    }

    //保存角色
    public function postsaverole(){
        //获取用户新角色信息
        $role = $_POST['rid'];
        //创建请求对象
        $request = request();
        //获取用户aid
        $aid = $request->param('aid');
        //删除当前用户已有的角色信息
        Db::table("admin_role")->where("aid",$aid)->delete();
        //遍历数据
        foreach($role as $k=>$v){
            $data['aid'] = $aid;
            $data['rid'] = $v;
            //执行数据插入
            $res = Db::table("admin_role")->insert($data);
        }
        $this->success("角色分配成功","/admin/list");
    }
}
