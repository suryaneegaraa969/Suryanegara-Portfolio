# Railway Deployment Guide for Laravel Portfolio

## Prerequisites
- GitHub repository with this project
- Railway account (railway.app)
- MySQL database (will be provisioned on Railway)

---

## 1. Push to GitHub (jika belum)

```bash
cd D:\Project\Suryanegara-Porto
git init
git add .
git commit -m "Initial commit: Laravel 12 portfolio"
git branch -M main
git remote add origin https://github.com/USERNAME/suryanegara-porto.git
git push -u origin main
```

---

## 2. Setup Project di Railway

1. Buka https://railway.app → **New Project** → **Deploy from GitHub repo**
2. Pilih repo `suryanegara-porto`
3. Railway akan auto-detect Laravel (via nixpacks.toml / Procfile)

---

## 3. Provision MySQL Database

1. Di project Railway → **New Service** → **Database** → **MySQL**
2. Railway akan provide environment variables otomatis:
   - `MYSQL_URL` atau `DATABASE_URL`
   - Atau variable terpisah: `MYSQLHOST`, `MYSQLPORT`, `MYSQLUSER`, `MYSQLPASSWORD`, `MYSQLDATABASE`

**Konfigurasi Laravel otomatis baca `DATABASE_URL`** (format: `mysql://user:pass@host:port/dbname`)

---

## 4. Environment Variables Checklist (Railway Dashboard → Variables)

| Variable | Value | Required |
|----------|-------|----------|
| `APP_KEY` | `php artisan key:generate --show` (jalankan lokal, copy hasilnya) | ✅ |
| `APP_ENV` | `production` | ✅ |
| `APP_DEBUG` | `false` | ✅ |
| `APP_URL` | `https://your-app.up.railway.app` (atau custom domain) | ✅ |
| `DB_CONNECTION` | `mysql` | ✅ |
| `DATABASE_URL` | *Auto dari Railway MySQL* | ✅ |
| `MAIL_MAILER` | `smtp` | ✅ |
| `MAIL_HOST` | `smtp.gmail.com` | ✅ |
| `MAIL_PORT` | `587` | ✅ |
| `MAIL_USERNAME` | `your-email@gmail.com` | ✅ |
| `MAIL_PASSWORD` | `Gmail App Password` (bukan password biasa) | ✅ |
| `MAIL_ENCRYPTION` | `tls` | ✅ |
| `MAIL_FROM_ADDRESS` | `your-email@gmail.com` | ✅ |
| `MAIL_FROM_NAME` | `"Ahmad Barroq Suryanegara"` | ✅ |
| `MAIL_RECEIVER_ADDRESS` | `ahmadbarroq123@gmail.com` | ✅ |
| `SESSION_DRIVER` | `database` | ✅ |
| `CACHE_STORE` | `database` | ✅ |
| `QUEUE_CONNECTION` | `database` | ✅ |

---

## 5. Migrate & Seed Database

**Opsi A: Via Railway Release Command (Procfile)**
Sudah dikonfigurasi di `Procfile`:
```
release: php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan storage:link
```

**Opsi B: Manual via Railway CLI**
```bash
railway login
railway link
railway run php artisan migrate --force
railway run php artisan config:cache
railway run php artisan route:cache
railway run php artisan view:cache
railway run php artisan storage:link
```

---

## 6. Storage & File Upload (Penting!)

**Masalah:** Railway filesystem **ephemeral** — file di `storage/app/public` & `public/storage` akan **hilang tiap deploy**.

**Solusi Rekomendasi:**

### Opsi 1: Railway Volume (Simpel, gratis untuk ukuran kecil)
1. Railway Dashboard → **New Service** → **Volume**
2. Mount path: `/data` (atau custom)
3. Symlink di release command:
   ```bash
   release: rm -rf storage/app/public && ln -s /data/storage storage/app/public && php artisan storage:link
   ```

### Opsi 2: S3-compatible Storage (Rekomendasi Production)
- AWS S3 / Cloudflare R2 / Wasabi / MinIO
- Update `config/filesystems.php` → disk `s3`
- Set env: `AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY`, `AWS_BUCKET`, `AWS_REGION`
- `FILESYSTEM_DISK=s3`

### Opsi 3: Database-only (untuk project kecil)
- Simpan file sebagai base64 di DB (tidak disarankan untuk gambar besar)

---

## 6. Custom Domain & SSL

1. Railway Dashboard → **Settings** → **Domains**
2. **Custom Domain** → masukkan domain (misal: `suryanegara.dev`)
3. Railway akan minta DNS records:
   - **CNAME** `@` → `your-app.up.railway.app`
   - Atau **A record** ke IP Railway (cek dashboard)
4. **SSL/HTTPS** → otomatis via Let's Encrypt (Railway handle)

---

## 7. Post-Deploy Verification

```bash
# Cek logs
railway logs

# Test endpoint
curl https://your-app.up.railway.app/
curl https://your-app.up.railway.app/admin/login
```

---

## 8. Troubleshooting Common Issues

| Issue | Solution |
|-------|----------|
| `APP_KEY` missing | Generate lokal: `php artisan key:generate --show` → set di Railway Variables |
| DB connection failed | Pastikan `DATABASE_URL` dari Railway MySQL tersedia di Variables |
| Assets 404 | Pastikan `npm run build` jalan di build phase, `public/build` tidak di-gitignore |
| Storage 404 | Setup Volume atau S3 (baca bagian 6) |
| 500 error | Cek `railway logs` → biasanya missing env vars |
| Migration failed | Cek `railway logs` → pastikan DB accessible, tabel belum exist |

---

## 9. Production Optimizations (Optional)

Add ke `release` command di Procfile:
```
release: php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan storage:link && php artisan optimize
```

---

## 9. Checklist Sebelum Go-Live

- [ ] GitHub repo connected
- [ ] MySQL service running
- [ ] All env variables set
- [ ] `APP_KEY` generated & set
- [ ] Migrations run successfully
- [ ] Storage volume/S3 configured
- [ ] Custom domain + SSL active
- [ ] Contact form test (email terkirim)
- [ ] Admin panel accessible
- [ ] Favicon & meta tags correct