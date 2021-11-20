<?php

require 'function.php';

$id_dosen = $_GET["id_dosen"];

if (hapus($id_dosen) > 0) {
    echo "<script>
            alert('Data Berhasil diHapus');
            document.location.href = 'dosen.php';
            </script>";
} else {
    echo "<script>
            alert('Data Gagal diHapus');
            document.location.href = 'dosen.php';
            </script>";
}

?>