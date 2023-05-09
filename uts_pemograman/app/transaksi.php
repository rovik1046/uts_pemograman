<?php
require_once "customer.php";
class trs extends cst {
    public function tampil()
    {
        $sql = "SELECT * FROM tb_transaksi";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
        }
}
?>