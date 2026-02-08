# 💕 Sevgili Sayacı Scripti

Sevgilinizle kaç gündür birlikte olduğunuzu gösteren romantik bir PHP scripti. Ziyaretçiler mutluluk dileklerini paylaşabilir ve birlikte geçen günlerinizi takip edebilirsiniz.

**Demo:** [Canlı Örnek](https://ozkanozarpaci.com.tr/aycan/)

![Sonuç](https://i.ibb.co/v3VgdHL/sonuc.png)

---

# 🇹🇷 Türkçe Dokümantasyon

## 📋 İçindekiler

- [Özellikler](#özellikler)
- [Sistem Gereksinimleri](#sistem-gereksinimleri)
- [Kurulum](#kurulum)
- [Yapılandırma](#yapılandırma)
- [Özelleştirme](#özelleştirme)
- [Sorun Giderme](#sorun-giderme)

## ✨ Özellikler

- 📅 Otomatik gün sayacı (yıl, ay, gün)
- 💝 Ziyaretçiler mutluluk dileklerini paylaşabilir
- 🛡️ IP bazlı spam koruması
- 📱 Responsive tasarım (mobil uyumlu)
- 🎨 Bootstrap 4 ile modern arayüz
- ⚡ AJAX ile hızlı etkileşim

## 💻 Sistem Gereksinimleri

- **PHP:** 7.0 veya üzeri (PDO desteği gerekli)
- **MySQL:** 5.7 veya üzeri (veya MariaDB 10.2+)
- **Web Sunucusu:** Apache, Nginx veya benzeri
- **PHP Eklentileri:**
  - PDO
  - PDO_MySQL
  - JSON (genellikle varsayılan olarak gelir)

## 🚀 Kurulum

### Adım 1: Dosyaları İndirin

Proje dosyalarını web sunucunuzun kök dizinine (örneğin `htdocs`, `www`, `public_html`) yükleyin.

```
Sevgi-Sayar-Sevgili-Script/
├── ajax.php
├── config.php
├── index.php
├── css/
├── img/
├── favicon/
└── mutluluk_dileyenler.sql
```

### Adım 2: Veritabanı Oluşturun

1. phpMyAdmin veya MySQL komut satırını açın
2. Yeni bir veritabanı oluşturun (örneğin: `sevgili_sayaci`)
3. Veritabanı karakter setini `utf8mb4` olarak ayarlayın

**phpMyAdmin ile:**
- "Yeni" sekmesine tıklayın
- Veritabanı adını girin (örn: `sevgili_sayaci`)
- Karakter setini `utf8mb4_unicode_ci` seçin
- "Oluştur" butonuna tıklayın

**MySQL Komut Satırı ile:**
```sql
CREATE DATABASE sevgili_sayaci CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Adım 3: Veritabanı Tablosunu Oluşturun

1. Oluşturduğunuz veritabanını seçin
2. `mutluluk_dileyenler.sql` dosyasını içe aktarın

**phpMyAdmin ile:**
- Veritabanını seçin
- "İçe Aktar" sekmesine tıklayın
- "Dosya Seç" butonuna tıklayıp `mutluluk_dileyenler.sql` dosyasını seçin
- "Git" butonuna tıklayın

**MySQL Komut Satırı ile:**
```bash
mysql -u kullanici_adi -p sevgili_sayaci < mutluluk_dileyenler.sql
```

### Adım 4: Veritabanı Bağlantısını Yapılandırın

`config.php` dosyasını bir metin editörü ile açın ve veritabanı bilgilerinizi girin:

```php
<?php

try{
    $db = new PDO("mysql:host=localhost;dbname=sevgili_sayaci","kullanici_adi","sifre");

}catch (PDOException $e){
    print $e->getMessage();
}
?>
```

**Önemli:** Aşağıdaki değerleri kendi bilgilerinizle değiştirin:
- `localhost` → Veritabanı sunucu adresi (genellikle `localhost`)
- `sevgili_sayaci` → Oluşturduğunuz veritabanı adı
- `kullanici_adi` → MySQL kullanıcı adınız
- `sifre` → MySQL şifreniz

### Adım 5: Sevgililik Tarihini Ayarlayın

`index.php` dosyasını açın ve 6. satırdaki tarihi kendi sevgililik başlangıç tarihinizle değiştirin:

```php
$tarih1 = new DateTime("2018-08-28"); // Buraya kendi tarihinizi yazın (Y-m-d formatında)
```

**Tarih Formatı:** `YYYY-MM-DD` (örnek: `2020-03-15`)

### Adım 6: Görseli Özelleştirin (Opsiyonel)

1. `img` klasörüne kendi görselinizi yükleyin
2. `index.php` dosyasını açın
3. 46. satırdaki görsel yolunu güncelleyin:

```php
<img src="img/love.svg" alt="" class="img-fluid aycan-img" >
```

**Not:** Eğer farklı bir dosya uzantısı kullanıyorsanız (örn: `.png`, `.jpg`), dosya yolunu ve uzantıyı güncelleyin.

### Adım 7: Test Edin

1. Web tarayıcınızda projenizin URL'sini açın (örn: `http://localhost/Sevgi-Sayar-Sevgili-Script/`)
2. Gün sayısının doğru göründüğünü kontrol edin
3. "Mutluluklar dile" butonuna tıklayarak test edin

## ⚙️ Yapılandırma

### Veritabanı Tablo Yapısı

`mutluluk_dileyenler` tablosu şu sütunlara sahiptir:

- `mutluluk_id` (INT, AUTO_INCREMENT, PRIMARY KEY) - Benzersiz kimlik
- `mutluluk_ip` (VARCHAR(250)) - Ziyaretçi IP adresi
- `mutluluk_tarih` (DATE) - Mutluluk dileme tarihi

### IP Bazlı Spam Koruması

Script, aynı IP adresinden birden fazla mutluluk dileme girişimini engeller. Bu özellik `ajax.php` dosyasında kontrol edilir.

## 🎨 Özelleştirme

### Renkleri Değiştirme

`css/style.css` dosyasını düzenleyerek renkleri değiştirebilirsiniz:

```css
body,html{
    background: #32254f; /* Arka plan rengi */
}

.btn-aycan{
    background-color: #5d4d7b; /* Buton rengi */
}
```

### Yazı Tiplerini Değiştirme

`css/style.css` dosyasında Google Fonts'tan yüklenen yazı tiplerini değiştirebilirsiniz:

```css
@import url('https://fonts.googleapis.com/css?family=Amatic+SC:400,700');
@import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700');
```

### Mesajları Değiştirme

`index.php` ve `ajax.php` dosyalarındaki Türkçe mesajları kendi isteklerinize göre özelleştirebilirsiniz.

## 🔧 Sorun Giderme

### Veritabanı Bağlantı Hatası

**Hata:** `SQLSTATE[HY000] [1045] Access denied for user`

**Çözüm:**
- `config.php` dosyasındaki kullanıcı adı ve şifrenin doğru olduğundan emin olun
- MySQL kullanıcısının veritabanına erişim yetkisi olduğundan emin olun

### Tablo Bulunamadı Hatası

**Hata:** `SQLSTATE[42S02]: Base table or view not found`

**Çözüm:**
- `mutluluk_dileyenler.sql` dosyasının doğru şekilde içe aktarıldığından emin olun
- Veritabanı adının `config.php`'de doğru yazıldığından emin olun
- Tablo adının `mutluluk_dileyenler` olduğundan emin olun

### Tarih Yanlış Görünüyor

**Çözüm:**
- `index.php` dosyasındaki tarih formatının `YYYY-MM-DD` olduğundan emin olun
- PHP'nin tarih fonksiyonlarının doğru çalıştığından emin olun
- Sunucu saat diliminin doğru ayarlandığından emin olun

### Görsel Görünmüyor

**Çözüm:**
- Görsel dosyasının `img` klasöründe olduğundan emin olun
- `index.php` dosyasındaki görsel yolunun doğru olduğundan emin olun
- Dosya izinlerinin okuma için uygun olduğundan emin olun

### AJAX Çalışmıyor

**Çözüm:**
- Tarayıcı konsolunda JavaScript hatalarını kontrol edin
- jQuery'nin yüklendiğinden emin olun
- `ajax.php` dosyasının erişilebilir olduğundan emin olun

---

# 🇬🇧 English Documentation

## 📋 Table of Contents

- [Features](#features)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Customization](#customization)
- [Troubleshooting](#troubleshooting)

## ✨ Features

- 📅 Automatic day counter (years, months, days)
- 💝 Visitors can share their well-wishes
- 🛡️ IP-based spam protection
- 📱 Responsive design (mobile-friendly)
- 🎨 Modern interface with Bootstrap 4
- ⚡ Fast interaction with AJAX

## 💻 System Requirements

- **PHP:** 7.0 or higher (PDO support required)
- **MySQL:** 5.7 or higher (or MariaDB 10.2+)
- **Web Server:** Apache, Nginx, or similar
- **PHP Extensions:**
  - PDO
  - PDO_MySQL
  - JSON (usually included by default)

## 🚀 Installation

### Step 1: Download Files

Upload the project files to your web server's root directory (e.g., `htdocs`, `www`, `public_html`).

```
Sevgi-Sayar-Sevgili-Script/
├── ajax.php
├── config.php
├── index.php
├── css/
├── img/
├── favicon/
└── mutluluk_dileyenler.sql
```

### Step 2: Create Database

1. Open phpMyAdmin or MySQL command line
2. Create a new database (e.g., `relationship_counter`)
3. Set the database character set to `utf8mb4`

**Using phpMyAdmin:**
- Click the "New" tab
- Enter the database name (e.g., `relationship_counter`)
- Select character set `utf8mb4_unicode_ci`
- Click "Create"

**Using MySQL Command Line:**
```sql
CREATE DATABASE relationship_counter CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Step 3: Create Database Table

1. Select the database you created
2. Import the `mutluluk_dileyenler.sql` file

**Using phpMyAdmin:**
- Select your database
- Click the "Import" tab
- Click "Choose File" and select `mutluluk_dileyenler.sql`
- Click "Go"

**Using MySQL Command Line:**
```bash
mysql -u username -p relationship_counter < mutluluk_dileyenler.sql
```

### Step 4: Configure Database Connection

Open `config.php` file with a text editor and enter your database information:

```php
<?php

try{
    $db = new PDO("mysql:host=localhost;dbname=relationship_counter","username","password");

}catch (PDOException $e){
    print $e->getMessage();
}
?>
```

**Important:** Replace the following values with your own information:
- `localhost` → Database server address (usually `localhost`)
- `relationship_counter` → Your database name
- `username` → Your MySQL username
- `password` → Your MySQL password

### Step 5: Set Relationship Start Date

Open `index.php` file and change the date on line 6 to your relationship start date:

```php
$tarih1 = new DateTime("2018-08-28"); // Enter your own date here (format: Y-m-d)
```

**Date Format:** `YYYY-MM-DD` (example: `2020-03-15`)

### Step 6: Customize Image (Optional)

1. Upload your own image to the `img` folder
2. Open `index.php` file
3. Update the image path on line 46:

```php
<img src="img/love.svg" alt="" class="img-fluid aycan-img" >
```

**Note:** If you're using a different file extension (e.g., `.png`, `.jpg`), update the file path and extension.

### Step 7: Test

1. Open your project URL in a web browser (e.g., `http://localhost/Sevgi-Sayar-Sevgili-Script/`)
2. Verify that the day count is displayed correctly
3. Test by clicking the "Mutluluklar dile" (Send well-wishes) button

## ⚙️ Configuration

### Database Table Structure

The `mutluluk_dileyenler` table has the following columns:

- `mutluluk_id` (INT, AUTO_INCREMENT, PRIMARY KEY) - Unique identifier
- `mutluluk_ip` (VARCHAR(250)) - Visitor IP address
- `mutluluk_tarih` (DATE) - Well-wish date

### IP-Based Spam Protection

The script prevents multiple well-wish attempts from the same IP address. This feature is controlled in the `ajax.php` file.

## 🎨 Customization

### Changing Colors

Edit the `css/style.css` file to change colors:

```css
body,html{
    background: #32254f; /* Background color */
}

.btn-aycan{
    background-color: #5d4d7b; /* Button color */
}
```

### Changing Fonts

Change the fonts loaded from Google Fonts in the `css/style.css` file:

```css
@import url('https://fonts.googleapis.com/css?family=Amatic+SC:400,700');
@import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700');
```

### Changing Messages

Customize the Turkish messages in `index.php` and `ajax.php` files according to your preferences.

## 🔧 Troubleshooting

### Database Connection Error

**Error:** `SQLSTATE[HY000] [1045] Access denied for user`

**Solution:**
- Make sure the username and password in `config.php` are correct
- Ensure the MySQL user has access permissions to the database

### Table Not Found Error

**Error:** `SQLSTATE[42S02]: Base table or view not found`

**Solution:**
- Make sure `mutluluk_dileyenler.sql` file was imported correctly
- Verify the database name is correct in `config.php`
- Ensure the table name is `mutluluk_dileyenler`

### Date Displaying Incorrectly

**Solution:**
- Make sure the date format in `index.php` is `YYYY-MM-DD`
- Verify PHP date functions are working correctly
- Check that the server timezone is set correctly

### Image Not Displaying

**Solution:**
- Make sure the image file is in the `img` folder
- Verify the image path in `index.php` is correct
- Check that file permissions allow reading

### AJAX Not Working

**Solution:**
- Check for JavaScript errors in the browser console
- Make sure jQuery is loaded
- Verify that `ajax.php` file is accessible

---

## 📝 Notes

- The database is used to count well-wishers and prevent spam by tracking user IP addresses
- You can customize this feature according to your needs
- If you encounter any installation problems, feel free to reach out for help

## 📄 License

This project is open source and available for personal use.

---

**Made with ❤️ for couples in love**
