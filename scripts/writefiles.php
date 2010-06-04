<?php
if(in_array($argv[1], array("?", "-?", "--?", "help", "-help", "--help"))) {  // If they want help
   echo "Works much like getfiles.php, except it automatically writes the file paths to a file.\n";
   echo "Usage: writefiles.php [path] [wildcard] [file]\n";
   echo "Example: writefiles.php \"/User/Travis/Documents\" \"*.txt\" \"files.txt\"\n";    
}
else {
   include('includes/myfunctions.inc');
   $path = isset($argv[1]) ? $argv[1] : ".";
   $wildcard = isset($argv[2]) ? $argv[2] : "*";
   $file = isset($argv[3]) ? $argv[3] : "files.txt";
   $handle = fopen( $file, 'w' );

   function write_to_file( $file ) {
      global $handle;
      print "Adding file " . basename($file) . "...\n";
      fwrite( $handle, $file . "\n" );
   }

   if( $handle ) {
      get_files( $path, $wildcard, true, 'write_to_file' );
      fclose( $handle );
   }
  
}
?>