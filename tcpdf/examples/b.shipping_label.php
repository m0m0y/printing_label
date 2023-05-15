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
$pdf->SetAuthor('Inmed Corporation');
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
$size = 6;
$pdf->SetMargins($size, $size, $size);
$pdf->SetHeaderMargin($size);
$pdf->SetFooterMargin($size);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('Helvetica', '', 11);

$a = 1;
$printDate=date_create($print_date);
$shipAddress = ucwords(strtolower($ship_address));

for ($page = 0; $page <= $package; $page++) {
	$pages = $page;
}

$box_number = $our_referenceNo;

for ($x = 1; $x <= $package; $x++) {
	$pdf->AddPage();

	$bMargin = $pdf->getBreakMargin();
	$auto_page_break = $pdf->getAutoPageBreak();
	$pdf->SetAutoPageBreak(false, 0);
	$img_file = '../../assets/image/label_lg.png';
	$pdf->Image($img_file, 3, 3, 95.6, 146.4, '', '', '', false, 100, '', false, false, 0);
	$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
	$pdf->setPageMark();

	$pdf->Image('../../assets/image/logo-bnw.png', 4, 10.5, 33, 0, 'PNG', '', '', true, 1000, '', false, false, 0, false, false, false);

	$pdf->Image('../../assets/image/19th_logo.jpg', 73, 7.5, 22.5, 0, 'JPG', '', '', true, 1000, '', false, false, 0, false, false, false);
	$responsiveFont = 13;
	$headText = 13;
	ob_start();
	?>
	<table width="160">
	<tr style="font-size: <?= $responsiveFont ?>px; text-align: center;">
		<td><b><span style="font-size: 30px;"> <?= $a . " <span style=\"font-size: 15px\">of</span> " . $pages ?></b></span></td>
	</tr>
	</table>
	<?php
	$box_total = ob_get_clean();

	ob_start();
	?>
	<table width="138">
	<tr style="text-align: center;">
		<td><span style="font-size: <?= $responsiveFont ?>px; color: #fff">Package<?php if((int)$page > 1) { echo 's'; } ?></span></td>
	</tr>
	</table>
	<?php
	$package_text = ob_get_clean();

	ob_start();
	?>
	<table style="">
	<tr style="font-size: 9px; text-align: center;">
		<td>Inmed Corporation<br>5 Calle Industria Bagumbayan<br>Quezon City 1110 Philippines</td>
	</tr>
	</table>
	<?php
	$from_address_top = ob_get_clean();

	ob_start();
	?>
	<table>
		<tr style="font-size: 7px">
			<td>ORDER REFERENCE</td>
		</tr>
	</table>
	<?php
	$order_referenceNo_text = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: 18px">
		<td><b><?= $order_referenceNo ?></b></td>
	</tr>
	</table>
	<?php
	$order_reference_num = ob_get_clean();

	ob_start();
	?>
	<table style="padding-right: 8px;">
	<tr style="font-size: 7px; text-align: right;">
		<td>INVOICE NUMBER</td>
	</tr>
	</table>
	<?php
	$our_referenceNo_text = ob_get_clean();

	ob_start();
	?>
	<table style="padding-right: 8px;">
	<tr style="font-size: 18px; text-align: right;">
		<td><b><?= $our_referenceNo ?></b></td>
	</tr>
	</table>
	<?php
	$our_reference_num = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: <?= $responsiveFont ?>px">
		<td><?= $customer_name ?></td>
	</tr>
	</table>
	<?php 
	$customer_name = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: <?= $responsiveFont ?>px">
		<td><b><?= $shipAddress ?></b></td>
	</tr>
	</table>
	<?php 
	$ship_address = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: <?= $responsiveFont ?>px;">
		<td><b>Order Date</b></td>
	</tr>
	</table>
	<?php
	$date_order_text = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: <?= $responsiveFont ?>px;">
		<td><?= date_format(date_create($order_date), 'F jS Y') ?></td>
	</tr>
	</table>
	<?php
	$date_order = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: <?= $responsiveFont ?>px;">
		<td><b>Print Date</b></td>
	</tr>
	</table>
	<?php
	$print_date_text = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: <?= $responsiveFont ?>px;">
		<td><?=  date_format($printDate, 'F jS Y') ?></td>
	</tr>
	</table>
	<?php
	$print_date = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: <?= $responsiveFont ?>px; text-align: left;">
		<td><b>Buyer</b></td>
	</tr>
	</table>
	<?php
	$o_to = ob_get_clean();

	ob_start();
	?>
	<table width="120">
	<tr style="font-size: <?= $responsiveFont ?>px;">
		<td><b>Remarks</b></td>
	</tr>
	</table>
	<?php
	$remarked_text = ob_get_clean();

	ob_start();
	?>
	<table width="150">
	<tr style="font-size: <?= $responsiveFont ?>px;">
		<td><?= ($remarks) ? : 'Please handle package with care.' ?></td>
	</tr>
	</table>
	<?php
	$remarks = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: <?= $responsiveFont ?>px;">
		<td><b>Ship via</b></td>
	</tr>
	</table>
	<?php
	$ship_via_text = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: <?= $responsiveFont ?>px;">
		<td><?= $ship_via ?></td>
	</tr>
	</table>
	<?php
	$ship_via = ob_get_clean();

	ob_start();
	?>
	<table>
	<tr style="font-size: 5px; text-align: center">
		<td>inmed.com.ph</td>
	</tr>
	</table>
	<?php
	$website = ob_get_clean();

	ob_start();


	$pdf->SetXY(3.5, 93);
	$pdf->writeHTML($box_total);

	$pdf->SetXY(8, 84.5);
	$pdf->writeHTML($package_text);

	$pdf->SetXY(10, 10);
	$pdf->writeHTML($from_address_top);

	$pdf->SetXY(10, 25.5);
	$pdf->writeHTML($order_referenceNo_text);

	$pdf->SetXY(10, 28.5);
	$pdf->writeHTML($order_reference_num);

	$pdf->SetXY(10, 25.5);
	$pdf->writeHTML($our_referenceNo_text);

	$pdf->SetXY(10, 28.5);
	$pdf->writeHTML($our_reference_num);

	$pdf->SetXY(60, 96);
	$pdf->writeHTML($print_date_text);

	$pdf->SetXY(60, 101);
	$pdf->writeHTML($print_date);

	$style = array(
		'position' => 'C',
		'border' => false,
		'fgcolor' => array(0,0,0),
		'text' => true,
	);

	$pdf->write1DBarcode($our_referenceNo, 'C39E', 7, 40, '', 15, 0.34, $style, 'N');

	$pdf->SetXY(16, 65);
	$pdf->writeHTML($customer_name);

	$pdf->SetXY(16, 73);
	$pdf->writeHTML($ship_address);

	$pdf->SetXY(60, 85.5);
	$pdf->writeHTML($date_order_text);

	$pdf->SetXY(60, 90.5);
	$pdf->writeHTML($date_order);

	$pdf->StartTransform();
	$pdf->Rotate(90, 12, 77);
	$pdf->SetXY(11, 71);
	$pdf->writeHTML($o_to);
	$pdf->StopTransform();

	$pdf->StartTransform();
	$pdf->Rotate(90, 19.5, 140.5);
	$pdf->SetXY(16, 127);
	$pdf->writeHTML($remarked_text);
	$pdf->StopTransform();

	$pdf->SetXY(18, 131);
	$pdf->writeHTML($remarks);

	$pdf->StartTransform();
	$pdf->Rotate(90, 12.5, 116.5);
	$pdf->SetXY(6, 110.5);
	$pdf->writeHTML($ship_via_text);
	$pdf->StopTransform();

	$pdf->SetXY(18, 113);
	$pdf->writeHTML($ship_via);

	$style = array(
		'border' => false,
		'vpadding' => '0',
		'hpadding' => '0',
		'fgcolor' => array(0,0,0),
		'bgcolor' => false,
		'module_width' => 1,
		'module_height' => 1
	);

	$pdf->write2DBarcode('https://inmed.com.ph', 'QRCODE,H', 78, 127, 15, 15, $style, 'N');

	$pdf->SetXY(76, 143);
	$pdf->writeHTML($website);

	$pdf->Ln();
	$a++;
}

$pdf->Output('shipping_label.pdf', 'I');
?>