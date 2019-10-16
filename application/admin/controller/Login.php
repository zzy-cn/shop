<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\captcha\Captcha;
use think\Session;

class Login extends Controller
{
    public function login(){
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            $admin_name=request()->post("admin_name");
            $admin_pwd=request()->post("admin_pwd");
            $code=request()->post("code");
            $captcha=new Captcha();
            if( !$captcha->check($code))
            {
                $this->error("验证码错误");
            }
            //查询数据库
            $res=Db::name('admin')->where(['admin_name'=>$admin_name,'admin_pwd'=>$admin_pwd])
                ->field("admin_id,admin_name")->find();
            if($res){
                Cookie::set("admin", $res, 7 * 24 * 3600);
                session("admin",$res);
                Db::name("admin")->where(["admin_id"=>$res['admin_id']])->update(["admin_last_log_time"=>time()]);
                $this->redirect("index/index");
            }else{
                $this->success("账号或密码错误");
            }
        }
    }
    public function loginout(){

    }
}
