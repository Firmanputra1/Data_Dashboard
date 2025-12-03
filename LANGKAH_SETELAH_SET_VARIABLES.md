# Langkah Setelah Set Environment Variables

## ✅ Environment Variables Sudah Di-Set!

Setelah klik "Update Variables", aplikasi akan otomatis restart. Sekarang lakukan langkah berikut:

---

## 📋 Langkah Selanjutnya

### Step 1: Verifikasi Variables Ter-Set ✅

**1.1. Check Variables:**

1. Railway Dashboard → Web Service → Tab "Variables"
2. Pastikan semua variables sudah muncul:
    - ✅ APP_NAME
    - ✅ APP_ENV
    - ✅ APP_KEY
    - ✅ APP_DEBUG
    - ✅ APP_URL
    - ✅ DB_CONNECTION
    - ✅ DB_HOST (harus ter-replace dengan nilai MySQL, bukan `${{MySQL.MYSQLHOST}}`)
    - ✅ DB_PORT
    - ✅ DB_DATABASE
    - ✅ DB_USERNAME
    - ✅ DB_PASSWORD
    - ✅ LOG_CHANNEL
    - ✅ LOG_LEVEL
    - ✅ SESSION_DRIVER
    - ✅ SESSION_LIFETIME

**1.2. Pastikan Reference Variables Ter-Replace:**

-   `DB_HOST` harus menampilkan IP/host MySQL (bukan `${{MySQL.MYSQLHOST}}`)
-   Jika masih `${{MySQL.MYSQLHOST}}`, berarti MySQL belum ter-link dengan benar
-   Solusi: Pastikan MySQL service sudah dibuat dan ter-link ke Web service

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

-   ✅ Pastikan tidak ada error
-   ✅ Migration dan seeder berhasil dijalankan
-   ✅ Data penjualan sudah ter-insert ke database

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

-   ✅ **Header:** "📊 Dashboard Penjualan"
-   ✅ **Form Filter:** Tanggal Awal & Tanggal Akhir
-   ✅ **Total Penjualan:** Card dengan total (Rp)
-   ✅ **Tabel Data:** Data penjualan dengan 5 produk:
    -   Produk A (2025-01-01, 2, Rp 50.000)
    -   Produk B (2025-01-02, 1, Rp 75.000)
    -   Produk C (2025-01-03, 2, Rp 60.000)
    -   Produk D (2025-01-02, 2, Rp 61.000)
    -   Produk E (2025-01-04, 1, Rp 25.000)
-   ✅ **Grafik:** Chart.js line chart tren penjualan

---

## ✅ Checklist Lengkap

-   [x] Environment variables sudah di-set ✅
-   [ ] Variables sudah ter-verify (semua muncul)
-   [ ] Reference variables sudah ter-replace (DB_HOST, dll)
-   [ ] Migration sudah dijalankan (php artisan migrate --force)
-   [ ] Seeder sudah dijalankan (php artisan db:seed --force)
-   [ ] Aplikasi bisa diakses via URL
-   [ ] Dashboard muncul dengan benar
-   [ ] Tabel data penjualan menampilkan 5 produk
-   [ ] Grafik penjualan muncul

---

## 🆘 Troubleshooting

### Error: "No application encryption key"

**Solusi:**

-   Pastikan APP_KEY sudah di-set di Variables
-   Format: `base64:7wsOci1+cln3cKvy5QCXn8qH+n7z8d+z5O9HqpRqEQw=`
-   Restart aplikasi setelah set APP_KEY

### Error: Database Connection Failed

**Solusi:**

-   Pastikan MySQL service sudah dibuat
-   Pastikan MySQL service sudah di-link ke Web service
-   Check di Variables bahwa `DB_HOST` sudah ter-replace (bukan `${{MySQL.MYSQLHOST}}`)
-   Jika masih `${{MySQL.MYSQLHOST}}`, berarti reference tidak ter-resolve

### Error: Migration Failed

**Solusi:**

-   Pastikan database connection berhasil
-   Pastikan environment variables sudah di-set
-   Pastikan user database punya permission
-   Coba jalankan migration manual via Railway Shell

### Error: 500 Internal Server Error

**Solusi:**

-   Check logs di Railway Dashboard → Deployments → Logs
-   Pastikan semua environment variables sudah di-set
-   Pastikan APP_DEBUG=false di production
-   Pastikan APP_KEY sudah di-set

### Dashboard Tidak Muncul / Blank

**Solusi:**

-   Check browser console untuk error JavaScript
-   Pastikan Chart.js library ter-load
-   Check logs di Railway untuk error PHP
-   Pastikan migration & seeder sudah dijalankan

### Reference Variables Tidak Ter-Replace

**Solusi:**

-   Pastikan MySQL service sudah dibuat
-   Pastikan MySQL service sudah di-link ke Web service
-   Coba refresh halaman Variables
-   Jika masih tidak ter-replace, set database variables manual satu per satu

---

## 🎯 Urutan Prioritas

**Lakukan secara berurutan:**

1. ✅ **Environment variables sudah di-set** (Sudah selesai!)
2. ⏭️ **Verify variables ter-set dengan benar**
3. ⏭️ **Run Migration & Seeder** (Langkah berikutnya)
4. ⏭️ **Akses Dashboard**

---

## 🚀 Quick Steps (Ringkas)

1. ✅ Variables sudah di-set (Selesai!)
2. ⏭️ Verify variables di tab Variables
3. ⏭️ Buka Railway Shell → Run migration & seeder
4. ⏭️ Akses dashboard di URL

---

## 📞 Next Steps

Setelah semua checklist selesai:

-   ✅ Dashboard sudah bisa diakses
-   ✅ Data penjualan sudah muncul
-   ✅ Grafik sudah berfungsi
-   ✅ Filter tanggal sudah bekerja

**Selamat! Aplikasi Dashboard Penjualan sudah berjalan! 🎉**

---

## 📄 File Referensi

-   `SETUP_SETELAH_MYSQL.md` - Panduan lengkap setup
-   `LANGKAH_SELANJUTNYA.md` - Langkah-langkah detail
