<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\captcha\Captcha;
use think\facade\Cookie;
use think\facade\Session;


class Login extends Controller
{
    public function login(){
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            $admin_name=request()->post("admin_name");
            $admin_pwd=request()->post("admin_pwd");
            $rem=request()->post("rem");
            $code=request()->post("code");
            $captcha=new Captcha();
//            if( !$captcha->check($code))
//            {
//                $this->error("验证码错误");
//            }
            //查询数据库
            $res=Db::name('admin')->where(['admin_name'=>$admin_name,'admin_pwd'=>$admin_pwd])
                ->field("admin_id,admin_name")->find();
            if($res){
                if($rem==1){
                    Cookie::set("admin", $res, 7 * 24 * 3600);
                }else{
                    Cookie::set("admin", $res,0);
                }
                session("admin",$res);
                Db::name("admin")->where(["admin_id"=>$res['admin_id']])->update(["admin_last_log_time"=>time()]);
                $this->redirect("index/index");
            }else{
                $this->success("账号或密码错误");
            }
        }
    }
    public function loginout(){
        if(session("admin",null)===null && cookie("admin",null)==null){
            $this->success('退出成功','Login/login');
        }else{
            $this->error('退出失败');
        }

    }
}
