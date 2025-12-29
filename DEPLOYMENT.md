# 🚀 Panduan Deploy BmsTrip ke Railway.app (GRATIS)

Railway.app adalah platform hosting gratis terbaik untuk Laravel dengan MySQL. Gratis $5/bulan (500 jam server).

## 📋 Persiapan Sebelum Deploy

### 1. Pastikan Semua File Sudah Siap
File-file berikut sudah dibuat otomatis:
- ✅ `Procfile` - Konfigurasi untuk menjalankan server
- ✅ `nixpacks.toml` - Konfigurasi build Railway
- ✅ `.railway-ignore` - File yang diabaikan saat deploy

### 2. Push ke GitHub

```bash
# Inisialisasi Git (jika belum)
git init

# Add semua file
git add .

# Commit
git commit -m "Prepare for Railway deployment"

# Buat repository baru di GitHub (buka github.com)
# Kemudian link repository
git remote add origin https://github.com/USERNAME/REPO-NAME.git

# Push ke GitHub
git branch -M main
git push -u origin main
```

## 🚂 Deploy ke Railway.app

### Langkah 1: Buat Akun Railway
1. Buka **https://railway.app**
2. Klik **"Login"** atau **"Start a New Project"**
3. Login dengan **GitHub account** Anda
4. Authorize Railway untuk akses GitHub

### Langkah 2: Deploy dari GitHub
1. Di dashboard Railway, klik **"New Project"**
2. Pilih **"Deploy from GitHub repo"**
3. Pilih repository **bmstrip** Anda
4. Klik **"Deploy Now"**
5. Railway akan otomatis:
   - Install dependencies (composer, npm)
   - Build assets (Vite)
   - Deploy aplikasi

### Langkah 3: Tambahkan MySQL Database
1. Di project Railway, klik **"+ New"**
2. Pilih **"Database"** → **"Add MySQL"**
3. Railway akan otomatis membuat database MySQL
4. Database credentials akan otomatis tersedia

### Langkah 4: Setup Environment Variables
1. Klik service Laravel Anda (bukan database)
2. Buka tab **"Variables"**
3. Tambahkan environment variables berikut:

**Klik "Add Variable" dan masukkan:**

```env
APP_NAME=BmsTrip
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.railway.app

# Laravel akan otomatis generate APP_KEY saat deploy
# Tapi jika perlu, generate dengan: php artisan key:generate --show
APP_KEY=base64:XXXXX

DB_CONNECTION=mysql
# Database credentials akan otomatis diisi dari MySQL service
# Railway akan inject: MYSQL_HOST, MYSQL_PORT, MYSQL_DATABASE, dll
# Tapi kita perlu mapping manual:

LOG_CHANNEL=stack
LOG_LEVEL=error

SESSION_DRIVER=file
SESSION_LIFETIME=120

CACHE_DRIVER=file
QUEUE_CONNECTION=database
```

**PENTING:** Untuk database, Railway punya variabel khusus:
1. Scroll ke bawah sampai bagian **"Service Variables"**
2. Anda akan melihat `MYSQL_*` variables dari database service
3. Klik **"+ Reference"** untuk setiap variable database:
   - `DB_HOST` → reference `MYSQL_HOST`
   - `DB_PORT` → reference `MYSQL_PORT` 
   - `DB_DATABASE` → reference `MYSQL_DATABASE`
   - `DB_USERNAME` → reference `MYSQL_USER`
   - `DB_PASSWORD` → reference `MYSQL_PASSWORD`

### Langkah 5: Generate APP_KEY
1. Di tab **"Variables"**, klik **"+ Variable"**
2. Jalankan command di terminal lokal:
   ```bash
   php artisan key:generate --show
   ```
3. Copy output (contoh: `base64:abcd1234...`)
4. Tambahkan variable:
   - Name: `APP_KEY`
   - Value: `base64:abcd1234...` (hasil dari command tadi)

### Langkah 6: Run Migrations
1. Buka tab **"Settings"** di service Laravel
2. Scroll ke **"Deploy"**
3. Di bagian **"Custom Start Command"**, kosongkan (biarkan default)
4. Untuk run migration, kita perlu deploy dulu, lalu:
   
**Opsi A - Via Railway CLI (Recommended):**
```bash
# Install Railway CLI
npm i -g @railway/cli

# Login
railway login

# Link project
railway link

# Run migration
railway run php artisan migrate --force
railway run php artisan db:seed --force --class=DemoSeeder
```

**Opsi B - Via Deployment Command:**
1. Di service Laravel → **Settings** → **Deploy**
2. Tambahkan **"Build Command"** (di nixpacks.toml sudah ada)
3. Setelah deploy berhasil, akses via Railway CLI untuk run migration

### Langkah 7: Setup Custom Domain (Opsional)
1. Railway memberikan domain gratis: `your-app.railway.app`
2. Untuk custom domain:
   - Buka tab **"Settings"**
   - Scroll ke **"Domains"**
   - Klik **"Generate Domain"** untuk domain Railway gratis
   - Atau **"Custom Domain"** jika punya domain sendiri

### Langkah 8: Fix File Upload (Public Storage)
Karena Railway adalah ephemeral storage, file upload akan hilang setiap redeploy.

**Solusi - Gunakan Cloud Storage:**
1. **Cloudinary (Gratis):**
   ```bash
   composer require cloudinary-labs/cloudinary-laravel
   ```
   
2. **ImgBB (Gratis):**
   - Upload via API
   - Simpan URL di database

3. **Atau tetap simpan URL gambar dari internet** (seperti sekarang)

## 🔧 Update Kode untuk Production

### Update config/filesystems.php (jika pakai cloud storage):
```php
// Tambahkan disk cloudinary atau storage lain
```

### Update AdminController untuk Production:
Kode sudah support URL internet, jadi aman untuk production.

## 📊 Monitor Aplikasi

1. **Logs:** Tab **"Deployments"** → Klik deployment → **"View Logs"**
2. **Metrics:** Tab **"Metrics"** untuk CPU, Memory, Network
3. **Database:** Klik MySQL service untuk melihat connection info

## 🆘 Troubleshooting

### Error: "Address already in use"
- Railway sudah handle port otomatis via `$PORT` environment variable
- Procfile sudah benar: `--port=$PORT`

### Error: "No application encryption key"
- Generate APP_KEY seperti langkah 5 di atas

### Error: Database connection failed
- Pastikan database variables sudah di-reference dengan benar
- Check MySQL service status (harus running/green)

### Error: 500 Internal Server Error
- Check logs: `railway logs`
- Set `APP_DEBUG=true` sementara untuk lihat error
- Jangan lupa set kembali ke `false` setelah selesai

### Assets tidak load (CSS/JS)
- Pastikan `npm run build` sudah jalan di nixpacks.toml
- Check APP_URL sudah benar
- Pastikan folder `public/build` ter-generate

### File upload hilang setelah redeploy
- Normal behavior di Railway (ephemeral storage)
- Gunakan cloud storage (Cloudinary/ImgBB) untuk file persistent

## 💰 Biaya & Limits (Free Tier)

- ✅ $5 credit/bulan (~500 jam server = 20+ hari 24/7)
- ✅ MySQL database gratis
- ✅ Bandwidth: 100GB/bulan
- ✅ Custom domain support
- ✅ SSL/HTTPS otomatis
- ⚠️  File storage ephemeral (hilang saat redeploy)

## 🎉 Selesai!

Website Anda sekarang live di:
```
https://your-project-name.railway.app
```

Akses admin:
```
https://your-project-name.railway.app/login
```

---

## 📝 Catatan Penting

1. **Jangan commit `.env`** - Railway akan inject environment variables
2. **Database backup** - Railway tidak auto backup, backup manual via:
   ```bash
   railway run php artisan db:backup
   ```
3. **Monitor usage** - Check dashboard Railway untuk monitor credit usage
4. **Update code** - Push ke GitHub, Railway auto-deploy

## 🔄 Update Aplikasi

Setiap kali ada perubahan:
```bash
git add .
git commit -m "Update feature"
git push origin main
```

Railway akan otomatis detect dan redeploy! 🚀

---

**Alternatif Hosting Gratis Lainnya:**
- **Fly.io** - Gratis 3 VM, lebih kompleks setup
- **Render** - Gratis tapi cold start lambat
- **InfinityFree** - Shared hosting tradisional, upload via FTP
- **000webhost** - Shared hosting, ada ads

Railway adalah pilihan terbaik untuk Laravel! 👍
