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

//            echo "receive ID = $rec_id"."<BR>";
            }


//            echo "order ID = $order_id"."<BR>";

            // --------------------------------------------------------------------------
            //do purchase
            if($pay_payment_method == 'webatm'){
                $this->webATM_submit($order_id,$total_cost,$total_num,$pay_email);
            }
            else if($pay_payment_method == 'credit_card'){
                $this->credit_submit($order_id,$total_cost);
            }
            else if($pay_payment_method == 'remittance'){
                $result = $this->order_model->update(array(
                    'order_acc_name' => $post_data['order_acc_name'],
                    'order_bank_id' => $post_data['order_bank_id'],
                    'order_last_id' => $post_data['order_last_id']
                ), $order_id);

                $this->tran_email($order_id, $total_cost, $total_num, $email_to);

                $data['title'] = "交易成功";
                $this->load->view('cep/partial/head', $data);
                $this->load->view('cep/order_success', $data);
                $this->load->view('cep/partial/repeatjs');
                $this->load->view('cep/order_successjs');
                $this->load->view('cep/partial/closehtml');


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

private function confirm_email($order_id = NULL, $total_cost = NULL,$total_num = NULL, $email_to = NULL)
{
    $this->load->library('email');
 
        $email_subject = '感謝您訂購哈凱部落的彩虹蛋糕（台大創創學程）！';
        $this->email->from('rainbowhope.service@gmail.com', '台大創創學程');
        $this->email->to($email_to); 
        $this->email->subject($email_subject);

//calculating shipping date
        $date = $this->count_date();

        $email_message = '<div><h1">感謝您的訂購</h1>
        <p>您的訂單編號：'.($order_id + 98080000).'</p>
        <p>訂購數量：'.$total_num.' 價錢：'.$total_cost.' 預計出貨日：'.$date.'</p>
        <br><h3>台大創創學程感謝您</h3></div>';

        $this->email->message($email_message); 

        $path_to_the_file = realpath(APPPATH.'../assets/cepweek_db.sql');

//        $this->email->attach($path_to_the_file);

        $this->email->send();
        echo $this->email->print_debugger();
}

private function tran_email($order_id = NULL, $total_cost = NULL,$total_num = NULL, $email_to = NULL)
{
    $this->load->library('email');
 
        $email_subject = '感謝您訂購哈凱部落的彩虹蛋糕（台大創創學程）請於三日內匯款';
        $this->email->from('rainbowhope.service@gmail.com', '台大創創學程');
        $this->email->to($email_to); 
        $this->email->subject($email_subject);

//calculating shipping date
        $date = $this->count_date();

        $email_message = '<div><h1">感謝您的訂購</h1>
        <p>您的訂單編號：'.($order_id + 98080000).'</p>
        <p>銀行代號：808 玉山銀行八德分行</p>
        <p>戶名：桃園縣復興鄉哈凱部落永續發展協會張志雄</p>
        <p style="color:red;">提醒您，若為臨櫃存款，請記得填上存款人姓名</p>
        <p style="color:red;">請勿使用無卡存款，以免對帳失敗</p>
        
        <p>存戶帳號：0277-940-015066 </p>
        <p>訂購數量：'.$total_num.' 價錢：'.$total_cost.' 預計出貨日：'.$date.'</p>
        <br><h3>台大創創學程感謝您</h3></div>';

        $this->email->message($email_message); 

        $path_to_the_file = realpath(APPPATH.'../assets/cepweek_db.sql');

//        $this->email->attach($path_to_the_file);

        $this->email->send();
        echo $this->email->print_debugger();
}


public function email_test()
{
    $this->confirm_email(1,1,1,'terrytsai0811@gmail.com');
}

public function tran_email_test()
{
    $this->tran_email(1,1,1,'terrytsai0811@gmail.com');
}


private function count_date()
{
    $date = '2014/5/8（四）- 2014/5/11（日）';
    return $date;
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

public function webATM_test()
{
    $this->webATM_submit(2,1,1,'terrytsai0811@gmail.com');
}


public function webATM_submit($order_id = NULL, $total_cost = NULL, $total_num = NULL, $pay_email = NULL)
{

    //請代入hashkey 資料
    $HASHKey="86A2C451B375D51039953841F8A6E5B1";
    //$data['HASHKey']="86A2C451B375D51039953841F8A6E5B1";

    //請使用惟一值
    $OrderNo = $order_id + 98080000;
    $data['OrderNo']= $order_id + 98080000;

    //如有使用虛擬帳號請把虛擬帳號資料代入
    $VAccNo="";
    $data['VAccNo']="";

    //廠商編號
    $IcpNo="39953841";
    $data['IcpNo']="39953841";

    //廠商接收WebATM交易訊息URL
    $IcpConfirmTransURL="http://54.254.253.238/cepweek/api/webATM_return";
    $data['IcpConfirmTransURL']="http://54.254.253.238/cepweek/api/webATM_return";

    //交易金額
    $TransAmt = $total_cost;
    $data['TransAmt']=$total_cost;

    //Echo 自定訊息：訂購數量與email
    $Echo = $total_num."&".$pay_email;
    $data['Echo'] = $total_num."&".$pay_email;

    //交易識別資料
    $data['TransIdentifyNo']  = strtoupper(SHA1( $IcpNo . $VAccNo . $IcpConfirmTransURL . $OrderNo . $TransAmt . $HASHKey));
//    echo  $TransIdentifyNo;

    //echo $Echo;

    $this->load->view('cep/test_webATM',$data);
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

            $result_rec = $this->receive_model->update(array(
                'rec_pay_success' => 1
                ), ['rec_order_id' => ($TransNo - 98080000)]);

            //交易成功
            //記入DB
            //寄email
            list($total_num, $email_to) = explode("&", $Echo);

            $this->confirm_email($TransNo - 98080000, $TransAmt, $total_num, $email_to);

            $data['TransNo'] = $TransNo;
            $data['TransAmt'] = $TransAmt;
            $data['atmTradeNo'] = $atmTradeNo;
            $data['atmTradeDate'] = $atmTradeDate;
            $data['email_to'] = $email_to;
            $data['title'] = "交易成功";

            $this->load->view('cep/partial/head', $data);
            $this->load->view('cep/order_success', $data);
            $this->load->view('cep/partial/repeatjs');
            $this->load->view('cep/order_successjs');
            $this->load->view('cep/partial/closehtml');

        }

        else if($post_data['atmTradeState'] == 'F'){


            $this->receive_model->delete(array('rec_order_id' => ($TransNo - 98080000)));

            $data['atmErrNo'] = $atmErrNo;
            $data['atmErrDesc'] = $atmErrDesc;
            $data['title'] = "交易錯誤";
            $this->load->view('cep/partial/head', $data);
            $this->load->view('cep/order_fail', $data);
            $this->load->view('cep/partial/repeatjs');
            $this->load->view('cep/order_failjs');
            $this->load->view('cep/partial/closehtml');
            //交易失敗
            //顯示失敗原因
        }

        else{
            $this->receive_model->delete(array('rec_order_id' => ($TransNo - 98080000)));

            $data['atmErrNo'] = $atmErrNo;
            $data['atmErrDesc'] = $atmErrDesc;
            $data['title'] = "交易錯誤";
            $this->load->view('cep/partial/head', $data);
            $this->load->view('cep/order_fail', $data);
            $this->load->view('cep/partial/repeatjs');
            $this->load->view('cep/order_failjs');
            $this->load->view('cep/partial/closehtml');
            //交易失敗
            //顯示失敗原因
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
        $U = "http://54.254.253.238/cepweek/api/credit_return";
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