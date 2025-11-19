Workflow Aplikasi CaffeCoffe
Berdasarkan folder Laravel ini lanjutkan project saya dengan workflow ini, workflow untuk CaffeCoffe berbasis web dari project ini :

1. Dashboard Awal, Tampilan Menu Caffe
Kemudian ada tombol Login dan berpindah ke form login

2. Diagram Alur Proses

Customer -> Kasir: Memesan makanan/minuman
Kasir -> Sistem: Input pesanan (status: ordered)
Sistem -> Chef: Notifikasi pesanan baru
Chef -> Sistem: Menyiapkan pesanan
Chef/Kasir -> Sistem: Ubah status menjadi done
Kasir -> Customer: Serahkan pesanan
Customer -> Kasir: Bayar setelah selesai
Kasir -> Sistem: Proses pembayaran (status: paid)
Sistem -> Kasir: Cetak struk pembayaran
Manager -> Sistem: Lihat laporan penjualan & keuangan
Manager -> Sistem: Cetak laporan PDF
Admin -> Sistem: Kelola data master

3. Roles dan Permissions

Admin
Mengelola kategori menu

Mengelola menu (makanan, minuman, Cake) beserta gambar

Mengelola user (tambah, edit, hapus)

Melihat log aktivitas user

Kasir
Mencatat pesanan baru (status: ordered)

Mengubah status pesanan menjadi done

Memproses pembayaran (status: paid)

Mencetak struk pembayaran

Manager
Melihat laporan penjualan

Melihat laporan keuangan

Mencetak laporan dalam format PDF

Chef (khusus backend)
Melihat daftar pesanan yang perlu disiapkan

Mengupdate status penyiapan pesanan

4. Struktur Database
Tables:
users (id, name, email, password, role, created_at, updated_at)

categories (id, name, type, description, created_at, updated_at)

menus (id, category_id, name, description, price, image, is_available, created_at, updated_at)

orders (id, order_number, customer_name, table_number, status, total_amount, paid_amount, payment_method, created_at, updated_at)

order_items (id, order_id, menu_id, quantity, price, subtotal, notes)

payments (id, order_id, amount, payment_method, payment_date, created_at, updated_at)

activity_logs (id, user_id, activity, created_at, updated_at)

5. Fitur Utama
Authentication & Authorization
Login berdasarkan role

Middleware untuk membatasi akses berdasarkan role

Admin Panel
CRUD Kategori

CRUD Menu (dengan upload gambar)

Manajemen User

View Activity Log

Kasir Interface
Input pesanan baru

Daftar pesanan dengan filter status

Update status pesanan

Proses pembayaran

Cetak struk

Manager Dashboard
Statistik penjualan (harian, mingguan, bulanan)

Laporan keuangan

Ekspor laporan ke PDF

6. Teknologi yang Digunakan

MySQL Database

Bootstrap untuk UI

DomPDF untuk generate PDF

Intervention Image untuk processing gambar

7. Rencana Implementasi
Implementasi authentication dengan roles

Buat middleware untuk admin, kasir, dan manager

Phase 2: Admin Features

CRUD Categories

CRUD Menu dengan upload gambar

User Management

Activity Log

Phase 3: Kasir Features
Order management

Payment processing

Receipt printing

Phase 4: Manager Features
Sales reports

Financial reports

PDF export
