Crawler kütüphanesi, internet sitelerinden fiyat, isim, ürün görseli verilerini toplamak için çeşitli crawler adaptörlerini içerir. 

Ornek Kullanım:
-----------------
<?php
$factory = new Crawler_Factory();
$vatan = factory->create('Vatan');
$data = $vatan->run('http://www.vatanbilgisayar.com/Cep%20Telefonu/apple-app_iphone4s_16_blk-iphone-4s-16-gb-cep-telefonu-(siyah)/productdetails.aspx?I_ID=58091');

print_r($data);
?>

Ekran çıktısı:
---------------
array(
    [name] => APPLE IPHONE 4S 16 GB CEP TELEFONU (SİYAH),
    [price] => 2333,
    [currency] = TL,
    [image_url] => http://www.vatanbilgisayar.com/products_images/200x200/APPLE/v2-58091.jpg
    )
