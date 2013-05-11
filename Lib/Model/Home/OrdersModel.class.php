<?php

class OrdersModel extends RelationModel{

	protected $_link = array(
	   'Dining'=> array(
			'mapping_type'	=>BELONGS_TO,
			'class_name'    =>'dining',
			'mapping_fields' =>'id,name,price',
			'as_fields'=>'name:diningName,price'
	   )
	);
}
?>