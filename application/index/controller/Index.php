<?php
namespace app\index\controller;
use think\Request;
use think\Db;
use think\Controller;
define('APP_PA','这是常亮的值');
class Index extends Controller
{
    public function index()
    {// return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
        //   $request = Request::instance();
        //   dump($request);
        // echo '当前的域名是:'.$request->domain().'</br>';
        // echo '当前的入口文件是:'.$request->baseFile().'</br>';
        // echo '当前的后缀是:'.$request->ext().'</br>';
        // echo '当前的操作是:'.$request->action().'</br>';
        // echo '当前的请求方法:'.$request->method().'</br>';
        // echo $request->param('name');
        // dump($request->param());
        // dump(input(''));
        // dump(input('param.name'));
        // dump($request->get(['name'=>'think']));

        //赋值给模板变量
        /*   $name = '今天我的滑板鞋好漂亮';
           $email = 'huabanxie@qq.com';
           $this->assign('name',$name);
           $this->assign('email',$email);
            $this->assign(['name'=>$name,'email'=>$email]);
           return $this -> fetch('user/user');*/
//     return $this->fetch('index',[
//        'name'=>'thinkphp',
//        'email'=>'thinkphp@qq.com'
//     ]);
//        助手函数view
//        return view('index',[
//        'name'=>'thinkphp',
//        'email'=>'thinkphp@qq.com'
//     ]);
//        return $this->fetch();
        $name = 'hello world';
        $time = time();
        $this->assign('name', $name);
        $this->assign('time', $time);
        return $this->fetch();
    }

    public function db()
    {//原生sql
        //插入数据
        // $result = Db::execute('insert into think_data (name,status) values ("李四",1)');
        // $result = Db::execute('insert into think_data (name,status) values ("王二麻子",0)');
        //修改数据
        // $result = Db::execute('update think_data set name = "王二",status = 1 where id = 3');
        // 删除数据
        // $result = Db::execute('delete from think_data where id = 1');
        // 查询数据
        $result = Db::query('select * from think_data');
        dump($result);
    }

    public function dbs()
    {
        // 封装sql
        //插入数据
        // $result = Db::table('think_data') -> insert(['name'=>'王小明','status'=>1]);
        //更改
        // $result = Db::table('think_data') -> where('id',2) -> update(['name'=>'周杰伦','status'=>1]);
        //删除
        // $result = Db::table('think_data') -> where('id',3) -> delete();
        //查询
        // $result = Db::table('think_data') -> where('id',4) -> select();
        // 助手函数
        // $db = db('data');
        //增加
        // $db -> insert(['name'=>'黎明','status'=>1]);
        //更改
        // $db -> where('name','黎明')->update(['name'=>'周杰伦','status'=>1]);
        // $list = Db::table('think_data')->where('status','1')->field('id','name')->order('id','desc')->limit(3)->select();
        // dump($list);
        // $result = Db::name('data')->where('name','周杰伦')->select();
        // $result = Db::name('data')->where('name','周杰伦')->find();
        //模糊查询
        // $result = Db::name('data')->where('name','like','%杰%')->select();
        //区间查询
        // $result = Db::name('data')->where('id','BETWEEN',[3,4])->select();
        //一次性插入多数据
        // $data = [
        //     ['name'=>'林俊杰','status'=>0],
        //     ['name'=>'张学友','status'=>6],
        //     ['name'=>'渣渣辉','status'=>3]
        // ];
        // $result = Db::name('data')->insertAll($data);
        //更改字段值
        // $result = Db::name('data')->where('id',4)->setField('name','有学长');
        $result = Db::name('data')->where('id', 8)->setInc('status');
        $result = Db::name('data')->where('id', 7)->setDec('status', 2);
        dump($result);
    }

    public function lists()
    {
        return "这是我自己定义的路由规则";
    }
    public function read()
    {
        return "这是我自己定义的简化的方法";
    }
}
