<?php
/*************************************************************************
php easy :: pagination scripts set - Version Three
==========================================================================
Author:      php easy code, www.phpeasycode.com
Web Site:    http://www.phpeasycode.com
Contact:     webmaster@phpeasycode.com
*************************************************************************/
function paginate_three($reload, $page, $tpages, $adjacents,$maxpage=NULL) {
	//echo $page;
	$prevlabel = "&lsaquo; Prev";
	$nextlabel = "Next &rsaquo;";
	
	$out = "<div class=\"page\">\n";
	
	// previous
	if($page==1) {
		$out.= "<span>" . $prevlabel . "</span>\n";
	}
	elseif($page==2) {
		$out.= "<a style='cursor:pointer;' onclick=iframepaging('1') >" . $prevlabel . "</a>\n";
		//$out.= "<a onclick='paging(".$reload.")' href=\"" . $reload . "\">" . $prevlabel . "</a>\n";
	}
	else {
		//$out.= "<a href=\"" . $reload . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a>\n";
		$out.= "<a style='cursor:pointer;' onclick=iframepaging('". ($page-1) ."')  >" . $prevlabel . "</a>\n";
	}
	
	// first
	if($page>($adjacents+1)) {
		$out.= "<a  style='cursor:pointer;' onclick=iframepaging('') >1</a>\n";
		//$out.= "<a href=\"" . $reload . "\">1</a>\n";
	}
	
	// interval
	if($page>($adjacents+2)) {
		//$out.= "...\n";
		$out .= '';//"...\n";
	}
	
	// pages
	//echo $page;
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = $maxpage?$maxpage:(($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages);
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<span class=\"current\">" . $i . "</span>\n";
		}
		elseif($i==1) {
			$out.= "<a style='cursor:pointer;' onclick=iframepaging('" . $i . "')>" . $i . "</a>\n";
		}
		else {
			if(($i>$page-4) and ($i<$page+4) and ($i!=$pmax)) {
				$out.= "<a style='cursor:pointer;' onclick=iframepaging('".$i."')>" . $i . "</a>\n";
			}
			if(($i==$pmax)) {
				$out.= "<a style='cursor:pointer;' onclick=iframepaging('".$i."')>" . $i . "</a>\n";
			}
		}
	}
	
	// interval
	if($page <($tpages-$adjacents-1)) {
		//$out.= "...";
		//$out .= '';//"...\n";
	}
	
	// last
	if($page<($tpages-$adjacents)) {
		//$out .= "<a onclick=paging('". $tpages."')></a>\n";
	}
	
	// next
	//echo $maxpage; 
	if($page<$maxpage) {
		$out .= "<a style='cursor:pointer;' onclick=iframepaging('".($page+1)."')>" . $nextlabel . "</a>\n";
	}
	else {
		$out .= "<span>" . $nextlabel . "</span>\n";
	}
	
	$out .= "</div>";
	
	return $out;
}
?>