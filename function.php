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

?>