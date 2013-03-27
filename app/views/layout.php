<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Title | <?php echo $this->viewData->get('title'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Natura SKUs">
		<meta name="author" content="Juan Tejada">
		
		<!-- Le styles -->
		<?php
			foreach ($this->viewData->get("csslib") as $css) {
				echo '<link href="/css/lib/'.$css.'" rel="stylesheet">';
			}
			if($this->viewData->get("css")){
				foreach ($this->viewData->get("css") as $css) {
					echo '<link href="/css/lib/'.$css.'" rel="stylesheet">';
				}
			}
		?>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		    <![endif]-->
	</head>
	<body>
	
		<?php require $this->viewFile; ?>
	
		<!-- Le javascript
	    ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<?php
			foreach ($this->viewData->get("jslib") as $js) {
				echo '<script src="/js/lib/'.$js.'"></script>';
			}
			if($this->viewData->get("js")){
				foreach ($this->viewData->get("js") as $js) {
					echo '<script src="/js/lib/'.$js.'"></script>';
				}
			}
		?>
	</body>
</html>