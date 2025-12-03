# Fix Error Raw Editor Railway

## ❌ Masalah

Format JSON yang dimasukkan ke Raw Editor Railway masih error.

## 🔍 Kemungkinan Penyebab

1. **Reference Variables `${{MySQL.*}}` tidak bisa digunakan di Raw Editor**
   - Raw Editor mungkin tidak support format `${{Service.*}}`
   - Reference variables harus di-set manual atau via UI biasa

2. **Format JSON mungkin perlu disesuaikan**
   - Beberapa platform memerlukan format khusus

## ✅ Solusi

### Opsi 1: Set Variables Tanpa Database Dulu (Disarankan)

**Step 1: Set App Variables via Raw Editor**

Copy JSON ini (tanpa database variables):

```json
{
  "APP_NAME": "Data Dashboard",
  "APP_ENV": "production",
  "APP_KEY": "base64:7wsOci1+cln3cKvy5QCXn8qH+n7z8d+z5O9HqpRqEQw=",
  "APP_DEBUG": "false",
  "APP_URL": "https://datadashboard-production-68f6.up.railway.app",
  "LOG_CHANNEL": "stderr",
  "LOG_LEVEL": "error",
  "SESSION_DRIVER": "file",
  "SESSION_LIFETIME": "120"
}
```

**Step 2: Set Database Variables Manual (Setelah MySQL Dibuat)**

Setelah MySQL service dibuat, set database variables **satu per satu** via UI (bukan Raw Editor):

1. Buka Railway Dashboard → Web Service → Variables
2. Klik "New Variable" (jangan pakai Raw Editor untuk ini)
3. Tambahkan satu per satu:
   - `DB_CONNECTION` = `mysql`
   - `DB_HOST` = `${{MySQL.MYSQLHOST}}`
   - `DB_PORT` = `${{MySQL.MYSQLPORT}}`
   - `DB_DATABASE` = `${{MySQL.MYSQLDATABASE}}`
   - `DB_USERNAME` = `${{MySQL.MYSQLUSER}}`
   - `DB_PASSWORD` = `${{MySQL.MYSQLPASSWORD}}`

**Kenapa?** Reference variables `${{MySQL.*}}` biasanya tidak bisa digunakan di Raw Editor JSON. Harus di-set manual via UI.

---

### Opsi 2: Set Semua Variables Manual (Paling Aman)

Jika Raw Editor terus error, set semua variables **satu per satu** via UI biasa:

1. Railway Dashboard → Web Service → Variables
2. Klik "New Variable" atau "+"
3. Tambahkan satu per satu:

**App Variables:**
- Name: `APP_NAME` → Value: `Data Dashboard`
- Name: `APP_ENV` → Value: `production`
- Name: `APP_KEY` → Value: `base64:7wsOci1+cln3cKvy5QCXn8qH+n7z8d+z5O9HqpRqEQw=`
- Name: `APP_DEBUG` → Value: `false`
- Name: `APP_URL` → Value: `https://datadashboard-production-68f6.up.railway.app`

**Database Variables (setelah MySQL dibuat):**
- Name: `DB_CONNECTION` → Value: `mysql`
- Name: `DB_HOST` → Value: `${{MySQL.MYSQLHOST}}`
- Name: `DB_PORT` → Value: `${{MySQL.MYSQLPORT}}`
- Name: `DB_DATABASE` → Value: `${{MySQL.MYSQLDATABASE}}`
- Name: `DB_USERNAME` → Value: `${{MySQL.MYSQLUSER}}`
- Name: `DB_PASSWORD` → Value: `${{MySQL.MYSQLPASSWORD}}`

**Logging & Session:**
- Name: `LOG_CHANNEL` → Value: `stderr`
- Name: `LOG_LEVEL` → Value: `error`
- Name: `SESSION_DRIVER` → Value: `file`
- Name: `SESSION_LIFETIME` → Value: `120`

---

### Opsi 3: Format JSON Alternatif (Jika Raw Editor Support)

Coba format ini (tanpa reference variables):

```json
{
  "APP_NAME": "Data Dashboard",
  "APP_ENV": "production",
  "APP_KEY": "base64:7wsOci1+cln3cKvy5QCXn8qH+n7z8d+z5O9HqpRqEQw=",
  "APP_DEBUG": "false",
  "APP_URL": "https://datadashboard-production-68f6.up.railway.app",
  "DB_CONNECTION": "mysql",
  "LOG_CHANNEL": "stderr",
  "LOG_LEVEL": "error",
  "SESSION_DRIVER": "file",
  "SESSION_LIFETIME": "120"
}
```

Lalu set database variables manual setelah MySQL dibuat.

---

## 🎯 Rekomendasi

**Gunakan Opsi 1 atau Opsi 2** (set manual via UI) karena:
- ✅ Lebih reliable
- ✅ Reference variables `${{MySQL.*}}` lebih mudah di-set via UI
- ✅ Bisa verify setiap variable satu per satu
- ✅ Tidak ada masalah format JSON

---

## 📝 Checklist

- [ ] Set App variables (APP_NAME, APP_KEY, APP_URL, dll)
- [ ] Buat MySQL service di Railway
- [ ] Set Database variables manual (DB_HOST, DB_USERNAME, dll)
- [ ] Set Logging & Session variables
- [ ] Verifikasi semua variables sudah ter-set
- [ ] Aplikasi restart otomatis

---

## ⚠️ Catatan Penting

1. **Reference Variables `${{MySQL.*}}`**
   - Format ini biasanya **tidak bisa digunakan di Raw Editor JSON**
   - Harus di-set **manual via UI** setelah MySQL service dibuat
   - Railway akan otomatis replace dengan nilai yang benar

2. **Raw Editor vs Manual**
   - Raw Editor: Cepat untuk banyak variables, tapi tidak support reference
   - Manual: Lebih lambat, tapi lebih reliable dan support reference variables

3. **Urutan Setup**
   - Set App variables dulu (bisa via Raw Editor)
   - Buat MySQL service
   - Set Database variables manual (harus via UI, bukan Raw Editor)

---

## 🆘 Jika Masih Error

1. **Check Error Message** di Railway
   - Lihat error detail yang muncul
   - Screenshot error untuk analisis lebih lanjut

2. **Coba Format Lain**
   - Hapus semua variables
   - Set ulang satu per satu via UI

3. **Contact Support**
   - Jika semua cara tidak bekerja, hubungi Railway support

