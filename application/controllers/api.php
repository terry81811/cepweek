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
        $pay_phone = $post_data['pay_phone'];
        $pay_email = $post_data['pay_email'];
        $pay_title = $post_data['pay_title'];
        $pay_tax_id = $post_data['pay_tax_id'];

        $pay_add_num = $post_data['pay_post'];
        $pay_address = $post_data['pay_address'];

        //validating input
        $input_err = 0;
        if($pay_name == ''){
            $data['atmErrNo'] = '0000';
            $data['atmErrDesc'] = '請填寫付款人姓名';
            $input_err = 1;
        }if($pay_phone == 0){
            $data['atmErrNo'] = '0000';
            $data['atmErrDesc'] = '請填寫付款人電話';
            $input_err = 1;
        }if($pay_email == ''){
            $data['atmErrNo'] = '0000';
            $data['atmErrDesc'] = '請填寫付款人電子信箱';
            $input_err = 1;
        }
        if($input_err == 1){
            $data['title'] = "交易錯誤";
            $this->load->view('cep/partial/head', $data);
            $this->load->view('cep/order_fail', $data);
            $this->load->view('cep/partial/repeatjs');
            $this->load->view('cep/order_failjs');
            $this->load->view('cep/partial/closehtml');  
        }
        else{


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

                }

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

                    $email_to = $pay_email;
                    $this->tran_email($order_id, $total_cost, $total_num, $email_to);

                    $data['email_to'] = $pay_email;
                    $data['TransAmt'] = $total_num;
                    $data['title'] = "交易成功";
                    $this->load->view('cep/partial/order_success_head', $data);
                    $this->load->view('cep/order_success', $data);
                    $this->load->view('cep/partial/repeatjs');
                    $this->load->view('cep/order_successjs');
                    $this->load->view('cep/partial/closehtml');


                }

            }

        }

	}


/****************************************************************************
APIs for Payment
*****************************************************************************/

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
                ), array('rec_order_id' => ($TransNo - 98080000)));

            //交易成功
            //記入DB
            //寄email

            $order = $this->order_model->get($TransNo - 98080000);
            $email_to = $order[0]['order_email'];
            $total_num = $order[0]['order_num'];

            $this->confirm_email(($TransNo - 98080000), $TransAmt, $total_num, $email_to);

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
    


    public function credit_post()
    {

        echo $this->curl->simple_post('https://acqtest.esunbank.com.tw/');
    }

    public function credit_post2()
    {

        echo $this->curl->simple_post('https://acqtest.esunbank.com.tw/acq_online/online/sale42'.'.htm',
            array(  'MID'=>'808900279',
                    'CID'=>'',
                    'TID'=>'EC000001',
                    'ONO'=>'98080001',
                    'TA'=>'1',
                    'U'=>'/api/credit_return'

                ),
            array(CURLOPT_BUFFERSIZE => 10));
    }


    public function credit_get()
    {

        echo $this->curl->simple_get('https://acqtest.esunbank.com.tw/');
    }

    public function credit_get2()
    {

        echo $this->curl->simple_get('https://acq.esunbank.com.tw/');
    }

    public function credit_test()
    {
        $this->load->view('cep/credit_test');
    }


    public function credit_submit($order_id = NULL, $total_cost = NULL)
    {
        $this->load->helper('security');
        $key= "W8FGAZYNTJA7NGIZBZZJLEIFWAJUMQDT";

        $data['MID'] = $MID = 8089002793;
        $data['CID'] = $CID = '';
        $data['TID'] = $TID = 'EC000001';
        $data['ONO'] = $ONO = $order_id + 98080000;
        $data['TA'] = $TA = $total_cost;
        $data['U'] = $U = "https://rainbowhope.tw/api/credit_return";
        $str = $MID."&".$CID."&".$TID."&".$ONO."&".$TA."&".$U."&".$key;
        $data['M'] = do_hash($str, 'md5');

        $this->load->view('cep/credit_submit',$data);
    }

    public function credit_submit2($order_id = NULL, $total_cost = NULL)
    {
        $this->load->helper('security');
        $key= "W8FGAZYNTJA7NGIZBZZJLEIFWAJUMQDT";

        $data['MID'] = $MID = 8089002793;
        $data['CID'] = $CID = '';
        $data['TID'] = $TID = 'EC000001';
        $data['ONO'] = $ONO = $order_id + 98080000;
        $data['TA'] = $TA = $total_cost;
        $data['U'] = $U = "https://rainbowhope.tw/api/credit_return";
        $str = $MID."&".$CID."&".$TID."&".$ONO."&".$TA."&".$U."&".$key;
        $data['M'] = do_hash($str, 'md5');

        $this->load->view('cep/credit_submit2',$data);
    }

    public function credit_submit3($order_id = NULL, $total_cost = NULL)
    {

        $this->load->view('cep/credit_submit3');
    }


    public function credit_return()
    {
        echo "in credit_return";
        $this->load->helper('security');
        $key = "W8FGAZYNTJA7NGIZBZZJLEIFWAJUMQDT";
    
        $get_data = $this->input->get(NULL,TRUE);

        //test if 交易成功(code 00),且商家號碼=本店
        if($get_data['RC'] == '00' && $get_data['MID'] == '8089002793')
        {
            $RC = $get_data['RC'];
            $MID = $get_data['MID'];
            $ONO = $get_data['ONO'];
            $LTD = $get_data['LTD'];
            $LTT = $get_data['LTT'];
            $RRN = $get_data['RRN'];
            $AIR = $get_data['AIR'];
            $AN = $get_data['AN'];
            $M = $get_data['M'];

            $str = $RC."&".$MID."&".$ONO."&".$LTD."&".$LTT."&".$RRN."&".$AIR."&".$AN."&".$key;  
            $M_check = do_hash($str, 'md5');

            //test if hash key passed
            if($M == $M_check){
                $order_id = $ONO - 98080000;
                $order = $this->order_model->get($order_id);

                $result = $this->order_model->update(array(
                    'order_success' => 1
                    ), $order_id);

                $result_rec = $this->receive_model->update(array(
                    'rec_pay_success' => 1
                    ), array('rec_order_id' => $order_id));

                $total_cost = $order[0]['order_cost'];
                $email_to = $order[0]['order_email'];
                $total_num = $order[0]['order_num'];

                $this->confirm_email($order_id, $total_cost, $total_num, $email_to);

                $data['TransNo'] = $ONO;
                $data['TransAmt'] = $total_cost;
                $data['email_to'] = $email_to;
                $data['title'] = "交易成功";

                $this->load->view('cep/partial/head', $data);
                $this->load->view('cep/order_success', $data);
                $this->load->view('cep/partial/repeatjs');
                $this->load->view('cep/order_successjs');
                $this->load->view('cep/partial/closehtml');
            }
            else{
                //hash key 比對錯誤，可能是被spoofing？
            }

        }
        else{
            //交易失敗
            $ONO = $get_data['ONO'];
            $err_desc = $this->credit_err_desc($RC_code);

            $this->receive_model->delete(array('rec_order_id' => ($ONO - 98080000)));

            $data['atmErrNo'] = '000';
            $data['atmErrDesc'] = $err_desc;
            $data['title'] = "交易錯誤";
            $this->load->view('cep/partial/head', $data);
            $this->load->view('cep/order_fail', $data);
            $this->load->view('cep/partial/repeatjs');
            $this->load->view('cep/order_failjs');
            $this->load->view('cep/partial/closehtml');
            //交易失敗
            //顯示失敗原因


        }

    }



    /****************************************************************************
    APIs for Email
    *****************************************************************************/

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

            $this->email->send();
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

            $this->email->send();
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





    private function credit_err_desc($RC_code)
    {
        $RC_err_desc = array(
            '00' => '核准',
            '01' => '請查詢銀行',
            '33' => '過期卡',
            '54' => '卡片過期',
            '62' => '尚未開卡',
            'L1' => '產品代碼錯誤',
            'L2' => '期數錯誤',
            'L3' => '不支援分期（他行卡）',
            'L4' => '產品代碼過期',
            'L5' => '金額無效',
            'L6' => '不支援分期',
            'L7' => '非限定卡別交易',
            'X1' => '不允許使用紅利折抵現金功能',
            'X2' => '點數未達可折抵下限',
            'X3' => '他行卡不支援紅利折抵',
            'X4' => '此活動已逾期',
            'X5' => '金額未超過限額不允許使用',
            'X6' => '特店不允許紅利交易',
            'X7' => '點數不足',
            'X8' => '非正卡持有人',
            'X9' => '紅利商品編號有誤或空白',
            'G0' => '系統功能有誤',
            'G1' => '交易逾時',
            'G2' => '資料格式錯誤',
            'G3' => '非使用中特店',
            'G4' => '特店交易類型不合',
            'G5' => '連線IP不合',
            'G6' => '訂單編號重複',
            'G7' => '使用未定義之紅利點數進行交易',
            'G8' => '押碼錯誤',
            'G9' => 'Session檢查有誤',
            'GA' => '無效的持卡人資料',
            'GB' => '不允許執行授權取消交易',
            'GC' => '交易資料逾期',
            'GD' => '查無訂單編號',
            'GE' => '查無交易明細',
            'GF' => '交易資料狀態不符',
            'GG' => '交易失敗',
            'GT' => '交易時間逾時',
            'GH' => '訂單編號重複送出交易',
            'GI' => '銀行紅利狀態不符',
            'GN' => '該卡號非玉山卡所屬',
            'GS' => '系統暫停服務',
         );

        if(array_key_exists($RC_code, $RC_err_desc)){
            $err_desc = $RC_err_desc[$RC_code];
        }else{
            $err_desc = '交易失敗';
        }

        return $err_desc;
    }

    /****************************************************************************
    APIs for internal user
    *****************************************************************************/

    private function _require_login()
    {
        if($this->session->userdata('cep_login') == 1){
            return 1;
        }else{
            redirect('/cep_login');
        }
    }

    public function cep_login()
    {
        $post_data = $this->input->post(NULL, TRUE);
        if($post_data['id'] == 'cep2014' && $post_data['pw'] == '2014cep')
        {
            $this->session->set_userdata('cep_login', '1');
            redirect('/db_cep');
        }else{
            redirect('/cep_login');
        }
    }

    public function cep_logout()
    {
        $this->session->unset_userdata('cep_login');
        redirect('/cep_login');        
    }

    public function confirm_remmitance()
    {
        $post_data = $this->input->post(NULL, TRUE);
        $paid = $post_data['paid'];

        $confirm = array();
        foreach ($paid as $_key => $_value) {

            $array = $this->order_model->get($_value);
            $confirm[] = $array[0];
            # code...
        }

        $data['title'] = "彩虹後台 ｜ 創創內部使用";
        $data['confirm'] = $confirm;
        $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/confirm_remmitance', $data);
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/partial/closehtml');     

    }


    public function reconfirm_remmitance()
    {
        $post_data = $this->input->post(NULL, TRUE);
        foreach ($post_data['paid'] as $_key => $_value) {

            $result = $this->order_model->update(array(
                'order_success' => 1
                ), $_value);

            $result_rec = $this->receive_model->update(array(
                'rec_pay_success' => 1
                ), array('rec_order_id' => $_value));


        }
        redirect('/db_cep');
    }


    public function email($email_to)
    {
        $email_to = urldecode($email_to);

        $data['title'] = "彩虹後台 ｜ 創創內部使用";
        $data['email_to'] = $email_to;
        $this->load->view('cep/partial/head', $data);
        $this->load->view('cep/email_to', $data);
        $this->load->view('cep/partial/repeatjs');
        $this->load->view('cep/partial/closehtml');   

    }

    public function confirm_delivery()
    {
        $post_data = $this->input->post(NULL, TRUE);
//        echo $post_data['order_id'];
        foreach ($post_data['delivered'] as $_key => $_value) {

//            echo $_value;
            $result_rec = $this->receive_model->update(array(
                'rec_on_the_way' => 1
                ), $_value);
            # code...
        }
        redirect('/db_cep');
    }



    public function send_email()
    {

            $this->load->library('email');
            $post_data = $this->input->post(NULL, TRUE);
            $email_to = $post_data['email_to'];
            $email_subject = $post_data['email_subject'];;
            $email_msg = $post_data['email_msg'];;
            
            $this->email->from('rainbowhope.service@gmail.com', '台大創創學程');
            $this->email->to($email_to); 
            $this->email->subject($email_subject);
            $this->email->message($email_msg); 

            echo $email_to;
            echo $email_subject;
            echo $email_msg;

            $this->email->send();
            redirect('/db_cep');
    }


}