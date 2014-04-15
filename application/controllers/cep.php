<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cep extends CI_Controller {

	public function index()
	{
        $data['title'] = "Rainbowhope";
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

    public function progress()
    {
        $data['title'] = "募資進度 | Rainbowhope";
        $this->load->view('cep/progress', $data);
    }

    public function test_form()
    {
        $this->load->view('cep/test_form');
    }

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
