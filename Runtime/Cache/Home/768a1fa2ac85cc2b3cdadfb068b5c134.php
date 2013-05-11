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
    <link href="__URL__/../../assets/fontello/css/fontello.css" rel="stylesheet">
    <link href="__URL__/../../assets/fontello/css/animation.css" rel="stylesheet">
    <link href="__URL__/../../public/css/fan.css" rel="stylesheet" media="screen">
    <script src="__URL__/../../assets/js/jquery.js"></script>
    <script src="__URL__/../../assets/js/jquery-ui-1.10.1.custom.min.js"></script>
    <script src="__URL__/../../public/js/Home/common.js"></script>
     <script src="__URL__/../../public/js/fanadmin.js"></script>
    <!-- --> <link href="__URL__/../../assets/css/bootstrap-responsive.css" rel="stylesheet">
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
                        <li class="" id="msg"><a href="__APP__/../Msg/index">MSG</a></li>
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
	

	

<!-- Welcome Message
<div class="welcome-message">
	<div class="container">
		<div class="hero-unit">
			<h4>终于可以有地方订午Fan了!<br>
				<small>暂时对chrome、FireFox支持.如有问题请速联系我...<a>qianduo@eccom.com.cn</a></small>
			</h4>
		</div>
	</div>
</div>-->

<div class="squence">
    <div id="myCarousel" class="carousel slide">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item">
                <img alt="Universe" src="__URL__/../../public/IMG/Home/universe.jpg">
                <div class="caption caption-light">
                    <h3 class="animated bounceInLeft">如果你没有账号 <a href="__URL__/../User/toRegister" class="btn btn-primary">Sign up</a></h3>
                    <h3 class="animated bounceInRight">如果你已有账号 <a onclick="loginShow();" class="btn btn-primary">Login</a></h3>
                </div>
            </div>
            <div class="item">
                <img alt="Universe" src="__URL__/../../public/IMG/Home/1.png">
                <div class="caption caption-normal">
                    <h3 class="animated bounceInLeft" style="font-size:20px;">终于可以有地方订午Fan了!</h3>
                    <h3 class="animated bounceInRight">暂时对chrome、FireFox支持.如有问题请速联系我...</h3>
                </div>
            </div>
            <div class="item"><img alt="Universe" src="__URL__/../../public/IMG/Home/2.jpg"></div>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>

<!-- Content -->
<div class="content">
	<div class="container">
        <!-- Service -->
		<div class="row-fluid service">
			<div class="span4">
				<div class="small-well row-fluid">
                    <div class="service-title span3">
                        <i class="ficon-users service-icon"></i>
                        <span>User</span>
                    </div>
					<div class="service-info span9">
                        <span class="service-content">提供注册/登录功能，个人信息记录。</span>
                        <!--span class="service-link">
                            <a onclick="loginShow()">Login</a>
                            <a href="__URL__/../User/toRegister">Sign up</a>
                        </span-->
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="small-well row-fluid">
					<div class="service-title span3">
						<i class="ficon-food service-icon"></i>
                        <span>Dining</span>
					</div>
                    <div class="service-info span9">
                        <span class="service-content">订购、预定、查看订购记录、充值等..</span>
                    </div>
				</div>
			</div>
			<div class="span4">
				<div class="small-well row-fluid">
                    <div class="service-title span3">
                        <i class="service-icon" style="margin-bottom: 12px;display: inline-block;font-weight: bold;">FM</i>
                        <span>Radio</span>
                    </div>
                    <div class="service-info span9">
                        <span class="service-content">在线电台，简单便捷收听。</span>
                    </div>
				</div>
			</div>
		</div>

        <!-- Future -->
        <div class="headerline">
            <h3>Future</h3>
        </div>
        <div class="row-fluid">
            <div class="span4">
                <div class="small-well row-fluid">
                    <div class="service-title span3">
                        <i class="service-icon" style="margin-bottom: 12px;display:block; font-weight: bold;">?</i>
                        <span>None</span>
                    </div>
                    <div class="service-info span9">
                        <span class="service-content">还不知道!</span>
                        <!--span class="service-link">
                            <a onclick="loginShow()">Login</a>
                            <a href="__URL__/../User/toRegister">Sign up</a>
                        </span-->
                    </div>
                </div>
            </div>
        </div>

        <!-- technique -->
        <div class="headerline">
            <h3>Technique</h3>
        </div>
        <div class="row-fluid" style="margin-bottom: 50px">
            <div class="span3">
                <div class="service-photo-container orange">
                    <i class="ficon-github service-photo"></i>
                    <h3 class="service-photo-name">github</h3>
                </div>
                <!--<p class="service-introduce">
                    Git是一个分布式的版本控制系统，最初由Linus Torvalds编写，用作Linux内核代码的管理...
                </p>
                <a onclick="window.open('https://github.com/');">Link &gt;&gt;</a>-->
            </div>
            <div class="span3">
                <div class="service-photo-container blue">
                    <i class="ficon-html5 service-photo"></i>
                    <h3 class="service-photo-name">html5</h3>
                </div>
                <!--<p class="service-introduce">
                    HTML5是用于取代1999年所制定的 HTML 4.01 和 XHTML 1.0 标准的 HTML 标准版本，现在仍处于发展阶段...
                </p>
                <a onclick="window.open('http://baike.baidu.com/view/951383.htm');">Link &gt;&gt;</a>-->
            </div>
            <div class="span3">
                <div class="service-photo-container purple">
                    <i class="ficon-feather service-photo"></i>
                    <h3 class="service-photo-name">bootstrap</h3>
                </div>
                <!--<p class="service-introduce">
                    Bootstrap是Twitter推出的一个开源的用于前端开发的工具包。Bootstrap提供了优雅的HTML和CSS规范，它即是由动态CSS语言Less...
                </p>
                <a onclick="window.open('http://twitter.github.io/bootstrap/');">Link &gt;&gt;</a>-->
            </div>
            <div class="span3">
                <div class="service-photo-container red">
                    <i class="service-photo" style="display: inline-block;line-height: 60px;">PHP</i>
                    <h3 class="service-photo-name">php 5</h3>
                </div>
                <!--<p class="service-introduce">
                    PHP是“PHP:Hypertext Preprocessor”的缩写，即“超文本预处理器”。PHP是一种功能强大，并且简便易用的脚本语言。
                </p>
                <a onclick="window.open('http://php.net/');">Link &gt;&gt;</a>-->
            </div>
        </div>
	</div>
</div>

<link href="__URL__/../../public/css/home/index.css" rel="stylesheet" media="screen">
<script src="__URL__/../../public/js/Home/index.js"></script>



<!-- Socket -->
<section class="socket-content">
    <div class="container">
        <div class="row-fluid">
            <div class="span4">
               <section>
                   <h4><span class="">联系我们</span></h4>
                   <p>
                       <strong>Tel:</strong> 2806<br>
                       <strong>Email:</strong> qianduo@eccom.com.cn
                   </p>
               </section>
            </div>
            <div class="span4">
                <section>
                    <h4><span>浏览器支持</span></h4>
                    <p>Bootstrap is tested and supported in major modern browsers like Chrome, Firefox, and Internet Explorer.</p>
                    <img src="__URL__/../../public/IMG/logos/browser_logos.png">
                    <ul style="margin-top:5px;font-size: 13px;">
                        <li>Chrome 14+</li>
                        <li>Safari 5</li>
                        <li>Firefox 5+</li>
                        <li>Internet Explorer 7/8/9</li>
                    </ul>
                </section>
            </div>
            <div class="span4">
                <section>
                    <h4><span>ABOUT US</span></h4>
                    <p>NuLl</p>
                </section>
            </div>

        </div>
    </div>
</section>
<section class="socket">
	<div class="container">
		<div class="row">
			<p class="text-center" style="text-align: center;">© 2013 75Fan All rights reserved.</p>
		</div>
	</div>
</section>
<script src="__URL__/../../assets/js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,700italic,400,700' rel='stylesheet' type='text/css'>
</body>
</html>