<?php
ini_set( "display_errors", false );
date_default_timezone_set( "Asia/Kuala_Lumpur" );  
define( "DB_HOST", "localhost" );
define( "DB_USERNAME", "unleashe_study" );
define( "DB_PASSWORD", "study1234" );
define( "DB_NAME", "unleashe_homework" );


function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
