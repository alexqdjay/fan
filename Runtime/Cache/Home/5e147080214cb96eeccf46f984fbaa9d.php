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
	<!-- Header -->
<div class="header">
	<div class="container">
		<div class="row-fluid">
			<div id="logoShow" class="span3">
				<a herf="index.php">75<span>Fan</span></a>
			</div>
			<div class="span9 navbar">
				<div class="navbar-inner">
					<ul class="nav fan-nav">
						<li class="" id="index"><a href="__APP__/../">Home</a></li>
						<li class="" id="dining"><a href="__APP__/../Dining/index">订饭</a></li>
                        <li class=""><a href="__APP__/../Msg/index">MSG</a></li>
						<li class=""><a href="__APP__/../Takeout/index">外卖</a></li>
						<li class="" id="personal">
							<a href="__APP__/../Personal/index">
								<span class="nav-ico icon-user"></span><?php echo ($userName); ?>
							</a>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown">
							    <span class="caret"></span>
						  	</a>
					  		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							  <li class="dropdown-menu-item"><a tabindex="-1" href="#" onclick="logout();">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var _url = '__URL__';
</script>
<script type="text/javascript" src="__URL__/../../public/js/Home/tbar.js"></script>
	

	
<sessions class="main">
	<div class="container">
		<div class="row">
			<div class="span3" id="userList-container">
                <ul class="nav nav-stacked" id="userList">
                    <li class="active"><a>Jay</a></li>
                    <li class=""><a>Tom</a></li>
                    <li class=""><a>Hebe</a></li>
                </ul>
			</div>
			<div class="span8" id="msg-container">
                <div id="msg-display">
                    <div class="msg msg-from">
                        <div class="portrait"></div>
                        <pre class="msg-content">dddddddddddddddas</pre>
                        <div class="msg-time">23:12:02</div>
                    </div>
                    <div class="msg msg-to">
                        <div class="portrait"></div>
                        <pre class="msg-content">dddddddddddddddas</pre>
                        <div class="msg-time">23:12:02</div>
                    </div>
                </div>
                <div id="input-container">
                       <div class="input-append">
                           <input type="text" class="span7" id="msgInput">
                           <button class="btn" id="sendBtn">Send</button>
                       </div>
                </div>
			</div>
		</div>
	</div>
</sessions>
<link rel='stylesheet' type='text/css' href='__URL__/../../public/css/msg.css'/>
<script src="__URL__/../../public/js/Home/msg.js"></script>

<!-- Socket -->
<section class="socket">
	<div class="container">
		<div class="row">
			<span>© 2013 75Fan All rights reserved.</span>
		</div>
	</div>
</section>
<script src="__URL__/../../assets/js/bootstrap.min.js"></script>
</body>
</html>