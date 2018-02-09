<?php
namespace DirUtils;

class Walker
{
  function walk($rootDir,$bfs=false)
  {
    // WARNING bfs is unimplemented
    $this->root=realpath($rootDir);
    $this->bfs=$bfs;
    if(!$bfs)
      return $this->walkRecursive($rootDir);
    else 
      return $this->walkBFS($rootDir);
  }

  private function walkRecursive($rel)
  {
    $this->full=$this->root.'/'.$rel;
    $this->full=preg_replace('#/\.(/)|/\.$#','\1',$this->full);

    echo "$rel,$this->full\n";

    if(file_exists($rel))
      $this->action($rel);
      //call_user_func(array($this,'action'),$rel);
    if(!is_dir($this->full)) return;

    $dp=opendir($this->full);
    while($entry=readdir($dp)) {
      switch($entry) {
        case '.':
        case '..':
          continue 2;
        default:
          $fn="$rel/$entry";
          $this->walkRecursive($fn);
      }  
    }
    closedir($dp);
  }
  
  private function walkBFS($rel)
  {
    //PLANNED unimplemented
  }

  public function action($filename)
  {
    echo "$filename\n";
  }
}

/*
$dw=new dirwalker();
$dw->walk(realpath('.'));
*/
