<?php

  
  echo "mySQL verion " . mysql_get_client_info() . "<br/>";
  echo "php Verion " . phpversion() . "<br/>";
  echo  "php PHP_BINDIR " . PHP_LIBDIR. "<br/>";
  echo  "php dirname(dirname(PHP_BINARY)) " . dirname(dirname(PHP_BINARY)) . "<br/>";
  phpinfo();
?>