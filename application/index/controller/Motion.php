<?php
namespace app\index\controller;
use think\Db;
use think\Request;

class Motion extends Publica
{
    //运动分类信息
    public function index()
    {
        $request = request()->param();
        if(isset($request['search'])){
            $where['name'] = array('like',"%".$request['search']."%");
        }
        $where['id'] = array('neq',0);
        $disease = Db::name('motion')->where($where)->order('id desc')->paginate(15);
        $this->assign('list',$disease);
        $page = $disease->render();
        $this->assign('page',$page);
        return $this->fetch();
    }

    //运动分类添加
    public function add()
    {
        $request = request()->post();
        parse_str($request['form'], $request);
        if($request['fenleiid'] == null){
            echo '没有选择所属分类运动';exit();
        }
        $data['did'] = $request['fenleiid'];
        $data['name'] = $request['fenlei'];
        $result = Db::name('motion')->insert($data);
        if($result){
            echo '添加成功';exit();
        }
        echo '添加失败';exit();
    }

    //运动分类删除
    public function del(){
        $request = request()->post();
        //查询该分类是否存在并是否有下级分类
        $dis = Db::name('motion')->where('id',$request['id'])->find();
        if($dis == null){
            echo '该分类不存在';exit();
        }
        $rdis = Db::name('motion')->where('did',$request['id'])->select();
        if($rdis){
            echo '该分类有下级分类,请先删除下级分类';exit();
        }

        //删除分类
        $result = Db::name('motion')->where('id',$request['id'])->delete();
        if($result){
            echo '删除成功';exit();
        }
        echo '删除失败';exit();
    }

    //查询所有运动分类
    public function getDisease(){
        $disease = Db::name('motion')->select();
        foreach($disease as $d){
            $jsonData[] = array(
                'id'    => $d['id'],
                'pId'   => $d['did'],
                'name'  => $d['name']
            );
        }
        return json_encode($jsonData);
    }
}
