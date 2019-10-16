<?php

function crawl() {
    $content = file_get_contents('https://www.lazada.vn/products/mua-3-tang-1-bo-100-hinh-xam-dan-tattoo-xam-nuoc-tha-thu-dep-i290554966-s460198768.html');

      //$subIndex = strrpos($content, 'json">{"off');
      //$content = substr($content, $subIndex+6);
     // $subIndex = strrpos($content, '}}</script>');
      //$content = substr($content,0, $subIndex+2);
      $read = file('link.txt');
      //$myfile = fopen('link.txt', 'r+');
      //fwrite($myfile, '$txt');
      //fclose($fh);
      var_dump( $read);
}


crawl();