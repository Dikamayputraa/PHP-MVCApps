<?php 

class App{

	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

	public function __construct(){
		
		$url = $this->parseURL();
		
		//controller
		if(file_exists('../app/controllers/' . $url[0] . '.php')){
			//timpa controller yang ada
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;


		//method
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
				// code...
			}
			// code...
		}

		//params
		if (!empty($url)) {
			//ambil data kirim ke params
			$this->params = array_values($url);
		}

		//jalankan controller dan method, serta kirimkan params jika ada
		call_user_func_array([$this->controller, $this->method],  $this->params);
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

