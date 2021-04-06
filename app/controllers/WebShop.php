<?php

require __DIR__.'/../../vendor/autoload.php';

use Mobile_Detect;

class WebShop{

  function __construct($f3){   

    $this->detect = new Mobile_Detect; 
    
    try{
      
      $this->db = new DB\SQL(
      $f3->get('db_dns') . $f3->get('db_name'),
      $f3->get('db_user'),
      $f3->get('db_pass'));

      $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    
    }catch( \PDOException $e ){

      $this->db = null;

      $f3->reroute('install/step-one');

    }
  }
  
  public function minifer($code){
        return preg_replace(
          array(
              '/ {2,}/',
              '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
          ),
          array(
              ' ',
              ''
          ),
          $code
        );
  }

  public function home($f3){
    
    try{      
      
      $f3->set("settings",$this->db->exec("SELECT * from ws_settings "));

    }catch( \PDOException $e ){

      $f3->reroute("/install/step-one");
    }
  
    echo $this->minifer(Template::instance()->render('webshop/welcome.htm'));

  }


  public function access( $f3 ){

    echo "Acceso controlado por methodo post";

  }


  /*
  *@name error
  *@description : Funcion que captura los errores de URL
  */
  public function error( $f3 ){
      
      while (ob_get_level()){
          ob_end_clean();
      }
            
      if( $f3->get("ERROR.code") == '404' ){        
          $f3->reroute("/");
      }else{
          echo "<h1>".$f3->get("ERROR.code")."</h1>";
          echo "<h3>".$f3->get("ERROR.text")."</h3>";
      }
  }
}
?>