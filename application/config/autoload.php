<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('session', 'database', 'form_validation', 'user_agent');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'fungsi', 'security');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('Query_model' => 'mquery');
