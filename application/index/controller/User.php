<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\User as UserModel;
class User extends Controller
{
    public function add()
    {
        // $user = new UserModel();
        // $user->name = '流云';
        // $user->email = 'liuyun@qq.com';
        // $user->bithday = strtotime('1989-7-11');
        // if( $user->save()){
        //     return '用户新增成功';
        // }else{
        //     return '用户新增失败';
        // }
       $user['name']='看云';
       $user['email']='kanyun@qq.com';
       $user['bithday']=strtotime('1991-6-12');
       if($result = UserModel::create($user)){
        return '用户新增成功';
        }else{
            return '用户新增失败';
        }
    }
    public function addList()
    {
        $user = new UserModel();
        $list = [
            ['name'=>'张三','email'=>'zhangsan@qq.com','bithday'=>strtotime('1994-1-15')],
            ['name'=>'李四','email'=>'lisi@qq.com','bithday'=>strtotime('1997-1-15')]
        ];
      if( $user->saveAll($list)){
        return '批量增加成功';
      }else{
        return '批量增加失败';
      }
    }
    public function update()
    {
        $user = UserModel::get(1);
        // // dump($user);
        // $user->name = '安迪';
        // $user->email = 'andi@qq.com';
        // if($user->save()){
        //     return '更改数据成功';
        // }else{
        //     return '更改数据失败';
        // }
        // $user->save(['name'=>'刘涛','email'=>'liutao@qq.com'],['id'=>1]);
        //批量更新
        // $user = new UserModel();
        // $list=[
        //     ['id'=>2,'name'=>'刘鑫','email'=>'liuxin@qq.com'],
        //     ['id'=>2,'name'=>'小雪','email'=>'xiaoxue@qq.com'],
        // ];
        // if($user->saveAll($list)){
        //     return '成功';
        // }
        // $user  = new UserModel();
        // $user->update(['id'=>2,'name'=>'郑伊健','email'=>'zhengyijian@qq.com']);
        UserModel::update(['id'=>2,'name'=>'浩南','email'=>'haonao@qq.com']);
    }
//    查询数据
        public function select()
        {
//            $user = UserModel::get(1);
//            echo $user->name.'<br/>';
//            echo $user->email.'<br/>';
//            $user = UserModel::get(['name'=>'刘涛']);
//            echo $user->name.'<br/>';
//            $user = new UserModel();
//            $result = $user->where('name','张三')->find();
//            echo $result->email;
//            $list = UserModel::all([1,2,3]);
//            foreach ($list as $key => $value) {
//                echo $value->name.'<br/>';
//                echo $value->email.'<br/>';
//            }
//            $user = new UserModel();
//            $res = $user->where('id','3')->limit(1)->select();
//            foreach ($res as $key=>$value){
//                echo $value->name.'<br/>';
//                echo $value->email.'<br/>';
//                echo $value['name'];
//            }
            //聚合函数调用
            $user = new UserModel();
            //echo $user->Count();
            echo $user->Max('bithday');
        }
        //删除数据
    public function delete()
    {//删除单条数据
       /* $user = UserModel::get(1);
        if ($user->delete()){
            return '删除数据成功';
        }else{
            return '删除失败';
        }*/
      //删除单条数据
       /*if(UserModel::destroy(2)){
           return '数据删除成功';
       }else{
           return '数据删除失败';
       }*/
//       删除多条数据
      /*  if(UserModel::destroy([3,4])){
            return '删除多条数据成功';
        }else{
            return '删除多条数据失败';
        }*/
//      根据条件删除
       /* if (UserModel::destroy(['name'=>'张三'])){
            return '成功';
        }else{
            return '失败';
        }*/
       $result = UserModel::where('id','>',1);

       if($result){
           return '成功';
       }else{
           return '失败';
       }
    }
    public function lists()
    {
        $list =UserModel::all();
        $this ->assign('list',$list);
        return $this ->fetch();
    }
}
?>