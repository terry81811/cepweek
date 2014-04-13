<?php

class Api extends CI_Controller
{
    
    // ------------------------------------------------------------------------
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('order_model');
    }


	public function order()
	{

		$post_data = $this->input->post(NULL, TRUE);
		print_r($post_data);
	}


}