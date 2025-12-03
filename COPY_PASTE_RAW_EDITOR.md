# Copy-Paste untuk Railway Raw Editor

## 📋 File Siap Copy-Paste

Saya sudah buatkan 2 file terpisah untuk Raw Editor Railway:

### 1. Format ENV (Tab "ENV")
📄 **File:** `RAILWAY_RAW_EDITOR_ENV.txt`

**Cara Pakai:**
1. Buka Railway Dashboard → Web Service → Variables
2. Klik "Raw Editor"
3. Pilih tab **"ENV"**
4. Copy semua isi dari file `RAILWAY_RAW_EDITOR_ENV.txt`
5. Paste ke editor
6. Klik **"Update Variables"**

---

### 2. Format JSON (Tab "JSON")
📄 **File:** `RAILWAY_RAW_EDITOR_JSON.txt`

**Cara Pakai:**
1. Buka Railway Dashboard → Web Service → Variables
2. Klik "Raw Editor"
3. Pilih tab **"JSON"**
4. Copy semua isi dari file `RAILWAY_RAW_EDITOR_JSON.txt`
5. Paste ke editor
6. Klik **"Update Variables"**

---

## ⚠️ PENTING: Sebelum Copy-Paste

### Pastikan MySQL Service Sudah Dibuat!

Reference variables `${{MySQL.*}}` hanya akan bekerja jika:
- ✅ MySQL service sudah dibuat di Railway
- ✅ MySQL service sudah di-link ke Web service

**Jika MySQL belum dibuat:**
1. Railway Dashboard → "New" → "Database" → "MySQL"
2. Tunggu sampai selesai dibuat
3. Pastikan MySQL service ter-link ke Web service
4. Baru copy-paste variables di atas

---

## 📝 Isi File

### File 1: RAILWAY_RAW_EDITOR_ENV.txt
Format ENV (key=value):
```
APP_NAME="Data Dashboard"
APP_ENV=production
APP_KEY=base64:7wsOci1+cln3cKvy5QCXn8qH+n7z8d+z5O9HqpRqEQw=
APP_DEBUG=false
APP_URL=https://datadashboard-production-68f6.up.railway.app
DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
LOG_CHANNEL=stderr
LOG_LEVEL=error
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

### File 2: RAILWAY_RAW_EDITOR_JSON.txt
Format JSON:
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

---

## 🚀 Langkah-Langkah

### Step 1: Buat MySQL Service (Jika Belum)
1. Railway Dashboard
2. Klik "New" → "Database" → "MySQL"
3. Tunggu sampai selesai
4. Pastikan ter-link ke Web service

### Step 2: Copy-Paste Variables
**Pilih salah satu:**

**Opsi A: Pakai Tab ENV**
1. Buka Raw Editor → Tab "ENV"
2. Copy isi `RAILWAY_RAW_EDITOR_ENV.txt`
3. Paste
4. Klik "Update Variables"

**Opsi B: Pakai Tab JSON** (Yang Anda pakai sekarang)
1. Buka Raw Editor → Tab "JSON"
2. Copy isi `RAILWAY_RAW_EDITOR_JSON.txt`
3. Paste
4. Klik "Update Variables"

### Step 3: Verifikasi
1. Setelah klik "Update Variables"
2. Aplikasi akan otomatis restart
3. Check tab "Variables" untuk memastikan semua variables sudah ter-set
4. Check bahwa reference variables `${{MySQL.*}}` sudah ter-replace dengan nilai yang benar

---

## ✅ Checklist

- [ ] MySQL service sudah dibuat
- [ ] MySQL service sudah di-link ke Web service
- [ ] File ENV atau JSON sudah di-copy
- [ ] Sudah paste ke Raw Editor
- [ ] Sudah klik "Update Variables"
- [ ] Variables sudah ter-set (check di tab Variables)
- [ ] Aplikasi sudah restart
- [ ] Tidak ada error

---

## 🆘 Troubleshooting

### Error: Reference variables tidak ter-replace
**Solusi:**
- Pastikan MySQL service sudah dibuat
- Pastikan MySQL service sudah di-link ke Web service
- Format `${{MySQL.*}}` harus dengan double curly braces

### Error: JSON invalid
**Solusi:**
- Pastikan copy semua isi file (termasuk kurung kurawal)
- Pastikan tidak ada karakter tambahan
- Coba pakai format ENV sebagai alternatif

### Error: Variables tidak ter-set
**Solusi:**
- Pastikan sudah klik "Update Variables" (bukan hanya paste)
- Check tab "Variables" untuk memastikan
- Coba refresh halaman

---

## 📄 File yang Tersedia

1. ✅ `RAILWAY_RAW_EDITOR_ENV.txt` - Format ENV (key=value)
2. ✅ `RAILWAY_RAW_EDITOR_JSON.txt` - Format JSON
3. ✅ `COPY_PASTE_RAW_EDITOR.md` - Panduan ini

**Tinggal copy-paste dan klik "Update Variables"!** 🎉

