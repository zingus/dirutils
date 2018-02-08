## Example

    <?php

    require_once "vendor\autoload.php";
    use DirUtils\Walker;

    class walker extends Walker {
      function action($filename,$fullpath,$root) {
      }
    }

    $foobar=new foobar();
    $foobar->walk('.');
