<?php
namespace Index\Controller;
use Think\Controller;
class RegisterController extends Controller {
    /**
	 * 注册页面展示
	 */
	public function index(){
		$this->display();
	}

	/**
	 * 用户注册表单处理
	 */
	public function registerHandle(){
		// dump($_POST);
		if(empty($_POST))
			$this->error('warning...');
		if(!$_POST && empty($_POST['account']) && empty($_POST['pwd'])){
			$this->error('warning....');}else{
		
		$pwd=md5($_POST['pwd']);
		// echo $pwd;die;
		$data=array('nickname'=>$_POST['nickname'],'pwd'=>$pwd,'account'=>$_POST['account'],'dept_id'=>0,'status'=>1);
		$register=M('user')->data($data)->add();
		if($register){
			$this->success('register success！turning page....',U(Index.'/Login/index'));
		}else{
			$this->error('false,please try again');
		}
	}}
}