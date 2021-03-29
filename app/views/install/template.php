<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" href="/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="/node_modules/bulma/css/bulma.min.css">


	<repeat group="{{ @css }}" value="{{ @link }}">
    	<link rel="stylesheet" href="{{@link}}">
	</repeat>
	
	<title>{{@title}}</title>

</head>
<body>
<div class="container is-flex is-flex-direction-row is-justify-content-center" >	
	<div id="{{@formId}}"  class="card">  
	  <div  class="card-content">    
	      <div class="media-content">	      
				<include href="{{@form}}" />
			</div>
		</div>   
	</div>
</div>

</div>
</body>
</html>