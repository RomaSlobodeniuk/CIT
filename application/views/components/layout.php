<?php

$this->load->view('components/header', ['title' => $my_data->title]);
$this->load->view($my_data->template, ['data' => [$my_data->title, $my_data->data_from_db]]);
$this->load->view('components/footer');