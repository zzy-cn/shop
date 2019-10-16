<?php
namespace app\admin\service;
use app\admin\model\AdminRole;
use app\admin\model\Role;

class AdminService{
    //取得所有权限
    public function getNodeByAdminId($admin_id){
        $adminrole=new AdminRole();
        $role_id=$adminrole->where("admin_id",$admin_id)->column("role_id");
        $role=new Role();
        //$role_name=$role->

    }



}