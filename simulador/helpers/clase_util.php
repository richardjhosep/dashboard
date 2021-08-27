<?php
session_start();
define('SITE_KEY','6LfjWpQaAAAAAGKvSmpzJYf0FgytoIl2MvYuC_SZ');
define('SECRET_KEY','6LfjWpQaAAAAAI0aJEerybGlUaSs2PIwdmAFnxJ7');
//echo "<pre>"; print_r($_SESSION); echo "</pre>";
//require_once(__DIR__."/../../../../config/config.plataforma.php");
class restWS
{
	function get($service,$params)
	{
		global $sysConfig;
		$paramsTMP = json_encode($params);
		$url="http://".preg_replace("/\/\//","/",$sysConfig['urlWebService'].$service);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		//curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $paramsTMP);
		curl_setopt($ch, CURLOPT_CERTINFO, true);
		curl_setopt($ch, CURLOPT_NOPROGRESS, false);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		$err = curl_error($ch);
		curl_close($ch);
		return $output;
	}

	function post($service,$params)
	{
		global $sysConfig;
		$paramsTMP = json_encode($params);

		$url="http://".$sysConfig['urlWebService'].$service;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $paramsTMP);
		curl_setopt($ch, CURLOPT_CERTINFO, true);
		curl_setopt($ch, CURLOPT_NOPROGRESS, false);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		$err = curl_error($ch);
		curl_close($ch);
		return $output;
	}


	function postFiles($service,$token,$files)
	{
		global $sysConfig;
		$data = array();
		$data['token'] = $token;

		$i = 0;
		foreach($files as $file)
		{
			//echo "<pre>"; print_r($file); echo "</pre>";
			$imagenNombre = ($i == 0) ? 'cedula_anverso' : 'cedula_reverso';
			$tmpfile  = $file['tmp_name'];
			$filename = $file['name'];
			$filetype = $file['type'];
			$data[$imagenNombre] =  curl_file_create($tmpfile, $filetype, $filename);

			$i++;
		}
		$url="http://".$sysConfig['urlWebService'].$service;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_CERTINFO, true);
		curl_setopt($ch, CURLOPT_NOPROGRESS, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$output = curl_exec($ch);
		//DEBUG
		//print_r($output);
		$info = curl_getinfo($ch);
		$err = curl_error($ch);
		curl_close($ch);
		return $output;
	}

	//Metodo de encriptacion 
	public function encriptar($password)
	{
		$valorIntroducido = trim($password);
		$retorno  = crypt('', $valorIntroducido);
		return $retorno;
	}

	//Metodo de crear token 
	function crearToken($dato) {
		//crear alfabeto
		//$mayus = "ABCDEFGHIJKMNPQRSTUVWXYZ";
		$cadenaToken = str_split($dato);	//Convertir a array
		//crear array de numeros 0-9
		$numeros = range(0,9);
		//revolver arrays
		shuffle($cadenaToken);
		shuffle($numeros);
		//Unir arrays
		$arregloTotal = array_merge($cadenaToken,$numeros);
		$newToken = "";
		
		for($i=0;$i<=8;$i++) {
				$miCar = $this->obtenCaracterAleatorio($arregloTotal);
				$newToken .= $this->obtenCaracterMd5($miCar);
		}
		return $newToken;
	}

	private function obtenCaracterAleatorio($arreglo) {
		$clave_aleatoria = array_rand($arreglo, 1);	//obtén clave aleatoria
		return $arreglo[ $clave_aleatoria ];	//devolver ítem aleatorio
	}
 
	private function obtenCaracterMd5($car) {
		$md5Car = hash("sha512",$car.Time());
		//$md5Car = md5($car.Time());	//Codificar el carácter y el tiempo POSIX (timestamp) en md5
		$arrCar = str_split(strtoupper($md5Car));	//Convertir a array el md5
		$carToken = $this->obtenCaracterAleatorio($arrCar);	//obtén un ítem aleatoriamente
		return $carToken;
	}


	function ws(){
		$urlWebService = "localhost/sartor_ws_simulador";
		// $listadatos = $this->datosWS();
        // foreach ($listadatos as $key => $value) {
        //     $this->urlWebService = $value['url'];
        // }
        return $urlWebService;
    }

	private function datosWS(){
        $direccion = dirname(__FILE__);
        $jsondata = file_get_contents($direccion . "/" . "config");
        return json_decode($jsondata, true);
    }


}

/* UTILES */
function formatRUT($rut)
{
	$rut = preg_replace("/\.|\-/","",trim($rut));
	$dv  = strtoupper(substr($rut,-1));
	$rut = substr($rut,0,-1);
	return number_format($rut,0,",",".")."-".$dv;
}

	
?>
