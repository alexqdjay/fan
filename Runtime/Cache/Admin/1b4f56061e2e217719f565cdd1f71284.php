<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head lang="zh-CN">
 	<meta charset="utf-8"> 
    <title><?php echo ($title); ?></title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content=""> 
    <meta name="author" content=""> 
    <link href="__URL__/../../../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="__URL__/../../../assets/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="__URL__/../../../assets/css/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" media="screen">
    <link href="__URL__/../../../public/CSS/common.css" rel="stylesheet" media="screen">
    <script src="__URL__/../../../assets/js/jquery.js"></script>
    <script src="__URL__/../../../assets/js/jquery-ui-1.10.1.custom.min.js"></script>
    <!--  <link href="__URL__/../assets/css/bootstrap-responsive.css" rel="stylesheet"> -->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements --> 
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
     <script src="__URL__/../../../public/JS/Admin/common.js"></script>
     <script>
         var URL = '__URL__';
     </script>
 </head>
<body>
    <!-- header bar-->
<div id="hbar">
    <div id="logoShow" class="span3">
        <a herf="index.php">75<span>Fan</span></a>
    </div>
</div>
	<!-- SilderBar-->
<div id="sbar">
    <ul id="sbarList" class="accordion">
        <!--   Dash Board -->
        <li class="accordion-group active">
            <div class="accordion-heading">
                <a class="accordion-toggle accordion-item" id="home" href="__APP__/../Admin">
                    <i class="icon-home"></i>Dashboard
                </a>
            </div>
        </li>

        <!-- User Manage -->
        <li class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" href="#userManage">
                    <i class="icon-user"></i><span>User Manage</span><span class="label">3</span>
                </a>
            </div>
            <ul id="userManage" class="accordion-body collapse" >
                <li class="accordion-inner">
                    <a class="accordion-item" id="users" href="__APP__/../Admin/User/users">Users</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item" id="charge" href="__APP__/../Admin/Charge/index">Charge</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item" id="chargeRecord" href="__APP__/../Admin/Charge/chargeRecord">Charge Records</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item" id="accountList" href="__APP__/../Admin/Account/index">Account List</a>
                </li>
            </ul>
        </li>

        <!-- Goods -->
        <li class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse"  href="#goodsManager">
                    <i class="icon-briefcase"></i><span>Goods Manager</span><span class="label">2</span>
                </a>
            </div>
            <ul id="goodsManager" class="accordion-body collapse" >
                <li class="accordion-inner">
                    <a class="accordion-item" href="__APP__/../Admin/Goods/stores" id="stores">Stores</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item" href="__APP__/../Admin/Goods/goods" id="goods">Goods</a>
                </li>
            </ul>
        </li>

        <!--   Music  -->
        <li class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse"  href="#collapse3">
                    <i class="icon-headphones"></i><span>Music</span><span class="label">3</span>
                </a>
            </div>
            <ul id="collapse3" class="accordion-body collapse" >
                <li class="accordion-inner">
                    <a class="accordion-item">Anim pariatur cliche...</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item">Anim pariatur cliche...</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item">Anim pariatur cliche...</a>
                </li>
            </ul>
        </li>
        <li class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse"  href="#collapse4">
                    minList
                </a>
            </div>
            <ul id="collapse4" class="accordion-body collapse" >
                <li class="accordion-inner">
                    <a class="accordion-item">Anim pariatur cliche...</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item">Anim pariatur cliche...</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item">Anim pariatur cliche...</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
    <section id="content">
        <div id="contentHeader">
            <h1>Hello World</h1>
        </div>
        <div id="breadcrumb">
            <ul class="breadcrumb">
                <li><a href="#">首页</a> </li>
                <li><span class="divider">/</span><a href="#">Library</a></li>
                <li class="active"><span class="divider">/</span>Data</li>
            </ul>
        </div>
    <div class="container-fluid">
	
<div class="row-fluid">
    <div class="span12">
        <div class="content-box">
            <div class="content-box-title"></div>
            <div class="content-box-main">
                <div class="row-fluid">
                    <div class="span12"  style="min-height: 400px;">
                        <table class="table" id="chargesTable">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Money</th>
                                <th>Time</th>
                                <th>Action</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="__URL__/../../../public/JS/Admin/charge.js"></script>
    </div>
    </section>
<!-- Socket -->
<section id="socket">
	<div class="container-fluid">
		<div class="row-fluid">
			<span id="declaration">© 2013 75Fan All rights reserved.</span>
		</div>
	</div>
</section>
<script src="__URL__/../../../assets/js/bootstrap.min.js"></script>
<script src="__URL__/../../../public/JS/fanadmin.js"></script>
</body>
</html>