# BmsTrip - Platform Wisata Banyumas

Platform website untuk menampilkan dan mengelola informasi destinasi wisata di Banyumas dengan sistem review dari pengguna.

## ✨ Fitur Utama

### 🌍 Public Features
- **Homepage**: Tampilan wisata terbaru dengan search dan filter kategori
- **Detail Wisata**: Informasi lengkap destinasi dengan gambar, lokasi, harga, dan rating
- **Review System**: Pengguna dapat memberikan rating dan komentar
- **Search & Filter**: Pencarian berdasarkan nama, lokasi, atau kategori

### 👨‍💼 Admin Features
- **Dashboard Admin**: Manajemen wisata, kategori, dan user
- **CRUD Wisata**: Tambah, edit, hapus destinasi wisata
- **CRUD Kategori**: Manajemen kategori wisata
- **User Management**: Kelola pengguna dan role (admin/user)
- **Upload Gambar**: Dukungan upload gambar lokal atau URL eksternal

### 🔐 Authentication
- Login & Register
- Role-based access (Admin & User)
- Protected routes dengan middleware

## 🛠️ Tech Stack

- **Framework**: Laravel 12.x
- **Frontend**: Blade Templates + Tailwind CSS + Vite
- **Database**: MySQL / SQLite
- **Authentication**: Laravel built-in
- **File Upload**: Local storage + URL support

## 📦 Instalasi

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL (atau SQLite)

### Setup Lokal

```bash
# Clone repository
git clone <repository-url>
cd bmstrip

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
# Edit .env untuk database credentials
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bmstrip
DB_USERNAME=root
DB_PASSWORD=

# Run migrations dan seeder
php artisan migrate --seed

# Build assets
npm run build

# Run development server
php artisan serve
```

Website akan berjalan di: http://127.0.0.1:8000

### Default Admin Account
```
Email: admin@bmstrip.com
Password: admin123
```

## 📁 Struktur Project

```
bmstrip/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php      # Admin CRUD operations
│   │   │   ├── HomeController.php       # Homepage controller
│   │   │   ├── ReviewController.php     # Review management
│   │   │   └── WisataController.php     # Public wisata display
│   │   └── Middleware/
│   │       └── IsAdmin.php              # Admin authorization
│   └── Models/
│       ├── Category.php
│       ├── Review.php
│       ├── User.php
│       └── Wisata.php
├── database/
│   ├── migrations/                      # Database schema
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── DemoSeeder.php               # Demo data
├── resources/
│   ├── views/
│   │   ├── admin/                       # Admin panel views
│   │   ├── auth/                        # Login/Register
│   │   ├── layouts/                     # Base templates
│   │   └── wisata/                      # Wisata pages
│   ├── css/
│   └── js/
├── routes/
│   └── web.php                          # Route definitions
└── public/
    └── uploads/                         # User uploaded images
```

## 🎨 Fitur Unggulan

### Responsive Design
- Mobile-first approach
- Optimized untuk semua ukuran layar
- Modern glassmorphism UI

### Image Handling
- Dukungan upload gambar lokal
- Dukungan URL gambar eksternal
- Fallback ke gambar default jika tidak ada

### Search & Filter
- Real-time search
- Filter by category
- Pagination support

### Review System
- Rating 1-5 bintang
- Komentar teks
- Average rating calculation
- User authentication required

## 🚀 Deployment

Lihat file [DEPLOYMENT.md](DEPLOYMENT.md) untuk panduan lengkap deploy ke Railway.app (hosting gratis).

### Quick Deploy ke Railway
```bash
# Install Railway CLI
npm i -g @railway/cli

# Login dan link project
railway login
railway link

# Run migrations
railway run php artisan migrate --force
railway run php artisan db:seed --force --class=DemoSeeder
```

## 🧪 Development

### Code Style
Project menggunakan Laravel Pint untuk formatting:
```bash
composer pint
```

### Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

## 📝 API Routes

### Public Routes
- `GET /` - Homepage
- `GET /wisata` - List all wisata
- `GET /wisatas/{slug}` - Wisata detail
- `GET /tentang` - About page
- `GET /login` - Login page
- `POST /login` - Login action
- `GET /register` - Register page
- `POST /register` - Register action

### Protected Routes (Auth)
- `POST /wisatas/{wisata}/reviews` - Submit review
- `POST /logout` - Logout

### Admin Routes (Auth + IsAdmin)
- `GET /admin/wisatas` - Manage wisata
- `GET /admin/wisatas/create` - Create wisata form
- `POST /admin/wisatas` - Store wisata
- `GET /admin/wisatas/{wisata}/edit` - Edit wisata form
- `PUT /admin/wisatas/{wisata}` - Update wisata
- `DELETE /admin/wisatas/{wisata}` - Delete wisata
- `GET /admin/categories` - Manage categories
- `GET /admin/users` - Manage users

## 🤝 Contributing

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

MIT License - feel free to use this project for learning or production.

## 👨‍💻 Developer

Developed with ❤️ for Banyumas Tourism

---

**Happy Coding! 🚀**
