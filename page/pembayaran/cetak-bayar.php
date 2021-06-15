<?php
include('../../koneksi.php');
require_once("../../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "select * from tb_bayar ORDER BY id ASC");
$html = '<center><h3>Daftar Rekap Pembayaran</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>No.</th>
 <th>ID</th>
 <th>Nama Customer</th>
 <th>Tagihan</th>
 <th>Tanggal Checkout</th>
 <th>Status Pembayaran</th>
 </tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
 <td>" . $no . "</td>
 <td>" . $row['id'] . "</td>
 <td>" . $row['customer'] . "</td>
 <td>" . $row['tagihan'] . "</td>
 <td>" . $row['tgl_checkout'] . "</td>
 <td>" . $row['status'] . "</td>
 </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_bayar.pdf');
