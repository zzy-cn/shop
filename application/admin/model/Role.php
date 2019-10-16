<?php
namespace app\admin\model;
use think\Db;
use think\Model;
class Role extends Model
{
    //取所有的角色
    public function allRole()
    {
        $node=Db::name("node")->select();
        return $node;
    }
}