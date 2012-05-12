web-crawler, internette bazı popüler internet sitelerinden fiyat, isim, ürün görseli gibi verileri çekmeniz için geliştirilmiş bir araçtır. Aşağıdaki internet sitelerini desteklemektedir :
Site                  Sayfa         Adaptör           Veri
--------------------------------------------------------------
Vatan Bilgisayar      Ürün Detay    Vatan             Ürün fiyat, para birimi, tam ürün adı, ürün görseli
Gold Bilgisayar       Ürün Detay    Gold              Ürün fiyat, para birimi, tam ürün adı, ürün görseli
Teknosa               Ürün Detay    Teknosa           Ürün fiyat, para birimi, tam ürün adı, ürün görseli
Zizigo                Ürün Detay    Zizigo            Ürün fiyatı, para birimi, tam ürün adı, ürün görseli
Garanti Bankası       Ana Sayfa     GarantiAltin      Altın Fiyat, para birimi, tam ürün adı
İş Bankası            Ana Sayfa     IsbankAltin       Altın Fiyat, para birimi, tam ürün adı

Fiyat verisi almak istediğiniz ürün ile ilgili tanımlamaları configs/jobs.xml dosyasına aşağıdaki şekilde gerçekleştirmelisiniz.

<?xml version="1.0" encoding="UTF-8"?>
  <config>
    <IsbankAltin>
      <name>İş Bankası Altın Fiyatı</name>
      <adapter>IsbankAltin</adapter>
      <url>http://www.isbank.com.tr/</url>
    </IsbankAltin>
    <GarantiAltin>
      <name>Garanti Bankası Altın Fiyatı</name>
      <adapter>GarantiAltin</adapter>
      <url>http://realtime.paragaranti.com/asp/xml/icpiyasaX.xml</url>
    </GarantiAltin>
  </config>

Veri kaynaklarınızı yukarıdaki şekilde tanımladıktan sonra veri çekme işlemine başlamak için yapmanız gereken tek şey aşağıdaki komutu çalıştırmak.
php index.php

Sitelerden dönen tüm veriler data/data.dat dosyasında sekmeyle ayrılmış şekilde yazılacaktır.
2012-05-13 02:38:37 İş Bankası Altın Fiyatı Altın 90.92 TL  
2012-05-13 02:38:37 Garanti Bankası Altın Fiyatı  Altın 91.078  TL  
2012-05-13 02:38:37 Vatan Bilgisayar IPhone Fiyatı  APPLE iPHONE 4 8 GB CEP TELEFONU (S�YAH)  1888  TL  http//www.vatanbilgisayar.com/products_images/200x200/APPLE/v2-57826.jpg

