web-crawler, internette bazı popüler internet sitelerinden fiyat, isim, ürün görseli gibi verileri çekmeniz için geliştirilmiş bir araçtır. Aşağıdaki internet sitelerini desteklemektedir :
Site                  Sayfa             Adaptör           Veri
--------------------------------------------------------------
Vatan Bilgisayar      Ürün Detay        Vatan               Ürün fiyat, para birimi, tam ürün adı, ürün görseli
Gold Bilgisayar       Ürün Detay        Gold                Ürün fiyat, para birimi, tam ürün adı, ürün görseli
Teknosa               Ürün Detay        Teknosa             Ürün fiyat, para birimi, tam ürün adı, ürün görseli
İstanbul Bilişim      Ürün Detayı       IstanbulBilisim     Ürün fiyat, para birimi, tam ürün adı, ürün görseli
Zizigo                Ürün Detay        Zizigo              Ürün fiyatı, para birimi, tam ürün adı, ürün görseli
Garanti Bankası       xml               GarantiAltin        Altın Fiyat, para birimi, tam ürün adı
Altın Kaynak          xml               AltinKaynakAltin    Altın Fiyat, para birimi, tam ürün adı
Hurriyet Piyasa       Ana Sayfa         HurriyetPiyasaAltin Altın Fiyat, para birimi, tam ürün adı
İş Bankası            Ana Sayfa         IsbankAltin         Altın Fiyat, para birimi, tam ürün adı
AkBank                yatirimci.akba... AkbankAltin         Altın Fiyat, para birimi, tam ürün adı 

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
  <AkbankAltin>
    <name>Akbank Altın Fiyatı</name>
    <adapter>AkbankAltin</adapter>
    <url>http://yatirimci.akbank.com.tr/doviz.aspx</url>
  </AkbankAltin>
  <HurriyetPiyasaAltin>
    <name>Hürriyet Piyasa Altın Fiyatı</name>
    <adapter>HurriyetPiyasaAltin</adapter>
    <url><![CDATA[http://piyasanet.hurriyet.com.tr/doviz-altin/altin/24-ayar-altin-fiyati?period=gunluk&type=XGLD]]></url>
  </HurriyetPiyasaAltin>
  <AltinKaynakAltin>
    <name>Altın Kaynak Altın Fiyatı</name>
    <adapter>AltinKaynakAltin</adapter>
    <url>http://www.altinkaynak.com/main_xml/altin.xml</url>
  </AltinKaynakAltin>
  <VatanIphone>
    <name>Vatan Bilgisayar IPhone Fiyatı</name>
    <adapter>Vatan</adapter>
    <url>http://www.vatanbilgisayar.com/apple-app_iphone4_8_blk-iphone-4-8-gb-cep-telefonu-(siyah)/productdetails.aspx?I_ID=57826</url>
  </VatanIphone>
  <GoldIphone>
    <name>Gold Bilgisayar IPhone Fiyatı</name>
    <adapter>Gold</adapter>
    <url>http://www.gold.com.tr/U121978/Iphone-4s-A1387-16gb-Siyah-Cep-Telefonu</url>
  </GoldIphone>
  <IstanbulBilisimIPhone>
    <name>Istanbul Bilişim IPhone Fiyatı</name>
    <adapter>IstanbulBilisim</adapter>
    <url>http://www.istanbulbilisim.com.tr/iphone-4s-16gb-siyah-apple-iphone-en-ucuz-fiyatlari-kampanyalari,30587.html#TabPanelStart</url>
  </IstanbulBilisimIPhone>
  <TeknosaTv>
    <name>Teknosa Samsung Televizyon Fiyatı</name>
    <adapter>Teknosa</adapter>
    <url>http://www.teknosa.com/kategori/ses_ve_goruntu/lcd_tv/853/110012195/samsung_40d5500_fhd_led_lcd_tv</url>
  </TeknosaTv>
 </config>

Veri kaynaklarınızı yukarıdaki şekilde tanımladıktan sonra veri çekme işlemine başlamak için yapmanız gereken tek şey aşağıdaki komutu çalıştırmak.
php index.php

Sitelerden dönen tüm veriler data/data.log dosyasında sekmeyle ayrılmış şekilde yazılacaktır.
2012-05-13 02:38:37 İş Bankası Altın Fiyatı Altın 90.92 TL  
2012-05-13 02:38:37 Garanti Bankası Altın Fiyatı  Altın 91.078  TL  
2012-05-13 02:38:37 Vatan Bilgisayar IPhone Fiyatı  APPLE iPHONE 4 8 GB CEP TELEFONU (S�YAH)  1888  TL  http//www.vatanbilgisayar.com/products_images/200x200/APPLE/v2-57826.jpg

