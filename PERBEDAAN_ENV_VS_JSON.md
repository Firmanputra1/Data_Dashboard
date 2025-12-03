# Perbedaan Format ENV vs JSON di Raw Editor

## 📋 Dua Format yang Berbeda

Raw Editor Railway punya 2 tab dengan format berbeda:

### Tab "ENV" - Format Key=Value

Format: `KEY=value` (satu per baris)

### Tab "JSON" - Format JSON Object

Format: `{"KEY": "value"}` (object JSON)

---

## 🔧 Format ENV (Tab "ENV")

**File:** `RAILWAY_RAW_EDITOR_ENV.txt`

**Format:**

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

**Ciri-ciri:**

-   ✅ Format: `KEY=value`
-   ✅ Satu variable per baris
-   ✅ Tidak ada kurung kurawal `{}`
-   ✅ Tidak ada tanda kutip untuk keys
-   ✅ Value dengan spasi pakai tanda kutip: `"Data Dashboard"`
-   ✅ Value tanpa spasi tidak perlu tanda kutip: `production`

---

## 📄 Format JSON (Tab "JSON")

**File:** `RAILWAY_RAW_EDITOR_JSON.txt`

**Format:**

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

**Ciri-ciri:**

-   ✅ Format: `{"KEY": "value"}`
-   ✅ Semua dalam kurung kurawal `{}`
-   ✅ Keys dalam tanda kutip: `"APP_NAME"`
-   ✅ Values dalam tanda kutip: `"production"`
-   ✅ Dipisahkan koma `,` (kecuali item terakhir)
-   ✅ Format JSON standar

---

## 🎯 Mana yang Harus Dipakai?

**Keduanya sama-sama benar!** Pilih yang Anda lebih suka:

### Pilih Tab "ENV" jika:

-   ✅ Lebih familiar dengan format `.env` file
-   ✅ Lebih mudah dibaca (satu per baris)
-   ✅ Tidak perlu format JSON

### Pilih Tab "JSON" jika:

-   ✅ Lebih familiar dengan JSON
-   ✅ Lebih mudah copy-paste (satu block)
-   ✅ Sudah punya file JSON

---

## 📝 Cara Pakai

### Untuk Tab "ENV":

1. Buka Raw Editor → Tab **"ENV"**
2. Copy isi dari `RAILWAY_RAW_EDITOR_ENV.txt`
3. Paste
4. Klik "Update Variables"

### Untuk Tab "JSON":

1. Buka Raw Editor → Tab **"JSON"**
2. Copy isi dari `RAILWAY_RAW_EDITOR_JSON.txt`
3. Paste
4. Klik "Update Variables"

**Hasilnya sama!** Keduanya akan set variables yang sama.

---

## ✅ Checklist

-   [ ] Pilih salah satu format (ENV atau JSON)
-   [ ] Copy isi file yang sesuai
-   [ ] Paste ke Raw Editor
-   [ ] Klik "Update Variables"
-   [ ] Variables ter-set dengan benar

---

## 💡 Tips

-   **Format ENV** lebih mirip file `.env` di Laravel
-   **Format JSON** lebih compact (satu block)
-   **Keduanya valid** - pilih yang Anda suka
-   **Hasil sama** - tidak ada perbedaan fungsional

---

## 📄 File yang Tersedia

1. ✅ `RAILWAY_RAW_EDITOR_ENV.txt` - Format ENV (key=value)
2. ✅ `RAILWAY_RAW_EDITOR_JSON.txt` - Format JSON (object)

**Gunakan salah satu sesuai tab yang Anda pilih!**
