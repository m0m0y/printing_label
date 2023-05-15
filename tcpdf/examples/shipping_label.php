<?php

$order_referenceNo = (isset($_GET['a'])) ?$_GET['a'] : 'x';
$our_referenceNo = (isset($_GET['b'])) ? $_GET['b'] : 'x';
$ship_address = (isset($_GET['c'])) ? $_GET['c'] : 'x';
$order_date = (isset($_GET['d'])) ? $_GET['d'] : '';
$package = (isset($_GET['e'])) ? $_GET['e'] : 'x';
$print_date =  (isset($_GET['f'])) ? $_GET['f'] : 'x';
$ship_via = (isset($_GET['g'])) ? $_GET['g'] : 'x';
$remarks = (isset($_GET['h'])) ? $_GET['h'] : 'x';
$customer_name = (isset($_GET['i'])) ? $_GET['i'] : 'x';

require_once('tcpdf_include.php');

// create new PDF document
$thermalSize = array(101.6, 152.4);
$pdf = new TCPDF('P', 'mm', $thermalSize, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Panamed Philippines');
$pdf->SetTitle('Shipping Label');
$pdf->SetSubject('Shipping Label');

// set default header data
$pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, '', '');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(6, 6, 6);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('Helvetica', '', 11);

$a = 1;
$printDate=date_create($print_date);
$shipAddress = ucwords(strtolower($ship_address));

if($ship_via == "Lalamove") {
    $letter = "PL";
} else if ($ship_via == "Grab") {
    $letter = "PG";
} else if ($ship_via == "Pickup") {
    $letter = "PC";
} else if ($ship_via == "Lex PH") {
    $letter = "PX";
} else if ($ship_via == "Van") {
    $letter = "PV";
} else if ($ship_via == "Transportify") {
    $letter = "PT";
} else if ($ship_via == "Sea") {
    $letter = "PS";
} else if ($ship_via == "Air") {
    $letter = "PA";
} 

for ($page = 0; $page <= $package; $page++) {
	$pages = $page;
}

$box_number = $our_referenceNo;
$b = 0;

for ($x = 1; $x <= $package; $x++) {
	$pdf->AddPage();

	$bMargin = $pdf->getBreakMargin();
	$auto_page_break = $pdf->getAutoPageBreak();
	$pdf->SetAutoPageBreak(false, 0);
	$img_file = '../../assets/image/label_lg1.png';
	$pdf->Image($img_file, 3, 3, 95.6, 146.4, '', '', '', false, 100, '', false, false, 0);
	$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
	$pdf->setPageMark();

	$ppi_logo = $pdf->Image('../../assets/image/panamed-bnw.png', 15, 9, 42, 0, 'PNG', '', '', true, 1000, '', false, false, 0, false, false, false);

	$fragile_icon = $pdf->Image('../../assets/image/R2.png', 7, 126, 31, 0, 'PNG', '', '', true, 1000, '', false, false, 0, false, false, false);

	$responsiveFont = 13;
	$headText = 13;

	ob_start();
?>
	<table width="100">
		<tr style="font-size: <?= $responsiveFont ?>px; text-align: center;">
			<td><b><span style="font-size: 60px;"><?= $letter ?></b></span></td>
		</tr>
	</table>
<?php
	$letters = ob_get_clean();

	ob_start();
?>
	<table style="padding-right: 8px;">
		<tr style="font-size: 9px; text-align: left;">
			<td>488 G. Araneta Avenue corner Del Monte Avenue<br>Brgy. Sienna, Quezon City 1114 Philippines<br><small>Email: info@panamed.com.ph</small></td>
		</tr>
	</table>
<?php
	$from_address_top = ob_get_clean();

	ob_start();
?>
	<table>
		<tr style="font-size: 7px">
			<td>ORDER REFERENCE:</td>
		</tr>
	</table>
<?php
	$order_referenceNo_text = ob_get_clean();

	ob_start();
?>
	<table width="100">
		<tr style="font-size: 16px">
			<td><b><?= $order_referenceNo ?></b></td>
		</tr>
	</table>
<?php
		$order_reference_num = ob_get_clean();

		ob_start();
	?>
	<table width="100">
		<tr style="font-size: 7px;">
			<td>INVOICE NUMBER:</td>
		</tr>
	</table>
<?php
	$our_referenceNo_text = ob_get_clean();

	ob_start();
?>
	<table>
		<tr style="font-size: 16px;">
			<td><b><?= $our_referenceNo ?></b></td>
		</tr>
	</table>
<?php
	$our_reference_num = ob_get_clean();

	ob_start();
?>
	<table>
		<tr style="font-size: 7px;">
			<td>SHIP VIA:</td>
		</tr>
	</table>
<?php
	$ship_via_text = ob_get_clean();

	ob_start();
?>
	<table>
		<tr style="font-size: <?= $responsiveFont ?>px;">
			<td><b><?= $ship_via ?></b></td>
		</tr>
	</table>
<?php
	$shipp_via = ob_get_clean();

	ob_start();
?>
	<table>
		<tr style="font-size: 11px;">
			<td>Order Date:</td>
		</tr>
	</table>
<?php
	$orderDate_text = ob_get_clean();

	ob_start();
?>
	<table>
		<tr style="font-size: <?= $responsiveFont ?>px;">
			<td style="text-align: center;"><?= date_format(date_create($order_date), 'F jS Y') ?></td>
		</tr>
	</table>
<?php
	$date_order = ob_get_clean();

	ob_start();
?>
	<table>
		<tr style="font-size: 11px;">
			<td>Print Date:</td>
		</tr>
	</table>
<?php
	$print_date_text = ob_get_clean();

	ob_start();
?>
<table>
		<tr style="font-size: <?= $responsiveFont ?>px;">
			<td style="text-align: center;"><?=  date_format($printDate, 'F jS Y') ?></td>
		</tr>
	</table>
<?php
	$print_date = ob_get_clean();

	ob_start();
?>
	<table width="150">
		<tr style="font-size: <?= $responsiveFont ?>px;">
			<td><b><span style="font-size: 30px;"> <?= $a . " <span style=\"font-size: 15px\">of</span> " . $pages ?></b></span></td>
		</tr>
	</table>
<?php
	$box_total = ob_get_clean();

	ob_start();
?>
	<table>
		<tr style="font-size: 10px; text-align: left;">
			<td style="color: white;">Ship To</td>
		</tr>
	</table>
<?php
	$o_to = ob_get_clean();

	ob_start();
?>
	<table width="270">
		<tr style="font-size: <?= $responsiveFont ?>px;">
			<td><?= $customer_name ?></td>
		</tr>
	</table>
<?php 
	$customer_name = ob_get_clean();

	ob_start();
?>
	<table width="270">
		<tr style="font-size: <?= $responsiveFont ?>px">
			<td><b><?= $shipAddress ?></b></td>
		</tr>
	</table>
<?php 
	$ship_address = ob_get_clean();

	ob_start();
?>
	<table width="100">
		<tr>
			<td><span style="font-size: <?= $responsiveFont ?>px;">Package<?php if((int)$page > 1) { echo 's'; } ?>:</span></td>
		</tr>
	</table>
<?php
	$package_text = ob_get_clean();

	ob_start();
?>
	<table width="120">
		<tr style="font-size: <?= $responsiveFont ?>px;">
			<td><b>Remarks:</b></td>
		</tr>
	</table>
<?php
	$remarked_text = ob_get_clean();

	ob_start();
?>
	<table width="170">
		<tr style="font-size: <?= $responsiveFont ?>px;">
			<td><?= ($remarks) ? : 'Please handle package with care.' ?></td>
		</tr>
	</table>
<?php
	$remarks = ob_get_clean();

	ob_start();

    $pdf->SetXY(68, 8);
	$pdf->writeHTML($letters);

	$pdf->SetXY(10, 21);
	$pdf->writeHTML($from_address_top);

	$pdf->SetXY(7, 33.5);
	$pdf->writeHTML($order_referenceNo_text);

	$pdf->SetXY(7, 36.5);
	$pdf->writeHTML($order_reference_num);

	$pdf->SetXY(35.5, 33.5);
	$pdf->writeHTML($our_referenceNo_text);

	$pdf->SetXY(35.5, 36.5);
	$pdf->writeHTML($our_reference_num);

	$pdf->SetXY(70, 33.5);
	$pdf->writeHTML($ship_via_text);

	$pdf->SetXY(70, 37);
	$pdf->writeHTML($shipp_via);

	$style = array(
		'position' => 'C',
		'border' => false,
		'fgcolor' => array(0,0,0),
		'text' => true
	);

	$pdf->write1DBarcode($box_number, 'C39E', 7, 51, '', 20, 0.45, $style, 'N');

	$pdf->SetXY(53, 100);
	$pdf->writeHTML($orderDate_text);

	$pdf->SetXY(45, 104);
	$pdf->writeHTML($date_order);

	$pdf->SetXY(53, 110);
	$pdf->writeHTML($print_date_text);

	$pdf->SetXY(45, 114);
	$pdf->writeHTML($print_date);

	$pdf->StartTransform();
	$pdf->Rotate(90, 13.5, 80);
	$pdf->SetXY(0, 73.5);
	$pdf->writeHTML($o_to);
	$pdf->StopTransform();

	$pdf->SetXY(15, 80.5);
	$pdf->writeHTML($customer_name);

	$pdf->SetXY(15, 89);
	$pdf->writeHTML($ship_address);

	$pdf->SetXY(8, 102);
	$pdf->writeHTML($package_text);

	$pdf->SetXY(10.5, 105.5);
	$pdf->writeHTML($box_total);

	$pdf->SetXY(42, 125);
	$pdf->writeHTML($remarked_text);

	$pdf->SetXY(42, 130);
	$pdf->writeHTML($remarks);
		
	$pdf->Ln();
	$a++;
	// $b++;

	$pdf->lastPage();
	//Close and output PDF document

}

$pdf->Output('shipping_label.pdf', 'I');
?>