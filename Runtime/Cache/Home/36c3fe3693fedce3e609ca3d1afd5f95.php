<?php if (!defined('THINK_PATH')) exit();?><h3>Dining</h3>
<hr class="bs-docs-separator"></hr>
<div class="row-fluid">
    <div class="span12">
    	<div class="pagination pagination-right" id="pagination1">
		      	<ul>
		      		<li class=""><a onclick="onClickPre()" style="cursor:pointer;">&lt;&lt;</a></li>
   					<?php $__FOR_START_6202__=1;$__FOR_END_6202__=$count+1;for($i=$__FOR_START_6202__;$i < $__FOR_END_6202__;$i+=1){ ?><li class=""><a href="#<?php echo ($i); ?>" onclick="onClickPagination(<?php echo ($i); ?>);"><?php echo ($i); ?></a></li><?php } ?>
   					<li class=""><a onclick="onClickNext();" style="cursor:pointer;">&gt;&gt;</a></li>
			  	</ul>
	      </div>
      <table class="table table-hover" id="diningTable">
      	<thead>
      		<th>Name</th>
      		<th>Price</th>
      		<th>Action</th>
      	</thead>
      	<tbody>
	      	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="data_<?php echo ($vo["id"]); ?>">
	      			<td><?php echo ($vo["name"]); ?></td>
	      			<td><?php
 $price = (float)$vo['price']; echo sprintf('%01.1f',$price); ?></td>
	      			<td><button class="btn btn-primary" onclick="onClickBuy(<?php echo ($vo["id"]); ?>)">Buy</button></td>
	      		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
      	</tbody>
      </table>
      <div class="pagination pagination-right" id="pagination2">
	      	<ul>
	      		<li class=""><a onclick="onClickPre()" style="cursor:pointer;">&lt;&lt;</a></li>
  					<?php $__FOR_START_11499__=1;$__FOR_END_11499__=$count+1;for($i=$__FOR_START_11499__;$i < $__FOR_END_11499__;$i+=1){ ?><li class=""><a href="#<?php echo ($i); ?>" onclick="onClickPagination(<?php echo ($i); ?>);"><?php echo ($i); ?></a></li><?php } ?>
  					<li class=""><a onclick="onClickNext();" style="cursor:pointer;">&gt;&gt;</a></li>
		  	</ul>
      </div>
    </div>
</div>