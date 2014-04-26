<?php

class Api extends CI_Controller
{
    
    // ------------------------------------------------------------------------
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('receive_model');
    }


/****************************************************************************
APIs for DB CRUD
*****************************************************************************/

// --------------------------------------------------------------------------
// order Insert API
// --------------------------------------------------------------------------
	public function order()
	{

		$post_data = $this->input->post(NULL, TRUE);


        /*
        insert payment information in DB// ORDER_TABLE
        */
        $pay_payment_method = $post_data['payment'];

        $pay_name = $post_data['pay_name'];
        $pay_num = $post_data['pay_num'];
        $pay_cost = $post_data['pay_cost'];
        $pay_phone = $post_data['pay_phone'];
        $pay_email = $post_data['pay_email'];
        $pay_title = $post_data['pay_title'];
        $pay_tax_id = $post_data['pay_tax_id'];

        $pay_add_num = $post_data['pay_add_num'];
        $pay_address = $post_data['pay_address'];


        $order_id = $this->order_model->insert(array(
            'order_name' => $pay_name,
            'order_num' => $pay_num,
            'order_type' => $pay_payment_method,
            'order_cost' => $pay_cost,
            'order_email' => $pay_email,
            'order_phone' => $pay_phone,
            'order_timestamp' => date("Y-m-d H:i:s"),

            'order_title' => $pay_title,
            'order_tax_id' => $pay_tax_id,

            'order_add_num' => $pay_add_num,
            'order_address' => $pay_address
        ));
        
        if ($order_id) {
            $result = $this->order_model->update(array(
                'order_cancel_hash' => hash('sha256', $order_id . SALT),
            ), $order_id);


            /*
            insert payment information in DB// RECEIVER_TABLE
            */

            $rec_count = sizeof($post_data['rec_name']);
            foreach ($post_data['rec_name'] as $key => $value) {
                # code...

                $rec_id = $this->receive_model->insert(array(
                    'rec_order_id' => $order_id,
                    'rec_name' => $post_data['rec_name'][$key],
                    'rec_num' => $post_data['rec_num'][$key],
                    'rec_address_code' => $post_data['rec_add_num'][$key],
                    'rec_address' => $post_data['rec_address'][$key],
                    'rec_phone' => $post_data['rec_phone'][$key],
                    'rec_timestamp' => date("Y-m-d H:i:s")
                ));

            echo "receive ID = $rec_id"."<BR>";
            }


            echo "order ID = $order_id"."<BR>";

        }

    //        print_r($post_data);
	}

/****************************************************************************
APIs for Email
*****************************************************************************/

// --------------------------------------------------------------------------
// email after ordering
// --------------------------------------------------------------------------

public function confirm_email()
{
    $this->load->library('email');
 
    $post_data = $this->input->post(NULL, TRUE);
    
    $email_to = $post_data['email_to'];
    $email_subject = $post_data['email_subject'];
    $email_message = $post_data['email_message']; 

    if(is_array($email_to)){

        foreach ($email_to as $_key => $_value) {

            $this->email->from('rainbowhope.service@gmail.com', '台大創創學程');
            $this->email->to($_value); 
            $this->email->subject($email_subject);
            $this->email->message($email_message); 
            $this->email->send();
            echo $this->email->print_debugger();
        }
    }

    if(!is_array($email_to)){

        $this->email->from('rainbowhope.service@gmail.com', '台大創創學程');
        $this->email->to($email_to); 
        $this->email->subject($email_subject);
        $this->email->message($email_message); 
        $this->email->send();
        echo $this->email->print_debugger();
    }
}



}