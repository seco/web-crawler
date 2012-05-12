<?php
class Crawler
{
  public function getInstance()
  {
    return new self;
  }

  public static function run($jobs)
  {
    $crawler = self::getInstance();
    foreach($jobs as $job) {
      try {
        $data = $crawler->getAdapter($job->adapter)->run($job->url);
        $data = array_merge(array(date('Y-m-d H:i:s'), $job->name), $data );
        $crawler->logData($data);
      } catch(Exception $e) {

      }
    }
  }

  private function getAdapter($crawler)
  {
    $factory = new Crawler_Factory();
    return $factory->create($crawler);
  }

  private function logData($data)
  {
    $logText = implode("\t", $data) . PHP_EOL;
    file_put_contents(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data.log', $logText, FILE_APPEND);
  }
}
