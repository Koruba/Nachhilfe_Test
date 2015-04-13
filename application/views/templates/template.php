<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
    <meta charset="utf-8">
    <title>Nachhilfe BKU</title>
	<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
	<meta name="description" content="Erstellung von didaktischen Jahresplänen.">
	<meta name="keywords" content="Didaktik,Didaktische Pläne,Didaktischer Jahresplan,Schule,Berufsschule,Unterricht,Planung von Unterricht">

	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />
	


	<link rel="shortcut icon" href="<?php echo base_url()?>public/favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>/css/style.css">
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
						
	
	 <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
<?php 
error_reporting(0);
echo $_scripts;
echo $_styles;
echo $head
?>


<!--
<style>.art-content .art-postcontent-0 .layout-item-0 { background: ;  }
.art-content .art-postcontent-0 .layout-item-1 { padding: 10px;  }
.art-content .art-postcontent-0 .layout-item-2 { margin-top: 20px;margin-bottom: 0px;  }
.ie7 .post .layout-cell {border:none !important; padding:0 !important; }
.ie6 .post .layout-cell {border:none !important; padding:0 !important; }

</style>-->

</head>
<body>
	<div id="art-main">
		<header class="art-header clearfix">
			<div class="art-shapes">
				<div style="width:1000px; margin:0 auto;">
					<h1 class="art-headline"><a href="#">Nachhilfe</a></h1>
					<h2 class="art-slogan">Nachhilfe von und fuer Schueler des technischen Gymnasiums</h2>
					<h2 class="art-subslogan"><?php echo $schulname ?></h2>
				</div>
			</div>

			
			<nav class="art-nav clearfix " style="left: 0px;">
				<div class="art-nav-inner">
					<div style="width:1000px; margin:0 auto;">
						<ul class="art-hmenu">
						
							<?php echo $navigation ?>
						
						</ul> 
					</div>
				</div>
			</nav>
			
		</header>
		
		<div class="art-sheet clearfix">
		<div><?php echo $login ?></div>
            <div class="art-layout-wrapper clearfix">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
					
                        <div class="art-layout-cell art-content clearfix">
							<article class="art-post art-article">                         
								<div class="art-postcontent art-postcontent-0 clearfix">
									
									
									<?php echo $content ?>									
			
								</div>        
							</article>
						</div>
						
                    </div>
                </div>
            </div>
			
			
			<footer class="art-footer clearfix">
				<div class="art-content-layout">
					<div class="art-content-layout-row">
						<div class="art-layout-cell layout-item-0" style="width: 100%">
							<?php echo $footer ?>
						</div>
					</div>
				</div>
			</footer>
		</div>
		
	</div>

<script type="text/javascript">
/*
$(document).ready(function(){

	var navtext;
	navtext=$.cookie('navi');
	
	u=$("a.w:contains('"+navtext+"')");
	u.addClass("active");
});*/
</script>


</body>
</html>

