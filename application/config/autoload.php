<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'session','form_validation');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'form', 'text', 'file');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Page_model','Category_model','Backend_model','FrontUser_model', 'Review_model',
                    'Business_model','Product_model','ServPro_model','User_model','Status_model','Doctor_model','Post_model','Feed_model');
