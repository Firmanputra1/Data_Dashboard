# Setup Setelah Deployment Berhasil

## ✅ Deployment Berhasil!

Sekarang aplikasi Laravel sudah berjalan di Railway. Langkah selanjutnya:

## 1. Setup Database MySQL di Railway

### A. Buat MySQL Service
1. Di Railway Dashboard, klik **"New"** → **"Database"** → **"MySQL"**
2. Railway akan otomatis membuat MySQL database
3. Catat kredensial yang diberikan (atau lihat di Variables)

### B. Link Database ke Web Service
1. Klik pada MySQL service yang baru dibuat
2. Klik tab **"Connect"** atau **"Variables"**
3. Copy semua variable yang dimulai dengan `MYSQL_*`

## 2. Setup Environment Variables

Di Railway Dashboard → Web Service → **"Variables"**, tambahkan:

### A. App Configuration
```
APP_NAME="Data Dashboard"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app-name.railway.app
```

**PENTING:** Generate APP_KEY dulu:
```bash
# Di local, jalankan:
php artisan key:generate --show
# Copy output-nya, lalu paste di Railway sebagai:
APP_KEY=base64:xxxxx...
```

Atau di Railway dashboard, jalankan:
```
railway run php artisan key:generate
```

### B. Database Configuration
```
DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
```

**Catatan:** `${{MySQL.*}}` adalah reference ke MySQL service. Railway akan otomatis replace dengan nilai yang benar.

### C. Logging (Opsional tapi Disarankan)
```
LOG_CHANNEL=stderr
LOG_LEVEL=error
```

### D. Session (Opsional)
```
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

## 3. Run Migration & Seeder

Setelah environment variables di-set, jalankan migration dan seeder:

### Opsi A: Via Railway Dashboard
1. Buka Web Service di Railway
2. Klik tab **"Deployments"**
3. Klik **"..."** pada deployment terbaru
4. Pilih **"Open Shell"** atau **"Run Command"**
5. Jalankan:
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

### Opsi B: Via Railway CLI
Jika sudah install Railway CLI:
```bash
railway login
railway link
railway run php artisan migrate --force
railway run php artisan db:seed --force
```

### Opsi C: Via Deploy Hook (Otomatis)
Di Railway Dashboard → Web Service → **"Settings"** → **"Deploy Hooks"**, tambahkan:
```
php artisan migrate --force && php artisan db:seed --force
```

## 4. Verifikasi Deployment

### A. Cek Aplikasi Berjalan
1. Di Railway Dashboard, klik Web Service
2. Klik tab **"Settings"**
3. Copy **"Public Domain"** atau **"Custom Domain"**
4. Buka URL tersebut di browser
5. Seharusnya muncul **Dashboard Penjualan**

### B. Cek Database
1. Buka MySQL service di Railway
2. Klik **"Query"** atau gunakan MySQL client
3. Verifikasi tabel `penjualan` sudah ada:
   ```sql
   SHOW TABLES;
   SELECT * FROM penjualan;
   ```

## 5. Akses Dashboard

Setelah semua setup selesai:

1. **Buka URL aplikasi** (dari Railway Settings)
2. **Dashboard Penjualan** akan muncul dengan:
   - Form filter tanggal
   - Total penjualan
   - Tabel data penjualan
   - Grafik tren penjualan (Chart.js)

## 6. Troubleshooting

### Error: "No application encryption key"
**Solusi:** Generate APP_KEY:
```bash
railway run php artisan key:generate
```

### Error: Database Connection Failed
**Solusi:**
- Pastikan MySQL service sudah dibuat
- Pastikan environment variables menggunakan format `${{MySQL.*}}`
- Pastikan MySQL service sudah di-link ke Web service

### Error: 500 Internal Server Error
**Solusi:**
- Check logs di Railway Dashboard → Deployments → Logs
- Pastikan `APP_DEBUG=false` di production
- Pastikan semua environment variables sudah di-set

### Error: Migration Failed
**Solusi:**
- Pastikan database connection berhasil
- Pastikan user database punya permission
- Coba jalankan migration manual via Railway shell

## 7. Update Data (Opsional)

Jika perlu update data penjualan, bisa:

### Via Railway Shell:
```bash
railway run php artisan tinker
# Lalu di tinker:
App\Models\Penjualan::create([
    'nama_produk' => 'Produk F',
    'tanggal_penjualan' => '2025-01-05',
    'jumlah' => 3,
    'harga' => 45000
]);
```

### Via Database Query:
Gunakan MySQL Query di Railway untuk insert data langsung.

## 8. Monitoring

### Check Logs
- Railway Dashboard → Deployments → Logs
- Monitor error dan performance

### Check Metrics
- Railway Dashboard → Metrics
- Monitor CPU, Memory, Network usage

## Checklist Final

- [ ] MySQL service sudah dibuat
- [ ] Environment variables sudah di-set
- [ ] APP_KEY sudah di-generate
- [ ] Migration sudah dijalankan
- [ ] Seeder sudah dijalankan
- [ ] Aplikasi bisa diakses via URL
- [ ] Dashboard muncul dengan benar
- [ ] Data penjualan muncul di tabel
- [ ] Grafik penjualan muncul

## Selamat! 🎉

Aplikasi Dashboard Penjualan sudah berjalan di Railway!

Jika ada masalah, check logs di Railway dashboard atau hubungi support.

