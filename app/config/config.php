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
define('CONSUMER_KEY', 'zyjarkoPPwlhLcEdyr7AH727d');
define('CONSUMER_SECRET', '2Wd0rryveAvBR3Cf2M1VaFT89eosOj49Vo8pR7VxPDYvGuwYGD');
define('OAUTH_CALLBACK', 'http://localhost/tweetmini/pages/callback');