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
    die("Database error");
}

$sql = "
    SELECT pilihan, COUNT(*) AS jumlah
    FROM votes
    GROUP BY pilihan
";

$result = $conn->query($sql);

$data = [
    "Very Satisfied" => 0,
    "Satisfied" => 0,
    "Neutral" => 0,
    "Dissatisfied" => 0,
    "Very Dissatisfied" => 0
];

while ($row = $result->fetch_assoc()) {

    $data[$row["pilihan"]] = (int)$row["jumlah"];

}

header("Content-Type: application/json");

echo json_encode($data);

$conn->close();

?>