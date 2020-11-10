<?php
spl_autoload_register(function($class_name){
	$parts=explode('\\',$class_name);
	$class=$parts[count($parts)-1];
	//echo $class;exit;
	if (file_exists(FRAMEWORK_DIR.'/'.$class.'.php')){
		require FRAMEWORK_DIR .'/'. $class.'.php';
	}
	elseif(file_exists(APP_DIR.'/'.$class.'.php')){
		require APP_DIR .'/'. $class.'.php';
	}
	elseif(file_exists(TPL_DIR.'/'.$class.'.php')){
		require TPL_DIR .'/'. $class.'.php';
	}
	elseif(file_exists(DATA_DIR .'/'.$class.'.php')){
		require DATA_DIR .'/'. $class.'.php';
	}
	else{
		trigger_error('Cannot find class/interface/abstract class: '. $class_name, E_USER_WARNING);
		debug_print_backtrace();
	}
});

?>