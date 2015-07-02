<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package asplundh
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <META HTTP-EQUIV="Content-Type"  CONTENT="text/html; CHARSET=iso-8859-6">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
    
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">-->

<?php 
  // Send a raw HTTP header 
  header ('Content-Type: text/html; charset=UTF-8'); 
   
  // Declare encoding META tag, it causes browser to load the UTF-8 charset before displaying the page. 
  echo '<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />'; 
   
  // Right to Left issue 
  echo '<body dir="rtl">'; 
  
?>
<?php echo " (العربية)"; 
echo '<p dir="rtl" lang="ar">'; 
echo "العربية (العربية)";
echo '</p >'; 
?>	
<title><?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;
global $current_user;
get_currentuserinfo();
wp_title('|', true, 'right');

// Add the blog name.
//bloginfo('name');
// Add the blog description for the home/front page.
$site_description = get_bloginfo('description', 'display');
if ($site_description && ( is_home() || is_front_page() ))
    echo " | $site_description";

// Add a page number if necessary:
if ($paged >= 2 || $page >= 2)
    echo ' | ' . sprintf(__('Page %s', 'asplundh'), max($paged, $page));
?></title>
<!--<link rel="profile" href="http://gmpg.org/xfn/11">-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="<?php echo INC_URL_CSS . DS . "custom.css" ?>" rel="stylesheet" type="text/css">
<!--[if IE]>
    <script src="<?php echo get_template_directory_uri(); ?>/includes/js/html5shiv.js" type="text/javascript"></script>
<![endif]-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
      <script src="<?php echo INC_URL_JS . DS . "jquery-1.10.1.min.js" ?>" type="text/javascript"></script>
<script src="<?php echo INC_URL_JS . DS . "path.js" ?>" type="text/javascript"></script>
<script type="text/javascript">
     //   alert("hie");
       // alert(pagename);
        $ = jQuery.noConflict();
$(document).ready(function() {
 $("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
    });
});
 
</script>
<?php wp_head(); ?>
</head>
<body>
<div id="wrapper1">
<header id="top">
<section class="logo"><a href="<?php echo SITE_URL;?>" ><img src="<?php echo INC_URL_IMG . DS . "logo.png"?>" width="527" height="167" border="0"></a>
</section>
<nav class="mainnav">

<?php wp_nav_menu( array( 'theme_location' => 'header-navigation' ) ); ?>


</nav>
</header>
</div>
<div id="wrapper2"></div>
