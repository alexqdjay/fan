<?php
return array(
	'DB_TYPE'	=>'mysql',
	'DB_HOST'	=>'localhost',
	'DB_NAME'   => 'fan', // 数据库名
	'DB_USER'   => 'fan', // 用户名
	'DB_PWD'    => '19871209xy', // 密码
//	'DB_NAME'   => 'test', // 数据库名
//	'DB_USER'   => 'eccom', // 用户名
//	'DB_PWD'    => 'eccom', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX'	=> '',
	'DB_CHARSET'=> 'utf8',
	
	//'MONGO_CONFIG'=>'mongo://:@192.168.96.93:27017/fan',
	
	'URL_MODEL'=>2,
	'SHOW_PAGE_TRACE'	=> false,
	'TRACE_PAGE_TABS'=>array(
	    'base'=>'基本',
	    'file'=>'文件',
	    'think'=>'流程',
	    'error'=>'错误',
	    'sql'=>'SQL',
	    'debug'=>'调试',
	    'user'=>'用户'
	),
	'DB_SQL_LOG'=>true,
	'DATA_CACHE_TYPE'	=> 'memcache',
	'host'=>'192.168.1.10',
	'port'=>'11211',
	'DATA_CACHE_TIME'=>60,
	
	'HTML_CACHE_ON'=>false, // 开启静态缓存
	'HTML_FILE_SUFFIX'  =>  '.shtml', // 设置静态缓存后缀为.shtml
	'HTML_CACHE_RULES'=> array(
	    'Form:' => array('Form/{:action}_{id}', 60)
	),
	
	
	 /* 日志设置 */
    'LOG_RECORD'            => true,   // 默认不记录日志
    'LOG_TYPE'              => 3, // 日志记录类型 0 系统 1 邮件 3 文件 4 SAPI 默认为文件方式
    'LOG_DEST'              => '', // 日志记录目标
    'LOG_EXTRA'             => '', // 日志记录额外信息
    'LOG_LEVEL'             => 'EMERG,ALERT,CRIT,ERR',// 允许记录的日志级别
    'LOG_FILE_SIZE'         => 2097152,	// 日志文件大小限制
    'LOG_EXCEPTION_RECORD'  => true,    // 是否记录异常信息日志
	'DB_SQL_LOG'            => true, // SQL执行日志记录
);
?>