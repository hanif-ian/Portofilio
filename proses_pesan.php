<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "20242024_db";


$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
);


// Cek koneksi
if ($conn->connect_error) {

    die("Koneksi database gagal: " . $conn->connect_error);

}


// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];


// Masukkan ke database
$sql = "INSERT INTO pesan (nama, email, pesan)
        VALUES (?, ?, ?)";


$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sss",
    $nama,
    $email,
    $pesan
);


if ($stmt->execute()) {

   echo "<script>
            alert('Pesan berhasil dikirim!');
            window.location.href = 'Program.php';
          </script>";

} else {

    echo "<script>
            alert('Pesan gagal dikirim!');
            window.history.back();
          </script>";

}


$stmt->close();
$conn->close();

?>