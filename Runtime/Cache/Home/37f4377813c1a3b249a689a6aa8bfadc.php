<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head lang="zh-CN">
 	<meta charset="utf-8"> 
    <title><?php echo ($title); ?></title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content=""> 
    <meta name="author" content=""> 
    <link href="__URL__/../../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="__URL__/../../assets/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="__URL__/../../assets/css/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" media="screen">
    <link href="__URL__/../../public/css/fan.css" rel="stylesheet" media="screen">
    <script src="__URL__/../../assets/js/jquery.js"></script>
    <script src="__URL__/../../assets/js/jquery-ui-1.10.1.custom.min.js"></script>
    <script src="__URL__/../../public/js/Home/common.js"></script>
     <script src="__URL__/../../public/js/fanadmin.js"></script>
    <!--  <link href="__URL__/../assets/css/bootstrap-responsive.css" rel="stylesheet"> -->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements --> 
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
     <script>
         var URL = '__URL__';
     </script>
 </head>

<body>
<style>
    html,body {
        height:100%;
    }

    #content {
        height:100%;
        background-image: url('__URL__/../../public/img/home/bg1.jpg');
    }

	.modal {
		top:200px;
	}
</style>
<section id="content">
	<div class="container">
		<!-- Login Win -->
		<div id="loginWin" class="modal">
		  <div class="modal-header">
		    <h3 style="color:#22AAEE;">Login</h3>
		  </div>
		  <div class="modal-body">
		    <form class="form-horizontal" method="POST" action="__URL__/../Login/login/p/<?php echo ($p); ?>">
				<div class="control-group">
				  <label class="control-label" for="inputName">Name</label>
				  <div class="controls">
				    <input type="text" id="inputName" name="name" max="12" min="2" required 
				    class="required">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword">Password</label>
				  <div class="controls">
				    <input type="password" id="inputPwd" name="pwd" max="12" min="6" required
				    	class="required">
				  </div>
				</div>
		    </form>
		  </div>
		  <div class="modal-footer">
            <a href="__URL__/../User/toRegister" class="pull-left">to Sign Up!</a>
		    <button class="btn" onclick="back();">Back</button>
			<button class="btn btn-primary"  onclick="login();" id="login">Login</button>
		  </div>
		</div>
	</div>
</section>
<link href="__URL__/../../public/css/home/login.css" rel="stylesheet" media="screen">
<script src="__URL__/../../public/js/home/login.js"></script>
<script src="__URL__/../../assets/js/bootstrap.min.js"></script>
</body>
</html>