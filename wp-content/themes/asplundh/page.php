<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package asplundh
 */

get_header(); ?>

<!--Main-Content-Start-->
        <section class="main">
        	<div class="leftContent">
           <?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?> 
            </div>
			<?php echo do_shortcode( '[breadcrumb]' );?>
           	<div class="mainContent">
            	<article>
            	     <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; // end of the loop. ?>
                </article>
            	<div class="contentBottomLine"></div>
            </div>
            <div class="rightContent">
            
            	
            </div>
        </section>
        <!--Main-Content-End-->
<?php get_footer(); ?>
