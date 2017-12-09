<?php
/**
 * Created by PhpStorm.
 * User: JAFY
 * Date: 01-Dec-17
 * Time: 2:32 AM
 */

class Users extends Controller{
    public function __construct(){
    }

    public function index(){
        // Check for post super global
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_SESSION['access_token'])){
                $access_token = $_SESSION['access_token'];
                $connection = new \Abraham\TwitterOAuth\TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

                $user = $connection->get("account/verify_credentials");

                $tweets = $connection->get('statuses/home_timeline', ['count' => 200]);

                // Process the form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'tweets' => $tweets,
                    'user' => $user,
                    'tweet' => trim($_POST['tweet']),
                    'tweet_err' => ''
                ];

                // Validate email field
                if(empty($data['tweet'])){
                    $data['tweet_err'] = 'Hey, whats happening?';
                }

                if(empty($data['tweet_err'])){
                    //Validated
                    $tweet = $connection->post('statuses/update', array('status' => $data['tweet']));
                    if($tweet){
                        flash('tweet_message', 'Made a tweet');
                        redirect('users/index');
                    }
                } else{
                    // Load view with error
                    $this->view('users/index', $data);
                }
            }

        } else{
            if(isset($_SESSION['access_token'])){
                $access_token = $_SESSION['access_token'];
                $connection = new \Abraham\TwitterOAuth\TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

                $user = $connection->get("account/verify_credentials");

                $tweets = $connection->get('statuses/home_timeline', ['count' => 200]);

                $data = [
                    'tweets' => $tweets,
                    'user' => $user,
                    'tweet' => '',
                    'tweet_err' => ''
                ];

                $this->view('users/index', $data);

            }
        }


    }

    public function profile(){
        if(isset($_SESSION['access_token'])){
            $access_token = $_SESSION['access_token'];
            $connection = new \Abraham\TwitterOAuth\TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

            $user = $connection->get("account/verify_credentials");

            $tweets = $connection->get('statuses/user_timeline', ['count' => 200]);

            $data = [
                'tweets' => $tweets,
                'user' => $user,
                'tweet' => '',
                'tweet_err' => ''
            ];

            $this->view('users/profile', $data);

        }
    }

    public function logout(){
        //Remove user data from session
        unset($_SESSION['access_token']);

        //Destroy all session data
        session_destroy();

        //Redirect to the homepage
        redirect("index");
    }

}