<?php
interface Crawler_Adapter_Interface
{
  /**
  * returns product data [name, price, image_url]
  * @param string $url
  * @return array
  */
  public function run($url);
}
?>
