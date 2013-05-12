<?php if (!defined('THINK_PATH')) exit();?><section>
	<div class="row-fluid">
	<div class="pagination pagination-right" id="pagination1">
      	<ul>
      		<li><a onclick="onClickPre()" style="cursor:pointer;">&lt;&lt;</a></li>
				<?php $__FOR_START_21060__=1;$__FOR_END_21060__=$count+1;for($i=$__FOR_START_21060__;$i < $__FOR_END_21060__;$i+=1){ ?><li class="pagination-count"><a href="#<?php echo ($i); ?>" id="paginationCount_<?php echo ($i); ?>" onclick="onClickPagination(<?php echo ($i); ?>);"><?php echo ($i); ?></a></li><?php } ?>
			<li class=""><a onclick="onClickNext();" style="cursor:pointer;">&gt;&gt;</a></li>
	  	</ul>
     </div>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>NO.</th>
				<th>Time</th>
				<th>Name</th>
				<th>Price</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="" id="order_<?php echo ($vo["id"]); ?>">
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php  $date = new DateTime(); $date->setTimestamp($vo['ts']); echo $date->format('Y/m/d H:i:s');?></td>
					<td><?php echo ($vo["diningName"]); ?></td>
					<td><?php
 $price = (float)$vo['price']; echo sprintf('%01.1f',$price); ?></td>
					<td class="order-status"><?php
 if($vo['status']==1) { echo '<button class="btn btn-danger" onclick="onCloseItem('.$vo['id'].')">Close</button>'; } else if($vo['status']==2) { echo 'Completed'; } else if($vo['status']==0) { echo 'Closed'; } ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	</div>
</section>

<div class="modal hide fade" id="modal">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  <h3>确认</h3>
	</div>
	<div class="modal-body">
		<h4>确定关闭?</h4>
	</div>
	<div class="modal-footer">
	  <button class="btn" onclick="onClose();">Cancle</button>
	  <button class="btn btn-primary" onclick="onComfire();">OK</button>
	</div>
</div>