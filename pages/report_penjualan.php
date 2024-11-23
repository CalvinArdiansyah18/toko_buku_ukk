<?php
ob_start();
include "../conf/conn.php";
require_once("../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
// $id = $_GET['id'];
$query = mysqli_query($koneksi, "select * from buku");

$html = '<center><h3>Data buku</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
  <tr>
  <th>No</th>
  <th>Nama Komik</th>
  <th>Penulis</th>
  <th>Penerbit</th>
  <th>Tahun</th>
  <th>Stok</th>
  <th>Harga Jual</th>
  </tr>';
  $no = 1;
  while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr style='text-align: center;'>
      <td>" . $no . "</td>
      <td>" . $row['judul'] . "</td>
      <td>" . $row['penulis'] . "</td>
      <td>" . $row['penerbit'] . "</td>
      <td>" . $row['tahun'] . "</td>
      <td>" . $row['stok'] . "</td>
      <td>" . $row['harga_jual'] . "</td>
    </tr>";
    $no++;
  }
  
  $html .= '</table>';
  
  // Load HTML into DOMPDF
  $dompdf->loadHtml($html);
  
  // Set paper size and orientation
  $dompdf->setPaper('A4', 'portrait');
  
  // Render the PDF
  $dompdf->render();
  
  // Clear the output buffer to prevent extra whitespace or errors
  ob_end_clean();
  
  // Set headers to let the browser know it's a PDF document
  header("Content-type: application/pdf");
  header("Content-Disposition: inline; filename=daftar_data_distributor.pdf");
  
  // Output the generated PDF to the browser
  $dompdf->stream("daftar_data_distributor.pdf", array("Attachment" => false));
  ?>