---
prd: "Aplikasi POS (Point of Sale) — Sistem Penjualan, Inventori, Akuntansi, dan Laporan"
task_count: 11
---
## T1. Setup project dan schema database

### Deskripsi
Inisialisasi Nuxt frontend, backend Golang (net/http + Gin), koneksi PostgreSQL, dan migrasi seluruh tabel (users, cash_sessions, products, product_categories, sales, sale_lines, movements, journals, journal_entries, accounts).

### Acceptance Criteria
- [ ] pnpm dev berjalan tanpa error; migrate.go menjalankan CREATE TABLE untuk semua entitas dengan FK dan constraint stock >= 0; schema migration bisa dijalankan ulang idempoten tanpa duplikat.

## T2. Modul Auth — registrasi/login user dengan JWT

### Deskripsi
Implementasi registrasi owner/kasir, login, sign & verify JWT, middleware role-based (owner akses semua modul, kasir hanya penjualan & stok).

### Acceptance Criteria
- [ ] POST /api/v1/auth/register dan /login mengembalikan JWT valid; middleware memblokir akses ke route protected tanpa token; owner bisa akses /journals dan /reports, kasir tidak.

## T3. Modul Product — CRUD master produk, kategori, stok

### Deskripsi
CRUD produk (SKU, nama, kategori, harga beli, harga jual, stok, threshold, gambar), kategori parent-child, dan endpoint update harga yang memicu selisih harga.

### Acceptance Criteria
- [ ] GET /api/v1/products?category=&minStock=&q= mengembalikan produk dengan field lowStock; POST produk validasi server-side; PUT /products/:id menyimpan oldPrice dan menghitung selisih laba rugi.

## T4. Modul Cash Session — sesi kasir per perangkat

### Deskripsi
Buat dan kelola sesi kasir per device (id, user_id, name, device, is_active), grup transaksi ke cash session.

### Acceptance Criteria
- [ ] POST /api/v1/sessions membuat sesi aktif; hanya satu sesi aktif per user; transaksi sale_lines ter-index ke cash_session_id.

## T5. Modul Sales — input kasir, kalkulasi, validasi stok, simpan transaksi

### Deskripsi
Input produk, tambah jumlah, ubah harga/discount per baris, subtotal otomatis, pajak, grand total, validasi stok per baris dengan rollback, simpan sale + sale_lines + journal + movements type=out dalam satu transaction ACID.

### Acceptance Criteria
- [ ] POST /api/v1/sales menyimpan transaksi all-or-nothing; stok tidak boleh negatif (constraint); jika gagal rollback; grand total = sum line_total + tax_amount; journal_id terhubung ke jurnal.

## T6. Modul Payment & Receipt — metode bayar, kembalian, cetak struk

### Deskripsi
Pilih metode pembayaran (cash/card/credit), hitung kembalian, cetak struk ke thermal/printer, batalkan transaksi (rollback stok).

### Acceptance Criteria
- [ ] POST /api/v1/sales/:id/print menghasilkan receiptNumber dan url PDF; POST /api/v1/sales dengan changeAmount menghitung kembalian; DELETE /api/v1/sales/:id membatalkan dan mengembalikan stok.

## T7. Modul Accounting — generate jurnal otomatis dari transaksi

### Deskripsi
Generate journal + journal_entries (debit Kas/piutang, kredit penjualan + HPP + laba) dari penjualan dan jurnal pembelian (debit barang, kredit kas).

### Acceptance Criteria
- [ ] Penjualan Rp1.000.000 dengan HPP Rp600.000 menghasilkan dua entri jurnal; total debit = total kredit (constraint); GET /api/v1/journals?cashSessionId=&dateFrom=&dateTo= memfilter per periode.

## T8. Modul Inventory — mutasi stok, laporan, peringatan restock

### Deskripsi
Mutasi stok (in/out/write-off), laporan gerakan stok (turun, barang masuk, opname/rusak), peringatan restock saat stok di bawah threshold.

### Acceptance Criteria
- [ ] POST /api/v1/movements menghitung stockAfter; GET /api/v1/reports/inventory?period=year menampilkan stockIn/stockOut/writeOff; keranjang menampilkan peringatan restock sebelum konfirmasi.

## T9. Modul Reports — laporan penjualan dan stok per periode

### Deskripsi
Laporan penjualan per hari/bulan/tahun (total omzet, laba, per kasir, per produk) dan laporan stok via JOIN sales→sale_lines→products dengan GROUP BY + indeks.

### Acceptance Criteria
- [ ] GET /api/v1/reports/sales?period=month&cashSessionId=&productId= menampilkan totalSales/totalProfit/byCashSession/byProduct; laporan per bulan memuat < 2 detik.

## T10. Laporan Laba Rugi — income statement per periode

### Deskripsi
Income statement (revenue, COGS, grossProfit, expenses, netProfit) per periode dari jurnal penjualan dan pembelian.

### Acceptance Criteria
- [ ] GET /api/v1/income-statement?dateFrom=&dateTo= menghitung netProfit; tanpa transaksi mengembalikan nilai kosong tanpa error.

## T11. Testing end-to-end, backup, dan deployment

### Deskripsi
Test transaksi all-or-nothing (stok tidak negatif, arus kas konsisten), backup PostgreSQL harian (cron pg_dump), dan Docker Compose (frontend + backend + postgres).

### Acceptance Criteria
- [ ] Test suite memverifikasi rollback pada stok tidak cukup; cron dump berjalan; docker-compose拉起 semua service tanpa error.
