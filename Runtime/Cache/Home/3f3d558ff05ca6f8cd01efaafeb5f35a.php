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
    <!-- <link href="__URL__/../../assets/css/bootstrap-responsive.css" rel="stylesheet">-->
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
	

	 
<section class="welcome-message">
	<div class="container">
	</div>
</section>
<section class="content">
<div class="container-fluid">
	<div class="row-fluid">
		<!-- Left Bar -->
		<div class="span2 nav-block">
			<ul class="nav nav-list fan-left-nav">
				<!-- li class="nav-header">种类列表</li-->
				<li class="" id="sbar_meal"><a href="__URL__/../../Dining/index/p/meal"><span class="icon-home"></span>订餐</a></li>
				<li id="sbar_book"><a href="__URL__/../../Dining/index/p/book"><span class="icon-list"></span>预定</a></li>
				<li id="sbar_balance"><a><span class="icon-th-large"></span>xxxx</a></li>
				<!-- <li id="calendar"><a><spna class="icon-calendar"></spna>Calendar</a></li> -->
			</ul>
		</div>
		
		<!-- Content -->
		<div class="span10 nav-content">
			<?php echo ($innerHtml); ?>
		</div>
	</div>
	
	
	
	
	<!--  -->
	<div class="modal hide fade" id="modal1">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h3>确认</h3>
	  </div>
	  <div class="modal-body">
	    <p>确定购买?</p>
	  </div>
	  <div class="modal-footer">
	    <button class="btn" onclick="onClose();">Cancle</button>
	    <button class="btn btn-primary" onclick="onComfireBuy();">OK</button>
	  </div>
	</div>
	
	<!--  -->
	<div class="modal hide fade" id="modal2">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h3>确认</h3>
	  </div>
	  <div class="modal-body">
	    <p>确定关闭?</p>
	  </div>
	  <div class="modal-footer">
	    <button class="btn" onclick="onClose();">Cancle</button>
	    <button class="btn btn-primary" onclick="onComfireClose();">OK</button>
	  </div>
	</div>
</div>

<!-- 
			<div class="row">
				<div class="span2 dateTimeBlock">
					<div class="row">
						<div class="span1 timeblock2">
							<h3>0:0:0.0</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="span2 dateTimeBlock">
				<div class="row">
					<div class="span1 timeblock">
						<h3>14:12</h3>
						<h6><em>2013/1/20</em></h6>
					</div>
					<div class="span1 weekblock">
						<span>Web</span>
					</div>
				</div>
			</div> -->
</section>
<link rel='stylesheet' type='text/css' href='__URL__/../../assets/css/fullcalendar.css'/>
 <link rel='stylesheet' type='text/css' href='__URL__/../../public/css/dining.css'/>
<script type='text/javascript' src='__URL__/../../assets/js/fullcalendar.js'></script>
<script src="__URL__/../../public/js/home/dining.js"></script>
 


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