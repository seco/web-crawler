Web Crawler, popüler bazı elektronik ticaret siteleri ve bankaların spesifik sayfalarındaki ürün fiyatı, adı ve görseli gibi verileri toplamak için kulllanılan veri toplama aracıdır. Araç, Vatan Bilgisayar ürün detayı sayfası, Gold Bilgisayar ürün detayı sayfası, Zizigo ürün detayı sayfası, Garanti Bankası ve İş bankası ana sayfadaki altın fiyatlarını tanımaktadır.

Ürün fiyatı toplamak için jobs.csv dosyasına aşağıdaki formatta girdi yapmanız gerekmektedir.
Format:
[Adapter:Vatan|Teknosa|Zizigo|Gold|GarantiAltin|IsbankAltin] [url]

Örnek:
Vatan http://www.vatanbilgisayar.com/samsung-ue40d5000-led-tv-full-hd-slim-101cm,-1920x1080,-cmr-100-hz,-4xhdmi,-dlna,-2xusb,-ue40d5000/productdetails.aspx?I_ID=53659
Teknosa http://www.teknosa.com/kategori/telekom/cep_telefonu/218/145011263/nokia_c601_black_akilli_telefon
GarantiAltin http://www.teknosa.com/kategori/telekom/cep_telefonu/218/145011263/nokia_c601_black_akilli_telefon
Zizigo http://www.zizigo.com/markalar/fredperry/fred-perry-121fpeayb9114-21

Jobs dosyasına eklediğiniz işlerle ilgili fiyat toplama işlemini başlatmak için run.sh dosyasını veya "php index.php" komutunu çalıştırınız.
Elde edilen sonuçları data.csv dosyasından okuyabilirsiniz.

Format:
[Zaman];[Adapter];[UrunAdi];[Fiyat];[ParaBirimi];[UrunGorseli]

Ornek:
2012-05-10 16:00:01;GarantiAltin;Altın;91.359;TL;
