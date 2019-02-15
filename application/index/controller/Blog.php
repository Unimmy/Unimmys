<?php
/**
 * Created by PhpStorm.
 * User: XX
 * Date: 2019/2/14
 * Time: 13:43
 */
namespace app\index\controller;
class Blog{
    public function index()
    {
        dump('index');
    }
    public function update($id)
    {
        dump('update $id');
    }
    public function delete($id)
    {
        dump('delete $id');
    }
}