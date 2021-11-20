<?php

require 'function.php';

$id_ajar = $_GET["id_ajar"];

if (hapus_ajar ($id_ajar) > 0) {
    echo "<script>
            alert('Data Berhasil diHapus');
            document.location.href = 'ajar.php';
            </script>";
} else {
    echo "<script>
            alert('Data Gagal diHapus');
            document.location.href = 'ajar.php';
            </script>";
}

?>