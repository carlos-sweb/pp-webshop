<?php

require __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

use Symfony\Component\Filesystem\Filesystem;



class Install{

  protected $f3;

  function __construct($f3){    

    try{
      $db=new DB\SQL(
      $f3->get('db_dns') . $f3->get('db_name'),
      $f3->get('db_user'),
      $f3->get('db_pass'));
      
    }catch( \PDOException $e ){

      $db = null;
      // 1045 password and user
      // 1049 Error database      
            
    }

    $this->db = $db;

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

  public function stepOne( $f3 ){
    if( $this->db == null ){
      $f3->set("title","WebShop - Paso 1");
      $f3->set("css",array(
        "/css/login.css",
        "/css/base.css"
      ));
      $f3->set("formId","step-one");
      $f3->set("form","install/step-one.htm");
      echo $this->minifer(Template::instance()->render('install/template.htm'));
    }else{
      $f3->reroute("install/step-two");
    }      
  }

  public function stepOneForm( $f3 ){

    $vtr ='<?php

    return [

          "driver"=>"mysql",

          "host"=>"localhost",

          "port"=>"3306",

          "user"=>"'.$f3->get("POST.user").'",

          "password"=>"'.$f3->get("POST.password").'",

          "dbname"=>"'.$f3->get("POST.dbname").'"

      ]; 

    ?>';



    try{

      $db=new DB\SQL(
      $f3->get('db_dns') . $f3->get("POST.dbname"),
      $f3->get("POST.user"),
      $f3->get("POST.password"));        

    }catch( \PDOException $e ){

      $db = null;
    };  

    $this->db = $db;
        
    if( $db != null ){
      // los datos son validos trataremos de escribirlos
      $filesystem = new Filesystem();
      try {
          
          $filesystem->touch(__DIR__."/../config/db.php");

          $filesystem->dumpFile(__DIR__."/../config/db.php",$vtr);
        
      } catch (IOExceptionInterface $exception) {

            echo "An error occurred while creating your directory at ".$exception->getPath();

      }
    }
    
    $f3->reroute("/install/step-one");

  }

  public function stepTwo( $f3 ){      
      if( $this->db == null ){
        $f3->reroute("/install/step-one");
      }else{        
        $f3->set("title","WebShop - Paso 2");
        $f3->set("css",array(
          "/css/login.css",
          "/css/base.css"
        ));
        $f3->set("formId","step-two");
        $f3->set("form","install/step-two.htm");
        echo $this->minifer(Template::instance()->render('install/template.htm'));
      }
  }

  public function stepTwoForm( $f3 ){


      $ws_user = "CREATE TABLE IF NOT EXISTS `ws_user` (
                  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                  `name` varchar(256) NOT NULL,
                  `mail` varchar(256) NOT NULL UNIQUE,
                  `password` varchar(256) NOT NULL,
                  `bloked` tinyint(1) NOT NULL DEFAULT '0',
                  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `updated_at` timestamp NULL DEFAULT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";      

          
      $this->db->exec($ws_user);

      try{

        $this->db->exec("INSERT INTO ws_user(name,mail,password) VALUES('carlos','c4rl0sill3sc4@gmai.com','dedoekdokedoe')");

      }catch( \PDOStatement $e ){

        echo $e->getCode();

      }
      

      /*

      $user = $f3->get("POST.user");
      $pass = $f3->get("POST.password");

      try{
        
        $rows = $this->db->exec("SELECT * FROM ws_user LIMIT 1");

      }catch(\PDOException $e){

        echo  $e->getCode();

      };*/

      //echo $user." => ".$pass;

      echo "Hi";

  }

  public function stepThree($f3){
        
    
    $f3->set("title","WebShop - Paso 3");

    $f3->set("css",array(
      "/css/login.css",
      "/css/base.css"
    ));

    $f3->set("formId","step-three");
    $f3->set("form","install/step-three.htm");

    echo $this->minifer(Template::instance()->render('install/template.htm'));  

    

  }





}

//ONERROR="WebShop->error"
?>