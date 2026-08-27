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


if ($conn->connect_error) {

    die("error");

}


// Ambil vote
$pilihan = $_POST['pilihan'] ?? '';


// Validasi
$allowed = [
    "Very Dissatisfied",
    "Dissatisfied",
    "Neutral",
    "Satisfied",
    "Very Satisfied"
];


if (!in_array($pilihan, $allowed)) {

    die("error");

}


// Simpan
$stmt = $conn->prepare(
    "INSERT INTO votes (pilihan) VALUES (?)"
);

$stmt->bind_param(
    "s",
    $pilihan
);


if ($stmt->execute()) {

    echo "success";

} else {

    echo "error";

}


$stmt->close();
$conn->close();

?>