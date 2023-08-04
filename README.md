## PreOrderApi

PreOrderApi, kullanıcıların ürünleri sepete ekleyebildiği ve ön sipariş talebinde bulunabildiği hem bir API hem de bir Web Laravel projesidir. Bu projede aşağıdaki özellikler bulunmaktadır:


- Kullanıcılar, ürün havuzundan seçtikleri ürünleri sepete ekleyebilirler.
- Sepete eklenen ürünlerin adedi seçilebilir ve güncellenebilir.
- Kullanıcılar, isim, soyisim, e-posta ve telefon gibi bilgileri girerek ön sipariş talebinde bulunabilirler.
- Telefon numarasının doğruluğu kontrol edilir ve hatalı numaralar için hata mesajı gösterilir.
- Kullanıcılar, sepetlerindeki ürünleri silebilir ve adetlerini güncelleyebilirler.
- Üyelik sistemi ve yönetimi için Laravel Breeze kullanılmıştır.
- Sipariş veren kullanıcılar, sadece kendi siparişlerini görüntüleyebilirler.
- Admin rolüne sahip kullanıcılar, tüm ön siparişleri görüntüleyebilir ve siparişleri onaylayabilir.
- Onaylanan siparişlerin durumu "approved" olarak güncellenir.
- Onaylanan sipariş sahiplerine Twilio üzerinden otomatik olarak SMS gönderilir.
- Ön siparişlerin geçerlilik süresi 1 gündür.
- Geçerlilik süresi 1 günü geçmiş olan siparişler otomatik olarak "autoreject" durumuna güncellenir.
- Laravel Schedule Tasks görev tanımlayıcı özelliği kullanılarak otomatik görevler planlanır.
- Sepete ekleme, güncelleme, silme ve listeleme gibi işlemler için uygun API endpoint'leri bulunur.
- Laravelin kuyruk yönetim sistemi kullanılır. Sipariş sonrası kullanıcıya hemen yanıt döner ve Sms gönderim işlemi için       oluşturulan iş, kuyruğa eklenir ve daha sonra işlenir. (Kuyruk sürücüsü => Database)
- Telefon numarasından siparişin hangi ülkeden verildiği belirlenip o ülkeye ait uygun olan Sms servisi devreye girer.
(Sms servisleri için Design Pattern - Factory Pattern kullanıldı)
- Hataların merkezi bir yerden yönetimini sağlanmıştır. (ErrorHandler sınıfı)
- Api üzerinden gelen isteklerde JWT(Json Web Token) doğrulaması eklendi.
- Uygulama kullanılan veritabanı anadizinde preoderapi.sql adında bulunur.
- Proje PHPUnit kullanılarak test edilmiştir. (tests/Unit/cartAndOrderTest.php)
  
`    TWILIO_SID="AC1572af8c78c7fbca979f0a36ba1132c9"
    TWILIO_AUTH_TOKEN="7af156e0ee7bc614bf1fa129da5a8628"
    TWILIO_NUMBER="+17607067412"`
