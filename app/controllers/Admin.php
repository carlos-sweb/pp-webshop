<?php

require __DIR__.'/../../vendor/autoload.php';

class Admin{

  function __construct(){


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

  public function login($f3){  
          
    $view=new View;   

    echo $this->minifer($view->render("template.htm"));

    echo "J";
  
    

  }


}

?>