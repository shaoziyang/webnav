<?php
/**
 * Setup
 *
 * @package WikiDocs
 * @repository https://github.com/Zavy86/wikidocs
 */

// initialize session
session_start();
// errors configuration
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",true);
// definitions
$errors=false;
$configured=false;
$checks_array=array();
// acquire variables
$g_act=($_GET['act'] ?? '');
if(!$g_act){$g_act="setup";}
// include configuration sample
include("datasets/sample.config.inc.php");
// defines constants
define('PATH_URI',explode("setup.php",$_SERVER['REQUEST_URI'])[0]);
// die if configuration already exist
if(file_exists("datasets/config.inc.php")){die("随心远航系统已经配置过了。");}
// make root dir from given path
$original_dir=str_replace("\\","/",realpath(dirname(__FILE__))."/");
$root_dir=substr($original_dir,0,strrpos($original_dir,($_POST['path'] ?? ''))).($_POST['path'] ?? '');
// check action
if($g_act=="check"){
	// reset session setup
	$_SESSION['wikidocs']['setup']=null;
	// check setup
	if(file_exists($root_dir."setup.php")){$checks_array['path']=true;}else{$checks_array['path']=false;$errors=true;}
	if(strlen($_POST['title'])){$checks_array['title']=true;}else{$checks_array['title']=false;$errors=true;}
	if(strlen($_POST['subtitle'])){$checks_array['subtitle']=true;}else{$checks_array['subtitle']=false;$errors=true;}
	if(strlen($_POST['owner'])){$checks_array['owner']=true;}else{$checks_array['owner']=false;$errors=true;}
	if(strlen($_POST['notice'])){$checks_array['notice']=true;}else{$checks_array['notice']=false;$errors=true;}
	if(strlen($_POST['editcode']) && $_POST['editcode']===$_POST['editcode_repeat']){$checks_array['editcode']=true;}else{$checks_array['editcode']=false;$errors=true;}
	// set session setup
	if(!$errors){$_SESSION['wikidocs']['setup']=$_POST;}
}
// conclude action
if($g_act=="conclude"){
	// build configuration file
	$config="<?php\n";
	$config.="define('DEBUGGABLE',false);\n";
	$config.="define('PATH',\"".$_SESSION['wikidocs']['setup']['path']."\");\n";
	$config.="define('TITLE',\"".$_SESSION['wikidocs']['setup']['title']."\");\n";
	$config.="define('SUBTITLE',\"".$_SESSION['wikidocs']['setup']['subtitle']."\");\n";
	$config.="define('OWNER',\"".$_SESSION['wikidocs']['setup']['owner']."\");\n";
	$config.="define('NOTICE',\"".$_SESSION['wikidocs']['setup']['notice']."\");\n";
	$config.="define('PRIVACY',null);\n";
	$config.="define('EDITCODE',\"".md5($_SESSION['wikidocs']['setup']['editcode'])."\");\n";
	$config.="define('VIEWCODE',null);\n";
	$config.="define('COLOR',\"#4CAF50\");\n";
	$config.="define('DARK',false);\n";
	$config.="define('GTAG',null);\n";
	// write configuration file
	file_put_contents($root_dir."datasets/config.inc.php",$config);
	// build htacess file
	$htaccess="<IfModule mod_rewrite.c>\n";
	$htaccess.="\tRewriteEngine On\n";
	$htaccess.="\tRewriteBase ".$_SESSION['wikidocs']['setup']['path']."\n";
	$htaccess.="\tRewriteCond %{REQUEST_FILENAME} !-f\n";
	$htaccess.="\tRewriteRule ^(.*)$ index.php?doc=$1 [NC,L,QSA]\n";
	$htaccess.="</IfModule>\n";
	// write htaccess
	file_put_contents($root_dir.".htaccess",$htaccess);
	// check for configuration and apache access files
	if(file_exists($root_dir."datasets/config.inc.php") && file_exists($root_dir.".htaccess")){$configured=true;}else{$configured=false;}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="helpers/materialize-1.0.0/css/materialize.min.css" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="styles/styles.css" media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="styles/styles-light.css" media="screen,projection"/>
	<link  type="image/ico" rel="icon" href="favicon.ico" sizes="any"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="theme-color" content="#4CAF50">
	<style>:root{--theme-color:#4CAF50;}</style>
	<title>配置随心远航系统</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col s12">
			<h1>随心远航系统</h1>
			<p>基于无数据库的 WikiDocs markdown 引擎。</p>
		</div><!-- /col -->
		<?php if($g_act=="setup"){ ?>
			<div class="col s12">
				<h2>配置</h2>
				<p>系统参数设置</p>
				<form action="setup.php?act=check" method="post">
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="path" id="path" class="validate" value="<?= PATH_URI ?>" required>
							<label for="path"><span class="green-text">目录</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m5">
							<input type="text" name="title" id="title" class="validate" value="随心远航" required>
							<label for="title"><span class="green-text">标题</span></label>
						</div>
						<div class="input-field col s12 m7">
							<input type="text" name="subtitle" id="subtitle" class="validate" value="⛵网址导航系统" required>
							<label for="subtitle"><span class="green-text">副标题</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m5">
							<input type="text" name="owner" id="owner" class="validate" placeholder="内容所有者" required>
							<label for="owner"><span class="green-text">所有人</span></label>
						</div>
						<div class="input-field col s12 m7">
							<input type="text" name="notice" id="notice" class="validate" placeholder="内容版权声明" required>
							<label for="notice"><span class="green-text">通告</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m5">
							<input type="password" name="editcode" id="editcode" class="validate" placeholder="请选择一个复杂密码" required>
							<label for="editcode"><span class="green-text">身份验证码</span></label>
						</div>
						<div class="input-field col s12 m7">
							<input type="password" name="editcode_repeat" id="editcode" class="validate" placeholder="请选择一个复杂密码" required>
							<label for="editcode"><span class="green-text">再次输入身份验证码</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m12">
							<button type="submit" class="btn btn-block waves-effect waves-light green right">继续<i class="material-icons right">keyboard_arrow_right</i></button>
						</div>
					</div>
				</form>
			</div><!-- /col -->
			<?php
		}
		if($g_act=="check"){
			// define checks
			$check_ok="<span class='secondary-content'><i class='material-icons green-text'>check_circle</i></span>";
			$check_ko="<span class='secondary-content'><i class='material-icons red-text'>cancel</i></span>";
			?>
			<div class="col s12">
				<h2>正在检查配置</h2>
				<p>您的配置已验证</p>
				<ul class="collection">
					<li class="collection-item"><div>目录: <?= $_POST['path'].($checks_array['path']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>标题: <?= $_POST['title'].($checks_array['title']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>副标题: <?= $_POST['subtitle'].($checks_array['subtitle']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>所有人: <?= $_POST['owner'].($checks_array['owner']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>通告: <?= $_POST['notice'].($checks_array['notice']?$check_ok:$check_ko) ?></div></li>
					<li class="collection-item"><div>身份验证码: <?= str_repeat('*',strlen($_POST['editcode'])).($checks_array['editcode']?$check_ok:$check_ko) ?></div></li>
				</ul>
				<div class="input-field col s12">
					<?php if($errors){ ?>
						<button onClick="window.history.back();" class="btn btn-block waves-effect waves-light green lighten-2">重新配置n<i class="material-icons left">keyboard_arrow_left</i></button>
					<?php }else{ ?>
						<a href="setup.php?act=conclude" class="waves-effect waves-light btn green white-text right">继续<i class="material-icons right">keyboard_arrow_right</i></a>
					<?php } ?>
				</div>
			</div><!-- /col -->
			<?php
		}
		if($g_act=="conclude"){
		?>
		<div class="col s12">
			<h2>正在保存配置</h2>
			<?php if($configured){ ?>
				<p>您的配置已经被保存。</p>
				<p><a href="<?= $_SESSION['wikidocs']['setup']['path'] ?>">开始</a>使用！</p>
				<i class="material-icons small green-text">check_circle</i>
			<?php }else{ ?>
				<p class="red-text">保存配置时发送错误！</p>
				<i class="material-icons small red-text">取消</i>
			<?php } ?>
			<?php } ?>
		</div><!-- /row-->
	</div><!-- /container-->
	<script src="helpers/jquery-3.7.0/js/jquery.min.js"></script>
	<script src="helpers/materialize-1.0.0/js/materialize.min.js"></script>
</body>
</html>
