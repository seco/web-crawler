<?php
class Crawler_Adapter_GarantiAltin extends Crawler_Adapter_Abstract implements Crawler_Adapter_Interface
{
  /**
  * returns parsed data
  * @param string $contents
  * @return array
  */
  private function parseData($contents)
  {
    $xml = simplexml_load_string($contents);
    $node = $xml->STOCK[4];
    $name = (string)  $node->DESC;
    $price  = (float) str_replace(',', '.', $node->LAST);
    $currency = 'TL';
    $image = false;

    return array(
        'name' => $name,
        'price' => $price,
        'currency' => $currency,
        'image_url' => $image
    );
  }

  /**
  * runs crawler and returns parsed data.
  * @param string $url
  * @return array
  */
  public function run($url)
  {
    $contents = $this->_fetchData($url);
    $data = $this->parseData($contents);
    return $data;
  }
}
?>
