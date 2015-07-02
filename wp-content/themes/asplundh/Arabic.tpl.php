<?php
/**
 * Template Name: aaaa

 * Description: Home page template.
 * @package asplundh
 */
get_header();
?>
<?php echo "TPL FILE OF ENGLISH";?>
<?php echo " (العربية)"; 
echo '<p dir="rtl" lang="ar">'; 
echo "العربية (العربية)";
echo '</p >'; 
?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Simple Top Nav') ) : ?> <!--YOUR OLD NAVIGATION --><?php endif; ?>


<?php get_footer(); ?>
  
