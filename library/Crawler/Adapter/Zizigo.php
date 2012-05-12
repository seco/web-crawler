<?php
class Crawler_Adapter_Zizigo extends Crawler_Adapter_Abstract implements Crawler_Adapter_Interface
{
  /**
  * returns parsed data
  * @param string $contents
  * @return array
  */
  private function parseData($contents)
  {
    $var = explode('class="item manufacturer"', $contents);
    $var = explode('>', $var[1]);
    $var = explode('<', $var[1]);
    $name = trim($var[0]);

    $var = explode('class="item manufacturer"', $contents);
    $var = explode('>', $var[2]);
    $var = explode('<', $var[1]);
    $name .= ' ' . trim($var[0]);

    $var = explode('zizigo_app:price', $contents);
    $var = explode('content="', $var[1]);
    $var = explode('"', $var[1]);
    $price = (float) $var[0];

    $currency = 'TL';

    $var = explode('class="product-image product-image-zoom"', $contents);
    $var = explode('href="', $var[1]);
    $var = explode('"', $var[1]);
    $image = trim($var[0]);

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
