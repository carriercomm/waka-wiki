<?php
//Do not edit this file - edit config.php instead

require_once 'config.php';
require_once 'wiki/wiki.php';
require_once 'wiki/router.php';
require_once 'wiki/loader.php';

$waka = new Wiki($config_parms);
$router = new Router();
$loader = new Loader($config_parms['template']);

$controller = $router->get_controller();
$parms = $router->get_parms();

switch ($controller)
{
	case '':
		$waka->view('');
		break;
	case 'viewall':
		$waka->viewall($parms[0]);
		break;
	case 'view':
		$waka->view($parms[0]);	
		break;
	case 'edit':
		$waka->edit($parms[0]);	
		break;
	case 'update':
		$waka->update($parms[0]);	
		break;
	case 'newpage':
		$waka->newpage();	
		break;
	case 'create':
		$waka->create();	
		break;
	case 'delete':
		$waka->delete($parms[0]);	
		break;
	default:
		$waka->display_error('Invalid url string');
		break;
}