<?php

class Api extends CI_Controller
{
    
    // ------------------------------------------------------------------------
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('receive_model');
        $this->load->library('curl');

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
//        $pay_cost = $post_data['pay_cost'];
        $pay_phone = $post_data['pay_phone'];
        $pay_email = $post_data['pay_email'];
        $pay_title = $post_data['pay_title'];
        $pay_tax_id = $post_data['pay_tax_id'];

        $pay_add_num = $post_data['pay_post'];
        $pay_address = $post_data['pay_address'];

        //calculating total number and cost of order
        $total_num = 0;
        $total_cost = 0;
        foreach ($post_data['rec_name'] as $key => $value) {
            $total_num += $post_data['rec_num'][$key];
            if($post_data['rec_num'][$key] < 10){
                $total_cost += ($post_data['rec_num'][$key] * 390 + 150);
            }else{
                $total_cost += ($post_data['rec_num'][$key] * 390);
            }
        }



        $order_id = $this->order_model->insert(array(
            'order_name' => $pay_name,
            'order_num' => $total_num,
            'order_type' => $pay_payment_method,
            'order_cost' => $total_cost,
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
                    'rec_arrive_time' => $post_data['rec_arrive_time'][$key],

                    'rec_timestamp' => date("Y-m-d H:i:s")
                ));

            echo "receive ID = $rec_id"."<BR>";
            }


            echo "order ID = $order_id"."<BR>";

            // --------------------------------------------------------------------------
            //do purchase
            if($pay_payment_method == 'webatm'){
                $this->webATM_submit($order_id,$total_cost);
            }
            else if($pay_payment_method == 'credit_card'){
                $this->credit_submit($order_id,$total_cost);
            }

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
            $path_to_the_file = realpath(APPPATH.'../assets/cepweek_db.sql');
            $this->email->attach($path_to_the_file);

            $this->email->send();
            echo $this->email->print_debugger();
        }
    }

    if(!is_array($email_to)){

        $this->email->from('rainbowhope.service@gmail.com', '台大創創學程');
        $this->email->to($email_to); 
        $this->email->subject($email_subject);

//        $email_message = $this->load->view('cep/test_email_content');
        $email_message = '<h1 style="text-align:center;color:red;">感謝您訂購</h1><p>訂購數量：10 價錢：3900 預計出貨日：5/1</p><img src="http://i.imgur.com/vRTNquY.jpg"><br><h3>台大創創學程感謝您</h3>';

//        $this->email->message('台大創創學程'); 
        $this->email->message($email_message); 
//        $msg = $this->load->view('cep/test_email');
//        $this->email->message($msg); 

        $path_to_the_file = realpath(APPPATH.'../assets/cepweek_db.sql');

         $this->email->attach($path_to_the_file);

        $this->email->send();
        echo $this->email->print_debugger();
    }
}

/****************************************************************************
APIs for Payment
*****************************************************************************/

// --------------------------------------------------------------------------
// credit card
// --------



// --------------------------------------------------------------------------
// webATM
// --------


public function webATM_submit($order_id = NULL, $total_cost = NULL)
{

    //請代入hashkey 資料
    $HASHKey="86A2C451B375D51039953841F8A6E5B1";

    //請使用惟一值
    $OrderNo= $order_id + 98080000;

    //如有使用虛擬帳號請把虛擬帳號資料代入
    $VAccNo="";

    //廠商編號
    $IcpNo="39953841";

    //廠商接收WebATM交易訊息URL
    $IcpConfirmTransURL="https://rainbowhope.tw/api/webATM_return";

    //交易金額
    $TransAmt=$total_cost;

    //交易識別資料
    $TransIdentifyNo  = strtoupper(SHA1( $IcpNo . $VAccNo . $IcpConfirmTransURL . $OrderNo . $TransAmt . $HASHKey));
//    echo  $TransIdentifyNo;

    $post_array = array('IcpNo' => $IcpNo,
                        'VAccNo' => $VAccNo,
                        'IcpConfirmTransURL' => $IcpConfirmTransURL,
                        'TransNo' => $OrderNo,
                        'TransAmt' => $TransAmt,
                        'TransDesc' => '消費',
                        'StoreName' => 'WebATM',
                        'TransIdentifyNo' => $TransIdentifyNo,
                        'Echo' => 'WebATM'
     );

    $output = $this->curl->simple_post('https://netbank.esunbank.com.tw/webatm/payment/paymentUTF8.asp', $post_array);
    echo $output;
}

public function webATM_return()
{
 
    $post_data = $this->input->post(NULL, TRUE);

    $HASHKey="86A2C451B375D51039953841F8A6E5B1"; 
      
    $IcpNo = $post_data["IcpNo"];
    $TransNo = $post_data["TransNo"];
    $TransAmt = $post_data["TransAmt"];
    $atmTradeNo = $post_data["atmTradeNo"];
    $atmTradeDate = $post_data["atmTradeDate"];
    $atmTradeState = $post_data["atmTradeState"];
    $atmErrNo = $post_data["atmErrNo"];
    $atmErrDesc = $post_data["atmErrDesc"];
    $atmIdentifyNo_New = $post_data["atmIdentifyNo_New"];
    $Echo = $post_data["Echo"];



    $checkatmIdentifyNo_New  = strtoupper(SHA1( $IcpNo . $TransNo . $TransAmt . $atmTradeNo . $atmTradeDate . $HASHKey . $atmTradeState));

    //test hash值
    if($post_data['atmIdentifyNo_New'] == $checkatmIdentifyNo_New){
     
        //trade status {S,F,Z}
        if($post_data['atmTradeState'] == 'S'){

            $result = $this->order_model->update(array(
                'order_success' => 1
                ), ($TransNo - 98080000));

            //交易成功
            //記入DB
            //寄email
            $this->confirm_email();

            $data['TransNo'] = $TransNo;
            $data['TransAmt'] = $TransAmt;
            $data['atmTradeNo'] = $atmTradeNo;
            $data['atmTradeDate'] = $atmTradeDate;
            //$this->load->view('',$data);

        }

        else if($post_data['atmTradeState'] == 'F'){


            $this->receive_model->delete(array('rec_order_id' => ($TransNo - 98080000)));

            $data['atmErrNo'] = $atmErrNo;
            $data['atmErrDesc'] = $atmErrDesc;

            //$this->load->view('',$data);
            //交易失敗
            //顯示失敗原因
        }

        else{
            //其他狀況
        }
    
    }else{

        redirect('/');
        //check hash值錯誤，可能是偽裝？
    }
}

    public function webATM_check($TransNo = NULL)
    {



    }


// --------------------------------------------------------------------------
// credit
// --------
    
    public function credit_submit($order_id = NULL, $total_cost = NULL)
    {
        $this->load->helper('security');
        $key = "W8FGAZYNTJA7NGIZBZZJLEIFWAJUMQDT";

        $MID = 8089002793;
        $CID = '';
        $TID = 'EC000001';
        $ONO = $order_id + 98080000;
        $TA = $total_cost;
        $U = "https://rainbowhope.tw/api/credit_return";
        $str = $MID."&".$CID."&".$TID."&".$ONO."&".$TA."&".$U."&".$key;

        echo $str;
        $M = do_hash($str, 'md5');
        echo "<BR>".$M;

        $post_array = array('MID' => $MID,
                            'CID' => $CID,
                            'TID' => $TID,
                            'ONO' => $ONO,
                            'TA' => $TA,
                            'U' => $U,
                            'M' => $M
         );

        $output = $this->curl->simple_post('https://acqtest.esunbank.com.tw/acq_online/online/sale42.htm', $post_array, array(CURLOPT_USERAGENT => true));
        echo $output;

    }


    public function credit_return()
    {

    }

}