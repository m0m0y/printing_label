<?php
$supplier_name = (isset($_GET["a"]) ? $_GET["a"] : "N/A");
$po_number = (isset($_GET["b"]) ? $_GET["b"] : "N/A");
$si_number = (isset($_GET["c"]) ? $_GET["c"] : "N/A");
$date = (isset($_GET["d"]) ? $_GET["d"] : "N/A");
$quantity = (isset($_GET["e"]) ? $_GET["e"] : "N/A");
$description = (isset($_GET["f"]) ? $_GET["f"] : "N/A");

require_once('tcpdf_include.php');

$thermalSize = array(101.6, 152.4);
$pdf = new TCPDF('P', 'mm', $thermalSize, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Inmed Corporation');
$pdf->SetTitle('Watson Cebu Box Label');
$pdf->SetSubject('Watson Cebu Box Label');

$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, '', '');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$size = 6;
$pdf->SetMargins($size, $size, $size);
$pdf->SetHeaderMargin($size);
$pdf->SetFooterMargin($size);

$pdf->SetAutoPageBreak(TRUE, 0);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('Helvetica', '', 11);

$pdf->AddPage();

$bMargin = $pdf->getBreakMargin();
$auto_page_break = $pdf->getAutoPageBreak();
$pdf->SetAutoPageBreak(false, 0);
$img_file = '../../assets/image/watson_label_lg.png';
$pdf->Image($img_file, 3, 3, 95.6, 146.4, '', '', '', false, 100, '', false, false, 0);
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
$pdf->setPageMark();

$pdf->Image('../../assets/image/logo-bnw.png', 5, 10.5, 45, 0, 'PNG', '', '', true, 1000, '', false, false, 0, false, false, false);

$responsiveFont = 13;
$headText = 13;

$printDate=date_create($date);

ob_start();
?>

<table style="padding-right: 10px;">
	<tr style="font-size: 10px; text-align: right;">
		<td>Inmed Corporation<br>5 Calle Industria Bagumbayan<br>Quezon City 1110 Philippines</td>
	</tr>
</table>

<?php
$from_address_top = ob_get_clean();

ob_start();
?>

<table>
	<tr style="font-size: <?= $responsiveFont ?>px; text-align: left;">
		<td>PO Number</td>
	</tr>
</table>

<?php
$po_number_text = ob_get_clean();

ob_start();
?>

<table>
	<tr style="font-size: 18px; text-align: left;">
		<td><b><?= $po_number ?></b></td>
	</tr>
</table>

<?php
$po_number_val = ob_get_clean();

ob_start();
?>

<table style="padding-right: 8px;">
	<tr style="font-size: <?= $responsiveFont ?>px; text-align: right;">
		<td>SI Number</td>
	</tr>
</table>

<?php
$si_number_text = ob_get_clean();

ob_start();
?>

<table style="padding-right: 15px;">
	<tr style="font-size: 18px; text-align: right;">
		<td><b><?= $si_number ?></b></td>
	</tr>
</table>

<?php
$si_number_val = ob_get_clean();

ob_start();
?>


<table>
	<tr style="font-size: <?= $responsiveFont ?>px;">
		<td>Supplier Name:</td>
	</tr>
</table>

<?php
$supplierText = ob_get_clean();

ob_start();

?>

<table width="350">
	<tr style="font-size: 20px; text-align: center;">
		<td><?= $supplier_name ?></td>
	</tr>
</table>

<?php
$supplier_name_val = ob_get_clean();

ob_start();

?>

<table>
	<tr style="font-size: <?= $responsiveFont ?>px; text-align: left;">
		<td>Print Date:</td>
	</tr>
</table>

<?php

$printing_date_text = ob_get_clean();

ob_start();

?>

<table>
	<tr style="font-size: 17px; text-align: left;">
		<td><?= date_format($printDate, 'F jS Y') ?></td>
	</tr>
</table>

<?php

$printing_date_val = ob_get_clean();

ob_start();

?>

<table>
	<tr style="font-size: <?= $responsiveFont ?>px;">
		<td>Quantity:</td>
	</tr>
</table>

<?php

$quantity_text = ob_get_clean();

ob_start();

?>

<table>
	<tr style="font-size: 17px;">
		<td><?= $quantity ?> pc<?php if ($quantity > 1) { echo "s"; } ?></td>
	</tr>
</table>

<?php

$quantity_val = ob_get_clean();

ob_start();

?>

<table>
	<tr style="font-size: <?= $responsiveFont ?>px; text-align: left;">
		<td>Product Description's:</td>
	</tr>
</table>

<?php

$product_desc_text = ob_get_clean();

ob_start();

?>

<table width="300">
	<tr style="font-size: 17px; text-align: left;">
		<td><?= $description ?></td>
	</tr>
</table>

<?php

$product_desc_val = ob_get_clean();

ob_start();

?>

<table>
	<tr style="font-size: 10px; text-align: center;">
		<td>INMED CORPORATION ALL RIGHTS RESERVED</td>
	</tr>
</table>

<?php

$credits = ob_get_clean();

ob_start();

$pdf->SetXY(40, 10);
$pdf->writeHTML($from_address_top);

$pdf->SetXY(8, 38);
$pdf->writeHTML($po_number_text);

$pdf->SetXY(10, 45);
$pdf->writeHTML($po_number_val);

$pdf->SetXY(0, 38);
$pdf->writeHTML($si_number_text);

$pdf->SetXY(8, 45);
$pdf->writeHTML($si_number_val);

$pdf->SetXY(8, 58);
$pdf->writeHTML($supplierText);

$pdf->SetXY(0, 64);
$pdf->writeHTML($supplier_name_val);

$pdf->SetXY(8, 78);
$pdf->writeHTML($printing_date_text);

$pdf->SetXY(10, 85);
$pdf->writeHTML($printing_date_val);

$pdf->SetXY(55, 78);
$pdf->writeHTML($quantity_text);

$pdf->SetXY(59, 85);
$pdf->writeHTML($quantity_val);

$pdf->SetXY(8, 98);
$pdf->writeHTML($product_desc_text);

$pdf->SetXY(10, 105);
$pdf->writeHTML($product_desc_val);

$pdf->SetXY(0, 122);
$pdf->writeHTML($credits);


$pdf->Ln();
$pdf->Output('shipping_label.pdf', 'I');