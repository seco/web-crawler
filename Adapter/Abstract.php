<?php
class Crawler_Adapter_Abstract
{
  /**
  * returns site contents.
  * @param string $url
  * @return string
  */
  protected function _fetchData($url)
  {
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_HEADER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER, array('Content-Type: text/html; charset=utf-8')
    );

    $curl = curl_init();
    curl_setopt_array($curl, $options);
    $data = curl_exec($curl);
    curl_close($curl);
    
    return $data;
  }
}
?>
