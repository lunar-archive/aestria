<?php

include_once("function/koneksi.php");
include_once("function/helper.php");

$email      = $_POST['email'];
$password   = md5($_POST['password']);

$query  = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on'");

if (mysqli_num_rows($query) == 0) {
    header("Location:" . BASE_URL . "index.php?page=login&notif=true");
} else {
    $row = mysqli_fetch_assoc($query);

    session_start();

    $_SESSION['user_id'] = $row['user_id']; //untuk menyimpan data user
    $_SESSION['nama'] = $row['nama']; // data diambil dari kolom user dan level
    $_SESSION['level'] = $row['level'];

    header("Location:" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list");
}
