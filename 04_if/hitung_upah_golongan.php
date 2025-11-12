<?php
// Inisialisasi variabel hasil
$upah = "";

// Konstanta upah lembur
$upah_lembur = 3000; // Rp per jam lembur
$jam_normal_maks = 48; // Jam normal maksimal

// Array upah per jam berdasarkan golongan
$upah_golongan = [
    'A' => 4000,
    'B' => 5000,
    'C' => 6000,
    'D' => 7500
];

// Cek jika form disubmit dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai jam kerja dan golongan dari input form
    $jam = intval($_POST['jam']); // Pastikan berupa integer
    $golongan = $_POST['golongan']; // Golongan dari select
    
    // Validasi golongan
    if (array_key_exists($golongan, $upah_golongan)) {
        $upah_normal = $upah_golongan[$golongan];
        
        // Hitung upah
        if ($jam <= $jam_normal_maks) {
            $upah = $jam * $upah_normal;
        } else {
            $jam_lembur = $jam - $jam_normal_maks;
            $upah = ($jam_normal_maks * $upah_normal) + ($jam_lembur * $upah_lembur);
        }
        
        // Format hasil sebagai mata uang Rupiah
        $upah = "Rp. " . number_format($upah, 0, ',', '.');
    } else {
        $upah = "Golongan tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Upah Karyawan Honorer Berdasarkan Golongan</title>
</head>
<body>
    <h1>Hitung Upah Karyawan Honorer Berdasarkan Golongan</h1>
    <p>Upah per jam berdasarkan golongan:<br>
    - A: Rp. 4.000,-<br>
    - B: Rp. 5.000,-<br>
    - C: Rp. 6.000,-<br>
    - D: Rp. 7.500,-<br>
    Upah lembur (di atas 48 jam): Rp. 3.000,- per jam (sama untuk semua golongan).</p>
    
    <form method="post" action="">
        <label for="jam">Masukkan jumlah jam kerja selama satu minggu (bilangan bulat):</label>
        <input type="number" id="jam" name="jam" required min="0"><br><br>
        
        <label for="golongan">Pilih golongan karyawan:</label>
        <select id="golongan" name="golongan" required>
            <option value="">-- Pilih Golongan --</option>
            <option value="A">A (Rp. 4.000,- per jam)</option>
            <option value="B">B (Rp. 5.000,- per jam)</option>
            <option value="C">C (Rp. 6.000,- per jam)</option>
            <option value="D">D (Rp. 7.500,- per jam)</option>
        </select><br><br>
        
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