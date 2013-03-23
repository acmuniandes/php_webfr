<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Title | <?php echo $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Natura SKUs">
		<meta name="author" content="Juan Tejada">
		
		<!-- Le styles -->
		<?php
			$dir = new DirectoryIterator(CSS_LIB.DS);
			foreach ($dir as $fileinfo) {
			    if (!$fileinfo->isDot() && $fileinfo->isFile()) {
			        echo '<link href="/css/lib/'.$fileinfo->getFilename().'" rel="stylesheet">';
			    }
			}
			$dir = new DirectoryIterator(CSS.DS);
			foreach ($dir as $fileinfo) {
				if (!$fileinfo->isDot() && $fileinfo->isFile()) {
					echo '<link href="/css/'.$fileinfo->getFilename().'" rel="stylesheet">';
				}
			}
		?>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		    <![endif]-->
	</head>
	<body>
	
		<?php echo $content; ?>
	
		<!-- Le javascript
	    ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<?php
			$dir = new DirectoryIterator(JS_LIB.DS);
			foreach ($dir as $fileinfo) {
			    if (!$fileinfo->isDot() && $fileinfo->isFile()) {
			        echo '<script src="/js/lib/'.$fileinfo->getFilename().'"></script>';
			    }
			}
			$dir = new DirectoryIterator(JS.DS);
			foreach ($dir as $fileinfo) {
				if (!$fileinfo->isDot() && $fileinfo->isFile()) {
					echo '<script src="/js/'.$fileinfo->getFilename().'"></script>';
				}
			}
		?>
	</body>
</html>