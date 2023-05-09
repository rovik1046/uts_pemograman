<?php
// class induk
class Customer {
	// property
	protected $id_cst;
	protected $kd_cst;
	protected $nama;
	protected $alamat;
	protected $no_telp;
	
	
	// constructor
	public function __construct($id, $kd, $nama, $alamat, $no) {
	  $this->id_cst = $id;
	  $this->kd_cst = $kd;
	  $this->nama = $nama;
	  $this->alamat = $alamat;
	  $this->no_telp = $no;
	  
	}
  
	// method
	public function getId() {
	  return $this->id_cst;
	}
	public function getKode() {
	  return $this->kd_cst;
	}
	public function getNama() {
	  return $this->nama;
	}
	public function getAlamat() {
	  return $this->alamat;
	}
	public function getNo() {
	  return $this->no_telp;
	}
  }
  
  // class turunan
  class TampilanCustomer extends Customer {
	// method
	public function tampilDataCustomer() {
	  // koneksi ke database
	  $servername = "localhost";
	  $username = "root"; // ganti sesuai dengan username database Anda
	  $password = ""; // ganti sesuai dengan password database Anda
	  $dbname = "db_travel";
  
	  $conn = new mysqli($servername, $username, $password, $dbname);
  
	  // cek koneksi
	  if ($conn->connect_error) {
		die("Koneksi gagal: " . $conn->connect_error);
	  }
  
	  // query untuk mengambil data anggota
	  $sql = "SELECT * FROM tb_customer";
	  $result = $conn->query($sql);
  
	  // menampilkan data anggota dalam bentuk tabel
	  echo "<table border='1'>";
	  echo "<tr>";
	  echo "<th>ID Customer</th>";
	  echo "<th>Kode Customer</th>";
	  echo "<th>Nama</th>";
	  echo "<th>Alamat</th>";
	  echo "<th>No.Telepon</th>";
	  echo "</tr>";
  
	  if ($result) {
		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row['id_cst']."</td>";
			echo "<td>".$row['kd_cst']."</td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['alamat']."</td>";
			echo "<td>".$row['no_telp']."</td>";
			echo "</tr>";
		  }
		} else {
		  echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
		}
	  } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
  
	  echo "</table>";
  
	  $conn->close();
	}
  }
  
  // objek
  $data_customer = new TampilanCustomer("", "", ""," ", "");
  $data_customer->tampilDataCustomer();
?>