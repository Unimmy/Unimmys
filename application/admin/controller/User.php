<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2019/2/14
 * Time: 14:17
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\model\User as UserModel;
use app\admin\validate\User as UserValidate;
class User extends Controller{
    public function index()
    {
        return $this->fetch();
    }
//    用户登录
    public function login()
    {
        return $this->fetch();
    }
    public function log()
    {
        $name = input('post.name');
        $password = input('post.password');
        dump($name,$password);
    }
    public function lists()
    {
        return $this->fetch();
    }
    public function charts()
    {
        return $this->fetch();
    }
    public function forms()
    {
        return $this->fetch();
    }
    public function tables()
    {
//        $data = UserModel::all();
//        $this -> assign('data',$data);
        //分页展示
        $data = UserModel::paginate(3);
        $page = $data ->render();
        $this->assign('data',$data);
        $this->assign('page',$page);
        return $this->fetch();
    }
    public function register()
    {
        return $this->fetch();
    }
    //新增管理员方法
    public function insert()
    {
        $data = input('post.');
        $val = new UserValidate();
        if(!($val->check($data))){
            $this->error($val->getError());
            exit;
        }
        $user = new UserModel($data);
        $res = $user->allowField(true)->save();
        if($res){
            $this->success('新增管理员成功','User/tables');
        }else{
            $this->error('新增管理员失败');
    }
    }
    public function update()
    {
        $id = input('get.id');
        $data = UserModel::get($id);
        $this->assign('data',$data);
        return $this->fetch();
    }
    public function updates()
    {
        $id = input("post.id");
        $data = input('post.');
        $val = new UserValidate();
        if(!($val->check($data))){
            $this->error($val->getError());
            exit;
        }
        $user = new UserModel();
        $res = $user->allowField(true)->save($data,['id'=>$id]);
        if($res){
            $this->success('修改用户信息成功','User/tables');
        }else{
            $this->error('修改用户数据失败');
        }
    }
    public function delete()
    {   //软删除
        $id = input('get.id');
        $res = UserModel::destroy($id);
        if($res){
            $this ->success('删除用户成功','User/tables');
        }else{
            $this->error('删除用户数据失败');
        }
    }
}