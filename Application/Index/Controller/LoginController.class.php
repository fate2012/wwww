<?php
namespace Index\Controller;
use Think\Controller;
class LoginController extends Controller {
	/**
	 * 登录页面展示
	 */
	public function index(){
		
		$this->display();
	}
	/**
	 * 处理登陆数据
	 */
	public function loginHandle(){
		// dump($_POST);
		if(!$_POST)
			$this->error('warning.......');
		$user=M('user')->where(array('account'=>$_POST['account']))->find();
		// dump($user);die;
		if($user){
			$pwd=md5($_POST['pwd']);
			if($pwd==$user['pwd']){
				session('account',$user['account']);
				M('user')->where(array('account'=>$_POST['account']))->setField('status',1);
				$this->success('login.....',U(Index.'/Index/homePage'));
			}else{
				$this->error('wrong password,please try again...');
			}
		}else{
			$this->error('wrong account,please try again...');
		}

	}
	/**
	 * 退出登录操作
	 */
	public function logout(){
		M('user')->where(array('account'=>session('account')))->setField('status',0);
		cookie('account',null);
		$this->success('logouting...',U(Index.'/Login/index'));
	}
}