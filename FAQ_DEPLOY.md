# FAQ - Pertanyaan Umum Deployment

## Apakah Perubahan Harus Di-Push ke GitHub Dulu?

### ✅ YA - Harus Push ke GitHub:
**Untuk perubahan KODE aplikasi:**
- ✅ Perubahan file PHP (Controllers, Models, dll)
- ✅ Perubahan Views (Blade templates)
- ✅ Perubahan Routes
- ✅ Perubahan Migration files
- ✅ Perubahan Config files
- ✅ Menambah file baru
- ✅ Update composer.json, package.json

**Alasan:** Railway deploy dari GitHub repository, jadi semua perubahan kode harus di-commit dan push dulu.

**Cara:**
```bash
git add .
git commit -m "Deskripsi perubahan"
git push
```
Railway akan otomatis detect perubahan dan trigger deploy baru.

---

### ❌ TIDAK - Tidak Perlu Push:
**Untuk Environment Variables:**
- ❌ Setup APP_KEY, APP_URL, dll
- ❌ Setup Database credentials
- ❌ Setup LOG_CHANNEL, dll

**Alasan:** Environment variables di-set langsung di Railway Dashboard, tidak perlu di-push ke GitHub.

**Cara:**
1. Buka Railway Dashboard
2. Pilih Web Service
3. Klik tab "Variables"
4. Tambahkan/edit variables langsung di sana
5. Save - aplikasi akan otomatis restart

---

### ⚠️ OPSIONAL - Bisa Langsung di Railway:
**Untuk Database Operations:**
- ⚠️ Run Migration
- ⚠️ Run Seeder
- ⚠️ Run Artisan commands

**Bisa dilakukan:**
1. **Via Railway Shell** (tidak perlu push):
   ```bash
   railway run php artisan migrate --force
   railway run php artisan db:seed --force
   ```

2. **Atau via Railway Dashboard** → Open Shell → jalankan command langsung

**TIDAK perlu push ke GitHub** untuk menjalankan migration/seeder.

---

## Ringkasan

| Jenis Perubahan | Perlu Push ke GitHub? | Cara |
|----------------|----------------------|------|
| **Kode aplikasi** (PHP, Views, Routes) | ✅ **YA** | `git add .` → `git commit` → `git push` |
| **Environment Variables** | ❌ **TIDAK** | Set langsung di Railway Dashboard |
| **Migration/Seeder** | ❌ **TIDAK** | Jalankan via Railway Shell |
| **Config files** (composer.json, dll) | ✅ **YA** | Push ke GitHub |

---

## Contoh Skenario

### Skenario 1: Update Kode Controller
```bash
# 1. Edit file app/Http/Controllers/DashboardController.php
# 2. Commit & push
git add .
git commit -m "Update dashboard controller"
git push
# 3. Railway otomatis deploy perubahan
```

### Skenario 2: Setup Environment Variables
```
# 1. Buka Railway Dashboard
# 2. Web Service → Variables
# 3. Tambahkan APP_KEY, DB_*, dll
# 4. Save
# 5. Aplikasi otomatis restart dengan config baru
# TIDAK perlu push ke GitHub!
```

### Skenario 3: Run Migration
```bash
# Via Railway Shell (tidak perlu push):
railway run php artisan migrate --force

# Atau via Railway Dashboard → Open Shell
php artisan migrate --force
```

---

## Tips Penting

1. **Environment Variables JANGAN di-commit ke GitHub**
   - File `.env` sudah di-ignore oleh `.gitignore`
   - Set variables langsung di Railway Dashboard

2. **Setelah Push ke GitHub:**
   - Railway otomatis detect perubahan
   - Build dan deploy otomatis berjalan
   - Monitor di Railway Dashboard → Deployments

3. **Setelah Set Environment Variables:**
   - Aplikasi otomatis restart
   - Tidak perlu push atau deploy ulang
   - Langsung efektif

4. **Untuk Testing:**
   - Test di local dulu sebelum push
   - Setelah push, monitor deploy di Railway
   - Check logs jika ada error

---

## Workflow Lengkap

### Setup Awal (Sekali Saja):
1. ✅ Push kode ke GitHub (sudah dilakukan)
2. ✅ Deploy ke Railway (sudah berhasil)
3. ⏭️ Setup MySQL di Railway
4. ⏭️ Set Environment Variables di Railway
5. ⏭️ Run Migration & Seeder via Railway Shell

### Update Kode (Setiap Ada Perubahan):
1. Edit kode di local
2. Test di local
3. Commit & push ke GitHub
4. Railway otomatis deploy
5. Monitor deploy di Railway Dashboard

### Update Config (Environment Variables):
1. Buka Railway Dashboard
2. Edit Variables
3. Save
4. Aplikasi restart otomatis

---

## Pertanyaan Lain?

Jika ada pertanyaan lain tentang deployment, check:
- `DEPLOYMENT.md` - Panduan lengkap deployment
- `SETUP_AFTER_DEPLOY.md` - Setup setelah deploy
- Railway Dashboard → Docs untuk dokumentasi Railway

