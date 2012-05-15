<?php
class Crawler_Adapter_Darty extends Crawler_Adapter_Abstract implements Crawler_Adapter_Interface
{
  /**
  * returns parsed data
  * @param string $contents
  * @return array
  */
  private function parseData($contents)
  {
    $var = explode('<table width="100%" cellpadding="0" cellspacing="0" class="cadre4Table">', $contents);
    $var = explode('>', $var[1]);
    $var = explode('<', $var[2]);
    $name = trim($var[0]);

    $var = explode('Banka Transferi : ', $contents);
    $var = explode('<br', $var[1]);
    $price =  (float) str_replace(array(',', ' ', 'TL'), array('.', '', ''), trim($var[0]));

    $currency = 'TL';

    $var = explode('imageproduit', $contents);
    $var = explode('src="', $var[1]);
    $var = explode('"', $var[1]);
    $image = str_replace('/products_images/e', '/products_images/z', trim($var[0]));

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
    $data['image_url'] = $this->_getBaseUrl($url) . $data['image_url'];
    return $data;
  }
}
?>
