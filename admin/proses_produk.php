<?php
require_once 'koneksi.php';


if (isset($_POST['proses'])) {
    $_proses = $_POST['proses'];
    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $_stok = $_POST['stok'];
    $min_stok = $_POST['min_stok'];
    $deskripsi = $_POST['deskripsi'];
    $kategori_produk_id = $_POST['kategori_produk_id'];

    // array data
    $ar_data[] = $_kode; // ? 1
    $ar_data[] = $_nama; // ? 2
    $ar_data[] = $_harga_jual; // 3
    $ar_data[] = $harga_beli; // 4
    $ar_data[] = $_stok; // 5
    $ar_data[] = $min_stok;
    $ar_data[] = $deskripsi; // 6
    $ar_data[] = $kategori_produk_id; // ? 7

}


if (isset($_GET['iddel']) && empty($_proses)) {
    $sql = "DELETE FROM produk WHERE id=?";
    $ar_data[] = $_GET['iddel'];
} else if ($_proses == "Simpan") {
    // data baru
    $sql = "INSERT INTO produk (kode,nama,harga_jual,harga_beli,stok,
    min_stok,deskripsi, kategori_produk_id) VALUES (?,?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['idedit']; // ? 8
    $sql = "UPDATE produk SET kode=?,nama=?,harga_jual=?,
    harga_beli=?,stok=?,min_stok=?,deskripsi=?,kategori_produk_id=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:index.php?hal=list_produk');
?>