<?php

class MY_Controller extends CI_Controller
{
    protected $data;

    function __construct()
    {
        parent::__construct();
        $this->data = new stdClass();
        $this->load->helpers(['my_helper', 'second_helper']);
        $this->load->library('SuperDuper');
    }
}