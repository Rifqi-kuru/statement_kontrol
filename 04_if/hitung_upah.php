<?php
// Inisialisasi variabel hasil
$upah = "";

// Cek jika form disubmit dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai jam kerja dari input form
    $jam = intval($_POST['jam']); // Pastikan berupa integer
    
    // Konstanta upah
    $upah_normal = 2000; // Rp per jam normal
    $upah_lembur = 3000; // Rp per jam lembur
    $jam_normal_maks = 48; // Jam normal maksimal
    
    // Hitung upah
    if ($jam <= $jam_normal_maks) {
        $upah = $jam * $upah_normal;
    } else {
        $jam_lembur = $jam - $jam_normal_maks;
        $upah = ($jam_normal_maks * $upah_normal) + ($jam_lembur * $upah_lembur);
    }
    
    // Format hasil sebagai mata uang Rupiah
    $upah = "Rp. " . number_format($upah, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Upah Karyawan Honorer</title>
</head>
<body>
    <h1>Hitung Upah Karyawan Honorer</h1>
    <p>Upah per jam normal: Rp. 2.000,-<br>
    Upah per jam lembur (di atas 48 jam): Rp. 3.000,-</p>
    
    <form method="post" action="">
        <label for="jam">Masukkan jumlah jam kerja selama satu minggu (bilangan bulat):</label>
        <input type="number" id="jam" name="jam" required min="0">
        <button type="submit">Hitung Upah</button>
    </form>
    
    <?php
    // Tampilkan hasil jika ada
    if (!empty($upah)) {
        echo "<p><strong>Upah yang diterima: $upah</strong></p>";
    }
    ?>
</body>
</html>