<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cep extends CI_Controller {


    // ------------------------------------------------------------------------
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('receive_model');

    }

    // ------------------------------------------------------------------------

    public function count_order() 
    {
        $order = $this->order_model->get(array('order_success' => '1'));

        $count = 0;
        foreach ($order as $_key => $_value) {
            $count += $_value['order_num'];
        }
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
        $count = $this->count_order() + 152;
        $data['count'] = $count;
        $data['title'] = "募資進度 | 彩虹故鄉的願望";
        $data['complete_percent'] = round((($count) / 4000 ) * 100 , 2);
        // $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/partial/progress_head', $data);
        $this->load->view('cep/progress', $data);
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/progressjs');
        $this->load->view('cep/partial/closehtml');
    }
    public function order_success()
    {
        $data['TransNo'] = 02398410928734;
        $data['email_to'] = "s92f002@hotmail.com";
        $data['title'] = "交易成功";

        // $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/partial/order_success_head', $data);
        $this->load->view('cep/order_success', $data);
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/order_successjs');
        $this->load->view('cep/partial/closehtml');

    }
    public function order_fail()
    {
        $data['atmErrDesc'] = "交易錯誤訊息回傳";
        $data['title'] = "交易錯誤";
        $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/order_fail', $data);
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/order_failjs');
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
        
        // $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/partial/order_head', $data);
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
        // $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/partial/product_head', $data);
        $this->load->view('cep/product');
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/productjs');
        $this->load->view('cep/partial/closehtml');
    }
    public function photos()
    {
        $data['title'] = "彩虹相簿 | 彩虹故鄉的願望";
        $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/photos');
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/photosjs');
        $this->load->view('cep/partial/closehtml');
    }

/****************************************************************************
APIs for internal user
*****************************************************************************/

    public function cep_login()
    {

    }

    public function db_cep()
    {
        $data['title'] = "彩虹後台 ｜ 創創內部使用";


        //匯款資料
        $order_success_array = $this->order_model->get(array('order_success' => '1', 'order_type' => 'remittance'));
        foreach ($order_success_array as $_key => $_value) {
            $rec_num = $this->receive_model->get(array('rec_order_id' => $_value['order_id']));
            $order_success_array[$_key]['rec_num'] = sizeof($rec_num);
        }

        $order_not_success_array = $this->order_model->get(array('order_success' => '0', 'order_type' => 'remittance'));
        foreach ($order_not_success_array as $_key => $_value) {
            $rec_num = $this->receive_model->get(array('rec_order_id' => $_value['order_id']));
            $order_not_success_array[$_key]['rec_num'] = sizeof($rec_num);
        }

        //webatm資料
        $webatm_order_success_array = $this->order_model->get(array('order_success' => '1', 'order_type' => 'webatm'));
        foreach ($webatm_order_success_array as $_key => $_value) {
            $rec_num = $this->receive_model->get(array('rec_order_id' => $_value['order_id']));
            $webatm_order_success_array[$_key]['rec_num'] = sizeof($rec_num);
        }

        $webatm_order_not_success_array = $this->order_model->get(array('order_success' => '0', 'order_type' => 'webatm'));
        foreach ($webatm_order_not_success_array as $_key => $_value) {
            $rec_num = $this->receive_model->get(array('rec_order_id' => $_value['order_id']));
            $webatm_order_not_success_array[$_key]['rec_num'] = sizeof($rec_num);
        }



        $data['order_success_array'] = $order_success_array;
        $data['order_not_success_array'] = $order_not_success_array;
        $data['webatm_order_success_array'] = $webatm_order_success_array;
        $data['webatm_order_not_success_array'] = $webatm_order_not_success_array;


        $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/db_cep', $data);
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/partial/closehtml');        
    }
    
    public function delivery($order_id)
    {

        $delivery_array = $this->receive_model->get(array('rec_order_id' => $order_id));

        $data['title'] = "彩虹後台 ｜ 創創內部使用";
        $data['order_id'] = $order_id;
        $data['delivery_array'] = $delivery_array;

        $this->load->view('cep/partial/order_head', $data);
        $this->load->view('cep/delivery', $data);
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/deliveryjs');
        $this->load->view('cep/partial/closehtml');

    }


}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
