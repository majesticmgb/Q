<?php

include('core/q.class.php');

$q = \Core\Q::get();

$moduleName = $q->params()->get('module', 'portal');
$viewName   = $q->params()->get('view', 'index');

$q->externals()->get('jQuery');
$q->externals()->get('Bootstrap');

/** @var \Smarty $smarty */
$smarty = $q->externals()->get('Smarty')->getInstance();

try
{
	$view = $q->modules()->get($moduleName)->view($viewName);

	if ($view->requiresLogin() && !$q->modules()->get('Users')->isLoggedIn())
	{
		$q->redirect($q->modules()->get('Users')->view('Login')->getUrl());
	}
}
catch (Exception $e)
{
	$view = new \Core\Views\ExceptionView(null);

	$view->setException($e);
}

$smarty->assign('q', $q);
$smarty->assign('view', $view);

$smarty->display('index.tpl');
