<?php

namespace app\admin\service;

use app\admin\model\Type;

class TypeService
{
    public function getType(){
        $type=(new Type())->all();
        return $type;
    }
}