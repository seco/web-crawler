<?php
class Crawler
{
  /**
  * returns new object instance.
  * @return Crawler
  */
  public function getInstance()
  {
    return new self;
  }

  /**
  * execute crawle jobs
  * @param array $jobs
  */
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

  /**
  * returns crawler adapter
  * @param string $crawler
  * @return Crawler_Interface
  */
  private function getAdapter($crawler)
  {
    $factory = new Crawler_Factory();
    return $factory->create($crawler);
  }

  /**
  * writes crawled data to log.
  * @param array $data
  */
  private function logData($data)
  {
    $logText        = implode("\t", $data) . PHP_EOL;
    $customLogText  = implode("\t", array($data[0], $data[1], $data['price'], $data['currency']) ) . PHP_EOL;

    echo $customLogText;

    file_put_contents(APPLICATION_PATH . DIRECTORY_SEPARATOR . 
        'data' . DIRECTORY_SEPARATOR . 
        'data.log', $logText, 
        FILE_APPEND);
  }
}
