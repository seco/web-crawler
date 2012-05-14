<?php
class Crawler_Adapter_AkbankAltin extends Crawler_Adapter_Abstract implements Crawler_Adapter_Interface
{
  /**
  * returns parsed data
  * @param string $contents
  * @return array
  */
  private function parseData($contents)
  {
    $name = 'Altın';

    $var = explode('<td class="adkDovizSutun">ALTIN</td>', $contents);
    $var = explode('>', $var[1]);
    $var = explode('<', $var[3]);
    $price = (float) trim(str_replace(',', '.', $var[0]));
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
