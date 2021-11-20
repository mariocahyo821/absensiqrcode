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
function registrasi($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $posisi = htmlspecialchars($data["posisi"]);

    //CEK username 
    $result = mysqli_query($conn, "SELECT username FROM data_user WHERE username = '$username'");

    if ( mysqli_fetch_assoc($result) ) {
        echo "
            <script>
                alert('Akun Telah Berhasil Dibuat!');
            </script>
        ";
        return false;
    }

    //CEK KONFIRM PASSWORD
    if ( $password !== $password2 ) {
        echo "<script>
                alert('Konfirmasi Password Anda Salah!');
                </script>
        ";
        return false;
    } 

    //ENSKIPSI PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO `data_user` (`id_user`, `nama`, `username`, `password`, `no_telp`, `posisi`) VALUES ('', '$nama', '$username', '$password', '$no_telp', '$posisi')");

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

// DATA ABSEN

function add_absen($data) {
    global $conn;

    $id_mk = $data["id_mk"];
    $mahasiswa = htmlspecialchars($data["mahasiswa"]);
    $time = htmlspecialchars($data["time"]);
    $status = htmlspecialchars($data["status"]);

    $query = "INSERT INTO absen (`id`, `id_mk`, `mahasiswa`, `time`, `status`) VALUES ('', '$id_mk', '$mahasiswa', '$time', '$status');";
    mysqli_query($conn, $query);

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

// DATA DOSEN


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
?>