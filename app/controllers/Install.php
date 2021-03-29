<?php

require __DIR__.'/../../vendor/autoload.php';

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
        
    $f3->set("title","WebShop - Paso 1");

    $f3->set("css",array(
      "/css/login.css",
      "/css/base.css"
    ));

    $f3->set("formId","step-one");
    $f3->set("form","install/step-one.htm");

    echo $this->minifer(Template::instance()->render('install/template.htm'));

  }

  public function stepTwo( $f3 ){
    
    if( $this->null == null ){
       $f3->reroute('install/step-one'); 
    }else{

      $f3->set("title","WebShop - Paso 2");

      $f3->set("css",array(
        "/css/login.css",
        "/css/base.css"
      ));

      $f3->set("formId","step-two");
      $f3->set("form","install/step-two.htm");

      echo $this->minifer(Template::instance()->render('install/template.htm'));

    };

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

    //echo $f3->get('ENVIRONMENT');

  }


  public function access( $f3 ){

    echo "Acceso controlado por methodo post";

  }


}

?>