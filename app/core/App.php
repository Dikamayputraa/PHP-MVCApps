<?php 

class App{

	// protected $controller = 'Home';
	// protected $method = 'index';
	// protected $params = [];

	public function __construct(){
		$url = $this->parseURL();
		var_dump($url);
	}

	public function parseURL(){
		if (isset($_GET['url'])) {
			//rtrim(str) untuk mengahus string, [nilai yang mau dihapus]
			$url = rtrim($_GET['url'], '/');
			//membersihkan url dari carakter yg tidak diperlukan
			$url = filter_var($url, FILTER_SANITIZE_URL);
			//pecah url berdasarkan tanda / dengan fungsi explod
			$url = explode('/', $url);
			return $url;
			// code...
		}
	}

 }

