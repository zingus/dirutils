## Example

    <?php

    require_once "vendor\autoload.php";
    use DirUtils\Walker;

    class walker extends Walker {
      function action($filename) {
        // ...
        // do something with $filename
        // ...
        // the path from which the walk started is $this->root
        // $filename is relative to $this->root
        // the full path of the $filename is $this->full

        echo "$this->root \t $filename \t $this->full\n";
      }
    }

    $foobar=new foobar();
    $foobar->walk('.');
