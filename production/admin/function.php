<?php

$conn = mysqli_connect("localhost", "root", "", "dbabsen");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows; 
}

// DATA DOSEN

function tambah_dosen($data) {
    global $conn;

    $nama_dosen = htmlspecialchars($data["nama_dosen"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $jenkel = htmlspecialchars($data["jenkel"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);

    $query = "INSERT INTO `data_dosen` (`id_dosen`, `nama_dosen`, `no_hp`, `jenkel`, `tgl_lahir`) 
                VALUES ('', '$nama_dosen', '$no_hp', '$jenkel', '$tgl_lahir');";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id_dosen) {
    global $conn;
    mysqli_query($conn, "DELETE FROM data_dosen WHERE id_dosen = $id_dosen");
    return mysqli_affected_rows($conn);
}

function cari($cari_dosen) {
    $query = "SELECT * FROM data_dosen
                WHERE 
                    nama_dosen LIKE '%$cari_dosen%' OR
                    jenkel LIKE '%$cari_dosen%' OR
                    no_hp LIKE '%$cari_dosen%'
              ";
    return query($query);
}

function edit_dosen($data) {
    global $conn;

    $id_dosen = $data["id_dosen"];
    $nama_dosen = htmlspecialchars($data["nama_dosen"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $jenkel = htmlspecialchars($data["jenkel"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);

    $query = "UPDATE data_dosen SET
                nama_dosen = '$nama_dosen',
                no_hp = '$no_hp',
                jenkel = '$jenkel',
                tgl_lahir = '$tgl_lahir'
                WHERE id_dosen = $id_dosen
                ";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

// DATA MATA KULIAH

function tambah_mk($data) {
    global $conn;
    
    $nama_mk = htmlspecialchars($data["nama_mk"]);
    $dosen = htmlspecialchars($data["dosen"]);
    $sks = htmlspecialchars($data["sks"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $semester = htmlspecialchars($data["semester"]);


    $query = "INSERT INTO `data_matakuliah` (`id_mk`, `nama_mk`, `dosen`, `sks`, `jenis`, `semester`) 
                VALUES ('', '$nama_mk', '$dosen', '$sks', '$jenis', '$semester');";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_mk($id_mk) {
    global $conn;
    mysqli_query($conn, "DELETE FROM data_matakuliah WHERE id_mk = $id_mk");
    return mysqli_affected_rows($conn);
}

function cari_mk($cari_matkul) {
    $query = "SELECT * FROM data_matakuliah
                WHERE 
                    nama_mk LIKE '%$cari_matkul%' OR
                    sks LIKE '%$cari_matkul%' OR
                    jenis LIKE '%$cari_matkul%' OR
                    semester LIKE '%$cari_matkul%'
              ";
    return query($query);
}

function editmk($data) {
    global $conn;

    $id_mk = $data["id_mk"];
    $nama_mk = htmlspecialchars($data["nama_mk"]);
    $dosen = htmlspecialchars($data["dosen"]);
    $sks = htmlspecialchars($data["sks"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $semester = htmlspecialchars($data["semester"]);

    $query = "UPDATE data_matakuliah SET
                nama_mk = '$nama_mk',
                dosen = '$dosen',
                sks = '$sks',
                jenis = '$jenis',
                semester = '$semester'
                WHERE id_mk = $id_mk
                ";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

// DATA MAHASISWA

function tambah_mhs($data) {
    global $conn;

   
    $npm = htmlspecialchars($data["npm"]);
    $nama_mhs = htmlspecialchars($data["nama_mhs"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $prodi = htmlspecialchars($data["prodi"]);

    $query = "INSERT INTO `data_mahasiswa` (`id_mhs`, `npm`, `nama_mhs`, `no_telp`, `prodi`) 
                VALUES ('', '$npm', '$nama_mhs', '$no_telp', '$prodi');";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusmhs($id_mhs) {
    global $conn;
    mysqli_query($conn, "DELETE FROM data_mahasiswa WHERE id_mhs = $id_mhs");
    return mysqli_affected_rows($conn);
}

function carimhs($cari_mhs) {
    $query = "SELECT * FROM data_mahasiswa
                WHERE 
                    npm LIKE '%$cari_mhs%' OR
                    nama_mhs LIKE '%$cari_mhs%' OR
                    no_telp LIKE '%$cari_mhs%' OR
                    prodi LIKE '%$cari_mhs%'
              ";
    return query($query);
}

function edit_mhs($data) {
    global $conn;

    $id_mhs = $data["id_mhs"];
    $npm = htmlspecialchars($data["npm"]);
    $nama_mhs = htmlspecialchars($data["nama_mhs"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $prodi = htmlspecialchars($data["prodi"]);

    $query = "UPDATE data_mahasiswa SET
                npm = '$npm',
                nama_mhs = '$nama_mhs',
                no_telp = '$no_telp',
                prodi = '$prodi'
                WHERE id_mhs = $id_mhs
                ";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

// DATA JADWAL

function add_jadwal($data) {
    global $conn;
    
    $id_mk = ($data["id_mk"]);
    $hari = htmlspecialchars($data["hari"]);
    $jam = htmlspecialchars($data["jam"]);

    $query = "INSERT INTO `data_jadwal` (`id_jadwal`, `id_mk`, `hari`, `jam`) VALUES ('', '$id_mk', '$hari', '$jam');";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function cari_jd($cari_jadwal) {
    $query = "SELECT * FROM data_jadwal
                 INNER JOIN data_matakuliah ON data_jadwal.id_mk = data_matakuliah.id_mk
                WHERE 
                    hari LIKE '%$cari_jadwal%' OR
                    jam LIKE '%$cari_jadwal%' OR
                    semester LIKE '%$cari_jadwal%'
              ";
    return query($query);
}

function edit_jadwal($data) {
    global $conn;

    $id_jadwal = $data["id_jadwal"];
    $id_mk = ($data["id_mk"]);
    $hari = htmlspecialchars($data["hari"]);
    $jam = htmlspecialchars($data["jam"]);

    $query = "UPDATE data_jadwal SET
                id_mk = '$id_mk',
                hari = '$hari',
                jam = '$jam'
                WHERE id_jadwal = $id_jadwal
                ";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

// DATA ABSEN

function tambah_absen($data) {
    global $conn;
    
   $id_mk = $data["id_mk"];
   $npm_mhs = htmlspecialchars($data["npm_mhs"]);
   $mahasiswa = htmlspecialchars($data["mahasiswa"]);
   $tgl_absen = htmlspecialchars($data["tgl_absen"]);
   $waktu = htmlspecialchars($data["waktu"]);
   $id_status = $data["id_status"];
   $ket = htmlspecialchars($data["ket"]);

    $query = "INSERT INTO `data_absen` (`id`, `id_mk`, `npm_mhs`, `mahasiswa`, `tgl_absen`, `waktu`, `id_status` , `ket`) VALUES ('', '$id_mk', '$npm_mhs', '$mahasiswa', '$tgl_absen', '$waktu', '$id_status' , '$ket');";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_absen($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM absen WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function search($cari_absen) {
    $query = "SELECT * FROM absen
                 INNER JOIN data_matakuliah ON absen.id_mk = data_matakuliah.id_mk
                WHERE 
                    nama_mk LIKE '%$cari_absen%' OR
                    semester LIKE '%$cari_absen%' OR
                    mahasiswa LIKE '%$cari_absen%' 
              ";
    return query($query);
}

function edit_absen($data) {
    global $conn;

    $id = $data["id"];
    $id_mk = htmlspecialchars($data["id_mk"]);
    $npm_mhs = htmlspecialchars($data["npm_mhs"]);
    $mahasiswa = htmlspecialchars($data["mahasiswa"]);
    $tgl_absen = htmlspecialchars($data["tgl_absen"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $id_status = htmlspecialchars($data["id_status"]);
    $ket = htmlspecialchars($data["ket"]);

    $query = "UPDATE data_absen SET
                id_mk = '$id_mk',
                npm = '$npm',
                mahasiswa = '$mahasiswa',
                waktu = '$waktu',
                status = '$status'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

?>