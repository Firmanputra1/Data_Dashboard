# Cara Generate APP_KEY untuk Railway

## Masalah
`php artisan key:generate` tidak muncul output atau tidak bekerja.

## Solusi: Generate APP_KEY

Ada beberapa cara untuk generate APP_KEY:

---

## Cara 1: Generate di Local (Paling Mudah)

### A. Generate dan Lihat Key
```bash
php artisan key:generate --show
```

Ini akan menampilkan key yang sudah di-generate, contoh:
```
base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx==
```

### B. Copy Key ke Railway
1. Copy output key tersebut
2. Buka Railway Dashboard
3. Web Service → Variables
4. Tambahkan variable baru:
   ```
   APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx==
   ```
5. Save

---

## Cara 2: Generate Langsung di Railway

### Via Railway Dashboard Shell:

1. **Buka Railway Dashboard**
2. **Pilih Web Service** (bukan MySQL)
3. **Klik tab "Deployments"**
4. **Klik pada deployment terbaru**
5. **Klik "..." (three dots)** → **"Open Shell"** atau **"Run Command"**
6. **Jalankan:**
   ```bash
   php artisan key:generate
   ```
7. **Copy output key** yang muncul
8. **Tambahkan sebagai Environment Variable:**
   - Kembali ke Web Service
   - Tab "Variables"
   - Tambahkan: `APP_KEY=base64:xxxxx...`
   - Save

---

## Cara 3: Generate via Railway CLI

Jika sudah install Railway CLI:

```bash
# Login ke Railway
railway login

# Link ke project
railway link

# Generate key dan lihat output
railway run php artisan key:generate --show

# Copy output, lalu tambahkan di Railway Dashboard → Variables
```

---

## Cara 4: Generate Manual (Jika Semua Gagal)

Jika semua cara di atas tidak bekerja, bisa generate manual:

### A. Generate Random Key
```bash
# Di terminal local atau Railway shell:
php -r "echo 'base64:' . base64_encode(random_bytes(32)) . PHP_EOL;"
```

### B. Atau Gunakan Online Generator
1. Buka: https://generate-random.org/api-key-generator
2. Generate random string
3. Convert ke base64 format
4. Tambahkan prefix `base64:`

---

## Verifikasi APP_KEY Sudah Benar

Setelah set APP_KEY di Railway:

1. **Buka Railway Shell** (Web Service → Deployments → Open Shell)
2. **Jalankan:**
   ```bash
   php artisan tinker
   ```
3. **Di tinker, jalankan:**
   ```php
   config('app.key')
   ```
4. **Seharusnya muncul key yang sudah di-set**

---

## Troubleshooting

### Error: "No application encryption key has been specified"
**Solusi:**
- Pastikan APP_KEY sudah di-set di Railway Variables
- Pastikan format benar: `base64:xxxxx...`
- Restart aplikasi di Railway (redeploy)

### Error: Key tidak muncul saat `key:generate`
**Solusi:**
- Coba dengan flag `--show`: `php artisan key:generate --show`
- Atau check file `.env` di local (jika di local)
- Atau generate manual dengan cara di atas

### Error: Key invalid format
**Solusi:**
- Pastikan format: `base64:xxxxx...` (dengan prefix `base64:`)
- Pastikan tidak ada spasi di awal/akhir
- Pastikan panjang key cukup (minimal 32 karakter setelah base64:)

---

## Checklist

- [ ] APP_KEY sudah di-generate
- [ ] APP_KEY sudah di-copy dengan benar
- [ ] APP_KEY sudah di-set di Railway Variables
- [ ] Format APP_KEY benar: `base64:xxxxx...`
- [ ] Aplikasi sudah restart (otomatis setelah save variables)
- [ ] Tidak ada error "No application encryption key"

---

## Contoh APP_KEY yang Benar

Format yang benar:
```
base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx==
```

Panjang biasanya sekitar 44-88 karakter setelah `base64:`

---

## Tips

1. **Jangan share APP_KEY** ke public
2. **APP_KEY berbeda** untuk setiap environment (local, staging, production)
3. **Jika key hilang**, generate ulang (tapi data yang di-encrypt dengan key lama tidak bisa di-decrypt)
4. **Simpan APP_KEY** di tempat aman (password manager)

---

## Langkah Cepat

**Cara tercepat:**
1. Di local terminal, jalankan:
   ```bash
   php artisan key:generate --show
   ```
2. Copy output
3. Paste di Railway Dashboard → Variables → APP_KEY
4. Save
5. Selesai!

