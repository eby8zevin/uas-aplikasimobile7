<?php
include 'koneksi.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Tambah Data</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
 <div align="center">
  <h3>Simpan Data SQL Server dengan PHP<br>Form Tambah Data</h3>
  <table>
   <form method="POST">
    <tr>
     <td>NIM :</td>
     <td><input type="number" name="NIM" id="NIM" placeholder="1172270.." required></td>
    </tr>
    <tr>
     <td>Nama :</td>
     <td><input type="text" name="Nama" id="Nama" placeholder="Nama. . ." required></td>
    </tr>
    <tr>
     <td>Program Studi :</td>
     <td>
      <select name="Prodi" id="Prodi" required>
       <option disabled="" selected="">-Pilih-</option>
       <option value="Teknik Informatika">Teknik Informatika</option>
       <option value="Manajemen Informatika">Manajemen Informatika</option>
      </select>
     </td>
    </tr>
    <tr>
     <td>Tanggal Bulan Tahun :</td>
     <td><input type="date" name="TBT" id="TBT" placeholder="DD-MM-YYYY" required></td>
    </tr>
    <tr>
     <td></td>
     <td>
      <input type="submit" name="simpan" value="Simpan">
      <a href="index.php">Kembali</a>
     </td>
    </tr>
   </form>
  </table>
  
  <?php
   //eksekusi simpan data
   if (isset($_POST['simpan'])) {
    # code...
    $NIM=$_POST['NIM'];
    $Nama=$_POST['Nama'];
    $Prodi=$_POST['Prodi'];
    $TBT=$_POST['TBT'];
    
    $sql = "INSERT INTO data_mhs (NIM, Nama, Prodi, TanggalBulanTahun) VALUES ('$NIM', '$Nama', '$Prodi', '$TBT')";  
    $query = sqlsrv_query($conn, $sql) or die(sqlsrv_errors());
    
    if ($query) {
     //redirect ke halaman index
     echo "<script>alert('Data berhasil di tambahkan!');</script>";
     echo "<meta http-equiv='refresh' content='0;url=index.php?datadisimpan=sukses'>";
    }
   }
  sqlsrv_close( $conn );
  ?>
  
 </div>
</body>
</html>
