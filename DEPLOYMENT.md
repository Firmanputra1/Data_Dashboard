# Panduan Deployment ke Railway

## Persiapan

1. Pastikan project sudah di-push ke GitHub/GitLab/Bitbucket
2. Buat akun di [Railway.app](https://railway.app/)

## Langkah Deployment

### 1. Buat Project Baru di Railway

1. Login ke Railway.app
2. Klik "New Project"
3. Pilih "Deploy from GitHub repo" (atau GitLab/Bitbucket)
4. Pilih repository project ini

### 2. Setup Database MySQL

1. Di dashboard Railway, klik "New" → "Database" → "MySQL"
2. Railway akan membuat database MySQL secara otomatis
3. Catat kredensial database yang diberikan

### 3. Setup Environment Variables

Di Railway dashboard, tambahkan environment variables berikut:

```
APP_NAME="Data Dashboard"
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-app-name.railway.app

DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}

LOG_CHANNEL=stack
LOG_LEVEL=error

SESSION_DRIVER=file
SESSION_LIFETIME=120
```

**Catatan penting:**
- `APP_KEY` harus digenerate dengan command: `php artisan key:generate`
- `${{MySQL.*}}` adalah variable references untuk MySQL service di Railway (otomatis)

### 4. Setup Build & Deploy

Railway akan otomatis mendeteksi:
- `railway.json` atau `railway.toml` untuk konfigurasi
- `Procfile` untuk start command

Pastikan file-file ini sudah ada di repository.

### 5. Run Migration & Seeder

Setelah deploy pertama, jalankan migration dan seeder:

1. Di Railway dashboard, buka tab "Variables"
2. Tambahkan variable `RAILWAY_ENABLE_DEPLOYMENT_HOOKS=true`
3. Atau jalankan manual via Railway CLI:
   ```bash
   railway run php artisan migrate --force
   railway run php artisan db:seed --force
   ```

### 6. Setup Custom Domain (Opsional)

1. Di Railway dashboard, buka tab "Settings"
2. Klik "Generate Domain" untuk mendapatkan domain gratis
3. Atau setup custom domain di bagian "Custom Domains"

## Troubleshooting

### Database Connection Error
- Pastikan MySQL service sudah dibuat dan di-link ke web service
- Pastikan environment variables menggunakan format `${{MySQL.*}}`

### Migration Error
- Pastikan database sudah dibuat
- Pastikan user database memiliki permission yang cukup

### 500 Error
- Check logs di Railway dashboard
- Pastikan `APP_DEBUG=false` di production
- Pastikan `APP_KEY` sudah di-set

## File Konfigurasi

Project ini sudah include:
- `railway.json` - Konfigurasi Railway
- `railway.toml` - Konfigurasi alternatif Railway
- `Procfile` - Start command untuk web server

