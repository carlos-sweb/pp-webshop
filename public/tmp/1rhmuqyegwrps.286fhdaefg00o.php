<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="node_modules/bulma/css/bulma.min.css">
	<link rel="stylesheet" href="css/login.css">
	<title>WebShop</title>
	<style>html{height:100%;overflow:auto;}body{height:100%;}</style>	
</head>
<body style="display:flex;flex-direction:row;justify-content:center;align-content:center;background-color:#dedede;"  >
<div class="container is-flex is-flex-direction-row is-justify-content-center" >

	<div id="login" class="card">  
	  <div class="card-content">    
	      <div class="media-content">
	        
	<h3 class="title is-3">WebShop </h3>

	<form action="/" method="POST">
	<div class="field">	  
	  <p class="control has-icons-left has-icons-right">
	    <input id="mail" class="input" type="email" placeholder="Correo Eléctronico">
	    <span class="icon is-small is-left">
	      <i class="fas fa-envelope"></i>
	    </span>
	    <span class="icon is-small is-right">
	      <i class="fas fa-check"></i>
	    </span>
	  </p>
	</div>
	<div class="field">	  
	  <p class="control has-icons-left">	  	
	    <input id="password" class="input" type="password" placeholder="Contraseña" >
	    <span class="icon is-small is-left">
	      <i class="fas fa-lock"></i>
	    </span>
	  </p>
	</div>

	<div class="field">
	  <p class="control" style="float:right;">
	    <button type="submit" class="button is-success">Acceder</a>
	  </p>
	</div>	
	</form>


	      </div>
	    </div>   
	  </div>
	</div>



</div>

</body>
</html>