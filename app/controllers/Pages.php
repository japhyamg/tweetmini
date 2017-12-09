<?php

  class Pages extends Controller {

      public function index(){
          if(!isset($_SESSION['access_token'])) {
              $connection = new \Abraham\TwitterOAuth\TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
              $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));

              $_SESSION['oauth_token'] = $request_token['oauth_token'];
              $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

              $url = $connection->url('oauth/authorize',    array('oauth_token' => $request_token['oauth_token']));
              $data = [
                  'title' => 'TweetMini',
                  'url' => $url
              ];
              $this->view('pages/index', $data);
          } else{
              redirect('users/index');
          }
      }

    public function about(){
        if(isset($_SESSION['access_token'])){
            $access_token = $_SESSION['access_token'];
            $connection = new \Abraham\TwitterOAuth\TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

            $user = $connection->get("account/verify_credentials");

            $data = [
                'title' => 'About Us',
                'user' => $user
            ];

            $this->view('pages/about', $data);

        } else{
            $data = [
                'title' => 'About Us'
            ];

            $this->view('pages/about', $data);

        }

    }

      public function callback(){
          if(isset($_GET['oauth_token'], $_GET['oauth_verifier']) && $_GET['oauth_token'] == $_SESSION['oauth_token']){
              $request_token = [];
              $request_token['oauth_token'] = $_SESSION['oauth_token'];
              $request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];
              $connection = new \Abraham\TwitterOAuth\TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
              $access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_GET['oauth_verifier']));

              $_SESSION['access_token'] = $access_token;
              redirect('users/index');

          }
      }




  }