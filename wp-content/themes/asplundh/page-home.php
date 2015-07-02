<?php
/**
 * Template Name: Home Page

 * Description: Home page template.
 * @package asplundh
 */
get_header();
?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Simple Top Nav') ) : ?> <!--YOUR OLD NAVIGATION --><?php endif; ?>
<script src="<?php echo INC_URL_JS . DS; ?>jquery.js">
</script>
<script src="<?php echo INC_URL_JS . DS; ?>jquery-cycle.js">
</script>
<script type="text/javascript">
    $(document).ready(function() {
        /*onload home_slider*/
        if ($('#home_page_slider').length > 0) {
            inner_content_slider('home_page_slider');
        }
        /*onload home_slider*/
    });
    function inner_content_slider(e_id) {
        var nav_id = '#' + e_id + '_nav';
        var trans_speed = 600;
        var auto_slide_speed = 4000;
        var slider_effect = 'fade';

        var inner_content_slider_obj = $('#' + e_id);
        var inner_content_slider_nav_obj = $('#' + e_id + '_nav');

        inner_content_slider_obj.cycle({
            fx: slider_effect,
            speed: trans_speed,
            timeout: auto_slide_speed,
            pager: nav_id,
            cleartype: false,
            cleartypeNoBg: true,
            prev: ".navigation .prev",
            next: ".navigation .next",
            pagerAnchorBuilder: function(index, el) {
                return '<li><a href="javascript:void(0);"></a></li>';
            },
            pagerClick: function() {
                inner_content_slider_obj.cycle('pause');
            }
        });
    }

</script>
<div id="wrapper3">
    <div class="container">
        <div class="home_slider">
            <div class="home_slider_inner" id="home_page_slider">
                <?php //echo do_shortcode('[home_slider]');?>    
                <?php
                global $wpdb;

                $gallery_id = "1";

                $myrows2 = $wpdb->get_results("select path from asp_ngg_gallery where gid = '" . $gallery_id . "'");

                foreach ($myrows2 as $eachrow2) {
                    $arr_eachrow2 = (array) $eachrow2;
                    $path = $arr_eachrow2['path'];
                }
                $myrows = $wpdb->get_results("select * from asp_ngg_pictures where galleryid = '" . $gallery_id . "'ORDER BY sortorder ASC");

                $k = 1;
                foreach ($myrows as $eachrow) {

                    $gallery_path = site_url() . "/" . $path;
                    $arr_eachrow = (array) $eachrow;
                    $filename = $arr_eachrow['filename'];
                    $alt_text = $arr_eachrow['alttext'];
                    $sortorder = $arr_eachrow['sortorder'];
                    //$img_path = $gallery_path."/".$filename;
                    $full_path = $gallery_path . "/" . $filename;
                    $description = $arr_eachrow['description'];
                    $class_name = $arr_eachrow['name'];
                    $class_array = explode("#", $class_name);
                    $tilte_class = $class_array[0];
                    $img_class = $class_array[1];
                    ?>

                    <section>
                        <img src="<?php echo $full_path ?>" alt="" />
                        <div class="<?php echo "slidebox".$sortorder?>">
                            <div class="topbox"><section class="numberbox"><?php echo "0".$sortorder;?></section><section class="headingbox"><?php echo $alt_text; ?></section>                                <div class="bottombox"><section class="onehalf">
    <?php echo $description; ?></section>
                                    <section class="secondhalf">
                                        <ul class="pagination" id="home_page_slider_nav">
                                        </ul>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
    <?php
}
?>
            </div>
<!--<ul class="pagination" id="home_page_slider_nav">
                                        </ul>-->
        </div>

    </div>
</div
<!-- header endshere-->

<!-- content starts here -->
<div id="iconwrapper">
    <div class="belowimage">
        <section class="iconback">
            <ul>
                <li><a href="#"><img src="<?php echo INC_URL_IMG . DS . "icon_twitter.png" ?>" width="32" height="32" border="0"></a></li>
                <li><a href="#"><img src="<?php echo INC_URL_IMG . DS . "icon_facebook.png" ?>" width="33" height="32" border="0"></a></li>
                <li><a href="#"><img src="<?php echo INC_URL_IMG . DS . "icon_linkedin.png" ?>" width="32" height="32" border="0"></a></li>
            </ul>
        </section>
    </div>
</div>

<div id="wrapper4">
    
<?php echo do_shortcode('[safety-safety]');?>

    <!-- Testimonials -->

    <div class="midbanner">
        <div class="container">
            <section class="heading"><h1>Testimonials</h1></section>
            <div class="testimonials"><section class="desc">In a short three years, our trimming program has made a complete turnaround. We have seen a transformation of crews and completed a full cycle of our overhead system. This has been accomplished with a team effort between Loveland and Asplundh.</section><section class="name">- Garth Silvernale, Power Operations Supervisor, City of Loveland, Colorado</section></div>
        </div>
    </div>

    <?php echo do_shortcode('[about-latest-news]');?>

          
<!--            <div class="data">
                <article class="parts">
                    <section class="image"><img src="<?php echo INC_URL_IMG . DS . "sr1.jpg" ?>" border="0"><section class="overlay">12.12.13</section></section>
                    <section class="content">An extreme weather event like Superstorm Sandy often causes utilities across the continent to question their investments in preventive maintenance and infrastructure improvements...</br>
                        <a href="#">Read more</a></section>
                </article>
                <article class="parts">
                    <section class="image"><img src="<?php echo INC_URL_IMG . DS . "sr2.jpg" ?>" border="0"><section class="overlay">12.12.13</section></section>
                    <section class="content">An extreme weather event like Superstorm Sandy often causes utilities across the continent to question their investments in preventive maintenance and infrastructure improvements...</br>
                        <a href="#">Read more</a></section>
                </article>
                <article class="parts">
                    <section class="image"><img src="<?php echo INC_URL_IMG . DS . "sr3.jpg" ?>" border="0"><section class="overlay">12.12.13</section></section>
                    <section class="content">Lorem ipsum dolor sit amet, consectetur adipiselit. Aenean libero risus, pharetra eget dolor ac, sagittis pretium nulla. Praesent sit amet vulputate metus. 
                        Nunc ac tortor vehicula, blandit enim ac, sceleris...</br>
                        <a href="#">Read more</a></section>
                </article>
            </div>-->
        </div>
    </div>
</div>

<!-- content ends here -->

<!-- home bottom starts here -->
<div id="wrapper5">
    <div class="homebottom">
        <div class="container">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('asplundh-services')) : else : ?>
            <?php endif; ?>

            <div class="rightbox">
                <div class="contact-column">
                    <section class="contactbox"><h1>CONTACT INFO</h1></section>
                    <p>1.800.248.TREE</p>
                    <p><a href="mailto:CorpComm@asplundh.com">CorpComm@asplundh.com</a></p>
                    <p>708 Blair Mill Road  
                        Willow Grove, PA 19090</p>
                </div>

                <div class="employ-column">
<section class="employbox"><h1>employment</h1></section>
<p>The Asplundh Tree Expert Co. and its subsidiary companies welcome inquiries regarding employment.</p>
<p>If you are interested in applying for a job, please <a href="#" class="bodytextbold">call</a> or <a href="#" class="bodytextbold">e-mail</a> the regional office of Asplundh or its subsidiaries for your area to get specific instructions on how to apply.</p>
<p><a href="#" class="linkarrow">Learn More</a></p>
</div>
            </div>

        </div>
    </div>
</div>

<div id="wrapper6">
    <div class="imagearea">
        <section class="imageheader"><h1>Asplundh proudly supports</h1></section>
        <ul>
            <?php
            $gallery_id = "2";

                $myrows2 = $wpdb->get_results("select path from asp_ngg_gallery where gid = '" . $gallery_id . "'");

                foreach ($myrows2 as $eachrow2) {
                    $arr_eachrow2 = (array) $eachrow2;
                    $path = $arr_eachrow2['path'];
                }
                $myrows = $wpdb->get_results("select * from asp_ngg_pictures where galleryid = '" . $gallery_id . "'ORDER BY sortorder ASC");

                $k = 1;
                foreach ($myrows as $eachrow) {

                    $gallery_path = site_url() . "/" . $path;
                    $arr_eachrow = (array) $eachrow;
                    $filename = $arr_eachrow['filename'];
                    $alt_text = $arr_eachrow['alttext'];
                    //$img_path = $gallery_path."/".$filename;
                    $full_path = $gallery_path . "/" . $filename;
                 
                    ?>
                       <li> <img src="<?php echo $full_path ?>" alt="<?php echo $alt_text;?>" /></li>
                        <?php
                        }
                        ?>
<!--            <li><img src="<?php //echo INC_URL_IMG . DS . "supports_logo1.png" ?>" width="114" height="103" border="0"></li>
            <li><img src="<?php//echo INC_URL_IMG . DS . "supports_logo2.png" ?>" width="263" height="103" border="0"></li>
            <li><img src="<?php //echo INC_URL_IMG . DS . "supports_logo3.png" ?>" width="114" height="103" border="0"></li>
            <li><img src="<?php //echo INC_URL_IMG . DS . "supports_logo4.png" ?>" width="119" height="103" border="0"></li>
            <li><img src="<?php //echo INC_URL_IMG . DS . "supports_logo5.png" ?>" width="291" height="103" border="0"></li>-->
        </ul>
    </div>
</div>


<?php get_footer(); ?>
