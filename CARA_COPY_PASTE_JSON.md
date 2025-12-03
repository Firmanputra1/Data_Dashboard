# Format JSON Siap Copy-Paste untuk Raw Editor

## 📋 Dua Format Tersedia

Saya sudah buatkan 2 format JSON untuk Anda:

### 1. Format Compact (Satu Baris)

**File:** `COPY_PASTE_JSON.txt`

-   Format: Semua dalam satu baris
-   Cocok untuk: Copy-paste cepat

### 2. Format Formatted (Rapi dengan Indent)

**File:** `COPY_PASTE_JSON_FORMATTED.txt`

-   Format: Rapi dengan indent
-   Cocok untuk: Lebih mudah dibaca

**Keduanya valid!** Pilih yang Anda suka.

---

## 🚀 Cara Pakai

### Step 1: Buka File

Buka salah satu file:

-   `COPY_PASTE_JSON.txt` (format compact)
-   `COPY_PASTE_JSON_FORMATTED.txt` (format rapi)

### Step 2: Copy Semua

-   Tekan **Ctrl+A** (select all)
-   Tekan **Ctrl+C** (copy)

### Step 3: Paste ke Raw Editor

1. Buka Railway Dashboard → Web Service → Variables
2. Klik **"Raw Editor"**
3. Pilih tab **"JSON"**
4. Tekan **Ctrl+V** (paste)
5. Klik **"Update Variables"**

**Selesai!** 🎉

---

## 📄 Isi File (Format Rapi)

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

## ✅ Checklist

-   [ ] Buka file `COPY_PASTE_JSON_FORMATTED.txt`
-   [ ] Copy semua isinya (Ctrl+A, Ctrl+C)
-   [ ] Buka Railway → Web Service → Variables → Raw Editor
-   [ ] Pilih tab "JSON"
-   [ ] Paste (Ctrl+V)
-   [ ] Klik "Update Variables"
-   [ ] Variables ter-set dengan benar

---

## 💡 Tips

-   **Format rapi** lebih mudah dibaca dan di-edit
-   **Format compact** lebih cepat untuk copy-paste
-   **Keduanya valid** - hasilnya sama
-   **Pastikan copy semua** termasuk kurung kurawal `{}`

---

## 🎯 Quick Copy-Paste

**Langsung copy dari sini:**

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

**Tinggal copy-paste dan klik "Update Variables"!** 🚀
