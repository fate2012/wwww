<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<!-- <js href="/Public/js/jquery.js"> -->
	<script type="text/javascript" src="/Public/js/jquery.js"></script>
</head>
<style type="text/css">
	.chat{
		width: 610px;
		height: 800px;
		margin: 0 auto;
	}
	.show{
		border: 1px solid #000;
		width: 400px;
		height: 420px;
		display: block;
	}
	.neirong{
		border:1px solid #000;
		width: 400px;
		display: block;
	}
	.nei{
		width: 400px;
		display: block;
	}
	.online{
		margin-top: -450px;
		width: 200px;
		height: 450px;
		float: right;
		/* background-color: yellow; */
		border:1px solid #000;
	}
	p{
		display: inline;
		width: 400px;
	}
	.one{
		color: blue;
	}
</style>
<body>
	<div><span><a href="<?php echo U(Index.'/Login/logout');?>">logout..</a></span></div>
	<a href="<?php echo U(Index.'/Index/fresh');?>">test....</a>
	<div class="chat">
	<p>chat box</p><br/>
	<!-- 信息展示框 -->
	<div class="show">
			<?php if(is_array($msg)): foreach($msg as $key=>$v): ?><div class="neirong">
			<span><?php echo (date("Y-m-d h:i:s",$v["time"])); ?>  <?php echo ($v["sender"]); ?>:</span>
			<br><?php echo ($v["content"]); ?>
		</div><?php endforeach; endif; ?>
	</div>
	<!-- 在线用户框 -->
	<div class="online">
		<span class="neiron">online:</span><br />
		<?php if(is_array($user)): foreach($user as $key=>$value): ?><span class="one"><?php echo ($value["nickname"]); ?></span><?php endforeach; endif; ?>
	</div>
	<!-- 输入框 -->
	<div class="">
		<textarea name="content" class="content" cols="45" rows="3"></textarea><input type="submit" class="submit" value="submit" />
		
	</div>
	</div>
</body>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.submit').click(function(){
		var name=$('.content').val();
		$.post("<?php echo U(Index.'/Index/ajax');?>",{content:name},function(msg){
			 // var dat=eval("(" + msg + ")");
			 var dat = JSON.parse(msg);
			 $(".show").empty();
			 $.each(dat,function(neirongIndex,datt){
     		var html = "<div class='neirong'><span>"+datt['timee']+"&nbsp;&nbsp;";
    		 html += datt['sender'];
     		 html += ":</span><br/>"+datt['content'];
    		 html += "</div>";     
   		     $('.show').append(html);									
		});
		 $("textarea").val('');
	});
	});});
	function xx(){
		//返回处理最新五条信息
		 $.get("<?php echo U(Index.'/Index/fresh');?>",'',function(mess){
		 	var dat=eval("(" + mess + ")");
			 $(".show").empty();
			// alert(date);
			 $.each(dat,function(neirongIndex,datt){
			 	// var date=Date(datt['time']);
     		var html = "<div class='neirong'><span>"+datt['timee']+"&nbsp;&nbsp;";
    		 html += datt['sender'];
     		 html += ":</span><br/>"+datt['content'];
    		 html += "</div>";     
   		     $('.show').append(html);	  		    					
		});			 
			 });
			 //返回处理在线用户	
		 $.get("<?php echo U(Index.'/Index/freshUser');?>",'',function(mes){
			var dat=eval("(" + mes + ")");
			 $(".one").empty();
			 $.each(dat,function(oneIndex,onlin){
			 	var line="<span class='one'>"+onlin['nickname']+"<br/></span>";
			$('.online').append(line);
	}); });

	}
	//自动刷新
	// setInterval("xx()",3000);
	</script>
</html>