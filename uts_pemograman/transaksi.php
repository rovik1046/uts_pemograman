<?php

require_once "app/transaksi.php";
$trs = new trs();
$rows = $trs->tampil();

?>
    <table border="1px">
    <tr>
        <td>NO</td>
        <td>KODE TRANSAKSI</td>
        <td>KODE PAKET</td>
        <td>TUJUAN</td>
        <td>KODE CUSTOMER</td>
        <td>NAMA</td>
        <td>NO TELEPON</td>
        <td>JUMLAH ORANG</td>
        <td>TOTAL HARGA</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_trs']; ?></td>
            <td><?php echo $row['kd_trs']; ?></td>
            <td><?php echo $row['kd_pkt']; ?></td>
            <td><?php echo $row['tujuan']; ?></td>
            <td><?php echo $row['kd_cst']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['no_telp']; ?></td>
            <td><?php echo $row['jml_orang']; ?></td>
            <td><?php echo $row['tot_harga']; ?></td>
            <td><a href="?id_trs=<?php echo $row['id_trs']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_trs=<?php echo $row['id_trs']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;
                <a href="index.php">REGISTRASI</a>
                <a href="paket.php">TOURPAKET</a></td>

        </tr>
    <?php 
    } 