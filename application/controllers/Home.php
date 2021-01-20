<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('user_data')) {
      redirect(base_url('auth'));
    }
  }

  public function index()
  {
    $user_check = $this->db->get_where('users', ['id' => $this->session->userdata('user_data')['id']], 1)->row();
    $data = ['value' => $user_check];
    $this->load->view('home', $data);
  }

  public function setup()
  {
    $tweet    = $this->input->post('tweet', true);
    $reply    = $this->input->post('reply', true);

    if ($tweet && $reply) {
      $user_data = [
        'tweet'   => $tweet,
        'reply'   => $reply
      ];

      $this->db->where('id', $this->session->userdata('user_data')['id'])->update('users', $user_data);
      $this->session->set_flashdata('result', "Success update auto reply!");
    }

    redirect(base_url('/'));
  }
}
