<?php
namespace app\admin\model;
use think\Db;
use think\Model;
class Admin extends Model
{
    protected $pk="admin_id";
    //关联模型
    public function role(){
        return $this->belongsToMany("role","admin_role","role_id","admin_id");

    }


}