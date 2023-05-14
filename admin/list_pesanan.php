<?php
//batas edit
require_once 'koneksi.php';
?>
<?php
$sql = "SELECT * FROM pesanan";
$rs = $dbh->query($sql);
?>
                        <a class="btn btn-success" href="form_pesanan.php" role="button">Create Pesanan</a>
                        <br>
                            </div>
                            <div class="card-body">
                            <table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>tanggal</th>
                                                <th>nama pemesan</th>
                                                <th>alamat pemesan</th>
                                                <th>no hp</th>
                                                <th>Email</th>
                                                <th>jumlah pesanan</th>
                                                <th>deskripsi</th>
                                                <th>produk</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    <tfoot>
 <tbody>
        <?php
        $nomor = 1;
        foreach ($rs as $row) {
            ?>
            <tr>
                <td>
                    <?= $nomor ?>
                </td>
                <td>
                    <?= $row['tanggal'] ?>
                </td>
                <td>
                    <?= $row['nama_pemesan'] ?>
                </td>
                <td>
                    <?= $row['alamat_pemesan'] ?>
                </td>
                <td>
                    <?= $row['no_hp'] ?>
                </td>
                <td>
                    <?= $row['email'] ?>
                </td>
                <td>
                    <?= $row['jumlah_pesanan'] ?>
                </td>
                <td>
                    <?= $row['deskripsi'] ?>
                </td>
                <td>
                    <?= $row['produk_id'] ?>
                </td>
                
                <td>
                    <a class="btn btn-sm btn-primary" href="view_pesanan.php?id=<?= $row['id'] ?>">View</a>
                    <a class="btn btn-sm btn-warning" href="form_pesanan.php?idedit=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="proses_pesanan.php?iddel=<?=$row['id']?>"
                    onclick="if(!confirm('Anda Yakin Hapus Data Pesanan <?=$row['nama']?>?')) {return false}"
                    >Delete</a>
                </td>
            </tr>
            <?php
            $nomor++;
        }
        ?>
    </tbody>

                                </table>
                            </div>
                        </div>