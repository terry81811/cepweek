<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cep extends CI_Controller {

	public function index()
	{
        $data['title'] = "彩虹故鄉的願望";
        $this->load->view('cep/partial/head', $data);
		$this->load->view('cep/index', $data);
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/indexjs');
        $this->load->view('cep/partial/closehtml');
	}

	public function page()
	{
		$this->load->view('cep/page');
	}

    public function progress()
    {
        $data['title'] = "募資進度 | 彩虹故鄉的願望";
        $data['remain_count'] = 499;
        $data['complete_percent'] = round(((4000 - 499) / 4000 ) * 100,2);
        $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/progress', $data);
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/progressjs');
        $this->load->view('cep/partial/closehtml');
    }

    public function test_form()
    {
        $this->load->view('cep/test_form');
    }

    public function test_email()
    {
        $this->load->view('cep/test_email');
    }
    public function order() 
    {
        $data['title'] = "訂購頁面 | 彩虹故鄉的願望";
        
        $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/order');
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/orderjs');
        $this->load->view('cep/partial/closehtml');
    }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
