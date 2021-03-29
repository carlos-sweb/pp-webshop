<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="/favicon.png">
	<link rel="stylesheet" href="/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="/node_modules/bulma/css/bulma.min.css">

	<?php foreach (($css?:[]) as $link): ?>
    	<link rel="stylesheet" href="<?= ($link) ?>">
	<?php endforeach; ?>	
	<title><?= ($title) ?></title>
</head>
<body>
<div style="padding-left:10px;padding-right:10px;" class="container is-flex is-flex-direction-row is-justify-content-center" >	
	<div id="<?= ($formId) ?>"  class="card">  
	  <div  class="card-content">    
	      <div class="media-content">	      
				<?php echo $this->render($form,NULL,get_defined_vars(),0); ?>
			</div>
		</div>   
	</div>
</div>

</div>
</body>
</html>