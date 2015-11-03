<!DOCTYPE html>
<html>
	<head>
		<title>Q - {$view->getTitle()}</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Externals -->
		{foreach from=$q->externals()->getStyleSheets() item="styleSheet"}<link href="{$styleSheet}" rel="stylesheet" type="text/css">
		{/foreach}
		{foreach from=$q->externals()->getJavascriptFiles() item="javascriptFile"}<script src="{$javascriptFile}"></script>
		{/foreach}
		<!-- /Externals -->

		<!-- Core -->
		<link href="{$q->getHttpPath()}css/bootstrap-custom.css" rel="stylesheet" type="text/css">
		<link href="{$q->getHttpPath()}css/q.css" rel="stylesheet" type="text/css">
		<script src="{$q->getHttpPath()}js/q.js"></script>
		<!-- /Core -->

		<!-- View -->
		{foreach from=$view->getJavascriptFiles() item="javascriptFile"}<script src="{$javascriptFile}"></script>
		{/foreach}
		<script>{$view->getJavascript()}</script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{$q->getHttpPath()}">Q</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						{$q->modules()->get('Portal')->getMenu()}
						{$q->modules()->get('Users')->getMenu()}
					</ul>
					<ul class="nav navbar-nav navbar-right">
						{$q->modules()->get('Users')->getAccountMenu()}
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		<ol class="breadcrumb">
			<li><a href="{$q->getHttpPath()}">Home</a></li>
			{foreach from=$view->getBreadcrumbs() name="breadcrumbs" key="breadcrumbTitle" item="breadcrumbUrl"}
				{if $smarty.foreach.breadcrumbs.last}
					<li class="active">{$breadcrumbTitle}</li>
				{else}
					<li><a href="{$breadcrumbUrl}">{$breadcrumbTitle}</a></li>
				{/if}
			{/foreach}
		</ol>

		<div id="content" class="container">
			<div class="page-header">
				<h1>{$view->getTitle()}</h1>
			</div>

			{$view->getBody()}
		</div>
	</body>
</html>