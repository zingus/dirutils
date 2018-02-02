<?php
  function mkpath($path)
  {
    if(@mkdir($path) or file_exists($path)) return true;
    return (mkpath(dirname($path)) and mkdir($path));
  }
