<?php
/**
 * Created by PhpStorm.
 * User: JAFY
 * Date: 11-Nov-17
 * Time: 2:00 AM
 */

session_start();


// Load Config file
require_once 'config/config.php';
require_once 'libraries/autoload.php';
require_once 'helpers/functions.php';

use Abraham\TwitterOAuth\TwitterOAuth;


require_once 'libraries/Core.php';
require_once 'libraries/Database.php';
require_once 'libraries/Controller.php';

