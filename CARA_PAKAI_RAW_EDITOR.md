# Cara Pakai Raw Editor Railway

## ✅ Tidak Perlu Add Satu Per Satu!

Anda **TIDAK perlu** klik "Add Variable" satu per satu. Gunakan **Raw Editor** untuk set semua variables sekaligus!

---

## 🚀 Cara Menggunakan Raw Editor (Paling Cepat)

### Step 1: Buka Raw Editor
1. Di halaman Variables yang Anda lihat sekarang
2. Klik tombol **"Raw Editor"** (tombol dengan icon `{}` di kanan atas)
3. Akan muncul popup/modal Raw Editor

### Step 2: Pilih Tab JSON
1. Di Raw Editor, ada 2 tab: **"ENV"** dan **"JSON"**
2. Pilih tab **"JSON"** (yang Anda pakai sebelumnya)

### Step 3: Copy-Paste Variables
1. Buka file `RAILWAY_RAW_EDITOR_JSON.txt` di project Anda
2. Copy **semua isinya** (Ctrl+A, Ctrl+C)
3. Paste ke Raw Editor (Ctrl+V)
4. Klik **"Update Variables"**

**Selesai!** Semua variables akan ter-set sekaligus.

---

## 📋 Isi yang Harus Di-Copy

Dari file `RAILWAY_RAW_EDITOR_JSON.txt`, copy semua isinya:

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

## ⚠️ Tentang Alert "Trying to connect a database?"

**Alert tersebut bisa diabaikan** jika Anda menggunakan Raw Editor.

Alert itu hanya saran untuk add variable database secara manual, tapi karena kita pakai Raw Editor, kita bisa set semua sekaligus termasuk database variables.

**Tidak perlu klik "Add Variable" dari alert tersebut!**

---

## 🎯 Perbandingan Metode

### ❌ Metode Manual (Lambat):
- Klik "New Variable" → Set satu per satu
- Harus set 15 variables satu per satu
- Sangat lambat dan membosankan

### ✅ Metode Raw Editor (Cepat):
- Buka Raw Editor → Paste JSON
- Set semua 15 variables sekaligus
- Cepat dan mudah!

---

## 📝 Langkah-Langkah Detail

### 1. Klik "Raw Editor"
```
┌─────────────────────────────────────┐
│  Service Variables                  │
│  [Shared Variable] [{} Raw Editor]  │ ← Klik ini!
│  [+ New Variable]                   │
└─────────────────────────────────────┘
```

### 2. Pilih Tab JSON
```
┌─────────────────────────────────────┐
│  Raw Editor                         │
│  [ENV] [JSON]  ← Pilih JSON!       │
│                                     │
│  {                                  │
│    "APP_NAME": ...                  │
│  }                                  │
└─────────────────────────────────────┘
```

### 3. Paste JSON
```
┌─────────────────────────────────────┐
│  Raw Editor                         │
│  [ENV] [JSON]                       │
│                                     │
│  {                                  │
│    "APP_NAME": "Data Dashboard",   │ ← Paste di sini!
│    "APP_ENV": "production",         │
│    ...                              │
│  }                                  │
│                                     │
│  [Cancel] [Update Variables]  ← Klik ini!
└─────────────────────────────────────┘
```

### 4. Klik "Update Variables"
- Setelah paste JSON, klik tombol **"Update Variables"** (tombol purple di bawah)
- Aplikasi akan otomatis restart
- Semua variables akan ter-set sekaligus

---

## ✅ Checklist

- [ ] Sudah klik "Raw Editor"
- [ ] Sudah pilih tab "JSON"
- [ ] Sudah copy isi `RAILWAY_RAW_EDITOR_JSON.txt`
- [ ] Sudah paste ke Raw Editor
- [ ] Sudah klik "Update Variables"
- [ ] Aplikasi sudah restart
- [ ] Variables sudah ter-set (check di tab Variables)

---

## 🆘 Jika Raw Editor Tidak Muncul

Jika tombol "Raw Editor" tidak terlihat:

1. **Coba refresh halaman** (F5)
2. **Scroll ke atas** - mungkin tombol di atas
3. **Cek browser** - pastikan menggunakan browser modern (Chrome, Firefox, Edge)
4. **Alternatif:** Gunakan "New Variable" satu per satu (lebih lambat)

---

## 💡 Tips

- **Raw Editor lebih cepat** - Set semua variables sekaligus
- **Tidak perlu add manual** - Raw Editor akan set semua otomatis
- **Alert bisa diabaikan** - Tidak perlu klik "Add Variable" dari alert
- **Setelah Update Variables** - Aplikasi akan otomatis restart

---

## 🎯 Kesimpulan

**TIDAK perlu add variable satu per satu!**

Cukup:
1. Klik **"Raw Editor"**
2. Pilih tab **"JSON"**
3. Paste JSON dari `RAILWAY_RAW_EDITOR_JSON.txt`
4. Klik **"Update Variables"**

**Selesai!** Semua variables ter-set sekaligus. 🎉

