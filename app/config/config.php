<?php
/**
 * Created by PhpStorm.
 * User: JAFY
 * Date: 11-Nov-17
 * Time: 4:15 AM
 */

// DB Params
define('DB_HOST', 'localhost');
define('DB_USER',   'root');
define('DB_PASS', '');
define('DB_NAME', '');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));

// Url Root
define('URLROOT', 'http://localhost/tweetmini');
//Site Name
define('SITENAME', 'TweetMini');

// Configuration and setup Twitter API
define('CONSUMER_KEY', 'YOUR_CONSUMER_KEY'); // Enter your twitter secret key here
define('CONSUMER_SECRET', 'YOUR_CONSUMER_SECRET'); // Enter your twitter secret key here
define('OAUTH_CALLBACK', 'http://localhost/tweetmini/pages/callback'); // Enter your callback url here
