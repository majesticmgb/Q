<?php

include('core/q.class.php');

$q = \Core\Q::get();

$moduleName = $q->params()->get('module', 'Portal');
$viewName   = $q->params()->get('view', 'Index');

// If not logged in, override current module & action
$moduleName = 'Users';
$viewName = 'Login';

$q->externals()->get('jQuery');
$q->externals()->get('Bootstrap');

$view = $q->modules()->get($moduleName)->view($viewName);

/** @var \Smarty $smarty */
$smarty = $q->externals()->get('Smarty')->getInstance();

$smarty->assign('q', $q);
$smarty->assign('view', $view);

$smarty->display('index.tpl');
