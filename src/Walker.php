<?php
namespace DirUtils;

class Walker
{
  function __construct($rootdir)
  {
    $this->root=$rootdir;
    $this->walkDir('.');
  }
  private function walkDir($rel)
  {
    $this->full=$this->root.'/'.$rel;
    $this->full=preg_replace('#/\.(/)|/\.$#','\1',$this->full);

    //$this->action($full);
    call_user_func(array($this,'action'),$rel);
    if(!is_dir($this->full)) return;

    $dp=opendir($this->full);
    while($entry=readdir($dp)) {
      switch($entry) {
        case '.':
        case '..':
          continue 2;
        default:
          $fn="$rel/$entry";
          $this->walkDir($fn);
      }  
    }
    closedir($dp);
  }

  function action($filename)
  {
    echo "$filename\n";
  }
}

/*
$dw=new dirwalker();
$dw->__construct(realpath('.'));
*/
