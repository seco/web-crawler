<?php
define('APPLICATION_PATH', dirname(__FILE__));
include('library/loader.php');

Loader::getInstance();

$jobs = new Zend_Config_Xml(APPLICATION_PATH . 
                            DIRECTORY_SEPARATOR . 'configs' . 
                            DIRECTORY_SEPARATOR . 'jobs.xml');
Crawler::run($jobs);

?>
