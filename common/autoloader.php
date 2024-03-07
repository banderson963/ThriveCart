<?php
	spl_autoload_register( function( $class ) {
		$filePath = str_replace( "\\", DIRECTORY_SEPARATOR, $class );
		$fileName = $_SERVER["DOCUMENT_ROOT"] . "/core/classes/{$filePath}.php";
		if( file_exists( $fileName ) ) {
			require_once $fileName;
		}
	} );