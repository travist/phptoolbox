<?php
if(in_array($argv[1], array("?", "-?", "--?", "help", "-help", "--help"))) {  // If they want help
   echo "Returns all the files recursively within a provided path.\n";
   echo "Usage: getfiles.php [path] [wildcard]\n";
   echo "Example: getfiles.php \"/User/Travis/Documents\" \"*.txt\"\n";   
}
else {
   include('includes/myfunctions.inc');
   $path = isset($argv[1]) ? $argv[1] : ".";
   $wildcard = isset($argv[2]) ? $argv[2] : "*";
   $files = get_files($path, $wildcard);
   foreach( $files as $file ) {
      print $file . "\n";  
   }
}
?>