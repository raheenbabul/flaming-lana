<?php
/*
Plugin Name: Asplundh Home Page slider.
Version: 1.0
Description: Plugin for showing slider on home page!
Author: Annet Technologies
Author URI: http://www.annet.com
Plugin URI: http://www.annet.com
*/


function display_slider_gallery($content){
   
     global $wpdb;
                        
     $gallery_id = "1";
    
    $myrows2 = $wpdb->get_results("select path from asp_ngg_gallery where gid = '".$gallery_id."'");
    
    //echo "select path from wp_ngg_gallery where gid = '".$gallery_id."'";
    //die();
    
    foreach($myrows2 as $eachrow2)
    {
        $arr_eachrow2 = (array) $eachrow2;     
        $path = $arr_eachrow2['path'];
    }
    $myrows = $wpdb->get_results("select * from asp_ngg_pictures where galleryid = '".$gallery_id."' ORDER BY pid ASC");
    
    $k = 1;
    foreach($myrows as $eachrow)
    {
        
        $gallery_path = site_url()."/".$path;
        $arr_eachrow = (array) $eachrow;     
        $filename = $arr_eachrow['filename'];
        $alt_text = $arr_eachrow['alttext'];
        //$img_path = $gallery_path."/".$filename;
        $full_path = $gallery_path."/".$filename;
        $description=$arr_eachrow['description'];
        $class_name=$arr_eachrow['name'];
        $class_array=explode("#",$class_name);
        $tilte_class=$class_array[0];
        $img_class=$class_array[1];
        $str_a2.='<section>
                   <img src="'.$full_path.'" class="'.$img_class.'" />
                       <div class="slidebox">
<div class="topbox"><section class="numberbox">01</section>
<section class="headingbox">'.$alt_text.'</section>
    <div class="bottombox"><section class="onehalf">
    '.$description.'</section>';        
        $k++;        
    }
     $content.='<section class="secondhalf">
                   '.$str_a2.'
                     <ul class="pagination" id="home_page_slider_nav">
    </ul> </section>  </div>
                        </div>
                    </div>';
     return $content;
}
add_shortcode( 'home_slider', 'display_slider_gallery' );
?>