##SarmanSoft Proje Çalışması

Bu projede başlangıç seviyesinde REST API hazırlanmıştır.  Sadece GET ve POST isteği için hazırlanmıştır.
Gereksinimler:
Mysql veri tabanı, XAMPP server (vb.)
Postman 

Veri Tabanı
“sarmansoft” adında database oluşturulması gerekmektedir.
/sql/sarmansoft.sql dosyası kullanılarak oluşturulabilir.

/config/database.php dosyasında bulunan verilerin uygun şekilde girilmelidir.
 $this->hostname ="localhost";
 $this->dbname   ="sarmansoft";
 $this->username   ="root";
 $this->password  ="";
 
POST isteği
http://localhost/sarman/api/post.php
adresi kullanılarak post istekleri postman aracılığı ile yapılabilir. Post isteğinde product_id,name,stock ve created_date verilerinin girilmesi gerekmektedir.
  {
    "product_id" :"00000002" ,
    "name" : "SRMN Product2",
    "stock" : 5,
    "created_date" : "2019-09-01 18:19:20"
  }

Post isteğine cevap olarak json formatında veri dönmektedir.
GET isteği
http://localhost/sarman/api/get.php
Adresi kullanılarak get isteği yapılabilir. Girilen veriler json formatında istenildiği gibi listelenmektedir.
Halil DURSUN ( dursunhalil@gmail.com)

