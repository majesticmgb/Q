<?php

include('core/q.class.php');

$q = \Core\Q::get();

$moduleName = $q->params()->get('module', 'portal');
$viewName   = $q->params()->get('view', 'index');

// If not logged in, redirect
if (true && !($moduleName == 'users' && $viewName == 'login'))
{
	$q->redirect('Users', 'Login');
}

$q->externals()->get('jQuery');
$q->externals()->get('Bootstrap');

/** @var \Smarty $smarty */
$smarty = $q->externals()->get('Smarty')->getInstance();

try
{
	$view = $q->modules()->get($moduleName)->view($viewName);
}
catch (Exception $e)
{
	$view = new \Core\Views\ExceptionView(null);

	$view->setException($e);
}

$smarty->assign('q', $q);
$smarty->assign('view', $view);

$smarty->display('index.tpl');
