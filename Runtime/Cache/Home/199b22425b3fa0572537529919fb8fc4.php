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
	

	
<script>
    var URL = '__URL__';
</script>

<!-- Category -->
<section id="categoryContainer">
    <div class="container">
        <div class="row">
            <div class="span12" id="category">
                <ul class="nav nav-pills">
                    <li class="nav-header">类目</li>
                    <li class="active"><a>川菜</a></li>
                    <li class=""><a>小吃</a></li>
                    <li class=""><a>奶茶</a></li>
                    <li class=""><a>咖啡</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Content -->
<section id="contentContainer">
    <div class="container" id="content">
        <div class="row item-row">
            <div class="content-item span12">
                <div class="item-info">
                    <span class="item-name">
                        <a><strong>Levi's/李纬斯</strong></a>
                    </span>
                    <span class="muted">
                        <small>月销量：2000</small>
                    </span>
                    <!--span class="pull-right btn-row"><button class="btn btn-small item-btn btn-primary">关注Me</button></span-->
                </div>
                <div class="item-list" id="s_1">
                    <a class="list-silder-btn pull-left">&lt;</a>
                    <div class="list-silder-container">
                        <ul class="list-silder">
                            <li>
                                <p class="list-silder-item-img"><a><img src="../public/IMG/Home/brand/1.jpg"></a></p>
                                <p class="list-silder-item-info">
                                    <span class="list-silder-item-info-price">￥450.00</span>
                                    <span class="list-silder-item-info-num">月销量:20</span></p>
                                <p><a class="list-silder-item-info-desc">裤子1</a></p>
                            </li>
                            <li>
                                <p class="list-silder-item-img"><a><img src="../public/IMG/Home/brand/2.jpg"></a></p>
                                <p class="list-silder-item-info">
                                    <span class="list-silder-item-info-price">￥450.00</span>
                                    <span class="list-silder-item-info-num">月销量:20</span></p>
                                <p><a>裤子2</a></p>
                            </li>
                            <li>
                                <p class="list-silder-item-img"><a><img src="../public/IMG/Home/brand/3.jpg"></a></p>
                                <p class="list-silder-item-info">
                                    <span class="list-silder-item-info-price">￥450.00</span>
                                    <span class="list-silder-item-info-num">月销量:20</span></p>
                                <p><a>裤子3</a></p>
                            </li>
                            <li>
                                <p class="list-silder-item-img"><a><img src="../public/IMG/Home/brand/1.jpg"></a></p>
                                <p class="list-silder-item-info">
                                    <span class="list-silder-item-info-price">￥450.00</span>
                                    <span class="list-silder-item-info-num">月销量:20</span></p>
                                <p><a>裤子4</a></p>
                            </li>
                            <li>
                                <p class="list-silder-item-img"><a><img src="../public/IMG/Home/brand/2.jpg"></a></p>
                                <p class="list-silder-item-info">
                                    <span class="list-silder-item-info-price">￥450.00</span>
                                    <span class="list-silder-item-info-num">月销量:20</span></p>
                                <p><a>裤子5</a></p>
                            </li>
                            <li>
                                <p class="list-silder-item-img"><a><img src="../public/IMG/Home/brand/3.jpg"></a></p>
                                <p class="list-silder-item-info">
                                    <span class="list-silder-item-info-price">￥450.00</span>
                                    <span class="list-silder-item-info-num">月销量:20</span></p>
                                <p><a>裤子6</a></p>
                            </li>
                            <li>
                                <p class="list-silder-item-img"><a><img src="../public/IMG/Home/brand/3.jpg"></a></p>
                                <p class="list-silder-item-info">
                                    <span class="list-silder-item-info-price">￥450.00</span>
                                    <span class="list-silder-item-info-num">月销量:20</span></p>
                                <p><a>裤子7</a></p>
                            </li>
                        </ul>
                    </div>
                    <a class="list-silder-btn pull-right list-silder-btn-disabled">&gt;</a>
                </div>
            </div>
        </div>

        <div class="row item-row">
            <div class="content-item span12">
                <div class="item-info">
                    <p class="item-name">
                        <a><strong>Levi's/李纬斯</strong></a>
                    </p>
                    <address class="item-addr muted">
                        <abbr><i class="icon-home"></i>:</abbr>上海市浦东新区峨山路</strong><br>
                        <abbr><i class="icon-user"></i>:</abbr>16855854
                    </address>
                    <p class="muted">
                        <small>月销量：2000</small>
                    </p>
                    <p class="pull-center btn-row"><button class="btn btn-small item-btn btn-primary">关注Me</button></p>
                </div>
                <div class="item-list"></div>
            </div>
        </div>

        <div class="row item-row">
            <div class="content-item span12">
                <div class="item-info">
                    <p class="item-name">
                        <a><strong>Levi's/李纬斯</strong></a>
                    </p>
                    <address class="item-addr muted">
                        <abbr><i class="icon-home"></i>:</abbr>上海市浦东新区峨山路</strong><br>
                        <abbr><i class="icon-user"></i>:</abbr>16855854
                    </address>
                    <p class="muted">
                        <small>月销量：2000</small>
                    </p>
                    <p class="pull-center btn-row"><button class="btn btn-small">关注Me</button></p>
                </div>
                <div class="item-list">

                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<section id="FooterContainer">

</section>
<link rel='stylesheet' type='text/css' href='__URL__/../../public/CSS/takeout.css'/>
<script src="__URL__/../../public/JS/Home/takeout.js"></script>


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
                    <p>Immortal robot bodies are the new rage.</p>
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