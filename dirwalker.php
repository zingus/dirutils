<?php
namespace DirUtils;

class DirWalker
{
  function walk($rootdir)
  {
    $this->_root=$rootdir;
    $this->_walk('.');
  }
  function _walk($rel)
  {
    $full=$this->_root.'/'.$rel;
    $full=preg_replace('#/\.(/)|/\.$#','\1',$full);

    //$this->action($full);
    call_user_func(array($this,'action'),$rel,$full,$this->_root);
    if(!is_dir($full)) return;

    $dp=opendir($full);
    while($entry=readdir($dp)) {
      switch($entry) {
        case '.':
        case '..':
          continue 2;
        default:
          $fn="$rel/$entry";
          $this->_walk($fn);
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
$dw->walk(realpath('.'));
*/
