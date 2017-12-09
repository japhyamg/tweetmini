<?php
/**
 * Created by PhpStorm.
 * User: JAFY
 * Date: 01-Dec-17
 * Time: 12:32 PM
 */


function redirect($page){
    header('Location: '.URLROOT. '/'.$page);
}
