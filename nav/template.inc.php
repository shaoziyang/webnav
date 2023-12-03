<?php
/**
 * Template
 *
 * @package WikiDocs
 * @repository https://github.com/Zavy86/WikiDocs
 *
 * @var WikiDocs $APP
 * @var Document $DOC
 * @var Localization $TXT
 * @var ParsedownExtra $PARSER
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="pragma" content="no-store" />
	<meta http-equiv="content-type" content="no-store, must-revalidate" />
	<meta http-equiv="expires" content="Wed, 26 Feb 1997 08:21:57 GMT"/>
	<?php echo '<script> var navurl="'.$APP->PATH.'";</script>'; ?>
	<?php include "scripts/wallpaper.php"; ?>
	<link type="text/css" rel="stylesheet" href="<?= $APP->PATH ?>helpers/materialize-1.0.0/css/materialize.min.css" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?= $APP->PATH ?>helpers/material-icons-1.13.6/css/material-icons.css" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?= $APP->PATH ?>helpers/font-awesome-4.7.0/css/font-awesome.min.css" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?= $APP->PATH ?>helpers/easymde-2.16.1/css/easymde.min.css" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?= $APP->PATH ?>helpers/highlightjs-11.7.0/css/<?= ($APP->DARK?"monokai-sublime":"default") ?>.min.css" media="screen,projection">
	<link type="text/css" rel="stylesheet" href="<?= $APP->PATH ?>helpers/katex-0.16.7/css/katex.min.css" media="screen,projection">
	<link type="text/css" rel="stylesheet" href="<?= $APP->PATH ?>styles/styles.css" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?= $APP->PATH ?>styles/styles-<?= ($APP->DARK?"dark":"light") ?>.css" media="screen,projection"/>
	<?php if(file_exists($APP->DIR."scripts/custom.php")) include $APP->DIR."scripts/custom.php"; ?>
	<?php if(file_exists($APP->DIR."styles/wallpaper.css")): ?><link type="text/css" rel="stylesheet" href="<?= $APP->PATH ?>styles/wallpaper.css" media="screen,projection"/><?php echo "\n"; endif; ?>
	<?php if(file_exists($APP->DIR."styles/styles-custom.css")): ?><link type="text/css" rel="stylesheet" href="<?= $APP->PATH ?>styles/styles-custom.css" media="screen,projection"/><?php echo "\n"; endif; ?>
	<link type="image/ico" rel="icon" href="<?= $APP->PATH ?>favicon.ico" sizes="any"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="theme-color" content="<?= $APP->COLOR ?>">
	<style>:root{--theme-color:<?= $APP->COLOR ?>;}</style>
	<title><?= ($DOC->ID!="homepage"?$DOC->TITLE." - ":null).$APP->TITLE ?></title>
	<?php if(strlen(GTAG ?? '') && Session::getInstance()->privacyAgreeded()): ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?= GTAG ?>"></script>
		<script>
			window.dataLayer=window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js',new Date());
			gtag('config','<?= GTAG ?>');
		</script>
	<?php endif; ?>
</head>
<body>
<header>
	<ul id="nav-mobile" class="sidenav sidenav-fixed">
		<li class="logo">
			<a id="logo-container" href="<?= $APP->PATH ?>" class="brand-logo">
				<h1><?= $APP->TITLE ?></h1>
				<span><em><?= $APP->SUBTITLE ?></em></span>
			</a>
		</li>
		<li class="search">
			<div class="search-wrapper">
				<form action="<?= $APP->PATH ?>" method="get" autocomplete="off">
					<input id="search" name="search" placeholder="<?= $TXT->Search ?>" value="<?= SEARCH ?>"><i class="material-icons">search</i>
				</form>
			</div>
		</li>
		<?php
		if(in_array(MODE,array("view","edit","search"))){
			// get primary level index
			$index_array=Document::index();
			// cycle all documents
			foreach($index_array as $index_fe){
				echo "<li class=\"index";
				if($index_fe->url==substr($DOC->ID,0,strlen($index_fe->url))){echo " active";}
				echo "\"><a class=\"waves-effect waves-light\" href=\"".$APP->PATH.$index_fe->url."\">".$index_fe->label."</a></li>\n";
				// check for selected index
				if($index_fe->url==substr($DOC->ID,0,strlen($index_fe->url))){
					// get secondary level index
					$sub_index_array=Document::index($index_fe->url);
					// third level default style
					$thirdLevelStyle='display:none';
					// cycle all documents
					foreach($sub_index_array as $sub_index_fe){
						echo "<li class=\"sub_index";
						if($sub_index_fe->url==substr($DOC->ID,0,strlen($sub_index_fe->url))){echo " active";$thirdLevelStyle="display:block";}else{$thirdLevelStyle="display:none";}
						echo "\"><a class=\"waves-effect waves-light\" href=\"".$APP->PATH.$sub_index_fe->url."\">&nbsp;&nbsp;&nbsp;".$sub_index_fe->label."</a>\n";
						// get third level index and build sub-menus
						$subsub_index_array=Document::index($sub_index_fe->url);
						if(!empty($subsub_index_array)){
							echo "<ul style=".$thirdLevelStyle.">";
							foreach($subsub_index_array as $third_index_fe){
								echo "<li class=\"subsub_index";
								if($third_index_fe->url==substr($DOC->ID,0,strlen($third_index_fe->url))){echo " active";}
								echo "\"><a class=\"waves-effect waves-light\" href=\"".$APP->PATH.$third_index_fe->url."\">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;".$third_index_fe->label."</a></li>\n";
							}
							echo "</ul>";
						}
						echo "</li>";
					}
				}
			}
		}
		?>
	</ul>
	<div class="sidebar-footer"> <!-- @todo migliorare -->
		<div id="sidebar-footer-content">
			<span class="default-title"><?= $APP->OWNER ?></span><br>
			<span class="default-description"><?= $APP->NOTICE ?></span>
		</div>
	</div>
</header>
<main>
	<div class="container">
		<div class="row breadcrumbs" style="padding-top:18px">
			<div class="col s2 m1 offset-m1 hide-on-large-only">
				<a class="btn btn-floating btn-small tooltipped waves-effect waves-light sidenav-trigger main-color" href="#" data-target="nav-mobile" data-position="bottom" data-tooltip="<?= $TXT->TooltipSidebar ?>"><i class="material-icons">menu</i></a>
			</div><!-- /col -->
			<div class="col s8 m7 l8 offset-l1 center-on-small-only" style="padding-top:3px">
		<span>
		<?php
				if($DOC->ID=="homepage"){
					echo $APP->TITLE;
				}else{
					foreach($DOC->hierarchy() as $element){
						// check for current document
						if($DOC->ID==$element->path){
							echo "<span class=\"nowrap\">".$element->label."</span>";
						}else{
							echo "<a href=\"".$APP->PATH.$element->path."\" class=\"main-color-text nowrap\">".$element->label."</a> / ";
						}
					}
				}
				?>
		</span>
			</div><!-- /col -->
			<div class="col s2 m2 l2">
				<?php if(MODE=="view"): ?>
					<span class="right nowrap">
			<a class="btn btn-floating btn-small tooltipped waves-effect waves-light main-color" href="<?= $DOC->URL."?print" ?>" target="_blank" data-position="bottom" data-tooltip="<?= $TXT->TooltipPrint ?>"><i class="material-icons">print</i></a>
			<?php if(Session::getInstance()->autenticationLevel()==2): ?>
							<a class="btn btn-floating btn-small tooltipped waves-effect waves-light main-color" href="<?= $APP->PATH ?>settings.php" data-position="bottom" data-tooltip="<?= $TXT->TooltipSettings ?>"><i class="material-icons">settings</i></a>
							<a class="btn btn-floating btn-small tooltipped waves-effect waves-light main-color" href="#" data-position="bottom" data-tooltip="<?= $TXT->TooltipNewDocument ?>" onClick="new_document();"><i class="material-icons">add_circle</i></a>
							<a class="btn btn-floating btn-small tooltipped waves-effect waves-light main-color" href="<?= $DOC->URL."?edit" ?>" data-position="bottom" data-tooltip="<?= $TXT->TooltipEditDocument ?>"><i class="material-icons">border_color</i></a>
							<?php if($DOC->VERSION!=="latest"): ?><a class="btn btn-floating btn-small tooltipped waves-effect waves-light orange" href="<?= $APP->PATH ?>submit.php?act=content_restore&document=<?= $DOC->ID ?>&version=<?= $DOC->VERSION ?>" data-position="bottom" data-tooltip="<?= $TXT->TooltipRestoreVersion ?>" onClick="return(confirm('<?= str_replace(["'",'"'],"\'",$TXT->TooltipRestoreVersionConfirm) ?>'))"><i class="material-icons">update</i></a><?php endif; ?>
						<?php else: ?>
							<a class="btn btn-floating btn-small tooltipped waves-effect waves-light main-color" href="<?= $DOC->URL."?auth" ?>" data-position="bottom" data-tooltip="<?= $TXT->TooltipSignIn ?>"><i class="material-icons">lock_open</i></a>
						<?php endif; ?>
		  </span>
				<?php endif; ?>
				<?php if(MODE=="edit"): ?>
					<span class="right nowrap">
			<a class="btn btn-floating btn-small tooltipped waves-effect waves-light grey" href="<?= $DOC->URL ?>" data-position="bottom" data-tooltip="<?= $TXT->TooltipCancelEditing ?>"><i class="material-icons">cancel</i></a>
			<a class="btn btn-floating btn-small tooltipped waves-effect waves-light blue modal-trigger" href="#modal_image_uploader" data-position="bottom" data-tooltip="<?= $TXT->TooltipImages ?>"><i class="material-icons">image</i></a>
			<a class="btn btn-floating btn-small tooltipped waves-effect waves-light purple modal-trigger" href="#modal_attachment_uploader" data-position="bottom" data-tooltip="<?= $TXT->Attachments ?>"><i class="material-icons">attachment</i></a>
			<a class="btn btn-floating btn-small tooltipped waves-effect waves-light red" href="<?= $APP->PATH ?>submit.php?act=content_delete&document=<?= $DOC->ID ?>" data-position="bottom" data-tooltip="<?= $TXT->TooltipDeleteDocument ?>" onClick="return(confirm('<?= str_replace(["'",'"'],"\'",$TXT->TooltipDeleteDocumentConfirm) ?>'))"><i class="material-icons">delete</i></a>
			<a class="btn btn-floating btn-small tooltipped waves-effect waves-light orange modal-trigger" href="#modal_versions" data-position="bottom" data-tooltip="<?= $TXT->TooltipVersions ?>"><i class="material-icons">history</i></a>
			<button id="editor-revision" class="btn btn-floating btn-small tooltipped waves-effect waves-light amber" data-position="bottom" data-tooltip="<?= $TXT->TooltipVersioning ?>"><i id="editor-revision-checkbox" class="material-icons">check_box</i></button>
			<button id="editor-save" class="btn btn-floating btn-small tooltipped waves-effect waves-light green" data-position="bottom" data-tooltip="<?= $TXT->TooltipSave ?>"><i class="material-icons">save</i></button>
		  </span>
				<?php endif; ?>
			</div><!-- /col -->
		</div><!-- /row -->
		<div class="divider"></div>
		<div class="row">
			<div class="col s12 m10 offset-m1">
				<?php if(MODE=="view"): ?>
					<article>
						<?php
							$source=$PARSER->text($DOC->render());
							$source_array=preg_split("/((\r?\n)|(\r\n?))/",$source);
							$source_final="\n";
							// add anchor link to headers
							foreach($source_array as $line){
								if(in_array(substr($line,1,2),['h1','h2','h3','h4','h5','h6'])){
									$anchor=substr($line,8,(strpos($line,'"',8)-8));
									if($anchor){$line=substr($line,0,strpos($line,'>'))." title='#".$anchor."'><a href='#".$anchor."'></a".substr($line,strpos($line,'>',1));}
								}
								$source_final.=$line."\n";
							}
							echo $source_final;
						?>
					</article>
				<?php endif; ?>
				<?php if(MODE=="auth"): ?>
					<form id="auth-form" method="post" action="<?= $APP->PATH ?>submit.php?act=authentication">
						<input type="hidden" name="document" value="<?= $DOC->ID ?>">
						<div class="row" style="margin-top:36px">
							<div class="input-field col s9">
								<input type="password" name="password" required autofocus>
								<label for="password"><span class="main-color-text"><?= $TXT->AuthPassword ?>..</span></label>
							</div><!-- /input-field -->
							<div class="input-field col s3">
								<input type="submit" class="btn main-color" value="<?= $TXT->AuthSubmit ?>">
							</div><!-- /input-field -->
						</div><!-- /row -->
					</form>
				<?php endif; ?>
				<?php if(MODE=="edit"): ?>
					<form id="editor-form" method="post" action="<?= $APP->PATH ?>submit.php?act=content_save">
						<input type="hidden" name="revision" value="1">
						<input type="hidden" name="document" value="<?= $DOC->ID ?>">
						<?php
						$source=null;
						if($_GET['draft'] ?? '' && file_exists($DOC->DIR."draft.md")){$source=file_get_contents($DOC->DIR."draft.md");}
						if(!strlen($source ?? '')){$source=$DOC->loadContent();}
						?>
						<textarea id="simplemde" name="content"><?= (strlen($source)?$source:"# ".$DOC->TITLE) ?></textarea>
					</form>
				<?php endif; ?>
				<?php if(MODE=="edit"): ?>
					<!-- modal_image_uploader -->
					<div id="modal_image_uploader" class="modal">
						<div class="modal-content">
							<h4><?= $TXT->Images ?></h4>
							<form id="images-uploader-form" method="post" action="<?= $APP->PATH ?>submit.php?act=image_upload_ajax" enctype="multipart/form-data">
								<input type="hidden" name="document" value="<?= $DOC->ID ?>">
								<div class="row" style="margin-top:36px">
									<div class="input-field file-field col s9">
										<div class="btn waves-effect waves-light main-color">
											<span><?= $TXT->ImagesBrowse ?></span>
											<input type="file" name="image" required>
										</div><!-- /btn -->
										<div class="file-path-wrapper">
											<input type="text" id="uploader-path" class="file-path validate" placeholder="<?= $TXT->ImagesSelect ?>.. (png, jpg, gif, svg)">
										</div><!-- /file-path-wrapper -->
									</div><!-- /input-field -->
									<div class="input-field col s3">
										<input id="uploader-submit" type="submit" class="btn main-color right" value="<?= $TXT->ImagesSubmit ?>">
									</div><!-- /input-field -->
								</div><!-- /row -->
							</form>
							<div class="row" id="images-list">
								<?php foreach($DOC->images() as $image): ?>
									<div class="col s6 m3">
										<a href="#" class="image-picker waves-effect waves-light" image="<?= $image ?>"><img class="polaroid" src="<?= $DOC->PATH."/".$image ?>"/></a>
					<a href="#" class="image-delete" image="<?= $image ?>" style="display: block; text-align: center"><span class="fa fa-trash-o" aria-hidden="true"></span> &nbsp; <?= $TXT->ImageDeleteText ?></a>
									</div><!-- /col -->
								<?php endforeach; ?>
							</div><!-- /row -->
			  <div class="row" id="images-info">
				<i><small>* <?= $TXT->FilesDeleteInfoText ?></small></i>
			  </div>
						</div><!-- /modal-content-->
					</div><!-- /modal_image_uploader -->
					<!-- modal_attachment_uploader -->
					<div id="modal_attachment_uploader" class="modal">
						<div class="modal-content">
							<h4><?= $TXT->Attachments ?></h4>
							<form id="attachments-uploader-form" method="post" action="<?= $APP->PATH ?>submit.php?act=attachment_upload_ajax" enctype="multipart/form-data">
								<input type="hidden" name="document" value="<?= $DOC->ID ?>">
								<div class="row" style="margin-top:36px">
									<div class="input-field file-field col s9">
										<div class="btn waves-effect waves-light main-color">
											<span><?= $TXT->AttachmentsBrowse ?></span>
											<input type="file" name="attachment" required>
										</div><!-- /btn -->
										<div class="file-path-wrapper">
											<input type="text" id="uploader-path" class="file-path validate" placeholder="<?= $TXT->AttachmentsSelect ?>.. (pdf, doc/x, xls/x, ppt/x)">
										</div><!-- /file-path-wrapper -->
									</div><!-- /input-field -->
									<div class="input-field col s3">
										<input id="uploader-submit" type="submit" class="btn main-color right" value="<?= $TXT->AttachmentsSubmit ?>">
									</div><!-- /input-field -->
								</div><!-- /row -->
							</form>
							<ul id="attachments-list">
								<?php foreach($DOC->attachments() as $attachment): ?>
									<li>- <?= $attachment->label ?> &nbsp; <a href="#" class="attachment-delete tooltipped" attachment="<?= $attachment->label ?>" data-position="top" data-tooltip="<?= $TXT->AttachmentsDelete ?>"><span class="fa fa-trash-o" aria-hidden="true"></span></a></li>
								<?php endforeach; ?>
							</ul><!-- /row -->
			  <div class="row" id="attachments-info">
				<i><small>* <?= $TXT->FilesDeleteInfoText ?></small></i>
			  </div>
						</div><!-- /modal-content-->
					</div><!-- /modal_attachment_uploader -->
					<!-- modal_version_uploader -->
					<div id="modal_versions" class="modal">
						<div class="modal-content">
							<h4><?= $TXT->Versions ?></h4>
							<ul id="versions-list">
								<?php foreach($DOC->versions() as $version): ?>
									<li>- <a href="<?= $version->url ?>"><?= $version->label ?></a></li>
								<?php endforeach; ?>
							</ul><!-- /row -->
						</div><!-- /modal-content-->
					</div><!-- /modal_version_uploader -->
				<?php endif; ?>
				<?php if(MODE=="search"): ?>
					<article>
						<h1><?= $TXT->SearchResults ?></h1>
						<?php foreach($matches_array=Document::search(SEARCH) as $document_fe=>$matches_fe): ?>
							<hr><h5><a href="<?= URL.$document_fe ?>" target="_blank"><b><?= $document_fe ?></b></a></h5>
							<?php foreach($matches_fe as $match_fe): ?>
								<p><?= $match_fe ?></p>
							<?php endforeach; ?>
						<?php endforeach; ?>
						<?php if(!count($matches_array)): ?>
							<p><?= $TXT->SearchNoResults ?> <mark><?= SEARCH ?></mark>..</p>
						<?php endif; ?>
					</article>
				<?php endif; ?>
			</div><!-- /col -->
		</div><!-- /row -->
		<div class="divider"></div>
		<div class="row">
			<div class="col m5 offset-m1 hide-on-med-and-down">
				<p class="left-align" title='<?= $TXT->LastUpdate ?> <?= wdf_timestamp_format($DOC->TIMESTAMP,"Y-m-d H:i") ?>'><small><?php include 'scripts/showcounter.php'; ?></small></p>
			</div><!-- /col -->
			<div class="col m5 hide-on-med-and-down">
				<p class="right-align"><small><a href="<?= $APP->PATH ?>scripts/showimagelist.php" title="显示系统背景图库">🖼️</a>&emsp;<a href="#" title="随心远航网址导航 v1.0.0" class="about-link"><b>⛵¹ </b></a><?php if($APP->DEBUG){echo " ".$APP->VERSION;} if(Session::getInstance()->isAuthenticated()){echo " - <a href=\"".$DOC->URL."?exit\">".$TXT->Logout."</a>";} ?></small></p>

			</div><!-- /col -->
			<div class="col s12 hide-on-large-only">
				<p class="center-align" title='<?= $TXT->LastUpdate ?> <?= wdf_timestamp_format($DOC->TIMESTAMP,"Y-m-d H:i") ?>'><small><?php include 'scripts/showcounter.php'; ?></small></p>
				<p class="center-align"><small><b><?= $APP->OWNER ?></b><br><?= $APP->NOTICE ?></small></p>
				<p class="center-align"><small><a href="<?= $APP->PATH ?>scripts/showimagelist.php" title="显示系统背景图库">🖼️</a>&emsp;<a href="#" title="随心远航网址导航 v1.0.0" class="about-link"><b>⛵¹ </b></a><?php if($APP->DEBUG){echo " ".$APP->VERSION;} if(Session::getInstance()->isAuthenticated()){echo " - <a href=\"".$DOC->URL."?exit\">".$TXT->Logout."</a>";} ?></small></p>
			</div><!-- /col -->
		</div><!-- /row -->
		<?php if($APP->DEBUG): ?>
			<div class=\"divider\"></div>
			<!-- debug -->
			<section class="debug">
				<?= wdf_dump($DOC,"DOCUMENT") ?>
				<?= wdf_dump($APP,"APPLICATION") ?>
			</section><!-- /debug -->
		<?php endif; ?>
		<div id="about-dialog" class="about-dialog">
			<span class="close-button" onclick="hideAboutDialog()">&times;</span>
			<p><span style="font-size:30px;"><b>随心远航网址导航</b></span>&emsp;v1.0<br>运行于 <a href="<?= $APP->PATH ?>"><?php echo $_SERVER['HTTP_HOST']; ?></a></p>
			<p><img src="<?= $APP->PATH ?>logo.png" align="left" class="logo-image"> 可以 DIY 的开源网址导航系统, 支持 markdown, 小巧快速, 无需数据库<br></p>       
			<p><b>网址</b>&emsp;&emsp;<a href="https://gitee.com/shaoziyang/webnav" target="_blank">gitee</a>&emsp;&emsp;<a href="https://github.com/shaoziyang/webnav">github</a><br>
<b>帮助</b>&emsp;&emsp;<a href="https://gitee.com/shaoziyang/webnav/wikis" target="_blank">gitee</a>&emsp;&emsp;<a href="https://github.com/shaoziyang/webnav/wiki" target="_blank">github</a></p>
		</div><!-- about-dialog -->
		<script>
		let isanimation = false;
		let randomA = 0;
		let randomX = 0;
		let randomY = 0;
		const image = document.querySelector('.logo-image');
		var alink = document.getElementsByClassName('about-link');
		for (var i = 0; i < alink.length; i++) {
			alink[i].addEventListener('click', function(e) {
				e.preventDefault();	document.querySelector('.about-dialog').style.display = 'block';isanimation = true;setTimeout(animationImage, 200);
            })
		}
		function hideAboutDialog() {
			document.getElementById("about-dialog").style.display = "none";
			isanimation = false;
		}
		function rnd(d, dt, max, min){
			d += Math.floor(Math.random() * dt * 2) - dt;
			return Math.max(min, Math.min(d, max));
		}
		function animationImage() {
			randomA = rnd(randomA, 8, 30, -30);
			randomX = rnd(randomX, 6, 5, -30);
			randomY = rnd(randomY, 1, 5, 0);
			image.style.transform = 'rotate(' + randomA + 'deg) translate(' + randomX + 'px,'+randomY+ 'px)';
			if (isanimation)
				setTimeout(animationImage, Math.floor(Math.random() * 500)+100);
		}        
		</script>
	</div><!-- /container -->
</main>
<script>var APP=<?= json_encode($APP->export()) ?>;</script>
<script>var DOC=<?= json_encode($DOC->export()) ?>;</script>
<script src="<?= $APP->PATH ?>helpers/jquery-3.7.0/js/jquery.min.js"></script>
<script src="<?= $APP->PATH ?>helpers/materialize-1.0.0/js/materialize.min.js"></script>
<script src="<?= $APP->PATH ?>helpers/highlightjs-11.7.0/js/highlight.min.js"></script>
<script src="<?= $APP->PATH ?>helpers/katex-0.16.7/js/katex.min.js"></script>
<script src="<?= $APP->PATH ?>helpers/katex-0.16.7/js/auto-render.js"></script>
<script>renderMathInElement(document.body);</script>
<script>hljs.initHighlightingOnLoad();</script>
<script src="<?= $APP->PATH ?>helpers/mermaid-9.4.3/mermaid.min.js"></script>
<script>mermaid.initialize({ startOnLoad: true,'theme': <?= ($APP->DARK?"'dark'":"'neutral'") ?>});</script>
<script src="<?= $APP->PATH ?>scripts/initializations.js"></script>
<?php if(MODE=="edit"): ?>
	<script src="<?= $APP->PATH ?>helpers/easymde-2.16.1/js/easymde.min.js"></script>
	<script src="<?= $APP->PATH ?>scripts/editor.js"></script>
	<script src="<?= $APP->PATH ?>scripts/images.js"></script>
	<script src="<?= $APP->PATH ?>scripts/attachments.js"></script>
<?php endif; ?>
<?php if(MODE=="edit" && !($_GET['draft'] ?? '') && file_exists($DOC->DIR."draft.md")): ?>
	<script>if(confirm("<?= str_replace(["'",'"'],"\'",$TXT->ConfirmLoadDraft) ?>")){window.location.replace(window.location+"&draft=1");}</script>
<?php endif; ?>
<script>
  function new_document(){
	var new_path=prompt("<?= str_replace(["'",'"'],"\'",$TXT->PromptNewDocument) ?>",DOC.ID+"/");
	if(new_path!==DOC.ID+"/"){
	  new_path=new_path.replace(" ","-").toLowerCase()+"?edit";
	  window.location.href=APP.URL+new_path;
	}
  }
</script>
<?php
// cycle all alerts
foreach($_SESSION['sxyh']['alerts'] as $index=>$alert){
	// swicth class
	switch($alert->class){
		case "success":$class="green";break;
		case "warning":$class="orange";break;
		case "danger":$class="red";break;
		case "info":$class="blue";break;
	}
	// show alert
	echo "	<script>M.toast({html:\"".$alert->message."\",classes:\"".$class."\"});</script>\n";
	// remove from session
	unset($_SESSION['sxyh']['alerts'][$index]);
}
?>
<script src="<?= $APP->PATH ?>scripts/linkcount.js"></script>
</body>
</html>
