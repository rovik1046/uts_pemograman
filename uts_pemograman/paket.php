<?php

require_once "app/paket.php";
$pkt = new pkt();
$rows = $pkt->tampil();

if(isset($_GET["cari"])){
    $rows = $pkt->cari($_GET["tujuan"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id_pkt'])) $vid_pkt =$_GET['id_pkt'];
else $vid_pkt ='';
if(isset($_GET['kd_pkt'])) $vkd_pkt =$_GET['kd_pkt'];
else $vkd_pkt ='';
if(isset($_GET['tipe_pkt'])) $vtipe_pkt =$_GET['tipe_pkt'];
else $vtipe_pkt ='';
if(isset($_GET['tujuan'])) $vtujuan =$_GET['tujuan'];
else $vtujuan ='';
if(isset($_GET['jml_orang'])) $vjml_orang =$_GET['jml_orang'];
else $vjml_orang ='';
if(isset($_GET['harga'])) $vharga =$_GET['harga'];
else $vharga ='';

if($vsimpan=='simpan' && ($vkd_pkt <>''||$vtipe_pkt <>''||$vtujuan <>''||$vjml_orang <>''||$vharga <>'')){
    $pkt->simpan();
    $rows = $pkt->tampil();
    $vid_pkt ='';
    $vkd_pkt ='';
    $vtipe_pkt ='';
    $vtujuan ='';
    $vjml_orang ='';
    $vharga ='';
}

if($vaksi=="hapus")  {
    $pkt->hapus();
    $rows = $pkt->tampil();
}
if($vaksi=="cari")  {
    $rows = $pkt->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $pkt->tampil_update();
    foreach ($urows as $row) {
        $vid_pkt = $row['id_pkt'];
        $vkd_pkt = $row['kd_pkt'];
        $vtipe_pkt = $row['tipe_pkt'];
        $vtujuan = $row['tujuan'];
        $vjml_orang = $row['jml_orang'];
        $vharga = $row['harga'];
    }
 }

if ($vupdate=="update"){
    $pkt->update($vid_pkt,$vkd_pkt,$vtipe_pkt,$vtujuan,$vjml_orang,$vharga);
    $rows = $pkt->tampil();
    $vid_pkt ='';
    $vkd_pkt ='';
    $vtipe_pkt ='';
    $vtujuan ='';
    $vjml_orang ='';
    $vharga ='';
}
if ($vreset=="reset"){
    $vid_pkt ='';
    $vkd_pkt ='';
    $vtipe_pkt ='';
    $vtujuan ='';
    $vjml_orang ='';
    $vharga ='';

}


?>

<form action="?" method="get">
<table>
    <tr><td>KODE PAKET</td><td>:</td><td>
        <input type="hidden" name="id_pkt" value="<?php echo $vid_pkt; ?>" /><input type="text" name="kd_pkt" value="<?php echo $vkd_pkt; ?>" /></td></tr>
    <tr><td>TIPE PAKET</td><td>:</td><td><input type="text" name="tipe_pkt" value="<?php echo $vtipe_pkt; ?>"/></td></tr>
    <tr><td>TUJUAN</td><td>:</td><td><input type="text" autocomplete="off" name="tujuan" value="<?php echo $vtujuan; ?>"/></td></tr>
    <tr><td>JUMLAH ORANG</td><td>:</td><td><input type="text" name="jml_orang" value="<?php echo $vjml_orang; ?>"/></td></tr>
    <tr><td>HARGA</td><td>:</td><td><input type="text" name="harga" value="<?php echo $vharga; ?>"/></td></tr>
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
        <td>KODE PAKET</td>
        <td>TIPE PAKET</td>
        <td>TUJUAN</td>
        <td>NO TELEPON</td>
        <td>HARGA</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_pkt']; ?></td>
            <td><?php echo $row['kd_pkt']; ?></td>
            <td><?php echo $row['tipe_pkt']; ?></td>
            <td><?php echo $row['tujuan']; ?></td>
            <td><?php echo $row['jml_orang']; ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td><a href="?id_pkt=<?php echo $row['id_pkt']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_pkt=<?php echo $row['id_pkt']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;
                <a href="index.php">REGISTRASI</a> ||
                <a href="transaksi.php">TRANSAKSI</a></td>

        </tr>
    <?php 
    } 