<!DOCTYPE html>
<!--[if lt IE 9]><html class="lte-ie8 " lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="">
<!--<![endif]-->

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Check if you can get legal aid? - Consumer, question 2</title>
   <!--[if gt IE 8]><!-->
   <link href="/css/application.css" media="screen" rel="stylesheet" type="text/css">
   <!--<![endif]-->
   <!--[if IE 6]>
   <link href="/css/application-ie6.css" media="screen" rel="stylesheet" type="text/css"><![endif]-->
   <!--[if IE 7]>
   <link href="/css/application-ie7.css" media="screen" rel="stylesheet" type="text/css"><![endif]-->
   <!--[if IE 8]>
   <link href="/css/application-ie8.css" media="screen" rel="stylesheet" type="text/css"><![endif]-->
   <link href="/css/print.css" media="print" rel="stylesheet" type="text/css">
   <!--[if gte IE 9]><!-->
   <link href="/css/fonts.css" media="all" rel="stylesheet" type="text/css">
   <!--<![endif]-->
   <script src="/js/jquery-1.7.2.js" type="text/javascript"></script>
   <!-- <script defer src="/js/application.js" type="text/javascript"></script> -->
   <!--[if lt IE 9]><!-->
   <script src="/js/ie.js" type="text/javascript"></script>
   <![endif]--><link rel="shortcut icon" href="/static/favicon-447e4ac1ab790342660eacfe3dcce264.ico" type="image/x-icon">
   <!-- For third-generation iPad with high-resolution Retina display: -->
   <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/static/apple-touch-icon-144x144-4e306e01c31e237722b82b7aa7130082.png">
   <!-- For iPhone with high-resolution Retina display: -->
   <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/static/apple-touch-icon-114x114-f1d7ccdc7b86d923386b373a9ba5e3db.png">
   <!-- For first- and second-generation iPad: -->
   <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/static/apple-touch-icon-72x72-2ddbe540853e3ba0d30fbad2a95eab3c.png">
   <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
   <link rel="apple-touch-icon-precomposed" href="/static/apple-touch-icon-57x57-37527434942ed8407b091aae5feff3f3.png">
   <meta name="viewport" content="width=device-width, initial-scale=1"><script type="text/javascript" src="/js/jquery.history.js"></script>
   <script type="text/javascript" src="/js/cla_functions.js"></script>
   
    <script type="text/javascript" src="/js/jquery.history.js"></script>
    <script type="text/javascript" src="/js/cla_functions.js"></script>
    <meta name="robots" content="noindex" />
    <link href="/css/content.css" media="screen" rel="stylesheet" type="text/css" />	
    <link href="/css/custom-c4a.css" media="screen" rel="stylesheet" type="text/css" />	
    <!--[if IE 7]>
   <link href="css/ie7.css" media="all" rel="stylesheet" type="text/css" />
   <![endif]-->
</head>
<body id="home-index" class="home beta mainstream">
   <script type="text/javascript">document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');</script>
   <script type="text/javascript">
        
        function form_handler() {
           var url = window.location.pathname;
           $('#navigator').submit(function (e) {
               e.preventDefault();
               var form = $(this),
                   selection = $("input[name=response]:radio:checked");
               
               if (selection.length) {
                   window.location = url + selection.val();
                   return false;
               } else {
                   var error = $('<div/>', {
                           'class': 'error'
                       }).append($('<p/>', {
                           'class': 'error-message',
                           'id': 'current-error',
                           'role': 'alert',
                           text: 'Please answer this question'
                       }));
   
                   var exists = form.find('div.error').length;
   
                   if (!exists) {
                       $('.question-body').prepend(error);
                   }
               }
           });
        }
       $(document).ready(function() {
            form_handler();
            
           $('label').on("click", function () { //touch device override
           });
   
       });
   </script>
    <a href="#content" class="visuallyhidden">Skip to main content</a>
    <header role="banner" id="global-header">
        <div class="header-wrapper">
            <div class="header-global">
			    <div class="header-proposition">
				    <div class="content">
					    <nav id="proposition-menu">
						    <a href="/" id="proposition-name">Legal aid checker <small class="beta">ALPHA</small></a>
					    </nav>
				    </div>
			    </div>
            </div>
        </div>
    </header>          
   <div id="global-cookie-message">
      <p>This website uses cookies to make the site simpler. <a href="#">Find out more about cookies</a></p>
   </div>
   <div id="global-breadcrumb" class="header-context">
      <nav role="navigation">
         <ol class="group">
            <li><a href="/">Home</a></li>
            <li><a href="https://www.gov.uk/browse/justice">Crime, justice and the law</a></li>
            <li><strong><a href="https://www.gov.uk/browse/justice/courts-sentencing-tribunals">Courts, sentencing and tribunals</a></strong></li>
         </ol>
      </nav>   
   </div>