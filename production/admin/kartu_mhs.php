<?php 

require 'function.php';

    $id_mhs = $_GET["id_mhs"];
	$mhs = query("SELECT * FROM data_mahasiswa WHERE id_mhs = $id_mhs")[0];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Kartu Mahasiswa</title>
     
    <style type="text/css">
        table {
            font-size: 10px;
            background-color : blue;
            color: #000;
        }
        #head {
            background: cyan;
        }
    </style>

    <script type="text/javascript">
    	window.print();
    </script>
</head>
<body>
	<table border="1" cellpadding="10" cellspacing="0" width="45%">
        <tr>
            <td align="center" id="head">
                <h3 class="title">UNIVERSITAS YAPIS PAPUA</h3>
                <p class="isi"></p>
            </th>
        </tr>
        <tr height="20px">
            <td align="center">KARTU MAHASISWA</td>
        </tr>
        <tr>
            <td>
                <table border="0">
                    <tr>
                        <td width="20%">Nama</td>
                        <td width="2%">:</td>
                        <td width="30%"><?= $mhs["nama_mhs"] ;?></td>
                        <td rowspan="4" width="30%" align="center">
                                 <?php
                                    
                                    $kode = $mhs['nama_mhs'].$mhs['npm']."";
                                    $npm = $mhs['npm'];
                                    require_once('../../assert/phpqrcode/qrlib.php');
                                    

                                    QRcode::png("$kode","QRCODE ".$npm.".png","M", 3,2);
                                    
                                ?>
                                <img src="QRCODE <?= $npm ?>.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>NPM</td>
                        <td>:</td>
                        <td><?= $mhs["npm"] ;?></td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td>:</td>
                        <td><?= $mhs["no_telp"] ;?></td>
                    </tr>
                    <tr>
                        <td>Program Studi</td>
                        <td>:</td>
                        <td><?= $mhs["prodi"] ;?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr height="20px">
            <td colspan="2" align="center" height="1px">KARTU ABSENSI MAHASISWA</td>
        </tr>
    </table>
</body>
</html>