<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cep extends CI_Controller {

	public function index()
	{
        $data['title'] = "彩虹故鄉的願望　　將您的愛心送入天堂12坪";
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
        $data['title'] = "募資進度 | 彩虹故鄉的願望";
        $data['remain_count'] = 3888;
        $data['complete_percent'] = ((5000 - 3888) / 5000 ) * 100;
        $this->load->view('cep/progress', $data);
    }

    public function test_form()
    {
        $this->load->view('cep/test_form');
    }

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
