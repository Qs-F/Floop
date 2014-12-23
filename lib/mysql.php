<?php
  class database {
    public $user;
    public $passwd;
    public $dbname;
    public $host;

    public function __construct () {
      $this -> user =   stdio::qfile('mysql_user',conf_file);
      $this -> passwd = stdio::qfile('mysql_passwd',conf_file);
      $this -> dbname = stdio::qfile('mysql_dbname',conf_file);
      $this -> host =   stdio::qfile('mysql_host',conf_file);
    }

    public function login ($set) {
      try {
        $login = new PDO ('mysql:dbname='.$this -> dbname.';host='.$this -> host.';',$this -> user,$this -> passwd);
        $return['status'] = TRUE;
        $return['login'] = $login;
        stdio::add_log('MySQL Login TRUE');
        $return['login'] -> query ('SET NAMES '.$set);
        stdio::add_log('MySQL SET NAMES '.$set);
        $return['login'] -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $eroor) {
        $return['status'] = FALSE;
        $return['error'] = $eroor->getMessage();
        stdio::add_log('MySQL Login FALSE:'.$eroor->getMessage());
      }
      return ($return);
    }

    public function run ($obj,$sql,$data) {
      try {
        $stmt = $obj['login'] -> prepare ($sql);
        $stmt -> execute ($data);
        $return = $stmt -> fetchAll (PDO::FETCH_ASSOC);
        stdio::add_log('MySQL Query(Prepare) '.$sql.' execute '.$data.' TRUE');
      } catch (PDOException $error) {
        $return[0]['status'] = FALSE;
        $return[0]['error'] = $eroor;
        stdio::add_log('MySQL Query(Prepare) '.$sql.' execute '.$data.' FALSE:'.$eroor);
      }
      return ($return[0]);
    }
  }