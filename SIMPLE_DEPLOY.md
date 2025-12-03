# Solusi Sederhana untuk Deploy Railway

## Masalah
Build image terus gagal di Railway.

## Solusi: Konfigurasi Minimal

Saya sudah menyederhanakan konfigurasi menjadi sangat minimal:

### File yang Digunakan:
1. **`nixpacks.toml`** - Hanya specify PHP 8.1
2. **`Procfile`** - Start command sederhana
3. **`composer.json`** - Sudah PHP 8.1

### File yang Dihapus:
- ❌ `railway.toml` - Terlalu kompleks, menyebabkan konflik
- ❌ `railway.json` - Duplikasi config
- ❌ `.nixpacks` - Konflik dengan nixpacks.toml

## Langkah Deploy

1. **Commit & Push:**
   ```bash
   git add .
   git commit -m "Simplify Railway config - use minimal setup"
   git push
   ```

2. **Di Railway Dashboard:**
   - Railway akan auto-detect Laravel
   - Gunakan PHP 8.1 dari nixpacks.toml
   - Gunakan start command dari Procfile

3. **Setup Environment Variables:**
   Setelah build berhasil, tambahkan di Railway:
   ```
   APP_NAME="Data Dashboard"
   APP_ENV=production
   APP_KEY=base64:YOUR_KEY_HERE
   APP_DEBUG=false
   APP_URL=https://your-app.railway.app
   
   DB_CONNECTION=mysql
   DB_HOST=${{MySQL.MYSQLHOST}}
   DB_PORT=${{MySQL.MYSQLPORT}}
   DB_DATABASE=${{MySQL.MYSQLDATABASE}}
   DB_USERNAME=${{MySQL.MYSQLUSER}}
   DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
   ```

## Jika Masih Error

### Opsi 1: Hapus Semua Config Files
Hapus `nixpacks.toml` dan biarkan Railway auto-detect sepenuhnya:
```bash
rm nixpacks.toml
```

### Opsi 2: Gunakan Dockerfile
Jika auto-detect tidak bekerja, gunakan Dockerfile (sudah disediakan di project).

### Opsi 3: Check Build Logs
Di Railway dashboard, klik "View build logs" untuk melihat error detail.

