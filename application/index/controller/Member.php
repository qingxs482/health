<?php
namespace app\index\controller;
use think\Db;
use think\Request;

class Member extends Publica
{
    //会员信息
    public function index()
    {
        $memeber = Db::name('member')->order('id desc')->paginate(10);
        $this->assign('list',$memeber);
        $page = $memeber->render();
        $this->assign('page',$page);
        return $this->fetch();
    }

    //会员档案添加
    public function add()
    {
        return $this->fetch();
    }

    public function addMember()
    {
        $request = request()->post();
//        dump($request);exit();
        //会员基本档案
        $data['name'] = $request['name'];//姓名
        $data['sex'] = $request['sex'];//性别
        $data['age'] = $request['age'];//年龄
        $data['idnum'] = $request['idnum'];//身份证号
        $data['tel'] = $request['tel'];//电话
        $data['edu'] = $request['wenhua'];//文化
        $data['zhiye'] = $request['zhiye'];//职业
        $data['birthday'] = strtotime($request['shengri']);//生日
        $data['jdtime'] = strtotime($request['riqi']);//建档时间
        $data['province'] = $request['province'];//省份
        $data['city'] = $request['city'];//市区
        $data['area'] = $request['area'];//区域
        $data['addr'] = $request['addr'];//详细地址
        $data['addtime'] = time();
//        print_r($data);
        $result = Db::name('member')->insert($data);
        if($result){
            $this->success('添加成功');
        }
        $this->error('添加失败');
    }
}
