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
                    <i class="icon-user"></i><span>User Manage</span><span class="label">4</span>
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
                    <i class="icon-briefcase"></i><span>Goods Manage</span><span class="label">3</span>
                </a>
            </div>
            <ul id="goodsManager" class="accordion-body collapse" >
                <li class="accordion-inner">
                    <a class="accordion-item" href="__APP__/../Admin/Goods/stores" id="stores">Stores</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item" href="__APP__/../Admin/Goods/goods" id="goods">Goods</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item" href="__APP__/../Admin/Goods/dining" id="dining">Dining</a>
                </li>
                <li class="accordion-inner">
                    <a class="accordion-item" href="__APP__/../Admin/Order/index" id="orders">Orders</a>
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
	
<div class="row-fluid" style="height: 300px">
    <div class="span12">
        <div class="content-box">
            <div class="content-box-title">
            </div>
            <div class="content-box-main" style="min-height: 80px">
                <div class="row-fluid">
                    <div class="span12">
                        <h3>
                            <button class="btn" type="button" href="#storeSearchModal" data-toggle="modal"><i class="icon-search"></i>Search</button>
                        </h3>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="well" id="storeInfo">
                            <h4 class="store-name"><a></a></h4>
                            <address>
                                <i class="icon-home"></i>:<p></p><br>
                                <i class="icon-hdd"></i>:<p></p>
                            </address>
                            <span class="muted"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="content-box">
            <div class="content-box-title">
            </div>
            <div class="content-box-main"  style="height:1050px;overflow:auto;">
                <div class="row-fluid">
                    <div class="span4">
                        <div class="input-append">
                            <input class="span9" id="goodsSearch" type="text">
                            <button class="btn" type="button" onclick="onSearch();"><i class="icon-search"></i>Search</button>
                        </div>
                    </div>
                    <div class="span3">
                        <button class="btn btn-primary" onclick="onCreate()">Create</button>
                    </div>
                    <div class="span4 offset1">
                        <div class="pagination pagination-right" style="margin:0px 0px 5px 0px;" id="page1">
                            <ul>
                            <li class="pagination-pre"><a>&laquo;</a></li>
                            <li class="disabled"><span class="pagination-currentNum">1</span></li>
                            <li class="pagination-next"><a>&raquo;</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <table class="table" id="goodsTable">
                            <thead>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Money</th>
                                <th>Last Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal hide fade" id="storeSearchModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Store Search</h3>
    </div>
    <div class="modal-body">
        <input type="text" data-provide="typeahead" id="storeTypeahead" data-source="['1','2']">
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" aria-hidden="true" data-dismiss="modal">关闭</a>
        <a href="#" class="btn btn-primary" onclick="onStoreSelect()">选择</a>
    </div>
</div>
<link href="__URL__/../../../public/CSS/goods.css" rel="stylesheet" media="screen">
<script src="__URL__/../../../public/JS/Admin/goods.js"></script>
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