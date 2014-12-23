<?php
  switch (req_dir) {
    case NULL:
      $req_file = stdio::qfile ('_TOP',conf_dir_file);
      if (!(include ($include_dir = system_dir.'/user/code/'.$req_file))) {
        stdio::add_log (stdio::fail ('openfile').$include_dir); unset ($include_dir);
        exit ();
      }
      break;
    default:
      $public_file = new FInfo (FILEINFO_MIME_TYPE);
      if (!($file_mime = $public_file -> file(system_dir.'/user/public/'.req_dir))) {
        $req_file = stdio::qfile (req_dir,conf_dir_file);
        if (!(include ($include_dir = system_dir.'/user/code/'.$req_file))) { //* DIR
          $req_dir_array = explode ('/',req_dir);
          for ($loop = 0;$loop < count ($req_dir_array);$loop++) {
            $req_dir_a = $req_dir_array;
            $req_dir_a[$loop] = '*';
            $req_dir_any = implode ('/',$req_dir_a);
            if (stdio::qfile ($req_dir_any,conf_dir_file)) {
              $indir = stdio::qfile ($req_dir_any,conf_dir_file);
            }
          }
          if (!(include ($include_dir = system_dir.'/user/code/'.$indir))) {
            stdio::add_log (stdio::fail ('openfile').$include_dir); unset ($include_dir);
          }
          if ($indir === NULL || $_ANY === FALSE) { //404
            $req_file = stdio::qfile ('_404',conf_dir_file);
            header ("HTTP/1.0 404 Not Found");
            if (!(include ($include_dir = system_dir.'/user/code/'.$req_file))) {
              stdio::add_log (stdio::fail ('openfile').$include_dir); unset ($include_dir);
              exit ();
            }
            stdio::add_log (stdio::fail ('openfile').$include_dir); unset ($include_dir);
            exit ();
          }
        }
      } else {
        header ("Content-type: ".$file_mime);
        $file = file_get_contents (system_dir.'/user/public/'.req_dir);
        print ($file);
      }
      break;
  }