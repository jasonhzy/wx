<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
if(!file_exists('./data/install.lock')){
    header('Location:install/index.php');
    exit();
}

define('APP_NAME', '');
define('APP_PATH',    './');
define('APP_DEBUG',true);

define('THINK_PATH', './Dev/_Core/');
define('RUNTIME_PATH', './RunTime/');
defined('CONF_PATH')    or define('CONF_PATH',      './Conf/'); // 项目配置目录
defined('COMMON_PATH')  or define('COMMON_PATH',    './Dev/Common/'); // 项目公共目录
defined('LIB_PATH')	or define('LIB_PATH',	'./Dev/Lib/'); // 项目类库目录
defined('LANG_PATH')    or define('LANG_PATH',		'./Dev/Lang/'); // 项目语言包目录
defined('TMPL_PATH')    or define('TMPL_PATH',	'./Dev/Tpl/'); // 项目模板目录
defined('HTML_PATH')    or define('HTML_PATH',      APP_PATH.'Html/'); // 项目静态目录
defined('LOG_PATH')     or define('LOG_PATH',       RUNTIME_PATH.'logs/'); // 项目日志目录
defined('TEMP_PATH')    or define('TEMP_PATH',      RUNTIME_PATH.'Temp/'); // 项目缓存目录
defined('DATA_PATH')    or define('DATA_PATH',      RUNTIME_PATH.'Data/'); // 项目数据目录
defined('CACHE_PATH')   or define('CACHE_PATH',     RUNTIME_PATH.'Cache/'); // 项目模板缓存目录

require './Dev/_Core/wx.php';