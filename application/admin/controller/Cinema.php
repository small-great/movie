<?php
namespace app\admin\controller;
//导入Controller
use think\Controller;
//导入Db
use think\Db;
//导入Admins的model类
use app\admin\model\Admins;
use think\Session;

class Cinema extends Allow
{

    // 加载后台影城管理模板
    public function getindex(){
        $data = Db::table("cinema_brand")->where("pid",1)->select();
        //var_dump($data);
        return $this->fetch("Cinema/index",["data"=>$data]);
    }

    // 添加影院品牌 或 影店地址
    public function postbrand_insert(){
        $request = request();
        $data = $request->except(['action']);
        $pid = $request->param('pid');
        if ($pid == 1) {
            if (!empty($data['brand'])) {
                $data['path'] = "0,".$pid;
                unset($data['address']);
                unset($data['price']);
                unset($data['phone']);
                unset($data['pic']);
                if(Db::table("cinema_brand")->insert($data)){
                    $this->success("数据添加成功","/cinema/index");
                }else{
                     $this->error("数据添加失败","/cinema/index");
                }
            } else {
                $this->redirect("/cinema/index");
            }
        } else {
            if (!empty($data['address']) && !empty($data['brand'])&&!empty($data['price'])&&!empty($data['phone'])) {
                $name = $data['brand'];
                $data['name'] = $name;
                unset($data['brand']);
                // 获取表单上传图片
                $pic = $request->file("pic");
                $result = $this->validate(
                    ["price"=>$data['price'],"phone"=>$data['phone'],"pic"=>$pic],
                    ["price"=>"require|number","phone"=>"require|regex:\d{11}","pic"=>"require|image"],
                    ["price.require"=>"价格不能为空","price.number"=>"价格只能输入数字",
                     "phone.require"=>"电话不能为空","phone.regex"=>"电话格式格式不正确",
                     "pic.require"=>"请选择图像文件","pic.image"=>"非法图像文件"]
                );
                if(true !== $result){
                    $this->error($result,"/cinema/index");
                }
                $info = $pic->move(ROOT_PATH.'public'.DS.'uploads'.DS.'cinema');
                $savename = $info->getSavename();
                $ext = $info->getExtension();
                $img = \think\Image::open("./uploads/cinema/".$savename);
                $img->thumb(300,300)->save("./uploads/cinema/".$savename);
                $img->save(ROOT_PATH . 'public/uploads/cinema/' . $savename);
                $image = \think\Image::open("./uploads/cinema/".$savename);
                $image->text('DeepBlue', VENDOR_PATH . 'topthink/think-captcha/assets/ttfs/1.ttf', 20,'#000080');
                $image->save(ROOT_PATH . 'public/uploads/cinema/' . $savename);
                $data['pic'] = "/uploads/cinema/"."$savename";
                if(Db::table("cinema_details")->insert($data)){
                    $this->success("数据添加成功","/cinema/index");
                } else {
                    $this->error("数据添加失败","/cinema/index");
                }
            } else {
                $this->redirect("/cinema/index");
            }
        }
    }

    // 品牌管理修改
    public function postedit(){
        $request = request();
        $req = $request->only(['id','brand']);
        $brand = $req['brand'];
        $id = $req['id'];
        $res = Db::table("cinema_brand")->where("id",$id)->update(['brand'=>$brand]);
        if ($res) {
            $this->success("数据修改成功","/cinema/index");
        } else {
            $this->error("数据修改失败","/cinema/index");
        }
    }

    // 品牌删除
    public function getdel(){
        $request = request();
        $id = $request->param('id');
        $res = Db::table("cinema_details")->where("pid",$id)->select();
        if ($res) {
            $this->error("删除失败,请先删除该影院绑定的影店信息!","/cinema/index");
        } else {
            Db::table("cinema_brand")->where("id",$id)->delete();
            $this->success("删除成功","/cinema/index");
        }
    }

    // 影院区域管理
    public function getarea(){
        $brand = Db::table("cinema_brand")->where("pid",1)->select();
        return $this->fetch("Cinema/area",['brand'=>$brand]);
    }


    // 城市级联
    public function getareasea(){
        $list = Db::table("district")->where("upid",$_GET['upid'])->select();
        echo json_encode($list);
    }

    // 影院列表
    public function getbrandsea(){
        $details = Db::table("cinema_details")->where("pid",$_GET['pid'])->select();
        return $details;
    }
    // 影院/区域/地址绑定
    //影院区域地址绑定操作
    public function getarea_details(){
        $str=isset($_GET['str'])?$_GET['str']:'';
        $path=isset($_GET['path'])?$_GET['path']:'';
        $arr=isset($_GET['checkarr'])?$_GET['checkarr']:'';
        foreach($arr as $v){
          if(Db::table("cinema_details")->where("id","{$v}")->update(['path'=>$path,'area'=>$str])){
                echo 1;
            } else {
                echo '';
            }
       }

    }

    // 影店删除
    public function getareadel(){
        $request = request();
        $id = $request->param('id');
        $info = Db::table("cinema_details")->where("id",$id)->find();
        $url = ".".$info['pic'];
        $res = Db::table("cinema_details")->where("id",$id)->delete();
        if ($res) {
            if(!empty($info['pic'])){
                unlink($url);
            }
            return true;
        } else {
            return false;
        }
    }

    // 放映厅类型管理
    public function gethalltype(){
        $brand = Db::table("cinema_brand")->where("pid",1)->select();
        $halltype = Db::table("cinema_halltype")->select();
        return $this->fetch("Cinema/halltype",['brand'=>$brand,'halltype'=>$halltype]);
    }

    //影院与影厅类型绑定操作
    public function gethall_details(){
        $hall_id=isset($_GET['hall_id'])?$_GET['hall_id']:'';
        $hall_type=isset($_GET['hall_type'])?$_GET['hall_type']:'';
        $arr=isset($_GET['arr'])?$_GET['arr']:'';
        foreach($arr as $v){
          if($res = Db::table("cinema_details")->where("id","{$v}")->update(['hall_id'=>$hall_id,'hall_type'=>$hall_type])){
                echo 1;
            } else {
                echo '';
            }
        }
    }


    // 影院详情修改
    public function getdetails(){
        $request = request();
        $id = $request->param('id');
        //var_dump($id);die;
        $halltype = Db::table("cinema_halltype")->select();
        $brand = Db::table("cinema_brand")->where("pid",1)->select();
        $data = Db::table('cinema_details')->where('id',$id)->find();
        $pic = $data['pic'];
        if ($data) {
            return $this->fetch('Cinema/details',['data'=>$data,'brand'=>$brand,'halltype'=>$halltype,'pic'=>$pic,'id'=>$id]);
        } else {
            return $this->error('跳转失败');
        }

    }

    // 执行影院详情修改
    public function postdetails_update(){
        $request = request();
        $id = $request->param('id');
        $pic = $request->file('pic');
        $data = $request->except('action');
        if ( empty($pic) and empty($data['opic'] )) {
           return $this->error("图片不能为空");
        }
        if (!empty($pic)) {
            $result = $this->validate(
              ["price"=>$data['price'],"phone"=>$data['phone'],"pic"=>$pic,'hid'=>$data['hall_id'],'pid'=>$data['pid']],
              ["price"=>"require|number","phone"=>"require|regex:\d{11}","pic"=>"require|image","hid"=>"regex:/^[1-9]\d*$/"],
              ["price.require"=>"价格不能为空","price.number"=>"价格只能输入数字",
               "phone.require"=>"电话不能为空","phone.regex"=>"电话格式格式不正确","hid.regex"=>"请选择影厅类型","pid.regex"=>"请先选择影院",
               "pic.require"=>"请选择图像文件","pic.image"=>"非法图像文件"]
            );
            if(true !== $result){
                $this->error("$result");
            }

            if (!empty($data['opic'])) {
                unlink('.'.$data['opic']);
            }
            $name = $data['brand'];
            $data['name'] = $name;
            unset($data['brand']);
            unset($data['opic']);

            $info = $pic->move(ROOT_PATH.'public'.DS.'uploads'.DS.'cinema');
            $savename = $info->getSavename();
            $ext = $info->getExtension();
            $img = \think\Image::open("./uploads/cinema/".$savename);
            $img->thumb(300,300)->save("./uploads/cinema/".$savename);
            $img->save(ROOT_PATH . 'public/uploads/cinema/' . $savename);

            $image = \think\Image::open("./uploads/cinema/".$savename);
            $image->text('DeepBlue', VENDOR_PATH . 'topthink/think-captcha/assets/ttfs/1.ttf', 20,'#000080');
            $image->save(ROOT_PATH . 'public/uploads/cinema/' . $savename);
            $data['pic'] = "/uploads/cinema/"."$savename";
            if(Db::table("cinema_details")->where("id",$id)->update($data)){
                $this->success("数据修改成功","/cinema/index");
                }else{
                 $this->error("数据修改失败","/cinema/index");
            }
        } else {
            $result = $this->validate(
              ["price"=>$data['price'],"phone"=>$data['phone'],'hid'=>$data['hall_id'],'pid'=>$data['pid']],
              ["price"=>"require|number","phone"=>"require|regex:\d{11}","hid"=>"regex:/^[1-9]\d*$/"],
              ["price.require"=>"价格不能为空","price.number"=>"价格只能输入数字",
                "phone.require"=>"电话不能为空","phone.regex"=>"电话格式格式不正确","hid.regex"=>"请选择影厅类型","pid.regex"=>"请先选择影院"]
            );
            if(true !== $result){
                $this->error("$result");
            }
            $url = $data['opic'];
            // echo $url;
            $name = $data['brand'];
            $data['name'] = $name;
            unset($data['brand']);
            unset($data['opic']);
            $data['pic'] = $url;
            if(Db::table("cinema_details")->where("id",$id)->update($data)){
                $this->success("数据修改成功","/cinema/index");
                }else{
                 $this->error("数据修改失败","/cinema/index");
            }
        }
    }
}
