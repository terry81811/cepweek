<?php

class Days_model extends CRUD_model
{
    protected $_table = 'DAYS_COUNT_TABLE';
    protected $_primary_key = 'days_name';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
