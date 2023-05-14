<?php
require_once 'koneksi.php';


if (isset($_POST['proses'])) {
    $_proses = $_POST['proses'];
    $_tanggal = $_POST['tanggal'];
    $_nama = $_POST['nama_pemesan'];
    $_alamat = $_POST['alamat_pemesan'];
    $_no_hp = $_POST['no_hp'];
    $_email = $_POST['email'];
    $_jumlah = $_POST['jumlah_pesanan']; 
    $_deskripsi = $_POST['deskripsi'];
    $_produk_id = $_POST['produk_id'];

    // array data
    $ar_data[] = $_tanggal; // ? 1
    $ar_data[] = $_nama; // ? 2
    $ar_data[] = $_alamat; // 3
    $ar_data[] = $_no_hp; // 4
    $ar_data[] = $_email; // 5
    $ar_data[] = $_jumlah; // 6
    $ar_data[] = $_deskripsi; // 7
    $ar_data[] = $_produk_id; // ? 8

}


if (isset($_GET['iddel']) && empty($_proses)) {
    $sql = "DELETE FROM pesanan WHERE id=?";
    $ar_data[] = $_GET['iddel'];
} else if ($_proses == "Simpan") {
    $sql = "INSERT INTO pesanan (tanggal,nama_pemesan,alamat_pemesan,no_hp,
    email,jumlah_pesanan,deskripsi, produk_id) VALUES (?,?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['idedit']; // ? 8
    $sql = "UPDATE pesanan SET tanggal=?,nama_pemesan=?,alamat_pemesan=?,no_hp=?,
    email=?,jumlah_pesanan=?,deskripsi=?,produk_id=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:index.php?hal=list_pesanan');
?>