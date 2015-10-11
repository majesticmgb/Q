<?php

/**
 * @author TimoBakx
 */

use Core\Exceptions\QException;

include('core/q.class.php');

$q = \Core\Q::get();

$moduleName = $q->params()->get('module', '');
$actionName = $q->params()->get('action', '');

try
{
	$action = $q->modules()->get($moduleName)->action($actionName);
}
catch (QException $e)
{
	$action = new \Core\Actions\ExceptionAction();
	$action->setException($e);
}

$action->execute();

$json = json_encode($action);

echo $json;