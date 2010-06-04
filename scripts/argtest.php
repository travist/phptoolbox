<?php
if(in_array($argv[1], array("?", "-?", "--?", "help", "-help", "--help"))) {  // If they want help
   echo "Tests how arguments are passed to the script.\n";
   echo "Usage: argtest.php [arg1] [arg2] [arg3]\n";
   echo "Example: argtest.php testing one two three";   
}
else {
   for( $i=0; $i < $argc; $i++ ) {
      print '$argv[' . $i . '] = ' . $argv[$i] . "\n";   
   }
}
?>