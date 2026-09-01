# Aplikasi POS (Point of Sale) — Sistem Penjualan, Inventori, Akuntansi, dan Laporan

## Versi
- Versi: 1.0
- Tanggal: 2026-08-08
- Status: Draft

## Ringkasan / Overview
Aplikasi POS (Point of Sale) berbasis web yang menggabungkan empat modul inti: Penjualan (Point of Sale), Inventori (Inventory), Akuntansi (Accounting), dan Pelaporan (Reporting) — per hari, per bulan, per tahun. Sistem ini menggantikan alur kerja manual (kertas/Excel) di toko ritel dan warung, sehingga transaksi tercatat real-time, stok berkurang otomatis saat terjual, arus kas masuk/keluar tercatat di buku besar, dan pemilik bisa membaca laporan keuangan tanpa aplikasi tambahan. Nilai bisnis: pengurangan error manual input, eliminasi duplikasi data antar-modul, pengambilan keputusan berbasis data, dan peningkatan margin melalui kontrol stok yang presisi. Produk ini menargetkan UKM dan toko menengah yang sudah melewati batas Excel tapi belum mampu menanggung biaya ERP enterprise.

## Sasaran & Non-Sasaran
- Sasaran: Toko ritel, minimarket, warung makan, dan distributor skala kecil-menengah (1–50 kasir, transaksi 50–5.000 per hari) yang membutuhkan integrasi end-to-end penjualan–stok–keuangan dalam satu sistem.
- Non-Sasaran: Enterprise dengan ribuan SKU dan ribuan transaksi/hari (cukup ERP), e-commerce murni berbasis marketplace (tidak perlu manajemen stok fisik), dan bisnis jasa tanpa produk fisik (tidak ada inventori).

## Persona & Use Case
- Persona utama: Pemilik toko (owner) dan kasir (cashier). Owner butuh laporan keuangan dan stok; kasir butuh input transaksi cepat di layar sentuh dengan minimal klik.
- Use case inti:
  1. Kasir membuka kasir (cash session) per perangkat, memasukkan produk, menghitung subtotal/Pajak/Diskon, memilih metode bayar (tunai/kartu/kredit), mencetak struk (terminal).
  2. Stok otomatis berkurang; jika di bawah threshold muncul peringatan restock.
  3. Transaksi tersimpan ke jurnal penjualan; arus kas masuk tercatat otomatis di ledger.
  4. Owner membuka laporan penjualan per hari/bulan/tahun dan laporan stok (stok turun, barang rusak, barang masuk).

## Persyaratan Fungsional (Requirements)
1. FR-1: Modul Penjualan — Input dan proses transaksi kasir
   - Deskripsi detail: User membuka kasir (cash session), memilih produk dari katalog, menambah jumlah, mengubah harga/discount per baris, menghitung subtotal otomatis, menerapkan pajak dan grand total, memilih metode pembayaran, menyimpan transaksi, dan mencetak struk (cetak terminal/printer).
   - Acceptance criteria:
     - Given user membuka kasir X, When user menambah produk P dengan jumlah N dan menyimpan, Then subtotal, pajak, grand total, dan status transaksi tersimpan di database dengan relasi ke kasir X.
     - Given stok produk P di bawah threshold, When user memasukkan P ke keranjang, Then muncul peringatan restock dan konfirmasi stok cukup sebelum konfirmasi.
     - Given transaksi gagal (stok tidak cukup / pembayaran batal), When user menutup kasir, Then transaksi ditandai failed dan stok dikembalikan (rollback).

2. FR-2: Modul Inventori — Manajemen stok barang
   - Deskripsi detail: CRUD master produk (SKU, nama, kategori, harga beli, harga jual, stok, threshold, gambar), mutasi stok (stok turun saat terjual, stok masuk saat pembelian/pesan, stok opname/rusak), harga bisa diubah dengan pencatatan harga lama (histori harga).
   - Acceptance criteria:
     - Given produk P dengan stok awal S, When terjadi penjualan N di transaksi T, Then stok P berkurang N dan mutasi tercatat di jurnal.
     - Given harga jual diubah dari H1 ke H2, When produk terjual sebelum perubahan, Then selisih harga tercatat sebagai selisih laba rugi.

3. FR-3: Modul Akuntansi — Buku besar dan arus kas
   - Deskripsi detail: Setiap transaksi penjualan menghasilkan entri jurnal (debit kas/piutang, kredit penjualan + HPP + laba). Pembelian barang menghasilkan jurnal (debit barang, kredit kas). Tersedia laporan laba rugi (income statement) per periode.
   - Acceptance criteria:
     - Given penjualan senilai Rp1.000.000 dengan HPP Rp600.000, When transaksi disimpan, Then dua entri jurnal terbentuk (penjualan Rp1.000.000 dan HPP Rp600.000) yang dapat di-query per periode.
     - Given tidak ada transaksi, When user membuka laporan laba rugi, Then muncul pesan kosong tanpa error.

4. FR-4: Modul Pelaporan — Laporan penjualan dan stok per periode
   - Deskripsi detail: Laporan penjualan per hari, per bulan, per tahun (total omzet, laba, per kasir, per produk). Laporan stok: stok turun (gerakan keluar), barang masuk (pembelian), stok opname/rusak, dan laporan laba rugi per periode.
   - Acceptance criteria:
     - Given filter periode dipilih, When user membuka laporan penjualan per bulan, Then sistem menampilkan total omzet, laba, dan per-rincian per kasir dan produk untuk bulan tersebut.

## Persyaratan Non-Fungsional
- Performa: Halaman kasir merespons < 300ms untuk katalog < 5.000 produk; laporan per bulan memuat < 2 detik untuk data agregat (query menggunakan GROUP BY + indeks).
- Keamanan: Otentikasi user (owner/kasir) dengan JWT, role-based access (owner bisa akses laporan & akuntansi, kasir hanya penjualan & stok). Enkripsi password (bcrypt), validasi input server-side, proteksi dari double-submit transaksi.
- Skalabilitas: Arsitektur backend modular (microservice-per-modul opsional) dengan API Gateway; database relational (PostgreSQL) untuk integritas data transaksi.
- Ketersediaan & Data Integrity: Transaksi penjualan harus all-or-nothing (ACID) — stok tidak boleh negatif dan arus kas tidak boleh inkonsisten.
- Kompatibilitas: Frontend responsif di desktop dan tablet (POS mobile-friendly); backend berjalan di VPS Linux manual.
- Backup: Dump database harian (cron) untuk keamanan data.

## Arsitektur & Struktur Teknis (Wajib Detail)
Bagian ini dijabarkan dengan sangat detail berdasarkan fitur yang dibangun. Stack: Frontend Nuxt.js (SSR/Vite), Backend Golang (net/http + Gin), Database PostgreSQL, Server VPS manual (Ubuntu Linux).

### 1. Frontend
- **Struktur Folder & File:** Feature-driven architecture. Nama file spesifik yang dibangun:
  - `app/pages/sales/index.vue` (list kasir), `app/pages/sales/new.vue` (form kasir), `app/pages/sales/print.vue` (cetak struk).
  - `app/pages/inventory/index.vue` (master produk), `app/pages/inventory/movement.vue` (mutasi stok), `app/pages/inventory/opname.vue` (stock opname).
  - `app/pages/accounting/index.vue` (jurnal), `app/pages/accounting/income-statement.vue` (laba rugi).
  - `app/pages/reports/sales.vue` (laporan penjualan), `app/pages/reports/inventory.vue` (laporan stok).
  - `app/components/cart/pos-cart.vue`, `app/components/product/product-card.vue`, `app/components/dashboard/sales-summary.vue`.
  - `app/composables/useSales.ts`, `app/composables/useInventory.ts`, `app/composables/useAccounting.ts`, `app/composables/useReport.ts`.
  - `app/lib/api.ts` (axios client ke backend), `app/types/index.ts` (shared types).
- **Saran Library/Package:**
  - `nuxt`: SSR + routing + auto-import. Alasan: framework utama yang diminta.
  - `vue`: komponen reaktif (terintegrasi di Nuxt).
  - `pinia`: state management global (cash session, produk di keranjang).
  - `vue-router`: navigasi antar-modul.
  - `axios`: komunikasi HTTP ke backend Golang.
  - `@vue/apollo` / `vue-query` (TanStack Query): caching data + refetch otomatis untuk laporan.
  - `lucide-vue` / `heroicons`: ikon konsisten.
  - `tailwindcss` (via `@tailwindcss/vite`): styling utility-first, responsif.
  - `vue-chartjs` (opsional): grafik omzet per periode di laporan.
  - `day.js`: format dan filter tanggal (per hari/bulan/tahun).

### 2. Backend
- **Struktur Folder & File:** Modular backend Golang. Struktur:
  - `cmd/server/main.go` (entrypoint, init DB, register routes).
  - `internal/config/config.go` (env: DATABASE_URL, JWT_SECRET, PORT).
  - `internal/config/config_test.go` (validasi config).
  - `internal/database/database.go` (pgxpool connection + migrations).
  - `internal/database/migrate/migrate.go` (migrasi schema).
  - `internal/auth/auth.go` (JWT sign/verify, middleware).
  - `internal/models/models.go` (structs: CashSession, Product, Movement, Sale, JournalEntry, Account).
  - `internal/repositories/` (repository per entitas: `product_repository.go`, `sale_repository.go`, `journal_repository.go`, `report_repository.go`).
  - `internal/services/` (service per entitas: `sale_service.go`, `inventory_service.go`, `accounting_service.go`, `report_service.go`).
  - `internal/handlers/` (HTTP handler/controller: `sale_handler.go`, `inventory_handler.go`, `accounting_handler.go`, `report_handler.go`).
  - `internal/router/router.go` (router Gin, register routes + middleware).
  - `internal/errors/errors.go` (error envelope).
  - `internal/logging/logging.go` (logrus).
  - `go.mod`, `go.sum`.
- **Endpoint Contract:**

**A. Penjualan**
- `POST /api/v1/sessions`
  - Request: `{ "name": "Kasir 1", "role": "cashier" }`
  - Response: `{ "id": 1, "name": "Kasir 1", "role": "cashier", "createdAt": "2026-08-08T10:00:00Z" }`
- `POST /api/v1/sales`
  - Request:
    ```json
    {
      "sessionId": 1,
      "lines": [
        { "productId": 10, "quantity": 2, "price": 50000, "discount": 10 },
        { "productId": 11, "quantity": 1, "price": 100000, "discount": 0 }
      ],
      "taxRate": 11,
      "paymentMethod": "cash",
      "changeAmount": 0
    }
    ```
  - Response: `{ "id": 1001, "sessionId": 1, "grandTotal": 111000, "status": "completed", "createdAt": "2026-08-08T10:05:00Z", "journalId": 5001 }`
- `POST /api/v1/sales/{id}/print`
  - Request: `{ "printer": "thermal-01" }`
  - Response: `{ "receiptNumber": "RCP-1001", "url": "receipts/1001.pdf", "status": "printed" }`
- `DELETE /api/v1/sales/{id}` — batalkan transaksi (rollback stok). Response: `{ "status": "cancelled" }`

**B. Inventori**
- `GET /api/v1/products?category=&minStock=&q=` — Response: `{ "products": [{ "id": 10, "sku": "SKU-10", "name": "Kaos Polos", "price": 50000, "cost": 30000, "stock": 120, "lowStock": false }] }`
- `POST /api/v1/products` — Request: `{ "sku": "SKU-10", "name": "Kaos Polos", "cost": 30000, "price": 50000, "stock": 120, "threshold": 20 }` — Response: `{ "id": 10, "createdAt": "..." }`
- `PUT /api/v1/products/{id}` — ubah harga (memicu selisih harga). Response: `{ "id": 10, "price": 55000, "oldPrice": 50000 }`
- `POST /api/v1/movements` — mutasi stok (in/out/write-off). Request: `{ "productId": 10, "type": "out", "quantity": 2, "saleId": 1001 }` — Response: `{ "id": 2001, "productId": 10, "type": "out", "quantity": 2, "stockAfter": 118 }`

**C. Akuntansi**
- `GET /api/v1/journals?cashSessionId=&dateFrom=&dateTo=` — Response: `{ "entries": [{ "id": 5001, "date": "2026-08-08", "description": "Penjualan Sale#1001", "debits": [{ "accountId": 1, "amount": 111000 }], "credits": [{ "accountId": 2, "amount": 100000 }, { "accountId": 3, "amount": 11000 }] }] }`
- `GET /api/v1/income-statement?dateFrom=&dateTo=` — Response: `{ "period": "2026-08", "revenue": 111000, "costOfGoodsSold": 60000, "grossProfit": 51000, "expenses": 10000, "netProfit": 41000 }`

**D. Pelaporan**
- `GET /api/v1/reports/sales?period=month&cashSessionId=&productId=` — Response: `{ "period": "2026-08", "totalSales": 1110000, "totalProfit": 410000, "byCashSession": [{ "sessionId": 1, "sales": 500000, "profit": 200000 }], "byProduct": [{ "productId": 10, "sales": 600000, "profit": 240000 }] }`
- `GET /api/v1/reports/inventory?period=year` — Response: `{ "period": "2026", "stockIn": 500, "stockOut": 420, "writeOff": 10 }`

### 3. Database
- **Struktur Tabel:**

**users**
- `id` (BIGSERIAL PK), `name` (VARCHAR), `role` (VARCHAR: owner/cashier), `password_hash` (TEXT, bcrypt), `created_at` (TIMESTAMP DEFAULT NOW()).
- Penjelasan: User login. Owner akses semua modul, cashier hanya penjualan & stok.

**cash_sessions**
- `id` (BIGSERIAL PK), `user_id` (BIGINT FK → users.id, ON DELETE CASCADE), `name` (VARCHAR), `device` (VARCHAR), `is_active` (BOOLEAN DEFAULT true), `created_at` (TIMESTAMP).
- Penjelasan: Sesi kasir per perangkat. Transaksi di-group ke cash session.

**products**
- `id` (BIGSERIAL PK), `sku` (VARCHAR UNIQUE), `name` (VARCHAR), `category_id` (BIGINT FK → product_categories.id), `cost_price` (NUMERIC), `sale_price` (NUMERIC), `stock` (INTEGER DEFAULT 0), `low_stock_threshold` (INTEGER DEFAULT 10), `image_url` (TEXT), `created_at`, `updated_at`.
- Penjelasan: Master produk. Stok berkurang di jurnal penjualan, bertambah di jurnal pembelian.

**product_categories**
- `id` (BIGSERIAL PK), `name` (VARCHAR), `description` (TEXT).
- Penjelasan: Pengelompokan produk (parent-child relasi ke products).

**sales**
- `id` (BIGSERIAL PK), `cash_session_id` (BIGINT FK → cash_sessions.id, ON DELETE CASCADE), `grand_total` (NUMERIC), `tax_amount` (NUMERIC DEFAULT 0), `payment_method` (VARCHAR: cash/card/credit), `journal_id` (BIGINT FK → journals.id), `status` (VARCHAR: completed/cancelled), `created_at` (TIMESTAMP DEFAULT NOW()).
- Penjelasan: Header transaksi. journal_id menghubungkan ke jurnal akuntansi.

**sale_lines**
- `id` (BIGSERIAL PK), `sale_id` (BIGINT FK → sales.id, ON DELETE CASCADE), `product_id` (BIGINT FK → products.id), `quantity` (INTEGER), `unit_price` (NUMERIC), `discount_percent` (NUMERIC DEFAULT 0), `line_total` (NUMERIC).
- Penjelasan: Detail per baris produk dalam satu transaksi.

**movements**
- `id` (BIGSERIAL PK), `product_id` (BIGINT FK → products.id), `type` (VARCHAR: in/out/write-off), `quantity` (INTEGER), `reference_id` (BIGINT), `reference_type` (VARCHAR), `note` (TEXT), `journal_id` (BIGINT FK → journals.id), `created_at`.
- Penjelasan: Mutasi stok. type=out saat terjual, in saat pembelian, write-off saat rusak/opname.

**journals**
- `id` (BIGSERIAL PK), `cash_session_id` (BIGINT FK → cash_sessions.id), `description` (VARCHAR), `currency` (VARCHAR DEFAULT 'IDR'), `created_at` (TIMESTAMP DEFAULT NOW()).
- Penjelasan: Header jurnal. Satu entri per transaksi/pembelian/mutasi.

**journal_entries**
- `id` (BIGSERIAL PK), `journal_id` (BIGINT FK → journals.id, ON DELETE CASCADE), `account_id` (BIGINT FK → accounts.id), `debit` (NUMERIC DEFAULT 0), `credit` (NUMERIC DEFAULT 0), `amount` (NUMERIC), `created_at`.
- Penjelasan: Detail entri jurnal (debit/credit per akun). Total debit = total kredit (constraint).

**accounts**
- `id` (BIGSERIAL PK), `code` (VARCHAR), `name` (VARCHAR), `account_type` (VARCHAR: asset/liability/equity/revenue/expense), `balance_type` (VARCHAR: debit/credit), `created_at`.
- Penjelasan: Akun chart of accounts (Kas, Piutang, Penjualan, HPP, Beban, dll).

**product_categories** sudah dijelaskan di atas.

### 4. Alur Data Inti (Sales → Inventory → Accounting)
- Kasir simpan transaksi → service `sale_service.Save()`:
  1. Validasi stok per produk (stok ≥ jumlah). Gagal → rollback.
  2. Simpan `sales` + `sale_lines`.
  3. Buat `journal` + `journal_entries` (debit Kas, kredit Penjualan + HPP).
  4. Buat `movements` type=out per baris (stok berkurang).
  5. Commit semua dalam satu transaction (pgxpool `tx`).
- Laporan penjualan per bulan → `report_service.GetSalesReport()`: JOIN sales → sale_lines → products, GROUP BY tanggal/kasir/produk, SUM grand_total.

## Batasan & Risiko
- Batasan teknis: Backend Golang single-binary di VPS; skalabilitas horizontal via deploy multiple instance di balik load balancer. Transaksi kompleks dijalankan via database transaction, bukan in-memory.
- Risiko & mitigasi:
  - Data hilang (server down): mitigasi backup PostgreSQL harian (cron `pg_dump`) + WAL archiving.
  - Race condition stok negatif: mitigasi database transaction + constraint `stock >= 0`.
  - Kesalahan input kasir: mitigasi validasi server-side + konfirmasi stok sebelum simpan.
  - Kompleksitas akuntansi: mitigasi chart of accounts standar + jurnal yang bisa diaudit (audit log per entri).
  - Performa laporan besar: mitigasi agregasi di database (GROUP BY + indeks), bukan di aplikasi.

## Task Breakdown (Outline)
1. Setup project: inisialisasi Nuxt frontend dan backend Golang, koneksi PostgreSQL, VPS.
2. Modul Auth: registrasi/login user (owner/kasir) dengan JWT.
3. Modul Product: CRUD master produk, kategori, dan stok.
4. Modul Cash Session: buat sesi kasir per perangkat.
5. Modul Sales: input kasir, kalkulasi pajak/grand total, validasi stok, simpan transaksi.
6. Modul Payment & Receipt: metode pembayaran, kembalian, cetak struk.
7. Modul Accounting: generate jurnal otomatis dari transaksi.
8. Modul Inventory: mutasi stok (in/out/write-off), peringatan restock.
9. Modul Reports: laporan penjualan & stok per hari/bulan/tahun.
10. Laporan Laba Rugi: income statement per periode.
11. Testing: end-to-end (transaksi all-or-nothing), backup, load test.
12. Deployment: Docker Compose (frontend + backend + postgres), CI/CD, monitoring.