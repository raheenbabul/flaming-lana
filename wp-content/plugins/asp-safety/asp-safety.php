<?php
/*
  Plugin Name: Asplundh Safety
  Plugin URI: http://www.annet.com
  Description: Safety
  Author: Annet Technologies
  Version: 1.0
  Author URI: http://www.annet.com/
 */
add_action('init', 'register_custom_post_type_asp_safety');

function register_custom_post_type_asp_safety() {
    $labels = array(
        'name' => _x('Safety', 'asp-safety'),
        'post_type' => _x('Safety', 'asp-safety'),
        'singular_name' => _x('Safety', 'asp-safety'),
        'add_new' => _x('Add New', 'asp-safety'),
        'add_new_item' => _x('Add New Safety', 'asp-safety'),
        'edit_item' => _x('Edit Safety', 'asp-safety'),
        'new_item' => _x('New Safety', 'asp-safety'),
        'view_item' => _x('View Safety', 'asp-safety'),
        'search_items' => _x('Search Safety', 'asp-safety'),
        'not_found' => _x('No Safety found', 'asp-safety'),
        'not_found_in_trash' => _x('No Safety found in Trash', 'asp-safety'),
        'parent_item_colon' => _x('Parent Safety:', 'asp-safety'),
        'menu_name' => _x('Safety', 'asp-safety'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Safety',
        'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'taxonomies' => array('category'),
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => 'asp-safety',
        'can_export' => true,
        'rewrite' => array('slug' => 'asp-safety'),
        'capability_type' => 'post',
//        'menu_position' => 100,
            //'show_in_menu' => 'ret-sect-all/index.php',
    );

    register_post_type('asp-safety', $args);
}

/* ----------------------------------------- Display Safety - Safety --------------------------------------------------- */

function displaySafety() {
    ?>
    <div class="orangeheader">
        <div class="container">
            <section class="heading">
                <?php
                $obj = get_post_type_object('asp-safety');
                echo "<h1>";
                echo $obj->labels->singular_name;
                echo "</h1>";
                ?></section>
        </div>
    </div>

    <div class="sbox">
        <div class="safetydata">
            <section class="top">
                <ul>
                    <?php
 if (!isset($_REQUEST['safety'])){
                   $args = array(
    'post_type' =>'asp-safety',
    'numberposts' => -1,
    'posts_per_page' => 1,
    'order' => 'ASC' );
$first_post = get_posts($args);
$value_fpost= $first_post[0]->post_title;
$value_fcontent= $first_post[0]->post_content;
 $value_fpost = preg_replace('/\s+/', '', $value_fpost);
 $value_fpost = str_replace('&', 'and', $value_fpost);
 $value_fpost_final = str_replace('/', 'or', $value_fpost);
 $list_id = strtolower($value_fpost_final);

 //echo $list_id;
 }
 else    
 {  $list_id = $_REQUEST['safety'];
 }
                    
                    $loop2 = new WP_Query(array('post_type' => 'asp-safety', 'posts_per_page' => -1, 'post_parent' => 0));
                    while ($loop2->have_posts()) : $loop2->the_post();
                        $postid = get_the_ID();
                        $title_asp_safety = get_the_title();
                        $safety_param = preg_replace('/\s+/', '', $title_asp_safety);
                        $safety_param = str_replace('&', 'and', $safety_param);
                        $safety_param = str_replace('/', 'or', $safety_param);
                        
                      if($list_id == strtolower($safety_param)) {
                            $list_class = "selected";
                        }
                        else{
                            $list_class = "";
                        }
                        $link2 = site_url() . DS . "?safety=" . strtolower($safety_param);
                        echo "<li><a class='" . $list_class . "' href='" . $link2 . "'>" . $title_asp_safety . "</a></li>";
                    endwhile;
                    ?>
                </ul>
            </section>
            <section class="data">
                 <?php
                if(!isset($_REQUEST['safety']))
                {
                    echo wpautop($value_fcontent);
                }
                 if (isset($_REQUEST['safety'])) {
                $loop1 = new WP_Query(array('post_type' => 'asp-safety', 'posts_per_page' => -1, 'post_parent' => 0));
                while ($loop1->have_posts()) : $loop1->the_post();
                $title1 = get_the_title();
                        $safety_param1 = preg_replace('/\s+/', '', $title1);
                        $safety_param1 = str_replace('&', 'and', $safety_param1);
                        $safety_param1 = str_replace('/', 'or', $safety_param1);
                        if ($list_id == strtolower($safety_param1)) {
                            echo wpautop(get_post_field('post_content', $post->ID));
                        }
                         endwhile;
                 }
                ?>
            </section>
        </div>
    </div>
    <?php
}

add_shortcode('safety-safety', 'displaySafety');
