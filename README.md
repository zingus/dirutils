# Example

    <?php

    require_once "vendor\autoload.php";
    use DirUtils\DirWalker;

    class walker extends DirWalker {
      function action($filename){
      }
    }

    $foobar=new foobar();
    $foobar->walk('.');
