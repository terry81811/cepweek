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

    public function test()
    {
        $this->load->view('cep/test');
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

/****************************************************************************
APIs for Payment
*****************************************************************************/

// --------------------------------------------------------------------------
// credit card
// --------

    public function test_credit()
    {
    
        $this->load->helper('security');
        $MID = "8089002793";
        $CID = "";
        $TID = "EC000001";
        $ONO = "001";
        $TA = "1";
        $U = "https://cepweek.com";
        $str = $MID."&".$CID."&".$TID."&".$ONO."&".$TA."&".$U;
        $M = do_hash($str, 'md5');


        $data['MID'] = $MID;
        $data['CID'] = $CID;
        $data['TID'] = $TID;
        $data['ONO'] = $ONO;
        $data['TA'] = $TA;
        $data['U'] = $U;
        $data['M'] = $M;

        $this->load->view('cep/test_credit',$data);
    }


// --------------------------------------------------------------------------
// webATM
// --------

    public function test_ATM()
    {
    
        $this->load->helper('security');
        $MID = "8089002793";
        $CID = "";
        $TID = "EC000001";
        $ONO = "001";
        $TA = "1";
        $U = "http://cepweek.com";
        $str = $MID."&".$CID."&".$TID."&".$ONO."&".$TA."&".$U;
        $M = do_hash($str, 'md5');


        $data['MID'] = $MID;
        $data['CID'] = $CID;
        $data['TID'] = $TID;
        $data['ONO'] = $ONO;
        $data['TA'] = $TA;
        $data['U'] = $U;
        $data['M'] = $M;

        $this->load->view('cep/test_credit',$data);
    }

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
