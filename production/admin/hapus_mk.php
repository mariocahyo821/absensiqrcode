<?php

require 'function.php';

$id_mk = $_GET["id_mk"];

if (hapus_mk ($id_mk) > 0) {
    echo "<script>
            alert('Data Berhasil diHapus');
            document.location.href = 'matkul.php';
            </script>";
} else {
    echo "<script>
            alert('Data Gagal diHapus');
            document.location.href = 'matkul.php';
            </script>";
}

?>