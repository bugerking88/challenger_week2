<?php

class Tool {

    function repeatString($iCount, $sWhat = "*") {
        $result = "";
    	if ($iCount > 0) {
    		if ($iCount <= 20) {
    			for ($i = 1; $i <= $iCount; $i++) {
    				$result .= $sWhat;
    			}
    		}
    		else {
    			$result = "iCount <= 20 please.";
    		}
    	}
    	else {
    		$result = "iCount > 0 please.";
    	}
    	return $result;
    } // end of repeatString

}  // end of class Tool

?>