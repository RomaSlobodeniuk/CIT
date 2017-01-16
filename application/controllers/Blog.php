<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.01.17
 * Time: 20:23
 */
class Blog extends MY_Controller
{
    function index(){
        $query = $this->db->query("SELECT * FROM `articles`");
        echo '<pre>';
        foreach ($query->result() as $article){
            print_r($article);
        }
        echo '</pre>';
        $this->data->title = 'The blog';
        $this->data->template = 'blog';
        $this->data->content = 'This is the body content!';
        $this->load->view("components/layout", ['data' => $this->data ]);
    }
}