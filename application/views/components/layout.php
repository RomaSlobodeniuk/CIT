<?php


$this->load->view('components/header', ['title' => $data->title]);
$this->load->view($data->template, ['data' => $data]);
$this->load->view('components/footer');