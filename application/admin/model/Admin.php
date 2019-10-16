<?php
namespace app\admin\model;
use think\Db;
use think\Model;
class Admin extends Model
{
    public function allAdmin()
    {
        $admin=Db::name("admin")->select();
        return $admin;
    }
    public function add($admin){
       return  Db::name("admin")->insert($admin);
    }
    //关联模型
    public function role(){
        return $this->belongsToMany("role","admin_role","role_id","admin_id");

    }


}