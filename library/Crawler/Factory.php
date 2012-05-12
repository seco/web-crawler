<?php
class Crawler_Factory
{
  /**
  * returns selected crawler adapter
  * @return Crawler_Adapter_Interface
  */
  public function create($crawler)
  {
    try {
      $crawler = implode('_', array('Crawler', 'Adapter', $crawler));
      return new $crawler;
    } catch(Exception $e) {
      throw new Exception('This adapter [' . $crawler . '] does not supported.');
    }
  }
}
?>
