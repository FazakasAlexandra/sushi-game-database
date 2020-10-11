<?php

$dir = "images";

// Open a directory, and read its contents
if (is_dir($dir)) {
  if ($dh = opendir($dir)) {
    $images = array();

    while (($file = readdir($dh)) !== false) {
      if ($file != "." && $file != "..") {
        array_push($images, $file);
      }
    }

    echo json_encode($images);
    closedir($dh);
  }
}
