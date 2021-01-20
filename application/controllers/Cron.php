<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Abraham\TwitterOAuth\TwitterOAuth;

class Cron extends CI_Controller
{
  public function index()
  {
    $get_users = $this->db->get('users')->result();

    foreach ($get_users as $users) {
      $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $users->oauth_token, $users->oauth_token_secret);
      $connection->get('account/verify_credentials');
      if (($connection->getLastHttpCode() == 200)) {
        $get_tweet = $connection->get('statuses/home_timeline', ['count' => $users->tweet]);
        var_dump($get_tweet);
        foreach ($get_tweet as $tweet) {
          $status = '@' . $tweet->user->screen_name . " " . $users->reply;

          $connection->post('statuses/update', ['in_reply_to_status_id' => $tweet->id, 'status' => $status]);
        }
      }
    }
  }
}
