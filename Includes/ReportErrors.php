<?php
   // report all errors, but no notice
   //error_reporting(E_ALL ^ (E_NOTICE));  
   //error_reporting(E_ALL ^ (E_NOTICE) ^ (E_WARNING));  
    // disable error warning and notices
   error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); 
   //error_reporting(E_ALL);
  //error_reporting(E_ALL);

