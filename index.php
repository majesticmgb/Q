<?php

include('core/q.class.php');

$q = \Core\Q::get();

$view = $q->modules()->get($q->params()->get('module', 'pages'))->view($q->params()->get('view', 'index'));

/** @var \Smarty $smarty */
$smarty = $q->externals()->get('Smarty')->getInstance();

$smarty->assign('view', $view);

$smarty->display('index.tpl');
