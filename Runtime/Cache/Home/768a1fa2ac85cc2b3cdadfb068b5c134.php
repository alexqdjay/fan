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
                <div class="caption">
                    <h3 class="animated bounceInLeft">如果你没有账号 <a href="/75fan/User/toRegister" class="btn btn-primary">Sign up</a></h3>
                    <h3 class="animated bounceInRight">如果你已有账号 <a onclick="loginShow();" class="btn btn-primary">Login</a></h3>
                </div>
            </div>
            <div class="item">
                <img alt="Universe" src="__URL__/../../public/IMG/Home/1.png">
                <div class="caption">
                    <h3 class="animated bounceInLeft">终于可以有地方订午Fan了!</h3>
                    <h3 class="animated bounceInRight">暂时对chrome、FireFox支持.如有问题请速联系我...<a>qianduo@eccom.com.cn</a></h3>
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
		<div class="row service">
			<div class="span4">
				<div class="small-well">
					<div class="service-icon">
						<li class="icon-user icon-white"></li>
					</div>
					<h5>User</h5>
					<span>Info/Login</span>
					<div class="progress progress-info">
					  <div class="bar" style="width: 30%"></div>
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="small-well">
					<div class="service-icon">
						<li class="icon-th-large icon-white"></li>
					</div>
					<h5>Dining</h5>
					<span>Orders/List</span>
					<div class="progress progress-info">
					  <div class="bar" style="width: 80%"></div>
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="small-well">
					<div class="service-icon">
						<li class="icon-headphones icon-white"></li>
					</div>
					<h5>??</h5>
					<span>?</span>
					<div class="progress progress-info">
					  <div class="bar" style="width: 0%"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<link href="__URL__/../../public/css/index.css" rel="stylesheet" media="screen">
<script src="__URL__/../../public/js/Home/index.js"></script>



<!-- Socket -->
<section class="socket-content">
    <div class="container">
        <div class="row-fluid">
            <div class="span4">
               <section>
                   <h4><span class="">联系我们</span></h4>
                   <p>
                       <strong>Tel:</strong> 110<br>
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
                    <p>Immortal robot bodies are the new rage. The cost of preserving a head is much less than the entire body and at least you can keep your face. But with the immortal robot, after you die, your soul or spirit is digitized and your flesh body rots, but you don’t care, ‘cause having an immortal robot body is ultra cool and sexy. While you’re still on earth, your immortal robot body sits in storage ready for the fateful day. You betcha, it does provide peace of mind or piece of mind.</p>
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
</body>
</html>