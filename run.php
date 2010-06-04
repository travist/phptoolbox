<?php
include('includes/myfunctions.inc');
$php_exe = $argv[1];
set_time_limit(0);
chdir( dirname(__FILE__) ); 
 
while(!0)
{
   $files = get_files( "scripts", "*.php");     // Find all PHP files.
   print "\nWhich script would you like to run? (\"?\" for help)\n";
   for($i=0; $i < count($files); $i++) {
      print '    '. ($i+1) .') '. basename($files[$i]);
	   print "\n";
   }
   print "    r) Refresh List\n";
   print "    x) Exit\n\n";

   $input = readline();
	if(($pos = strpos($input, " ")) !== FALSE) {
      $select = substr($input, 0, $pos);
      $args = substr($input, $pos);      
   }
   else {
      $select = $input;
      $args = '';      
   }   
   if(($pos = strpos($input, " ")) !== FALSE) {
      $select = substr($input, 0, $pos);
      $args = substr($input, $pos);      
   }
   else {
      $select = $input;
      $args = '';      
   }
   
   if( $select ) {
		if(in_array($select, array("?", "-?", "--?", "help", "-help", "--help"))) {  // If they want help
			echo "\nEnter a number to run that script.\n";  
			echo "Any arguments passed after that number will be passed as arguments to that\n";
			echo "script.  These arguments can then be accessed inside that script using the\n";
			echo "standard \$argv array.  You can also stream data to an external file using\n";
			echo "the >> command. If you wish to view the help for any script, simply type the number of\n";
			echo "that script followed by \"?\".  Example, to view the help for script 3, you would\n";
			echo "enter \"3 ?\".  All scripts should reside in the \"scripts\" directory.\n";      
		}
		else if(strtolower($select) == "x") {
			exit();         
		}
		else if(strtolower($select) != "r") {
			  settype($select, "integer");
			  if(is_integer($select) && $select <= count($files)){
				echo "\n";
				echo '**** Running '. $files[($select - 1)] .' ****';
				echo "\n\n";      
				echo shell_exec($php_exe . " " . $files[($select - 1)] . $args);
				echo "\n\n";
				echo '**** End ****';
				echo "\n";
			}
			  else {
			 echo "\nInvalid Selection.  Please Select a Number.";     
			} 
		}
   }
}
?>
