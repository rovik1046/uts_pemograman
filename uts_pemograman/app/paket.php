<?php
 class pkt {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=db_travel", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM tb_paket";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into tb_paket values ('','".$_GET['kd_pkt']."','".$_GET['tipe_pkt']."','".$_GET['tujuan']."','".$_GET['jml_orang']."','".$_GET['harga']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from tb_paket where id_pkt='".$_GET['id_pkt']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM tb_paket where id_pkt='".$_GET['id_pkt']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id_pkt, $kd_pkt,$tipe_pkt,$tujuan,$jml_orang,$harga)
    {
        $sql = "update tb_paket set kd_pkt='".$kd_pkt."', tipe_pkt='".$tipe_pkt."', tujuan='".$tujuan."', jml_orang='".$jml_orang."', harga='".$harga."' where id_pkt='".$id_pkt."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($tujuan){
        $sql = "SELECT * FROM tb_paket WHERE tujuan LIKE '%".$tujuan."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  


 }