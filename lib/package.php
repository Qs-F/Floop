<?php
  //Package php
  class package {
    public function read () {
      
    }
  }
  
  function getFileList ($dir) {
    $it = new RecursiveDirectoryIterator(new RecursiveDirectoryIterator($dir));
//    $item = new RecursiveDirectoryIterator($it);
    $list = array();
    foreach ($it as $fileinfo) {
      if ($fileinfo->isFile()) {
        $list[] = $fileinfo->getPathname();
      }
    }
    return $list;
  }
  print system_dir;
  var_dump(getFileList('/Users/QsF/Develop'));
  
  /*  if ($handle = opendir(system_dir)) {
/    while (false !== ($file = readdir($handle))) {
        echo "$file\n";
    }
    closedir($handle);
  }*/
  
  
  var_dump (package::read());
  
  if ($handle = opendir('/path/to/files')) {
    echo "Directory handle: $handle\n";
    echo "Files:\n";
    while (false !== ($file = readdir($handle))) {
        echo "$file\n";
    }
    closedir($handle);
  }
  