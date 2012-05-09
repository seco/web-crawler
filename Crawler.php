<?php
class Crawler
{
  /**
  * returns selected crawler adapter
  * @return Crawler_Adapter_Interface
  */
  private function getCrawler($crawler)
  {
    try {
      $crawler = implode('_', array('Crawler', 'Adapter', $crawler));
      return new $crawler;
    } catch(Exception $e) {
      throw $e;
    }
  }

  /**
  * crawl website and returns parsed price, image and name data.
  * @param string $crawler
  * @param string $url
  * @return array
  */
  public function run($crawler, $url)
  {
    try {
      return $this->getCrawler($crawler)->run($url);
    } catch(Exception $e) {
      return false;
    }
  }
}
?>
