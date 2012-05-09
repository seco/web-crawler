<?php
class Crawler_Adapter_Vatan extends Crawler_Adapter_Abstract implements Crawler_Adapter_Interface
{
  /**
  * returns parsed data
  * @param string $contents
  * @return array
  */
  private function parseData($contents)
  {
    $var = explode('ctl00_ContentPlaceHolder1_lblMarka', $contents);
    $var = explode('>', $var[1]);
    $var = explode('<', $var[1]);
    $name = trim($var[0]);

    $var = explode('ctl00_ContentPlaceHolder1_lblTitle', $contents);
    $var = explode('>', $var[1]);
    $var = explode('<', $var[1]);
    $name .= ' ' . trim($var[0]);

    $var = explode('ctl00_ContentPlaceHolder1_tcnOdeme_tplVCard_dgOdemeVCard_ctl02_lblPrcTL', $contents);
    $var = explode('>', $var[1]);
    $var = explode('<', $var[1]);
    $var = explode(' ', $var[0]);
    $price = (float) str_replace('.', '', $var[0]);
    $currency = trim($var[1]);

   $var = explode('ctl00_ContentPlaceHolder1_imgBig', $contents);
   $var = explode('src="', $var[0]);
   $var = $var[ count($var) -1 ];
   $var = explode('"', $var);
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
    $domain = parse_url($url);
    $data = $this->parseData($contents);
    $data['image_url'] = $domain['scheme'] . '//' . $domain['host'] . $data['image_url'];
    return $data;

  }
}
?>
