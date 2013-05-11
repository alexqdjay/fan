<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 13-3-13
 * Time: 下午9:04
 * To change this template use File | Settings | File Templates.
 */
class MsgModel extends MongoModel {

    protected $connection = array(
        'db_type'   =>  'Mongo',
        'db_host'   =>  'localhost',
        'db_port'   =>  27017,
        'db_name'   =>  'fan',
        'db_prefix' =>  '',
        'DB_SQL_LOG' => true
    );

}
