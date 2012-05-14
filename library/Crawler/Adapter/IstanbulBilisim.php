<?php
class Crawler_Adapter_IstanbulBilisim extends Crawler_Adapter_Abstract implements Crawler_Adapter_Interface
{
  /**
  * returns parsed data
  * @param string $contents
  * @return array
  */
  private function parseData($contents)
  {
    $var = explode('fontType-1 buyuk siyah kalin nd_urun_baslik', $contents);
    $var = explode('>', $var[1]);
    $var = explode('<', $var[2]);
    $name = trim($var[0]);

    $var = explode('Nakit / Havale / EFT Fiyat', $contents);
    $var = explode('>', $var[1]);
    $var = explode('<', $var[2]);
    $var = explode(' ', trim($var[0]));
    $price = trim($var[0]);
    $price = str_replace('.', '', $price);
    $price = str_replace(',', '.', $price);
    $price = (float) $price;
    $currency = trim($var[1]);

    $var = explode('id="LargeImage"', $contents);
    $var = explode('src="', $var[1]);
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
    $data['image_url'] = $this->_getBaseUrl($url) .'/'. $data['image_url'];
    return $data;
  }
}
?>
