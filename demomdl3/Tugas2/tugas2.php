<?php
function cetakBilangan($n) {
    echo "<ul>"; // Memulai daftar
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 4 == 0 && $i % 6 == 0) {
            echo "<li>PemrogramanWebsite 2024</li>";
        } elseif ($i % 5 == 0) {
            echo "<li>2024</li>";
        } elseif ($i % 4 == 0) {
            echo "<li>Pemrograman</li>";
        } elseif ($i % 6 == 0) {
            echo "<li>Website</li>";
        } else {
            echo "<li>$i</li>";
        }
    }
    echo "</ul>"; // Menutup daftar
}

// Contoh penggunaan fungsi
cetakBilangan(30);
?>