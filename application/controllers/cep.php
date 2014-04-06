<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cep extends CI_Controller {


	public function index()
	{
        $data['title'] = "Rainbowhope | cepweek";
		$this->load->view('cep/index', $data);
	}

	public function page()
	{
		$this->load->view('cep/page');
	}

    public function test()
    {
        $this->load->view('cep/test');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */