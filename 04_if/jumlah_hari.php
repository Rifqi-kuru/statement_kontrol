<?php
// Dapatkan bulan dan tahun saat ini
$bulan = date('n'); // Mengembalikan angka 1-12
$tahun = date('Y'); // Mengembalikan tahun saat ini

// Inisialisasi variabel jumlah hari
$jumlah_hari = 0;

// Gunakan switch untuk menentukan jumlah hari berdasarkan bulan
switch ($bulan) {
    case 1: // Januari
    case 3: // Maret
    case 5: // Mei
    case 7: // Juli
    case 8: // Agustus
    case 10: // Oktober
    case 12: // Desember
        $jumlah_hari = 31;
        break;
    case 4: // April
    case 6: // Juni
    case 9: // September
    case 11: // November
        $jumlah_hari = 30;
        break;
    case 2: // Februari
        // Cek apakah tahun kabisat
        if (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0)) {
            $jumlah_hari = 29;
        } else {
            $jumlah_hari = 28;
        }
        break;
    default:
        $jumlah_hari = "Bulan tidak valid";
        break;
}

// Array nama bulan untuk tampilan
$nama_bulan = [
    1 => "Januari",
    2 => "Februari",
    3 => "Maret",
    4 => "April",
    5 => "Mei",
    6 => "Juni",
    7 => "Juli",
    8 => "Agustus",
    9 => "September",
    10 => "Oktober",
    11 => "November",
    12 => "Desember"
];

// Tampilkan hasil
echo "<h1>Jumlah Hari dalam Bulan Saat Ini</h1>";
echo "<p>Bulan saat ini: " . $nama_bulan[$bulan] . " $tahun</p>";
echo "<p>Jumlah hari: $jumlah_hari hari</p>";
?>