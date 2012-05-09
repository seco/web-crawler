<?php
header('Content-Type: text/html; charset=utf-8');
function __autoload($class) 
{
  if(strpos( $class, '_Adapter_') !== false) {
     $fileMap = explode('_', $class);
     array_splice($fileMap, 0, 1);
     $fileName = implode('/', $fileMap);
     include( $fileName . '.php' );
  } elseif($class == 'Crawler') {
    include($class . '.php');
  }
}

function getJobs()
{
  $delimeter = ' ';
  $fileData = file_get_contents('jobs.csv');
  $fileData = explode(PHP_EOL, $fileData);
  $jobs = array();
  foreach($fileData as $fileRow) {
    if( trim($fileRow) != '') {
       $data = explode(' ', $fileRow);
       $jobs[] = $data;
    }
  }
  return $jobs;
}

$crawler = new Crawler();
$jobs = getJobs();
foreach($jobs as $job) {
  $crawlerAdapter = $job[0];
  $url = $job[1];
  $data = $crawler->run($crawlerAdapter, $url);
  $data = array_merge(array(date('Y-m-d H:i:s')), $data);
  file_put_contents('data.csv', implode(';', $data) . PHP_EOL, FILE_APPEND);
}
?>
