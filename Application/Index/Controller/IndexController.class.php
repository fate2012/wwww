<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends Controller {
    /**
		 * 登陆默认页面，因继承commentAction故不显示
		 */
		public function index(){
			// echo "__GROUP__";DIE;
			$this->display();
		}
		/**
		 * 利用ajaxreturn以JSON方式返回聊天内容数组
		 */
		public function ajax(){
			// var_dump($_POST);die;
			$data=array();
			// $Model = new Model();
			$data['content']=$_POST['content'];
			$data['time']=time();
			$data['timee']=date('Y-m-d H:i:s',time());
			$data['sender']=session('account');
			// var_dump($data);die;
			$dd=M('msg')->data($data)->add();
			if($dd){
				$dataa=M('msg')->order('id desc')->limit('5')->select();
				// var_dump($dataa);
			// $this->ajaxReturn($dataa);
			echo json_encode($dataa,true);
		   }
		}
		
		/**
		 * 刷新时获取最新五条聊天内容和在线用户
		 */
		public function homePage(){
			$this->msg=M('msg')->order('id desc')->limit('5')->select();
			$this->user=M('user')->where(array('status'=>1))->select();
			$this->display();
		}

		/**
		 * 即时返回最新五条聊天内容
		 */
		public function fresh(){
			$data=M('msg')->order('id desc')->limit('5')->select();
			$this->ajaxReturn($data);
		}

		/**
		 * 即时返回在线用户
		 */
		public function freshUser(){
			$dat=M('user')->where(array('status'=> 1))->select();
			$this->ajaxReturn($dat);
		}
}