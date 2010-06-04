<?php
if(in_array($argv[1], array("?", "-?", "--?", "help", "-help", "--help"))) {  // If they want help
   echo "Returns a Dash Media Player license provided the domain name.\n";
   echo "Usage: dashserial.php [domain name]\n";
   echo "Example: dashserial.php \"mediafront.org\"\n";   
}
else {
   include('includes/myfunctions.inc');
   
   function _get_license($domain) {
      $domain = str_replace( '.', '', $domain );
      $charmap = _get_charmap( $domain );
      $encoded = str_replace( $charmap['chars'], $charmap['mapped'], $domain );
      $rand_hex = rand(4096, 65535);      
      return (sprintf("%x", $rand_hex) . md5($encoded));    
   }
   
   function _get_charmap($domain) {
      $charmap = array();
      $charmap['chars'] = array('a', 'e', 'i', 'o', 'u', 't', 's', 'r', 'm', 'c');                           
      $charmap['mapped'] = array('+', '~', '^', '$', '*', '@', '%', '-', '#', '!');   
      return $charmap;
   }
   
   print _get_license($argv[1]); 
}   
?>