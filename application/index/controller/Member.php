<?php
namespace app\index\controller;
use think\Db;
use think\Request;
use Think\Session;

class Member extends Publica
{
    //会员信息
    public function index()
    {
        $request = request()->param();
        $memeber = Db::name('member');
        if(isset($request['search'])){
            $where['cardid|name|idnum'] = array('like',"%".$request['search']."%");
            $memeber = $memeber->where($where);
        }
        $memeber = $memeber->order('id desc')->paginate(10);
        $this->assign('list',$memeber);
        $page = $memeber->render();
        $this->assign('page',$page);
        return $this->fetch();
    }
    
    //会员明细
    public function memberDetail(){
        $request = request()->param();
        $member = Db::name('member')->alias('m')->join('member_card c','.c.id = m.cardid','left')->where('m.id',$request['id'])->field('m.*,c.bianhao')->find();
        $this->assign('member',$member);
        return $this->fetch();
    }

    //基本信息
    public function memberMsg(){
        $request = request()->param();
        $member = Db::name('member')->alias('m')->join('member_card c','.c.id = m.cardid','left')->where('m.id',$request['id'])->field('m.*,c.bianhao')->find();
        $this->assign('member',$member);
        return $this->fetch();
    }

    //基本信息保存
    public function addMemberMsg()
    {
        $request = request()->post();
        //会员基本档案
        $data['name'] = $request['name'];//姓名
        $data['sex'] = $request['sex'];//性别
        $data['age'] = $request['age'];//年龄
        $data['idnum'] = $request['idnum'];//身份证号
        $data['tel'] = $request['tel'];//电话
        $data['edu'] = $request['wenhua'];//文化
        $data['zhiye'] = $request['zhiye'];//职业
        $data['province'] = $request['province'];//省份
        $data['city'] = $request['city'];//市区
        $data['area'] = $request['area'];//区域
        $data['addr'] = $request['addr'];//详细地址
//        print_r($data);
        $result = Db::name('member')->where('id',$request['id'])->update($data);
        if($result){
            $this->success('保存成功');
        }
        $this->error('保存失败');
    }

    //会员档案添加
    public function add()
    {
        return $this->fetch();
    }

    //基本档案保存
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

        //慢病史
        $data['mbs'] = $request['manbing'];//慢病史
        $data['jws'] = $request['jiwang'];//既往史
        $data['jzs'] = $request['jiazu'];//家族史
        $data['gms'] = $request['guomin'];//过敏史1有0无
        $data['gmsy'] = $request['guominmc'];//过敏源
        $data['yys'] = $request['yongyao'];//用药史1有0无
        $data['yylb'] = $request['yongyaoleixing'] == "0" ? '' : $request['yongyaoleixing'];//用药类别
        $data['ypmc'] = $request['yongyaomingcheng'];//药品名称
        $data['xys'] = $request['xiyan'];//吸烟史1有0无
        $data['xysj'] = $request['xiyanshijian'];//吸烟年限单位年
        $data['xypl'] = $request['xiyanpinlv'];//吸烟频率单位根/天
        $data['yjs'] = $request['yinjiu'];//饮酒史1有0无
        $data['yjlb'] = $request['yinjiuleibie'] == "0" ? '' : $request['yinjiuleibie'];//饮酒类别
        $data['yjl'] = $request['yinjiuliang'];//饮酒量单位ml
        $data['smqk'] = $request['shuimianqingkuang'];//睡眠情况1良好0较差
        $data['smsc'] = $request['shuimianshichang'];//睡眠时常单位小时
        $data['ydcs'] = $request['yundong'];//运动次数单位次/周
        $data['ydxs'] = $request['yundongxiaoshi'];//运动小时
        $data['ydfz'] = $request['yundongfenzhong'];//运动分钟
        $data['dlxm'] = $request['duanlianxiangmu'];//锻炼项目
        $data['ysxg'] = $request['yinshi'];//饮食习惯
        $data['jcrs'] = $request['jiucanrenshu'];//就餐人数
        $data['huny'] = $request['hunyin'];//婚姻

        //健康指标
        $data['sg'] = $request['shengao'];//身高单位cm
        $data['tz'] = $request['tizhong'];//体重单位kg
        $data['bmi'] = $request['bmi'];//bmi
        $data['sgopj'] = $request['shengaopingjia'];//身高评价
        $data['yw'] = $request['yaowei'];//腰围单位cm
        $data['tw'] = $request['tunwei'];//臀围单位cm
        $data['ytb'] = $request['yaotunbi'];//腰臀比
        $data['ytpj'] = $request['yaoweipingjia'];//腰臀评价
        $data['ssy'] = $request['shousuoya'];//收缩压单位mmhg
        $data['szy'] = $request['shuzhangya'];//舒张压单位mmhg
        $data['xypj'] = $request['xueyapingjia'];//血压评价
        $data['gysz'] = $request['ganyousanzhi'];//甘油三酯mmol/L
        $data['zdgc'] = $request['zongdanguchun'];//总胆固醇
        $data['sgpj'] = $request['ganyoupingjia'];//三高评价
        $data['gdb'] = $request['gaodanbai'];//高蛋白
        $data['ddb'] = $request['didanbai'];//低蛋白
        $data['dbpj'] = $request['danbaipingjia'];//蛋白评价
        $data['kfxt'] = $request['kongfuxuetang'];//空腹血糖
        $data['chxt'] = $request['canhouxuetang'];//餐后血糖
        $data['xtpj'] = $request['xuetangpingjia'];//血糖评价
        $data['xns'] = $request['xueniaosuan'];//血尿酸
        $data['xnspj'] = $request['niaosuanpingjia'];//血尿酸评价
        $data['xhdb'] = $request['xuehong'];//血红蛋白
        $data['xhdbpj'] = $request['xuehongpingjia'];//血红蛋白评价
        $data['ts'] = $request['tongsuan'];//同型半胱氨酸
        $data['tspj'] = $request['tongsuanpingjia'];//同酸评价
        $data['gmd'] = $request['gumidu'];//骨密度
        $data['gmdpj'] = $request['gumidupingjia'];//骨密度评价
//        print_r($data);
        $result = Db::name('member')->insert($data);
        if($result){
            $this->success('保存成功');
        }
        $this->error('保存失败');
    }

    //会员卡列表
    public function cardList(){
        $request = request()->post();
        $where = array();
        if(isset($request['cardId']) && !empty($request['cardId'])){
            $where['xuliehao'] = $request['cardId'];
        }
        if(isset($request['cardNo']) && !empty($request['cardNo'])){
            $where['bianhao'] = $request['cardNo'];
        }
        $memeber = Db::name('member_card')
            ->where(function ($query) use($where) {
                if(!empty($where)) {
                    $query->where($where);
                }})
                ->order('id desc')->paginate(10);
        $this->assign('list',$memeber);
        $page = $memeber->render();
        $this->assign('page',$page);
        return $this->fetch();
    }

    //会员制卡
    public function addcard()
    {
        return $this->fetch();
    }

    //添加会员卡
    public function addcardForm()
    {
        $request = request()->post();
        $data['xuliehao'] = $request['cardId'];
        $data['bianhao'] = $request['cardNo'];
        $data['zhikaren'] = 100;
        $data['time'] = time();
        $result = Db::name('member_card')->insert($data);
        if($result){
            $this->success('制卡成功');
        }
        $this->error('制卡失败');
    }

    //删除会员卡(需要删除绑定会员信息)
    public function delcard(){
        $request = request()->post();
        //查询该卡是否存在
        $dis = Db::name('member_card')->where('xuliehao',$request['id'])->find();
        if($dis == null){
            echo '该卡不存在';exit();
        }
        //卡存在是否绑定会员信息，有会员信息先删除会员信息
        $rdis = Db::name('member')->where('xuliehao',$request['id'])->find();
        if($rdis){
            echo '该卡已绑定会员,如需删除请先删除序号为:'.$rdis['id'].'的会员信息';exit();
        }
        //删除会员卡
        $result = Db::name('member_card')->where('xuliehao',$request['id'])->delete();
        if($result){
            echo '删除成功';exit();
        }
        echo '删除失败';exit();
    }

    //查询会员卡是否存在
    public function isMembercard(){
        $request = request()->post();
        $card = Db::name('member_card')->where('xuliehao',$request['cardId'])->find();
        if($card){
//            return json(array('msg'=>1));
            echo json_encode(array('msg'=>$request['type'],'cardNo'=>$card['bianhao']));exit();
        }
        return json(array('msg'=>-2));
    }

    //会员知情同意书
    public function tongyi(){
        if(empty(session('member'))){
            $this->redirect('Member/getMemberMsg');
        }
        return $this->fetch();
    }

    //提交同意书
    public function tjty(){
        $request = request()->param();
        $result = Db::name('member')->where('id',$request['userid'])->update(['tys'=>$request['images']]);
        if($result === false){
            return json(array('msg'=>-2));exit();
        }
        return json(array('msg'=>1));exit();
    }

    //获取会员信息
    public function getMemberMsg(){
        $request = request()->param();
        if(!empty($request['search'])){
            $where['mc.xuliehao'] = ['like','%'.$request['search'].'%'];
            $where['mc.bianhao'] = ['like','%'.$request['search'].'%'];
//            $where['tel'] = ['like','%'.$request['search'].'%'];
            $where['m.idnum'] = ['like','%'.$request['search'].'%'];
            $member = Db::name('member')->alias('m')
                ->join('member_card mc','m.cardid = mc.id','LEFT')
                ->whereOr($where)
                ->field('m.id,m.name,m.sex,mc.xuliehao,mc.bianhao,m.idnum,m.age,m.zhiye,m.edu,m.tel,m.province,m.city,m.area,m.addr')
                ->find();
            $this->assign('member',$member);
            $this->assign('lastUrl',$_SERVER['HTTP_REFERER']);
            session('member',$member);
            return $this->fetch();
        }
        $this->assign('member','');
        $this->assign('lastUrl','');
        return $this->fetch();
    }

    //营养膳食信息
    public function yinYangMsg(){
        if(empty(session('member'))){
            $this->redirect('Member/getMemberMsg');
        }

        return $this->fetch();
    }

    //营养膳食保存
    public function yinYangSave(){
        $request = request()->param();
        $return = json_decode($request['json'],true);
//        print_r($return);
        $returnJson['result'] = 1;
        $returnJson['message'] = 'xxxxx';

        return json($returnJson);exit();
//        echo json_encode($returnJson,true);
//        return '{"memberId":"10000055073716","dietAssessmentList":[{"foodCode":"1","name":"米饭","picture":"/public/static/images/yinyang/1米饭.png","rateCode":"6","intake":"50","rateMemo":"每天1次","intakeMemo":"一两及以下","unit":"两"},{"name":"粥、稀饭","picture":"/public/static/images/yinyang/2稀饭.png","foodCode":"2","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"面粉类食物","picture":"/public/static/images/yinyang/3馒头面包面条饼.png","foodCode":"3","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"甜食、点心","picture":"/public/static/images/yinyang/4甜食点心蛋糕.png","foodCode":"4","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"油炸食物","picture":"/public/static/images/yinyang/5油条油饼.png","foodCode":"5","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"有馅类食物","picture":"/public/static/images/yinyang/6包子饺子馄饨.png","foodCode":"6","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"粗杂粮","picture":"/public/static/images/yinyang/7糙米小米玉米薏米.png","foodCode":"7","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"薯类","picture":"/public/static/images/yinyang/8薯类.png","foodCode":"8","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"牛奶、酸奶","picture":"/public/static/images/yinyang/9牛奶酸奶奶粉.png","foodCode":"9","unit":"毫升","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"鸡蛋","picture":"/public/static/images/yinyang/10鸡蛋鸭蛋.png","foodCode":"10","unit":"个","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"红肉类","picture":"/public/static/images/yinyang/11畜肉.png","foodCode":"11","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"家禽类","picture":"/public/static/images/yinyang/12禽肉.png","foodCode":"12","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"加工肉制品","picture":"/public/static/images/yinyang/13加工肉.png","foodCode":"13","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"河鲜类菜肴","picture":"/public/static/images/yinyang/14水产.png","foodCode":"14","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"海鲜类食物","picture":"/public/static/images/yinyang/15海产.png","foodCode":"15","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"豆制品类菜肴","picture":"/public/static/images/yinyang/16豆制品.png","foodCode":"16","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"坚果类食物","picture":"/public/static/images/yinyang/17坚果.png","foodCode":"17","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"深色蔬菜类菜肴","picture":"/public/static/images/yinyang/18深色蔬菜.png","foodCode":"18","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"浅色蔬菜类菜肴","picture":"/public/static/images/yinyang/19浅色蔬菜.png","foodCode":"19","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"菌菇蔬菜","picture":"/public/static/images/yinyang/20菌类.png","foodCode":"20","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"食用水果","picture":"/public/static/images/yinyang/21水果.png","foodCode":"21","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"甜饮品","picture":"/public/static/images/yinyang/22运动饮料.png","foodCode":"22","unit":"瓶","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"啤酒","picture":"/public/static/images/yinyang/23啤酒.png","foodCode":"23","unit":"瓶","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"黄酒","picture":"/public/static/images/yinyang/24黄酒.png","foodCode":"24","unit":"酒杯","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"白酒","picture":"/public/static/images/yinyang/25白酒.png","foodCode":"25","unit":"酒杯","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"红酒","picture":"/public/static/images/yinyang/26红酒.png","foodCode":"26","unit":"酒杯","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"水","picture":"/public/static/images/yinyang/27水.png","foodCode":"27","unit":"杯","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"汤菜","picture":"/public/static/images/yinyang/28汤菜.png","foodCode":"28","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""}]}';
//        return '{"memberId":"10000055073716","dietAssessmentList":[{"name":"米饭","picture":"\/public\/static\/images\/yinyang\/1米饭.png","foodCode":"1","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"粥、稀饭","picture":"\/public\/static\/images\/yinyang\/2稀饭.png","foodCode":"2","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"面粉类食物","picture":"\/public\/static\/images\/yinyang\/3馒头面包面条饼.png","foodCode":"3","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"甜食、点心","picture":"\/public\/static\/images\/yinyang\/4甜食点心蛋糕.png","foodCode":"4","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"油炸食物","picture":"\/public\/static\/images\/yinyang\/5油条油饼.png","foodCode":"5","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"有馅类食物","picture":"\/public\/static\/images\/yinyang\/6包子饺子馄饨.png","foodCode":"6","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"粗杂粮","picture":"\/public\/static\/images\/yinyang\/7糙米小米玉米薏米.png","foodCode":"7","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"薯类","picture":"\/public\/static\/images\/yinyang\/8薯类.png","foodCode":"8","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"牛奶、酸奶","picture":"\/public\/static\/images\/yinyang\/9牛奶酸奶奶粉.png","foodCode":"9","unit":"毫升","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"鸡蛋","picture":"\/public\/static\/images\/yinyang\/10鸡蛋鸭蛋.png","foodCode":"10","unit":"个","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"红肉类","picture":"\/public\/static\/images\/yinyang\/11畜肉.png","foodCode":"11","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"家禽类","picture":"\/public\/static\/images\/yinyang\/12禽肉.png","foodCode":"12","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"加工肉制品","picture":"\/public\/static\/images\/yinyang\/13加工肉.png","foodCode":"13","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"河鲜类菜肴","picture":"\/public\/static\/images\/yinyang\/14水产.png","foodCode":"14","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"海鲜类食物","picture":"\/public\/static\/images\/yinyang\/15海产.png","foodCode":"15","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"豆制品类菜肴","picture":"\/public\/static\/images\/yinyang\/16豆制品.png","foodCode":"16","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"坚果类食物","picture":"\/public\/static\/images\/yinyang\/17坚果.png","foodCode":"17","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"深色蔬菜类菜肴","picture":"\/public\/static\/images\/yinyang\/18深色蔬菜.png","foodCode":"18","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"浅色蔬菜类菜肴","picture":"\/public\/static\/images\/yinyang\/19浅色蔬菜.png","foodCode":"19","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"菌菇蔬菜","picture":"\/public\/static\/images\/yinyang\/20菌类.png","foodCode":"20","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"食用水果","picture":"\/public\/static\/images\/yinyang\/21水果.png","foodCode":"21","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"甜饮品","picture":"\/public\/static\/images\/yinyang\/22运动饮料.png","foodCode":"22","unit":"瓶","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"啤酒","picture":"\/public\/static\/images\/yinyang\/23啤酒.png","foodCode":"23","unit":"瓶","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"黄酒","picture":"\/public\/static\/images\/yinyang\/24黄酒.png","foodCode":"24","unit":"酒杯","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"白酒","picture":"\/public\/static\/images\/yinyang\/25白酒.png","foodCode":"25","unit":"酒杯","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"红酒","picture":"\/public\/static\/images\/yinyang\/26红酒.png","foodCode":"26","unit":"酒杯","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"水","picture":"\/public\/static\/images\/yinyang\/27水.png","foodCode":"27","unit":"杯","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""},{"name":"汤菜","picture":"\/public\/static\/images\/yinyang\/28汤菜.png","foodCode":"28","unit":"两","rateCode":"0","rateMemo":"","intake":"0","intakeMemo":""}],"result":1}';
    }

    //Y1评估分析报告
    public function fenXiBaoGao(){
        return $this->fetch();    
    }
    
    //切换用户
    public function qiehuan(){
        if(!empty(session('member'))){
            session('member',null);
        }
        $this->redirect($_SERVER['HTTP_REFERER']);
    }

    //测试
    
}
