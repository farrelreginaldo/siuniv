<?php

session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}
include '../connect.php';
$cari = $_GET['cari'];

$query = "SELECT * FROM dosen WHERE nama_dosen LIKE '%$cari%'";
$result = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border='1'>
      <h2>Data Dosen</h2>
      <tr>
        <th>No.</th>
        <th>Nama Dosen</th>
        <th>Telepon</th>
        <th colspan="2">Aksi</th>
      </tr>

      <?php

          if($num > 0)
          {
              $no = 1;
              while($data = mysqli_fetch_assoc($result))
              {
                  echo "<tr>";
                  echo "<td>" . $no . "</td>";
                  echo "<td>" . $data['nama_dosen'] . "</td>";
                  echo "<td>" . $data['telp'] . "</td>";
                  echo "<td><a href='form-update.php?id_dosen=" . $data['id_dosen'] . "'>Edit</a> | ";
                  echo "<td><a href='delete.php?id_dosen=" . $data['id_dosen'] . "'onclick='return confirm(\"Apakah Anda Yakin Ingin Menghapus Data?\")'>Hapus</a></td>";
                  echo "</tr>";
                  $no++;
              }
          } else {
              echo "<td colspan='4'>Tidak Ada Data</td>";
          }
      ?>
    </table>
    <form action="../Login/logout.php">
      <table>
        <tr>
          <td><input type="submit" value="Logout"></td>
        </tr>
      </table>

    </form>
  </body>
  </html>
