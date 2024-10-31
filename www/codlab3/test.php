<?php
$size = 5; // Number of rows

for ($i = 1; $i <= $size; $i++) {
    // Print spaces
    for ($j = $i; $j < $size; $j++) {
        echo "&nbsp;&nbsp;";
    }
    // Print asterisks
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "<br>";
}
?>
