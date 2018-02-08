## Example

    <?php

    require_once "vendor\autoload.php";
    use DirUtils\DirWalker;

    class walker extends DirWalker {
      function action($filename,$fullpath,$root) {
      }
    }

    $foobar=new foobar();
    $foobar->walk('.');
