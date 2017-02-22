<?php
$module_path = drupal_get_path('module', 'matter');
?>
<!DOCTYPE html>
<html lang="<?= $vars['language']; ?>">
	<head>
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-TWDTW9B');</script>
		<!-- End Google Tag Manager -->
		
		<!-- Google Analytics script -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-91747146-1', 'auto');
		  ga('send', 'pageview');
		
		</script>
		<!-- Google Analytics script -->
		
		<title><?= $vars['title']; ?></title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="https://www.legalaid.vic.gov.au/profiles/vlapublic_profile/themes/custom/vlapublic_theme/favicon.ico" type="image/vnd.microsoft.icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
		<?php
		foreach ($vars['css'] as $css) {
	    ?>
		    <link rel="stylesheet" href="<?= $css . '?date=' . time(); ?>">
	    <?php
		}
		?>
		<?php
		foreach ($vars['js'] as $js) {
	    ?>
		    <script src="<?= $js . '?date=' . time(); ?>"></script>
	    <?php
		}
		?>
		<script id="answers-template" type="text/template">	
			<div class="answers">
				{{#answers}}
					<div class="radio"><label><input type="radio" name="optradio" id="{{nid}}">{{title}}</label></div>
				{{/answers}}
			</div>
		</script>
		<script id="outcome-page-template" type="text/template">
			{{#outcome}}
			<div class="headline">
				<h3>{{title}}</h3>
				<h5>You can call Legal Help for this type of problem</h5>
				<p>{{{description}}}</p>
			</div>
			<div class="heading-info">
				<h3>Information to help you get started</h3>
				<p>Click through the topics listed below to find answers to your questions.</p>
			</div>
			<div class="useful-information col-xs-12 col-sm-8 col-md-9">
				<div class="panel-group" id="accordion">
					{{#useful_information}}
				    <div class="panel panel-default">
				      <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse{{id}}" tabindex="0">
				        <h4 class="panel-title">
				          <a>{{title}}</a>
				          <i class="fa fa-chevron-circle-right pull-right" aria-hidden="true"></i>
				        </h4>
				      </div>
				      <div id="collapse{{id}}" class="panel-collapse collapse">
				        <div class="panel-body">{{{description}}}</div>
				      </div>
				    </div>
					{{/useful_information}}
				</div> 
			</div>
			<div class="terminology col-xs-12 col-sm-3 col-md-2">
				<h5>Glossary</h5>
				{{#terminology_information}}
					<p><span class="term-title">{{name}}:</span> <span>{{description}}</span></p>
				{{/terminology_information}}
			</div>
			<div class="where-to-go col-xs-12">
				<div class="">
			        <h3>Where to go for help</h3>
		        	<p>You can pay a private lawyer to advise you. If you cannot afford a lawyer you may get help and advice from:</p>
		        	<br>
			        <div class="col-xs-12 col-sm-3 col-md-3">
			            <!-- required for floating -->
			            <!-- Nav tabs -->
			            <ul class="nav nav-tabs tabs-left">
			            	{{#office_information}}
			                	<li class=""><a href="#office-{{id}}" data-toggle="tab">{{title}}</a></li>
			                {{/office_information}}
			            </ul>
			        </div>
			        <div class="col-xs-12 col-sm-9 col-md-9">
			            <!-- Tab panes -->
			            <div class="tab-content">
			            	{{#office_information}}
			                <div class="tab-pane" id="office-{{id}}">
			                	<div class="col-xs-1 col-sm-1"></div>
			                	<div class="col-xs-12 col-sm-6 col-md-7">{{{description}}}</div>
			                	<div class="col-xs-1 col-sm-1"></div>
			                	<div class="col-xs-12 col-sm-4 col-sm-6">{{{map}}}</div>
			                </div>
			                {{/office_information}}
			            </div>
			        </div>
			        <div class="clearfix"></div>
			    </div>
			</div>
			{{/outcome}}
		</script>
	</head>

	<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TWDTW9B"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	    
		<header>
			<div class="logo"><img src="/<?= $module_path ?>/images/cla-logo.png" alt="Victoria Legal Aid Logo" title="Victoria Legal Aid Logo" tabindex="0"></div>
			<div class="beta">BETA</div>
		</header>