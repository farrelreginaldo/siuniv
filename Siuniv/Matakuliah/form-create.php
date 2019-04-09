<?php

include '../connect.php';

$query = "SELECT id_dosen, nama_dosen FROM dosen";
$result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Isi Data Matakuliah</h1>
    <form action="create.php" method="post">
      <table>
        <tr>
          <td><label for="kode">Kode</label></td>
          <td>:</td>
          <td><input type="text" name="kode" id="kode"></td>
        </tr>
        <tr>
          <td><label for="nama_matkul">Matakuliah</label></td>
          <td>:</td>
          <td><input type="text" name="nama_matkul" id="nama_matkul"></td>
        </tr>
        <tr>
          <td><label for="sks">SKS</label></td>
          <td>:</td>
          <td><input type="number" name="sks" id="sks"></td>
        </tr>
        <tr>
          <td><label for="semester">Semester</label></td>
          <td>:</td>
          <td><input type="number" name="semester" id="semester"></td>
        </tr>
        <tr>
          <td><label for="nama_dosen">Dosen Pengajar</label></td>
          <td>:</td>
          <td><select name="id_dosen" id="nama_dosen">
            <option value="NULL">--Pilih salah satu--</option>
            <?php
            $query = "SELECT id_dosen, nama_dosen FROM dosen";
            $result = mysqli_query($connect, $query);
            while ($data = mysqli_fetch_assoc($result)){ ?>
              <option value="<?php echo $data['id_dosen']; ?>">
                  <?php echo $data['nama_dosen']; ?>
              </option>
            <?php
            } ?>
          </td>
          </select>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td><input type="submit" value="Simpan"></td>
        </tr>
      </table>
    </form>
  </body>
</html>
