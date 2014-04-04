<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cep extends CI_Controller {


	public function index()
	{
		$this->load->view('cep/index');
	}

	public function page()
	{
		$this->load->view('cep/page');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */