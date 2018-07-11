<?php 

/**
 * \brief getWhitelist
 *
 * Returns a indexed whitelist for dynamic page load.
 *
 * \param	Relative path from DOCUMENT_ROOT
 * \param	File type of the indexed pages
 * \return	Indexed whitelist
 *
 */
function getWhitelist($relPath, $filetype) {
	if( $handle = opendir($relPath) ) {
		while( $file = readdir($handle) ) {
			if( strstr($file, '.'.$filetype) ) {
				$index = substr($file, 0, strpos($file, '.', 0));
				$whitelist[$index] = $relPath."/".$file; 
			}
		}
		closedir($handle);
		return $whitelist;
	}
	else {
		throw new Exception("Relative path \"".$relPath."\" is wrong or does not exist!");
	}
}

try {
	$whitelist = getWhitelist("inc", "php");
	
	if( empty($_REQUEST) ) {	
		$_REQUEST['id'] = 'home';
	}
		
	if( array_key_exists($_REQUEST['id'], $whitelist) ) {
		include_once($whitelist[$_REQUEST['id']]);
	}
	else {
		include_once($whitelist['home']);
	}
}
catch( Exception $e ) {
	echo "<p class=\"error\"><b>Exception: ".$e->getMessage()."</b></p>";
}

?>