<?php
/**
 * Template Name: Contact Us
 
 * Description: Contact Us page template.
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
            	  <h1><?php echo get_the_title();?></h1>
                  
                  <?php echo do_shortcode( '[contact-by-state]' );?>
                    <?php echo do_shortcode( '[contact-by-subsidiary]' );?>
                             
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
