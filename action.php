<?php

/**
 * @author TimoBakx
 */

include('core/q.class.php');

$q = \Core\Q::get();

$moduleName = $q->params()->get('module', '');
$actionName = $q->params()->get('action', '');

try
{
	$view = $q->modules()->get($moduleName)->action($actionName);
}
catch (Exception $e)
{
	die($e->getMessage());
}
