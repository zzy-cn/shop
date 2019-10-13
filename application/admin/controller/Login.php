<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\captcha\Captcha;
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
            $res=Db::name('admin')->where(['admin_name'=>$admin_name,'admin_pwd'=>$admin_pwd])->find();
            if($res){
                $this->redirect("index/index");
            }else{
                $this->success("账号或密码错误");
            }
        }
    }
    public function loginout(){

    }
}
