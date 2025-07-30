The Arlenmoor Hotel 🏨

Website resmi fiktif untuk hotel bergaya klasik Eropa bernama The Arlenmoor. Dibuat sebagai proyek personal/PKL dengan PHP Native + Bootstrap 5.

---

✨ Fitur Utama

🌐 Halaman Publik
- Beranda: Hero slider dengan nuansa klasik & tombol ke halaman kamar.
- Kamar: Menampilkan daftar kamar hotel dari database, desain elegan & responsif.
- Detail Kamar: Informasi lengkap tiap kamar (foto, deskripsi, fasilitas).
- Reservasi: Formulir pemesanan kamar (check-in/out, jumlah kamar, data tamu).
- Tentang: Deskripsi sejarah hotel dan layanan unggulan.
- Kontak: Formulir pengiriman pesan ke hotel.

📱 Panel Navigasi Mobile Khusus
- Navigasi bawah layar (bottom nav) di perangkat mobile
- Menampilkan ikon dan label: Beranda, Kamar, Reservasi, Kontak, Tentang
- Memudahkan pengguna berpindah halaman tanpa buka menu

🎵 Musik Latar
- Musik piano klasik otomatis diputar antar halaman
- Tombol 🎵 kontrol di kanan bawah layar
- Status musik tersimpan (play/pause) lewat `localStorage`

---

🔐 Halaman Admin
Login sederhana (`user: admin`, `pass: arlen123`) untuk mengelola:

- ✅ Dashboard ringkasan total kamar, reservasi, pembayaran
- 🛏️ Kelola Kamar (CRUD)
- 📆 Kelola Reservasi (CRUD)
- 💳 Pembayaran (Upload & verifikasi bukti transfer)
- 💬 Pesan Masuk (data dari form kontak)

---

💾 Database
Gunakan database bernama `arlenmoor` dengan tabel:
- `kamar`
- `tamu`
- `reservasi`
- `pembayaran`
- `kontak`

---

⚙️ Teknologi
- PHP Native
- Bootstrap 5
- MySQL
- JavaScript (untuk musik & navigasi interaktif)

---

📝 Catatan
Website ini dirancang sebagai simulasi hotel klasik, mengedepankan:
- Elegansi visual
- Struktur sederhana namun fungsional
- Fokus pada UX yang tenang & mewah

---

👤 Author
Dimas Fahri Alfareza
Project PKL 2025 – Website Hotel The Arlenmoor
