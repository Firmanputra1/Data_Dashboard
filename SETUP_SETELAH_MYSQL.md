# Setup Setelah MySQL Berhasil Dibuat

## ✅ MySQL Sudah Aktif!

MySQL service sudah berhasil dibuat dan aktif. Sekarang lakukan langkah berikut:

---

## 📋 Langkah Selanjutnya

### Step 1: Setup Environment Variables 🔧

**1.1. Buka Web Service (Bukan MySQL):**
1. Di Railway Dashboard, klik pada **Web Service** (bukan MySQL)
2. Atau klik "X" untuk tutup MySQL view, lalu klik pada Web Service

**1.2. Buka Variables:**
1. Di Web Service, klik tab **"Variables"**
2. Klik **"Raw Editor"** (tombol di kanan atas)

**1.3. Copy-Paste Variables:**

**Pilih Tab "JSON":**
1. Di Raw Editor, pilih tab **"JSON"**
2. Buka file `RAILWAY_RAW_EDITOR_JSON.txt` di project Anda
3. Copy semua isinya (Ctrl+A, Ctrl+C)
4. Paste ke Raw Editor (Ctrl+V)
5. Klik **"Update Variables"**

**Isi JSON yang harus di-paste:**
```json
{
  "APP_NAME": "Data Dashboard",
  "APP_ENV": "production",
  "APP_KEY": "base64:7wsOci1+cln3cKvy5QCXn8qH+n7z8d+z5O9HqpRqEQw=",
  "APP_DEBUG": "false",
  "APP_URL": "https://datadashboard-production-68f6.up.railway.app",
  "DB_CONNECTION": "mysql",
  "DB_HOST": "${{MySQL.MYSQLHOST}}",
  "DB_PORT": "${{MySQL.MYSQLPORT}}",
  "DB_DATABASE": "${{MySQL.MYSQLDATABASE}}",
  "DB_USERNAME": "${{MySQL.MYSQLUSER}}",
  "DB_PASSWORD": "${{MySQL.MYSQLPASSWORD}}",
  "LOG_CHANNEL": "stderr",
  "LOG_LEVEL": "error",
  "SESSION_DRIVER": "file",
  "SESSION_LIFETIME": "120"
}
```

**1.4. Verifikasi:**
- Setelah klik "Update Variables", aplikasi akan otomatis restart
- Tunggu beberapa detik
- Check di tab "Variables" untuk memastikan semua variables sudah ter-set
- Pastikan reference variables `${{MySQL.*}}` sudah ter-replace dengan nilai yang benar

---

### Step 2: Run Migration & Seeder 🗄️

**2.1. Buka Railway Shell:**

**Via Railway Dashboard:**
1. Railway Dashboard → **Web Service** (bukan MySQL)
2. Klik tab **"Deployments"**
3. Klik pada deployment terbaru (yang berhasil)
4. Klik **"..."** (three dots) → **"Open Shell"** atau **"Run Command"**

**2.2. Jalankan Migration:**
Di Railway Shell, jalankan:
```bash
php artisan migrate --force
```

**Output yang diharapkan:**
```
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table
Migrating: 2025_12_03_005010_create_penjualan_table
Migrated:  2025_12_03_005010_create_penjualan_table
```

**2.3. Jalankan Seeder:**
Setelah migration berhasil, jalankan:
```bash
php artisan db:seed --force
```

**Output yang diharapkan:**
```
Database seeding completed successfully.
```

**2.4. Verifikasi:**
- Pastikan tidak ada error
- Migration dan seeder berhasil dijalankan
- Data penjualan sudah ter-insert ke database

---

### Step 3: Akses Dashboard 🌐

**3.1. Buka URL Aplikasi:**
1. Railway Dashboard → **Web Service** → Tab **"Settings"**
2. Copy **"Public Domain"** atau gunakan URL:
   ```
   https://datadashboard-production-68f6.up.railway.app
   ```
3. Buka URL tersebut di browser

**3.2. Verifikasi Dashboard:**
Setelah buka URL, seharusnya muncul:
- ✅ **Header:** "📊 Dashboard Penjualan"
- ✅ **Form Filter:** Tanggal Awal & Tanggal Akhir
- ✅ **Total Penjualan:** Card dengan total (Rp)
- ✅ **Tabel Data:** Data penjualan dengan 5 produk:
  - Produk A (2025-01-01, 2, Rp 50.000)
  - Produk B (2025-01-02, 1, Rp 75.000)
  - Produk C (2025-01-03, 2, Rp 60.000)
  - Produk D (2025-01-02, 2, Rp 61.000)
  - Produk E (2025-01-04, 1, Rp 25.000)
- ✅ **Grafik:** Chart.js line chart tren penjualan

---

## ✅ Checklist Lengkap

- [x] MySQL service sudah dibuat ✅ (Sudah selesai!)
- [ ] Environment variables sudah di-set (via Raw Editor)
- [ ] APP_KEY sudah ter-set
- [ ] Database variables sudah ter-set (dengan ${{MySQL.*}})
- [ ] Migration sudah dijalankan (php artisan migrate --force)
- [ ] Seeder sudah dijalankan (php artisan db:seed --force)
- [ ] Aplikasi bisa diakses via URL
- [ ] Dashboard muncul dengan benar
- [ ] Tabel data penjualan menampilkan 5 produk
- [ ] Grafik penjualan muncul

---

## 🎯 Urutan Prioritas

**Lakukan secara berurutan:**

1. ✅ **MySQL sudah dibuat** (Sudah selesai!)
2. ⏭️ **Set Environment Variables** (Langkah berikutnya)
3. ⏭️ **Run Migration & Seeder**
4. ⏭️ **Akses Dashboard**

---

## 📝 File yang Perlu Digunakan

- `RAILWAY_RAW_EDITOR_JSON.txt` - Copy-paste ke Raw Editor Railway

---

## 🆘 Troubleshooting

### Error: "No application encryption key"
**Solusi:**
- Pastikan APP_KEY sudah di-set di Variables
- Format: `base64:7wsOci1+cln3cKvy5QCXn8qH+n7z8d+z5O9HqpRqEQw=`
- Restart aplikasi setelah set APP_KEY

### Error: Database Connection Failed
**Solusi:**
- Pastikan MySQL service sudah dibuat (sudah selesai ✅)
- Pastikan MySQL service sudah di-link ke Web service (biasanya otomatis)
- Pastikan database variables menggunakan format `${{MySQL.*}}`
- Check di Variables bahwa `${{MySQL.*}}` sudah ter-replace dengan nilai yang benar

### Error: Migration Failed
**Solusi:**
- Pastikan database connection berhasil
- Pastikan environment variables sudah di-set
- Pastikan user database punya permission
- Coba jalankan migration manual via Railway Shell

### Error: 500 Internal Server Error
**Solusi:**
- Check logs di Railway Dashboard → Deployments → Logs
- Pastikan semua environment variables sudah di-set
- Pastikan APP_DEBUG=false di production
- Pastikan APP_KEY sudah di-set

### Dashboard Tidak Muncul / Blank
**Solusi:**
- Check browser console untuk error JavaScript
- Pastikan Chart.js library ter-load
- Check logs di Railway untuk error PHP
- Pastikan migration & seeder sudah dijalankan

---

## 🚀 Quick Steps (Ringkas)

1. ✅ MySQL sudah dibuat (Selesai!)
2. ⏭️ Buka Web Service → Variables → Raw Editor
3. ⏭️ Paste JSON dari `RAILWAY_RAW_EDITOR_JSON.txt`
4. ⏭️ Klik "Update Variables"
5. ⏭️ Buka Railway Shell → Run migration & seeder
6. ⏭️ Akses dashboard di URL

---

## 📞 Next Steps

Setelah semua checklist selesai:
- ✅ Dashboard sudah bisa diakses
- ✅ Data penjualan sudah muncul
- ✅ Grafik sudah berfungsi
- ✅ Filter tanggal sudah bekerja

**Selamat! Aplikasi Dashboard Penjualan sudah berjalan! 🎉**

