<?php //Developed By Q'sF.
  //This is main.php and start function file.
  //basic system file.
  $logic_speed_start = microtime (TRUE);
  if (!(include ($include_dir = dirname (__FILE__).'/../lib/start.php'))) {
    stdio::add_log (stdio::fail ('openfile').$include_dir); unset ($include_dir);
    exit ();
  }
  stdio::add_log ('app start');
  include (system_dir.'/user/code/sql.php');
  if (!(include ($include_dir = system_dir.'/lib/controll.php'))) {
    stdio::add_log (stdio::fail ('openfile').$include_dir); unset ($include_dir);
    exit ();
  }
  $logic_speed_finish = microtime (TRUE) - $logic_speed_start;
  stdio::add_log ('app finish '.$logic_speed_finish);
  print "\n";
