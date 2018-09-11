<?php
namespace app\index\controller;


class Index extends Publica
{
    public function index()
    {
        return $this->fetch();
    }
    public function ceshi(){
        return $this->fetch();
    }
}
