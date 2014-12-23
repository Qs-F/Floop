<?php //Develped By Q'sF.
  class stdlib {
    public function get_rss ($url) {
      $rss = simplexml_load_file ($url,LIBXML_NOCDATA);
      $rss_2 = ['title','link','description','pubDate','content:encoded'];
      $rss_1 = 
      $data_count = count ($data);
      if ($rss -> channel -> item[0] != NULL) {
        for ($loop = 0;$loop < $data_count;$loop++) {
          $return[$data[$loop]] = htmlspecialchars($rss -> channel -> item[0] -> $data[$loop]);
        }
      } else {
        $return = FALSE;
      }
      return ($return);
    }

    public function get_rss1 () {
      
    }
  }