<?php
if(in_array($argv[1], array("?", "-?", "--?", "help", "-help", "--help"))) {  // If they want help
   echo "Copies files recursively from one location to another.\n";
   echo "Usage: copyfiles.php [frompath] [topath] [wildcard]\n";
   echo "Example: getfiles.php \"/User/Travis/Documents\" \"/User/Scott/Documents\" \"*.txt\"\n";   
}
else {
   include('includes/myfunctions.inc');
   $frompath = isset($argv[1]) ? $argv[1] : ".";
   $topath = isset($argv[2]) ? $argv[2] : '..' . DIRECTORY_SEPARATOR . 'copy';   
   $wildcard = isset($argv[3]) ? $argv[3] : "*";
   
   function copy_file( $file ) {
      global $frompath, $topath;
      $newfile = $topath . preg_replace( '/' . $frompath . '/', '', $file, 1 );
      print "Copying file " . basename($file) . "...\n";
      smart_copy( $file, $newfile );
   }   
   
   get_files($frompath, $wildcard, true, 'copy_file');
}
?>