<?php

require_once "app/customer.php";
$cst = new cst();
$rows = $cst->tampil();

if(isset($_GET["cari"])){
    $rows = $cst->cari($_GET["alamat"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id_cst'])) $vid_cst =$_GET['id_cst'];
else $vid_cst ='';
if(isset($_GET['kd_cst'])) $vkd_cst =$_GET['kd_cst'];
else $vkd_cst ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['alamat'])) $valamat =$_GET['alamat'];
else $valamat ='';
if(isset($_GET['no_telp'])) $vno_telp =$_GET['no_telp'];
else $vno_telp ='';

if($vsimpan=='simpan' && ($vkd_cst <>''||$vnama <>''||$valamat <>''||$vno_telp <>'')){
    $cst->simpan();
    $rows = $cst->tampil();
    $vid_cst ='';
    $vkd_cst ='';
    $vnama ='';
    $valamat ='';
    $vno_telp ='';
}

if($vaksi=="hapus")  {
    $cst->hapus();
    $rows = $cst->tampil();
}
if($vaksi=="cari")  {
    $rows = $cst->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $cst->tampil_update();
    foreach ($urows as $row) {
        $vid_cst = $row['id_cst'];
        $vkd_cst = $row['kd_cst'];
        $vnama = $row['nama'];
        $valamat = $row['alamat'];
        $vno_telp = $row['no_telp'];
    }
 }

if ($vupdate=="update"){
    $cst->update($vid_cst,$vkd_cst,$vnama,$valamat,$vno_telp);
    $rows = $cst->tampil();
    $vid_cst ='';
    $vkd_cst ='';
    $vnama ='';
    $valamat ='';
    $vno_telp ='';
}
if ($vreset=="reset"){
    $vid_cst ='';
    $vkd_cst ='';
    $vnama ='';
    $valamat ='';
    $vno_telp ='';

}


?>

<form action="?" method="get">
<table>
    <tr><td>KODE CUSTOMER</td><td>:</td><td>
        <input type="hidden" name="id_cst" value="<?php echo $vid_cst; ?>" /><input type="text" name="kd_cst" value="<?php echo $vkd_cst; ?>" /></td></tr>
    <tr><td>NAMA</td><td>:</td><td><input type="text" name="nama" value="<?php echo $vnama; ?>"/></td></tr>
    <tr><td>ALAMAT</td><td>:</td><td><input type="text" autocomplete="off" name="alamat" value="<?php echo $valamat; ?>"/></td></tr>
    <tr><td>NO TELEPON</td><td>:</td><td><input type="text" name="no_telp" value="<?php echo $vno_telp; ?>"/></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    </td></tr>
</table>
</form>



    <table border="1px">
    <tr>
        <td>NO</td>
        <td>KODE CUSTOMER</td>
        <td>NAMA</td>
        <td>ALAMAT</td>
        <td>NO TELEPON</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_cst']; ?></td>
            <td><?php echo $row['kd_cst']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['no_telp']; ?></td>
            <td><a href="?id_cst=<?php echo $row['id_cst']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_cst=<?php echo $row['id_cst']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;
            <a href="paket.php">TOURPAKET</a> ||
            <a href="transaksi.php">TRANSAKSI</a></td>

        </tr>
    <?php 
    } 