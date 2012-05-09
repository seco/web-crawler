<?php
class Crawler_Adapter_Gold extends Crawler_Adapter_Abstract implements Crawler_Adapter_Interface
{
  /**
  * returns parsed data
  * @param string $contents
  * @return array
  */
  private function parseData($contents)
  {
    $var = explode('productCap', $contents);
    $var = explode('>', $var[1]);
    $var = explode('<', $var[2]);
    $name = trim($var[0]);

    $var = explode('havalefiyat', $contents);
    $var = explode('>', $var[1]);
    $var = explode('<', $var[1]);
    $var = explode('&nbsp;', $var[0]);
    $price = (float) $var[0];
    $currency = trim($var[1]);

   $var = explode('bigPic', $contents);
   $var = explode('src="', $var[1]);
   $var = explode('"', $var[1]);
   $image = $var[0];
   

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
    $domain = parse_url($url);
    $data['image_url'] = $domain['scheme'] . '//' . $domain['host'] . $data['image_url'];
    return $data;
  }
}
?>
