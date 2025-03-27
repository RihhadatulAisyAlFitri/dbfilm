<?php
include("../controllers/Film.php");
include("../lib/functions.php");
$mpdf = new \Mpdf\Mpdf();
$obj = new FilmController();
$rows = $obj->getfilmList();

$html ='<!DOCTYPE html>

<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 24.8.4.2 (Windows)"/>
	<meta name="created" content="2025-01-29T20:07:49.578000000"/>
	<meta name="changed" content="2025-01-29T20:46:30.325000000"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Liberation Sans"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body>
<table cellspacing="0" border="0">
	<colgroup width="67"></colgroup>
	<colgroup width="94"></colgroup>
	<colgroup width="112"></colgroup>
	<colgroup width="281"></colgroup>
	<colgroup width="134"></colgroup>
	<colgroup width="112"></colgroup>
	<colgroup width="121"></colgroup>
	<tr>
		<td colspan=2 rowspan=8 height="142" align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br><img src="cetak_html_f7a2527d.png" width=124 height=126 hspace=28 vspace=12>
		</td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
	</tr>
	<tr>
		<td colspan=3 align="center" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;LAPORAN&quot;}"><font size=3>LAPORAN</font></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
	</tr>
	<tr>
		<td colspan=3 align="center" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;FILM&quot;}"><font size=3>FILM</font></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
	</tr>
	<tr>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
	</tr>
	<tr>
		<td colspan=3 align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;Nama: Rihhadatul ‘Aisy Al Fitri&quot;}">Nama: Rihhadatul ‘Aisy Al Fitri</td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
	</tr>
	<tr>
		<td colspan=3 align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;NIM: 220511058&quot;}">NIM: 220511058</td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
	</tr>
	<tr>
		<td colspan=3 align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;Kelas: TI22E&quot;}">Kelas: TI22E</td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
	</tr>
	<tr>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
	</tr>
	<tr>
		<td height="17" align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
	</tr>
	<tr>
		<td height="17" align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#81D41A" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;ID&quot;}">ID</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#81D41A" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;Kode_film&quot;}">Kode_film</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#81D41A" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;Judul&quot;}">Judul</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#81D41A" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;Genre&quot;}">Genre</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#81D41A" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;Tahun_rilis&quot;}">Tahun_rilis</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" bgcolor="#81D41A" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;Harga&quot;}">Harga</td>
	</tr>';

	foreach($rows as $row){

	$html .='<tr>
		<td height="17" align="left" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;&quot;}"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;id&quot;}"><font face="Liberation Serif" size=3>'.$row["id"].'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;kode_film&quot;}"><font face="Liberation Serif" size=3>'.$row["kode_film"].'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;judul&quot;}"><font face="Liberation Serif" size=3>'.$row["judul"].'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;genre&quot;}"><font face="Liberation Serif" size=3>'.$row["genre"].'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;tahun_rilis&quot;}"><font face="Liberation Serif" size=3>'.$row["tahun_rilis"].'</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" data-sheets-value="{ &quot;1&quot;: 2, &quot;2&quot;: &quot;harga&quot;}"><font face="Liberation Serif" size=3>'.$row["harga"].'</font></td>
	</tr>';

	}
$html .='
</table>
<!-- ************************************************************************** -->
</body>

</html>';

// Write HTML to PDF
$mpdf->WriteHTML($html);

// Set the filename for download
$filename = "laporan_film.pdf";

// Output the PDF for download
$mpdf->Output($filename, \Mpdf\Output\Destination::DOWNLOAD);
?>