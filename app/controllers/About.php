<?php 

class About extends Controller{
	public function index($nama = "Dika May", $pekerja = "Software Enginer"){
		$this->view('about/index');
	}

	public function page(){
		$this->view('about/page');
	}
}