<?php 
/*echo '<pre>';
print_r($results);
exit;*/

require_once 'Excel/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

$objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);
/*Excel Heading*/
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Trip Title')
            ->setCellValue('B1', 'Name!')
            ->setCellValue('C1', 'Email')
            ->setCellValue('D1', 'Mobile')
			->setCellValue('E1', 'Trip Type')
			->setCellValue('F1', 'Txn Id')
			->setCellValue('G1', 'Booking Date')
			->setCellValue('H1', 'Cancel Date')
			->setCellValue('I1', 'Trip Satus')
			->setCellValue('J1', 'Total Amount');
			/*->setCellValue('I1', 'Trip Type');*/




$i=2;
foreach($results as $data) {
	//$mob = "-".(string)$data['mobile'];
	$cance_status = $data['cancel_status']==1?'Cancel Pending':($data['cancel_status']==2?'Cancel Completed':'');
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $data['trip_title'])
            ->setCellValue('B'.$i, $data['fname']." ".$data['lname'])
            ->setCellValue('C'.$i, $data['email'])
            ->setCellValue('D'.$i, ' '.$data['mobile'])
			->setCellValue('E'.$i, $data['trip_type'])	
			->setCellValue('F'.$i, $data['txn_paypal_txn_id'])	
			->setCellValue('G'.$i, $data['booking_date'])	
			->setCellValue('H'.$i, $data['cancel_date'])	
			->setCellValue('I'.$i, $cance_status)
			->setCellValue('J'.$i, $data['grand_total']);	
    		$i++;
			
 } 




// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client's web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="trip_booking_cancel_report_'.date('Y-m-d').'.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

?>