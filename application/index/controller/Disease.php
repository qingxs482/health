<?php
namespace app\index\controller;
use think\Db;
use think\Request;

class Disease extends Publica
{
    //病例分类信息
    public function index()
    {
        $disease = Db::name('disease')->order('id desc')->paginate(15);
        $this->assign('list',$disease);
        $page = $disease->render();
        $this->assign('page',$page);
        return $this->fetch();
    }

    //病列添加
    public function add()
    {
        $request = request()->post();
        parse_str($request['form'], $request);
        if($request['fenleiid'] == null){
            echo '没有选择所属分类病列';exit();
        }
        $data['did'] = $request['fenleiid'];
        $data['name'] = $request['fenlei'];
        $result = Db::name('disease')->insert($data);
        if($result){
            echo '添加成功';exit();
        }
        echo '添加失败';exit();
    }

    //病列删除
    public function del(){
        $request = request()->post();
        //查询该分类是否存在并是否有下级分类
        $dis = Db::name('disease')->where('id',$request['id'])->find();
        if($dis == null){
            echo '该分类不存在';exit();
        }
        $rdis = Db::name('disease')->where('did',$request['id'])->select();
        if($rdis){
            echo '该分类有下级分类,请先删除下级分类';exit();
        }

        //删除分类
        $result = Db::name('disease')->where('id',$request['id'])->delete();
        if($result){
            echo '删除成功';exit();
        }
        echo '删除失败';exit();
    }

    //查询所有病例
    public function getDisease(){
        $disease = Db::name('disease')->select();
        foreach($disease as $d){
            $jsonData[] = array(
                'id'    => $d['id'],
                'pId'   => $d['did'],
                'name'  => $d['name']
            );
//            $jsonData[]['id'] = $d['id'];
//            $jsonData[]['pId'] = $d['did'];
//            $jsonData[]['name'] = $d['name'];
        }
//        print_r($jsonData);exit();
        return json_encode($jsonData);
    }
}
