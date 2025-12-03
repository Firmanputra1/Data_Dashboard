# Environment Variables untuk Railway - Copy Paste

## 📋 Copy-Paste Environment Variables

### Cara Menggunakan:
1. Buka Railway Dashboard
2. Pilih **Web Service** (bukan MySQL)
3. Klik tab **"Variables"**
4. Copy-paste variables di bawah ini satu per satu
5. Atau gunakan file `RAILWAY_ENV_VARIABLES.txt` untuk referensi

---

## 🔧 Environment Variables

### 1. App Configuration
```
APP_NAME="Data Dashboard"
APP_ENV=production
APP_KEY=base64:7wsOci1+cln3cKvy5QCXn8qH+n7z8d+z5O9HqpRqEQw=
APP_DEBUG=false
APP_URL=https://datadashboard-production-68f6.up.railway.app
```

### 2. Database Configuration
**PENTING:** Pastikan MySQL service sudah dibuat dulu di Railway!

```
DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
```

**Catatan:** 
- `${{MySQL.*}}` adalah reference ke MySQL service
- Pastikan MySQL service sudah dibuat dan di-link ke Web service
- Railway akan otomatis replace dengan nilai yang benar

### 3. Logging Configuration
```
LOG_CHANNEL=stderr
LOG_LEVEL=error
```

### 4. Session Configuration
```
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

---

## 📝 Langkah-Langkah Setup

### Step 1: Setup MySQL Database
1. Di Railway Dashboard, klik **"New"** → **"Database"** → **"MySQL"**
2. Tunggu sampai MySQL service selesai dibuat
3. Catat nama MySQL service (misalnya: "MySQL")

### Step 2: Link MySQL ke Web Service
1. Klik pada **MySQL service** yang baru dibuat
2. Klik tab **"Settings"** atau **"Variables"**
3. Pastikan MySQL service sudah ter-link ke Web service
4. Jika belum, klik **"Connect"** atau **"Link"**

### Step 3: Set Environment Variables
1. Klik pada **Web Service** (bukan MySQL)
2. Klik tab **"Variables"**
3. Klik **"New Variable"** atau **"+"**
4. Copy-paste variables di atas satu per satu:

   **Variable 1:**
   - Name: `APP_NAME`
   - Value: `Data Dashboard`
   - Save

   **Variable 2:**
   - Name: `APP_ENV`
   - Value: `production`
   - Save

   **Variable 3:**
   - Name: `APP_KEY`
   - Value: `base64:7wsOci1+cln3cKvy5QCXn8qH+n7z8d+z5O9HqpRqEQw=`
   - Save

   **Variable 4:**
   - Name: `APP_DEBUG`
   - Value: `false`
   - Save

   **Variable 5:**
   - Name: `APP_URL`
   - Value: `https://datadashboard-production-68f6.up.railway.app`
   - Save

   **Variable 6:**
   - Name: `DB_CONNECTION`
   - Value: `mysql`
   - Save

   **Variable 7:**
   - Name: `DB_HOST`
   - Value: `${{MySQL.MYSQLHOST}}`
   - Save

   **Variable 8:**
   - Name: `DB_PORT`
   - Value: `${{MySQL.MYSQLPORT}}`
   - Save

   **Variable 9:**
   - Name: `DB_DATABASE`
   - Value: `${{MySQL.MYSQLDATABASE}}`
   - Save

   **Variable 10:**
   - Name: `DB_USERNAME`
   - Value: `${{MySQL.MYSQLUSER}}`
   - Save

   **Variable 11:**
   - Name: `DB_PASSWORD`
   - Value: `${{MySQL.MYSQLPASSWORD}}`
   - Save

   **Variable 12:**
   - Name: `LOG_CHANNEL`
   - Value: `stderr`
   - Save

   **Variable 13:**
   - Name: `LOG_LEVEL`
   - Value: `error`
   - Save

   **Variable 14:**
   - Name: `SESSION_DRIVER`
   - Value: `file`
   - Save

   **Variable 15:**
   - Name: `SESSION_LIFETIME`
   - Value: `120`
   - Save

### Step 4: Verifikasi
1. Setelah semua variables di-set, aplikasi akan otomatis restart
2. Tunggu beberapa detik
3. Buka URL: https://datadashboard-production-68f6.up.railway.app
4. Seharusnya aplikasi sudah berjalan

---

## ⚠️ Catatan Penting

1. **MySQL Service Harus Dibuat Dulu**
   - Database variables (`${{MySQL.*}}`) tidak akan bekerja jika MySQL service belum dibuat
   - Buat MySQL service terlebih dahulu sebelum set database variables

2. **Format Variables**
   - Jangan ada spasi di awal/akhir value
   - Untuk APP_NAME, gunakan tanda kutip: `"Data Dashboard"`
   - Untuk APP_KEY, jangan ada spasi setelah `base64:`

3. **Reference Variables**
   - `${{MySQL.*}}` adalah format khusus Railway
   - Railway akan otomatis replace dengan nilai yang benar
   - Pastikan MySQL service sudah di-link ke Web service

4. **Setelah Set Variables**
   - Aplikasi akan otomatis restart
   - Tunggu beberapa detik sampai restart selesai
   - Check logs jika ada error

---

## 🚀 Langkah Selanjutnya

Setelah semua environment variables di-set:

1. **Run Migration:**
   ```bash
   railway run php artisan migrate --force
   ```
   Atau via Railway Dashboard → Deployments → Open Shell

2. **Run Seeder:**
   ```bash
   railway run php artisan db:seed --force
   ```

3. **Akses Dashboard:**
   - Buka: https://datadashboard-production-68f6.up.railway.app
   - Dashboard Penjualan seharusnya muncul

---

## ✅ Checklist

- [ ] MySQL service sudah dibuat di Railway
- [ ] MySQL service sudah di-link ke Web service
- [ ] APP_NAME sudah di-set
- [ ] APP_ENV sudah di-set
- [ ] APP_KEY sudah di-set
- [ ] APP_DEBUG sudah di-set
- [ ] APP_URL sudah di-set
- [ ] DB_CONNECTION sudah di-set
- [ ] DB_HOST sudah di-set (dengan ${{MySQL.MYSQLHOST}})
- [ ] DB_PORT sudah di-set (dengan ${{MySQL.MYSQLPORT}})
- [ ] DB_DATABASE sudah di-set (dengan ${{MySQL.MYSQLDATABASE}})
- [ ] DB_USERNAME sudah di-set (dengan ${{MySQL.MYSQLUSER}})
- [ ] DB_PASSWORD sudah di-set (dengan ${{MySQL.MYSQLPASSWORD}})
- [ ] LOG_CHANNEL sudah di-set
- [ ] LOG_LEVEL sudah di-set
- [ ] SESSION_DRIVER sudah di-set
- [ ] SESSION_LIFETIME sudah di-set
- [ ] Aplikasi sudah restart
- [ ] Migration sudah dijalankan
- [ ] Seeder sudah dijalankan
- [ ] Dashboard bisa diakses

---

## 🆘 Troubleshooting

### Error: Database Connection Failed
- Pastikan MySQL service sudah dibuat
- Pastikan MySQL service sudah di-link ke Web service
- Pastikan format `${{MySQL.*}}` benar (dengan tanda kurung kurawal ganda)

### Error: No application encryption key
- Pastikan APP_KEY sudah di-set dengan benar
- Pastikan format: `base64:xxxxx...` (dengan prefix base64:)
- Restart aplikasi setelah set APP_KEY

### Error: 500 Internal Server Error
- Check logs di Railway Dashboard → Deployments → Logs
- Pastikan semua environment variables sudah di-set
- Pastikan APP_DEBUG=false di production

---

## 📄 File Referensi

File `RAILWAY_ENV_VARIABLES.txt` berisi semua variables dalam format yang mudah di-copy.

