<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cep extends CI_Controller {


    // ------------------------------------------------------------------------
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('order_model');

    }

    // ------------------------------------------------------------------------

    private function count_order() 
    {
        $order = $this->order_model->get(array('order_success' => '1'));
        $count = sizeof($order);
        return $count;
    }

    // ------------------------------------------------------------------------

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
        $data['count'] = $this->count_order();
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
    public function story()
    {
        $data['title'] = "我們的故事 | 彩虹故鄉的願望";
        $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/story');
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/storyjs');
        $this->load->view('cep/partial/closehtml');
    }
    public function product()
    {
        $data['title'] = "產品介紹 | 彩虹故鄉的願望";
        $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/product');
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/productjs');
        $this->load->view('cep/partial/closehtml');
    }
    public function photos()
    {
        $data['title'] = "產品介紹 | 彩虹故鄉的願望";
        $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/photos');
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/photosjs');
        $this->load->view('cep/partial/closehtml');
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
        $ONO = "98080001";
        $TA = "1";
        $U = "https://rainbowhope.tw/api/credit_return";
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

        $this->load->view('cep/test_webATM');
    }

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
