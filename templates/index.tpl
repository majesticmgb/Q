<!DOCTYPE html>
<html>
	<head>
		<title>Q - {$view->getTitle()}</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		{foreach from=$q->externals()->getStyleSheets() item="styleSheet"}<link href="{$styleSheet}" rel="stylesheet" type="text/css">
		{/foreach}

		{foreach from=$q->externals()->getJavascriptFiles() item="javascriptFile"}<script src="{$javascriptFile}"></script>
		{/foreach}<script src="{$q->getHttpPath()}js/q.js"></script>

		<link href="{$q->getHttpPath()}css/bootstrap-custom.css" rel="stylesheet" type="text/css">
		<link href="{$q->getHttpPath()}css/q.css" rel="stylesheet" type="text/css">
		<script>
			Q.httpPath = "{$q->getHttpPath()}";
		</script>
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
					<a class="navbar-brand" href="#">Q</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
						<li><a href="#">Link</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
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

		{include file="modal.error.tpl"}
	</body>
</html>