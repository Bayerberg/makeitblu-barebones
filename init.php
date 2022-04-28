<?php
  // limit text length
  function read_more($string)
  {
    $string = strip_tags($string);
    if (strlen($string) > 120) {
        $stringCut = substr($string, 0, 120);
        $endPoint = strrpos($stringCut, ' ');
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $string .= '...';
    }
    return $string;
  }
?>
