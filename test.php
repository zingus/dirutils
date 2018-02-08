<?php
require_once 'vendor/autoload.php';

use DirUtils\Walker;

class Walk extends Walker {
  
}

$w=new Walker();
$w->walk('src');
