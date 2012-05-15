<?php
class Crawler_Adapter_AltinKaynakAltin extends Crawler_Adapter_Abstract implements Crawler_Adapter_Interface
{
  /**
  * returns parsed data
  * @param string $contents
  * @return array
  */
  private function parseData($contents)
  {
    $xml = simplexml_load_string($contents);
    $node = $xml->DOVIZ[1];
    $name = (string)  $node->ADI;
    $price  = (float) str_replace(',', '.', $node->SATIS);
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
