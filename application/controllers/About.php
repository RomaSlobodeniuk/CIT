<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {

    public function index( $id = '' )
    {
        $this->data->id = $id;
        $this->data->title = 'my title';
        $this->data->template = 'about_us';
        $this->data->description = 'CodeIgniter rules!';

        helloFromHelper();

        $this->load->view('components/layout', ['data' => $this->data]);
    }

    public function view ( $params , $id = '' )
    {
        $this->data->id = $id;
        $this->data->param = $params;
        $this->data->title = 'my title';
        $this->data->template = 'about_us';
        $this->data->description = 'CodeIgniter rules!';

        showMessage();

        $this->superduper->myMethod();

        $this->load->view('components/layout', ['data' => $this->data]);
    }
}