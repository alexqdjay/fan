<?php if (!defined('THINK_PATH')) exit();?><section>
	<div class="row-fluid tab-content-row">
		<div class="well balance-well">
			<div class="span4">
				<span>余额:</span><h3 class="balance"><?php echo ($balance); ?></h3>
			</div>
			
			<div class="span2">
				<button class="btn btn-primary charge-btn" onclick="onClickCharge();">Recharge</button>
			</div>
			
			<div class="modal hide fade" id="modal1">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    <h4>Recharge</h4>
			  </div>
			  <div class="modal-body">
			    <input type="text" id="chargeValue">
			  </div>
			  <div class="modal-footer">
			    <button class="btn" onclick="onClose();">Cancle</button>
			    <button class="btn btn-primary" onclick="onComfireCharge();">OK</button>
			  </div>
			</div>
		</div>
	</div>
	
	<div class="row-fluid tab-content-row"><hr></hr></div>
	
	<div class="row-fluid tab-content-row">
		<h4 style="display:inline;">Records</h4>
		<div class="btn-group pull-right" data-toggle="buttons-radio">
		  <button type="button" id="r0" onclick="loadRecord(0);" class="btn">本月</button>
		  <button type="button" id="r1" onclick="loadRecord(1);" class="btn">两个月内</button>
		  <button type="button" id="r2" onclick="loadRecord(2);" class="btn">两个月前</button>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Time</th>
					<th>Record</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><?php  $date = new DateTime(); $date->setTimestamp($vo['ts']); echo $date->format('Y/m/d H:i:s');?></td>
						<td><?php
 $price = (float)$vo['money']; if($price>0) { $c1 += $price; } else { $c2 += $price; } echo sprintf('%01.1f',$price); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				<tr>
					<td></td>
					<td style="font-weight: bold;font-size: 20px;">- <?php echo -$c2;?></td>
				</tr>
				<tr>
					<td></td>
					<td style="font-weight: bold;font-size: 20px;">+ <?php echo ($c1); ?></td>
				</tr>
				<tr>
					<td></td>
					<td style="font-weight: bold;font-size: 20px;">= <?php echo ($c1+$c2); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</section>