<?php 



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

$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);
/*Excel Heading*/
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Name')
            ->setCellValue('B1', 'Email!')
            ->setCellValue('C1', 'Trip Status')
            ->setCellValue('D1', 'Trip Name')
			->setCellValue('E1', 'Payed Total')
			->setCellValue('F1', 'No Of Person')
			->setCellValue('G1', 'No Of Child')
			->setCellValue('H1', 'Mobile')
			->setCellValue('I1', 'Start Date')
			->setCellValue('J1', 'End Date')
			->setCellValue('K1', 'Trip Type');




$i=2;
foreach($results as $data) {
	//$mob = "-".(string)$data['mobile'];
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $data['fname']." ".$data['lname'])
            ->setCellValue('B'.$i, $data['email'])
            ->setCellValue('C'.$i, $data['trip_status'])
            ->setCellValue('D'.$i, $data['trip_title'])
			->setCellValue('E'.$i, $data['grand_total'])	
			->setCellValue('F'.$i, $data['no_of_person'])	
			->setCellValue('G'.$i, $data['no_of_child'])
			->setCellValue('H'.$i, ' '.$data['mobile'])	
			->setCellValue('I'.$i, $data['booking_date'])	
			->setCellValue('J'.$i, $data['end_date'])	
			->setCellValue('K'.$i, $data['trip_type_id']);	
    		$i++;
			
 } 




// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client's web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="trip_booking_report_'.date('Y-m-d').'.xls"');
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