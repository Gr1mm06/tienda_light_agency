<?php 
	$controllerFile = 'php/Controllers/'.$controller.'.php';
	if(file_exists($controllerFile)){
		require_once($controllerFile);
		$controller = new $controller();
		if (method_exists($controller, $method)) {
			$controller->{$method}($params);
		}else{
			echo 'Metodo con existe';
		}
	}else{
		echo 'Controlador no existe';
	}