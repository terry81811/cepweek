<?php

class Order_model extends CRUD_model
{
    protected $_table = 'ORDER';
    protected $_primary_key = 'order_id';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
