<?php

require __DIR__.'/../../vendor/autoload.php';


class Install{

  function __construct($f3){


    $db=new DB\SQL(
      $f3->get('db_dns') . $f3->get('db_name'),
      $f3->get('db_user'),
      $f3->get('db_pass')
    );

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

  public function stepOne($f3){
        
    $view = new View;

    echo $this->minifer($view->render("install/step-one.htm"));


  }

  public function stepTwo($f3){
        
    $view = new View;

    echo $this->minifer($view->render("install/step-two.htm"));


  }

    public function stepThree($f3){
        
    $view = new View;

    echo $this->minifer($view->render("install/step-three.htm"));


  }


  public function access( $f3 ){

    echo "Acceso controlado por methodo post";

  }


}

?>