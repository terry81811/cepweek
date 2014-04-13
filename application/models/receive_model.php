<?php

class Receive_model extends CRUD_model
{
    protected $_table = 'RECEIVER_TABLE';
    protected $_primary_key = 'rec_id';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
