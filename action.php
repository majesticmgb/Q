<?php

include('core/q.class.php');

$q = \Core\Q::get();

$moduleName = $q->params()->get('module', 'portal');
$actionName = $q->params()->get('action', '');

try
{
	$action = $q->modules()->get($moduleName)->action($actionName);

	if ($action->requiresLogin() && !$q->modules()->get('Users')->isLoggedIn())
	{
		$q->redirect($q->modules()->get('Users')->view('Login'));
	}
}
catch (\Core\Exceptions\QException $e)
{
	$action = new \Core\Actions\ExceptionAction(null);

	$action->setException($e);
}

$action->execute();