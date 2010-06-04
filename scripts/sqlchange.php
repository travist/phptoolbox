<?php
if(in_array($argv[1], array("?", "-?", "--?", "help", "-help", "--help"))) {  // If they want help
   echo "Work's as a string search and replace for SQL files.  Very useful to change the domain name of a SQL file.\n";
   echo "Usage: sqlchange.php [sql file] [old site] [new site]\n";
   echo "Example: sqlchange.php \"/User/Travis/Documents/mysite.sql\" \"tmtdigital.com\" \"mediafront.com\"\n";   
}
else {
   include('includes/myfunctions.inc');
   $sqlfile = isset($argv[1]) ? $argv[1] : "";
   $oldsite = isset($argv[2]) ? $argv[2] : "";
   $newsite = isset($argv[3]) ? $argv[3] : "";
   if( $sqlfile ) {
      sql_str_replace( $sqlfile, $oldsite, $newsite );   
   }
}
?>