<?php
    require_once __DIR__. '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    include('./input-config.php');
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli, "SELECT * FROM datanilai ");
    while ($row = mysqli_fetch_array($data)){
        $tabledata .= "
            <tr>
            <td>".$row["nis"]."</td>
            <td>".$row["namalengkap"]."</td>
            <td>".$row["jenis_kelamin"]."</td>
            <td>".$row["kelas"]."</td>
            <td>".$row["nilai_kehadiran"]."</td>
            <td>".$row["nilai_tugas"]."</td>
            <td>".$row["nilai_pts"]."</td>
            <td>".$row["nilai_pas"]."</td>
            </tr> 
        ";
        $no++;
    }
    $waktu_cetak = date('d M Y - H:i:s');
    $table = "
          <h1>Laporan Data Diri</h1>
          <h6>waktu cetak : $waktu_cetak</h6>
          <table cellpadding=5 border=1 cellspacing=0>
                <tr>
                <th>NIS</th> 
                <th>namalengkap</th> 
                <th>jenis kelamin</th> 
                <th>kelas</th>
                <th>kehadiran</th>
                <th>tugas</th>
                <th>pts</th>
                <th>pas</th>
                </tr>
                $tabledata
          </table>
    ";

    $mpdf -> WriteHTML("$table");
    $mpdf -> Output();
?>