<?php

require 'function.php';

$id_mhs = $_GET["id_mhs"];

if (hapusmhs ($id_mhs) > 0) {
    echo "<script>
            alert('Data Berhasil diHapus');
            document.location.href = 'mahasiswa.php';
            </script>";
} else {
    echo "<script>
            alert('Data Gagal diHapus');
            document.location.href = 'mahasiswa.php';
            </script>";
}

?>