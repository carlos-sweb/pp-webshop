<?php

require __DIR__.'/../../vendor/autoload.php';


class WebShop{

  function __construct($f3){
    
    $db = null;
    try{
      $db=new DB\SQL(
      $f3->get('db_dns') . $f3->get('db_name'),
      $f3->get('db_user'),
      $f3->get('db_pass'));
    }catch( \PDOException $e ){
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
    
   /* echo $this->minifer( $this->twig->render('home.html',[
      "css"=>$this->css_base,
      "active"=>$f3->get("PARAMS.0")
    ]) );  */

  //    echo "Power Panel - WebShop";
    /*
    $rows=$this->db->exec('SELECT id,name FROM test ORDER BY id DESC');
    
    foreach( $rows as $indice=>$row ):
      echo $row["name"]."<br>";
    endforeach;  

    */

    $view = new View();

    echo $view->render('webshop/welcome.htm');  

    
  


  }


  public function access( $f3 ){

    echo "Acceso controlado por methodo post";

  }


  public function error( $f3 ){

    $f3->reroute('/');

  }

}

?>