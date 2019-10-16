<?php
namespace app\admin\controller;
use app\admin\service\AdminService;
use think\Controller;
use think\Cookie;
use think\Session;

class Common extends Controller{
    public function __construct()
    {
        parent::__construct();
        //防非法登录
          //如果session不存在,cookie存在，则将cookie的值赋给session
        if(Cookie::get("admin") && !Session::get("admin")){
            $admin=Cookie::get("admin");
            Session::set("admin",$admin);
        }
         //如果两个都不存在，则为非法登录
        if(!Session::get("admin")){
            $this->success("非法登录","Login/login");
        }
        //检查权限



    }
    //检查权限

    //获取当前管理员所拥有的的权限
    public function checkNode(){
        //获取当前用户
        $currentadmin=Session::get("admin");
        //判断是否为超级管理员，如果是的话就有所有权限
        if(in_array($currentadmin["admin_name"],config("web.super_admin"))){
            return true;
        }
        //判断是否是免检权限，如果是则可以访问
        if(in_array($currentadmin["admin_name"],config("web.super_admin"))){
            return true;
        }




    }
}