<?php
 class cst {
 public $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=db_travel", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM tb_customer";
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
        $sql = "insert into tb_customer values ('','".$_GET['kd_cst']."','".$_GET['nama']."','".$_GET['alamat']."','".$_GET['no_telp']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from tb_customer where id_cst='".$_GET['id_cst']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM tb_customer where id_cst='".$_GET['id_cst']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id_cst, $kd_cst,$nama,$alamat,$no_telp)
    {
        $sql = "update tb_customer set kd_cst='".$kd_cst."', nama='".$nama."', alamat='".$alamat."', no_telp='".$no_telp."' where id_cst='".$id_cst."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($alamat){
        $sql = "SELECT * FROM tb_customer WHERE alamat LIKE '%".$alamat."%'
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