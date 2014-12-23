<?php //Developed By Q'sF.
  //This is include php files & define only.
  define ('system_dir',preg_replace ('/(.*)\/lib/','\\1',dirname (__FILE__)));
  define ('conf_file',system_dir.'/conf/conf.q');
  define ('conf_dir_file',system_dir.'/conf/dir.q');
  define ('req_dir',$_GET['page_url_request']);
  define ('package_file',system_dir.'/conf/package.q');
  include (system_dir.'/lib/stdio.php');
  include (system_dir.'/lib/mysql.php');
  include (system_dir.'/lib/stdlib.php');