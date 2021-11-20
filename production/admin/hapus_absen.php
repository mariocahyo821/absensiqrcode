<?php

require 'function.php';

$id = $_GET["id"];

if (hapus_absen ($id) > 0) {
    echo "<script>
            alert('Data Berhasil diHapus');
            document.location.href = 'absen.php';
            </script>";
} else {
    echo "<script>
            alert('Data Gagal diHapus');
            document.location.href = 'absen.php';
            </script>";
}

?>