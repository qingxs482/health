<?php
namespace app\index\controller;
use think\Db;

class Index extends Publica
{
    public function index()
    {
//        echo  9999;die;
        return $this->fetch();
    }
    public function ceshi()
    {
        return $this->fetch();
    }
}
