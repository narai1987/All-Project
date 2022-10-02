<?php
/*************************************************************************
php easy :: pagination scripts set - DEMO
==========================================================================
Author:      php easy code, www.phpeasycode.com
Web Site:    http://www.phpeasycode.com
Contact:     webmaster@phpeasycode.com
*************************************************************************/
$page   = intval($_GET['page']);
$tpages = ($_GET['tpages']) ? intval($_GET['tpages']) : 20; // 20 by default
$adjacents  = intval($_GET['adjacents']);

if($page<=0)  $page  = 5;
if($adjacents<=0) $adjacents = 4;

$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages . "&amp;adjacents=" . $adjacents;
?><head>

<link rel="stylesheet" type="text/css" href="paginate.css">
</head>




<div align="center">

<br>

<p>paginate_three:</p>
<?php
include("pagination3.php");
echo paginate_three($reload, $page, $tpages, $adjacents);

?>
</div>



