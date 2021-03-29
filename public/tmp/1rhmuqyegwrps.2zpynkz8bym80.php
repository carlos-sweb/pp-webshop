<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" href="/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="/node_modules/bulma/css/bulma.min.css">


		<link rel="stylesheet" href="">

	
	<title><?= ($title) ?></title>	
</head>
<body>
<div class="container is-flex is-flex-direction-row is-justify-content-center" >	
	<div style="height:400px;width:300px;" class="card">  
	  <div class="card-content">    
	      <div class="media-content">
	      <h1></h1>	      		
				<?php echo $this->render('install/step-one.htm',NULL,get_defined_vars(),0); ?>
			</div>
		</div>   
	</div>
</div>

</div>
</body>
</html