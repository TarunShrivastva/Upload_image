<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

	
	public function index()
	{
		$title = 'News';
		$data = Programming_language::all();
		$this->blade->view('news.news', ['list' => $data, 'title' => $title]);
	}
		 
}