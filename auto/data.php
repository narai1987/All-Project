<?php

if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

require_once('classes/CMySQL.php');
session_start();
$_SESSION['mystate'];
$sParam = $GLOBALS['MySQL']->escape($_GET['q']); // escaping external data
if (! $sParam) exit;

switch ($_GET['mode']) {
    case 'xml': // using XML file as source of data
        $aValues = $aIndexes = array();
        $sFileData = file_get_contents('data.xml'); // reading file content
        $oXmlParser = xml_parser_create('UTF-8');
        xml_parse_into_struct($oXmlParser, $sFileData, $aValues, $aIndexes);
        xml_parser_free( $oXmlParser );

        $aTagIndexes = $aIndexes['ITEM'];
        if (count($aTagIndexes) <= 0) exit;
        foreach($aTagIndexes as $iTagIndex) {
            $sValue = $aValues[$iTagIndex]['value'];
            if (strpos($sValue, $sParam) !== false) {
                echo $sValue . "\n";
            }
        }
        break;
    case 'sql': // using database as source of data
        //$sRequest = "SELECT `country_name` FROM `s85_countries` WHERE `country_name` LIKE '%{$sParam}%' ORDER BY `country_code`";
		$sRequest = $_SESSION['mystate']?"SELECT distinct(pc.pcode) FROM postalcode pc JOIN cities c ON pc.city_id = c.id WHERE c.state_id = '".$_SESSION['mystate']."' AND pc.pcode LIKE '{$sParam}%'":"SELECT distinct(pc.pcode) FROM postalcode pc JOIN cities c ON pc.city_id = c.id WHERE  pc.pcode LIKE '{$sParam}%'";
       
		//file_put_contents("text.txt",$sRequest);
        $aItemInfo = $GLOBALS['MySQL']->getAll($sRequest);
		if(count($aItemInfo)) {
			foreach ($aItemInfo as $aValues) {
			   /* echo $aValues['address'] . "\n";
				echo $aValues['postalcode'] . "\n";*/
				echo $aValues['pcode'] . "\n";
			}
		}
		else {
			/*$sRequest = "SELECT distinct(address) FROM `provider_address` WHERE `address` LIKE '%{$sParam}%' or `postalcode` LIKE '%{$sParam}%' ORDER BY `address`";
			$aItemInfo = $GLOBALS['MySQL']->getAll($sRequest);
			foreach ($aItemInfo as $aValues) {
				echo $aValues['address'] . "\n";
			}*/
			$sRequest = $_SESSION['mystate']?"SELECT distinct(city) FROM `cities` WHERE state_id = '".$_SESSION['mystate']."' and `city` LIKE '{$sParam}%'  ORDER BY `city`":"SELECT distinct(city) FROM `cities` WHERE `city` LIKE '{$sParam}%'  ORDER BY `city`";
			//file_put_contents("text.txt",$sRequest);
			$aItemInfo = $GLOBALS['MySQL']->getAll($sRequest);
			foreach ($aItemInfo as $aValues) {
				echo $aValues['city'] . "\n";
			}
		}
        break;
}