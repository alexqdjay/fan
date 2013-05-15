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
<section id="content">
    <div id="contentHeader">
        <h1>Hello World</h1>
    </div>
    <div class="container-fluid">
        
<div class="row-fluid">
    <div class="content-box">
        <div class="content-box-title">
        </div>
        <div class="content-box-main" style="min-height: 80px">
            <form class="form-horizontal" action="__URL__/../Goods/save" method="POST">
                <legend>Good</legend>

                <!--    Id  -->
                <input type="hidden" id="inputId" value="<?php echo ($data["id"]); ?>" name="id">

                <!--   Store_Id  -->
                <input type="hidden" id="inputStoreId" value="<?php echo ($data["store_id"]); ?>" name="store_id">

                <!--  Name  -->
                <div class="control-group">
                    <label class="control-label" for="inputName">Name:</label>
                    <div class="controls">
                        <input type="text" id="inputName" value="<?php echo ($data["name"]); ?>" name="name">
                    </div>
                </div>

                <!--  Price  -->
                <div class="control-group">
                    <label class="control-label" for="inputPrice">Price:</label>
                    <div class="controls">
                        <input type="text" id="inputPrice" value="<?php echo ($data["price"]); ?>" name="price">
                    </div>
                </div>

                <!--  LastDate  -->
                <div class="control-group">
                    <label class="control-label" for="inputLastDate">Last Date:</label>
                    <div class="controls">
                        <input type="text" id="inputLastDate"  value="<?php echo ($data["last_ts"]); ?>" name="last_ts">
                    </div>
                </div>

                <!--  Status  -->
                <div class="control-group">
                    <label class="control-label" for="inputLastDate">Status:</label>
                    <div class="controls">
                        <select id="selectStatus" value="<?php echo ($data["status"]); ?>" name="status">
                            <option value="1">active</option>
                            <option value="0">disabled</option>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button class="btn btn-danger">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<link href="__URL__/../../../public/CSS/good.css" rel="stylesheet" media="screen">
<script src="__URL__/../../../public/JS/Admin/good.js"></script>
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