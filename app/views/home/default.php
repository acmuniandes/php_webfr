<?php ob_start(); ?>
<h1>This is Home Default</h1>
<?php $content = ob_get_clean(); ?>
<?php  require VIEWS . DS . 'layout.php'; ?>