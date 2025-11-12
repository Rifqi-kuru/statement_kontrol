<?php
// Inisialisasi variabel hasil
$hasil = "";

// Cek jika form disubmit dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai tahun dari input form
    $tahun = intval($_POST['tahun']); // Pastikan berupa integer
    
    // Logika cek tahun kabisat:
    // - Habis dibagi 4, tapi tidak habis dibagi 100, kecuali habis dibagi 400
    if (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0)) {
        $hasil = "Tahun $tahun adalah tahun kabisat.";
    } else {
        $hasil = "Tahun $tahun bukan tahun kabisat.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Tahun Kabisat</title>
</head>
<body>
    <h1>Cek Tahun Kabisat</h1>
    <form method="post" action="">
        <label for="tahun">Masukkan tahun (bilangan bulat):</label>
        <input type="number" id="tahun" name="tahun" required min="1">
        <button type="submit">Cek</button>
    </form>
    
    <?php
    // Tampilkan hasil jika ada
    if (!empty($hasil)) {
        echo "<p><strong>$hasil</strong></p>";
    }
    ?>
</body>
</html>
