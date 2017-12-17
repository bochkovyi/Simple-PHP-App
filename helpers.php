<?php

// Usage: precho("Hi!", "Hi", array(1,2,3), array(1,2,3));
function precho() {
	$args = func_get_args();
	echo '<pre>';
	foreach($args as $arg) {
		echo '<p>';
		print_r($arg);
		echo '</p>';
	}
	echo '</pre>';
}

// Usage: console(array("test"=>"test")); -> outputs to browser console
function console(){
    $args = func_get_args();

    echo '<script>';
	foreach($args as $arg) {
		echo 'console.log(' . json_encode(print_r($arg, true)) . ');';
	}
    echo '</script>';
}

// Open a view file and provide variables for it
// Usage: view("404")
// Usage: view("main.users.confirmation")
function view($file,$vars = [], $wrapIntoHeaderAndFooter = true) {
    $file = "app.Views.".$file;
    $file = rtrim($file,'.php');
	$file = str_replace('.', '/', $file) . '.php';
	
	if(!empty($vars)){
		extract($vars);
    }
	if ($wrapIntoHeaderAndFooter) {
		include_once('app/views/common/header.php');
	}
	include_once($file);

	if ($wrapIntoHeaderAndFooter) {
		include_once('app/views/common/footer.php');
	}
	exit;
}

function redirect($redirectTo) {
	header("Location: $redirectTo");
	exit;
}