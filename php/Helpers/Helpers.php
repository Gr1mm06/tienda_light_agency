<?php 

	function base_url()
	{
		return BASE_URL;
	}

	function isArray($array)
	{
		$format = print_r('<pre>');
		$format .= print_r($array);
		$format .= print_r('<pre>');
		return $format;
	}

	function crearLog($mensaje)
	{
		$logFile = fopen("log.txt", 'a') or die("Error creando archivo");
		fwrite($logFile, "\n".date("d/m/Y H:i:s")." $mensaje") 
			or die("Error escribiendo en el archivo");
		fclose($logFile);
		return true;
	}
 ?>