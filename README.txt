1- Fiyatlarını takip etmek istediğiniz ürünün adapter ve url bilgilerini jobs.csv dosyasına ( ) ile ayrılmış şekilde yazınız.

Soz Dizimi:
Crawler [Vatan|Teknosa|Gold|Zizigo|GarantiAltin] [Urun detay sayfası url si]
Ornek:
Vatan http://www.vatanbilgisayar.com/Cep%20Telefonu/samsung-sam_gt-s5360maatur-s5360-galaxy-y-cep-telefonu-(gri)/productdetails.aspx?I_ID=57947

2- jobs.csv ye eklediğiniz crawling işlemlerini başlatmak için
php index.php 
komutunu çalıştırınız. Crawle edilen datalara data.csv dosyasında aşağıdaki formatta ulaşabilirsiniz.
format:
Zaman;ürün adı;fiyat;para birimi;ürün görseli

Örnek:
2012-05-09 14:03:10;SAMSUNG S5360 Galaxy Y CEP TELEFONU (GRÝ);472;TL;http//www.vatanbilgisayar.com/products_images/200x200/SAMSUNG/v2-57947.jpg


