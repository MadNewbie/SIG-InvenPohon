<h1>Selamat Datang <?php if (isset($_SESSION['nama_lengkap'])) {
  echo $_SESSION['nama_lengkap'];
}else{
  echo 'di Sistem Informasi Geografis Ruang Terbuka Hijau';
} ?></h1>
