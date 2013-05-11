<?php

class ChargesModel extends RelationModel{
	protected $_link = array(
	   'User'=> array(
			'mapping_type'	=>BELONGS_TO,
			'class_name'    =>'user',
			'mapping_fields' =>'id,name',
			'as_fields'=>'name:userName'
	   )
	);
}
?>