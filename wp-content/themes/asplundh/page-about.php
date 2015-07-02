<?php
/**
 * Template Name: About
 
 * Description: About page template.
 * @package asplundh
 */

get_header(); ?>
<?php echo get_the_post_thumbnail( $post_id, 'banner-image-large' );  ?> 
<!--Main-Content-Start-->
        <section class="main">
        	<div class="leftContent">
            
            </div>
           	<div class="mainContent">
                                 
            	<article>
            	 
                  
                  <?php echo do_shortcode( '[about-sections]' );?>
                             
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
