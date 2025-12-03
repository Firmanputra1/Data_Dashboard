# Cara Membuat MySQL Database di Railway

## 📍 Lokasi Menu "New" → "Database"

### Step-by-Step dengan Screenshot Lokasi:

**1. Buka Railway Dashboard**

-   Login ke https://railway.app
-   Pilih project **"datadashboard-production"** atau project Anda

**2. Di Halaman Project, Cari Tombol "New"**

Ada beberapa lokasi tombol "New":

#### **Opsi A: Di Sidebar Kiri (Paling Mudah)**

-   Di bagian **kiri atas** halaman project
-   Ada tombol besar berwarna **purple/ungu** dengan teks **"+ New"** atau **"New"**
-   Klik tombol tersebut
-   Akan muncul dropdown menu
-   Pilih **"Database"** → **"MySQL"**

#### **Opsi B: Di Tab "Services"**

-   Klik tab **"Services"** di bagian atas
-   Di bagian kanan atas, ada tombol **"+ New"** atau **"New"**
-   Klik tombol tersebut
-   Pilih **"Database"** → **"MySQL"**

#### **Opsi C: Di Empty State (Jika Belum Ada Service)**

-   Jika project masih kosong, akan ada tombol besar di tengah
-   Tombol **"+ New Service"** atau **"Add Service"**
-   Klik tombol tersebut
-   Pilih **"Database"** → **"MySQL"**

---

## 🎯 Langkah Detail dengan Gambar:

### **Langkah 1: Buka Project**

```
Railway Dashboard
  └── Projects
      └── datadashboard-production (klik ini)
```

### **Langkah 2: Cari Tombol "New"**

```
┌─────────────────────────────────────┐
│  [Railway Logo]  Project Name      │
│                                     │
│  ┌─────────┐  ┌─────────┐          │
│  │ Services│  │ Variables│          │
│  └─────────┘  └─────────┘          │
│                                     │
│  [+ New]  ← Klik tombol ini!       │
│     │                               │
│     ├── Service                     │
│     ├── Database  ← Pilih ini!     │
│     │     ├── MySQL  ← Klik ini!   │
│     │     ├── PostgreSQL            │
│     │     └── MongoDB                │
│     └── ...                          │
└─────────────────────────────────────┘
```

---

## 📝 Langkah-Langkah Detail:

### **Metode 1: Via Sidebar (Paling Mudah)**

1. **Buka Railway Dashboard**

    - Login ke https://railway.app
    - Pilih project Anda

2. **Cari Tombol "+ New"**

    - Di bagian **kiri atas** atau **kanan atas** halaman
    - Tombol berwarna **purple/ungu**
    - Teks: **"+ New"** atau **"New"** atau **"Add Service"**

3. **Klik Tombol "+ New"**

    - Akan muncul dropdown menu

4. **Pilih "Database"**

    - Di dropdown menu, cari opsi **"Database"**
    - Hover atau klik **"Database"**

5. **Pilih "MySQL"**

    - Setelah klik "Database", akan muncul submenu
    - Pilih **"MySQL"**

6. **Tunggu MySQL Service Dibuat**
    - Railway akan otomatis membuat MySQL service
    - Tunggu beberapa detik sampai selesai
    - Akan muncul card/service baru dengan nama "MySQL"

---

### **Metode 2: Via Services Tab**

1. **Klik Tab "Services"**

    - Di bagian atas halaman project
    - Tab **"Services"** (biasanya di sebelah "Variables", "Deployments", dll)

2. **Cari Tombol "+ New"**

    - Di bagian **kanan atas** tab Services
    - Tombol **"+ New"** atau **"Add Service"**

3. **Pilih "Database" → "MySQL"**
    - Sama seperti Metode 1

---

## 🎨 Tampilan yang Mungkin Anda Lihat:

### **Jika Project Masih Kosong:**

```
┌─────────────────────────────────────┐
│                                     │
│         [Railway Logo]              │
│                                     │
│    No services yet                  │
│                                     │
│    [+ New Service]  ← Klik ini!    │
│                                     │
└─────────────────────────────────────┘
```

### **Jika Sudah Ada Service:**

```
┌─────────────────────────────────────┐
│  [+ New]  ← Di sini!                │
│                                     │
│  ┌──────────────┐                   │
│  │ Web Service  │                   │
│  │ (Running)    │                   │
│  └──────────────┘                   │
│                                     │
│  (Setelah klik New → Database)     │
│  ┌──────────────┐                   │
│  │ MySQL        │  ← Akan muncul    │
│  │ (Running)    │     setelah ini   │
│  └──────────────┘                   │
└─────────────────────────────────────┘
```

---

## ✅ Setelah MySQL Dibuat:

1. **MySQL Service Akan Muncul**

    - Akan ada card/service baru dengan nama "MySQL"
    - Status: "Running" atau "Active"

2. **MySQL Auto-Link ke Web Service**

    - Railway biasanya otomatis link MySQL ke Web service
    - Check di Web Service → Variables, akan muncul `${{MySQL.*}}`

3. **Catat Database Info**
    - Klik pada MySQL service
    - Tab "Variables" atau "Connect"
    - Lihat credentials (atau gunakan reference `${{MySQL.*}}`)

---

## 🆘 Jika Tidak Menemukan Tombol "New":

### **Kemungkinan Masalah:**

1. **Anda di Halaman yang Salah**

    - Pastikan Anda di halaman **Project**, bukan halaman utama
    - URL seharusnya: `railway.app/project/xxxxx`

2. **Tidak Ada Permission**

    - Pastikan Anda adalah owner/admin project
    - Check role Anda di project settings

3. **UI Berbeda (Mobile/Tablet)**

    - Di mobile, tombol mungkin di menu hamburger (☰)
    - Cari icon **"+"** atau **"Add"**

4. **Browser Issue**
    - Coba refresh halaman (F5)
    - Coba browser lain
    - Clear cache

---

## 📸 Visual Guide:

### **Lokasi Tombol "New" di Railway Dashboard:**

```
┌─────────────────────────────────────────────┐
│  Railway Logo    Project: datadashboard    │
│                                              │
│  [+ New]  ← DI SINI! (Kiri atas/Kanan atas) │
│                                              │
│  ┌─────────────┐  ┌─────────────┐          │
│  │ Services    │  │ Variables   │          │
│  └─────────────┘  └─────────────┘          │
│                                              │
│  ┌──────────────────────────────────────┐   │
│  │  Web Service                         │   │
│  │  datadashboard-production-68f6        │   │
│  │  Status: Active                      │   │
│  └──────────────────────────────────────┘   │
│                                              │
└─────────────────────────────────────────────┘
```

---

## 🎯 Quick Steps (Ringkas):

1. **Railway Dashboard** → Pilih **Project**
2. **Cari tombol "+ New"** (kiri atas atau kanan atas)
3. **Klik "+ New"** → Pilih **"Database"**
4. **Pilih "MySQL"**
5. **Tunggu** sampai MySQL service dibuat
6. **Selesai!** MySQL akan muncul sebagai service baru

---

## 💡 Tips:

-   **Tombol "+ New"** biasanya berwarna **purple/ungu** dan cukup besar
-   Jika tidak terlihat, coba scroll ke atas halaman
-   Di mobile, cari icon **"+"** di menu
-   Setelah MySQL dibuat, akan muncul card baru di halaman project

---

## ✅ Checklist:

-   [ ] Sudah login ke Railway Dashboard
-   [ ] Sudah membuka project yang benar
-   [ ] Sudah menemukan tombol "+ New"
-   [ ] Sudah klik "Database" → "MySQL"
-   [ ] MySQL service sudah dibuat
-   [ ] MySQL service status: "Running" atau "Active"

---

Jika masih tidak menemukan, coba:

1. Screenshot halaman Railway Dashboard Anda
2. Atau jelaskan apa yang Anda lihat di halaman
3. Saya akan bantu cari lokasinya!
