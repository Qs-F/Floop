<?php //Developed By Q'sF.
  class stdio {
    //------stdio::qfile(dir,data);~(string)
    //------stdio::hash(id,base);~(string)
    //------stdio::confirm_url(url);~(url||FALSE)
    //------stdio::fail(dir,dail_id);~(string)
    //------stdio::add_log(message);
    public function qfile ($data,$dir) {
      $contents = file ($dir);
      $contents_count = count ($contents);
      for ($loop = 0;$loop <= $contents_count - 1;$loop++) {
        if (!strcmp ($d = strstr ($contents[$loop],':',true),$data)) {
          $contents_array = $loop;
          break 1;
        } else {
          $contents_array = NULL;
        }
      }
      $return = $contents[$contents_array];
      $q = ["\r\n","\r","\n"];
      $return = str_replace ($q,'',explode (':',$return));
      if ($return == NULL) {
        $return = FALSE;
      }
      return ($return[1]);
    }

    public function hash ($id, $base = 9) {
      $number = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61);
      $char = array(65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,48,49,50,51,52,53,54,55,56,57);
      $hash = array();
      $loop = 0;
      do {
        $hash[$loop] = chr($char[$number[(int)(floor($id / pow(62, $loop)) + $loop) % 62]]);
        $loop = count($hash);
      } while(($base > $loop) || (pow(62, $loop) <= $id));
      return implode("", $hash);
    }

    public function confirm_url ($url) {
      $http = str_ireplace ('://','',$url);
      $dir = strstr ($http,'/');
      $domain = str_ireplace ($dir,'',$http);
      $return = FALSE;
      if (preg_match ('/^([-.a-zA-Z0-9あ-ん])+$/',$domain)) {
        if (!(preg_match ('/^(https?|ftp)+(:\/\/)+(.*)+$/',$url))) {
          $return = 'http://'.$url;
        } else {
          $return = $url;
        }
      }
      return $return;
    }

    public function fail ($message,$dir = NULL) {
      if ($dir === NULL) {
        $dir = system_dir.'/conf/fail.q';
      }
      return stdio::qfile ($message,$dir);
    }

    public function add_log ($message) {
      date_default_timezone_set('Asia/Tokyo');
      error_log(date('[Y/m/d H:i:s:'.(microtime(true) * 10000).'] ').$message."\n",3,system_dir.'/log/app.log');
    }
  }