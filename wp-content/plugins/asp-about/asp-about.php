<?php

/*
  Plugin Name: Asplundh About
  Plugin URI: HTTP://WWW.ANNET.COM
  Description: About
  Author: Annet Technologies
  Version: 1.0
  Author URI: http://www.annet.com/
 */
add_action('init', 'register_custom_post_type_asp_about');

function register_custom_post_type_asp_about() {
    $labels = array(
        'name' => _x('About', 'asp-about'),
        'post_type' => _x('About', 'asp-about'),
        'singular_name' => _x('About', 'asp-about'),
        'add_new' => _x('Add New', 'asp-about'),
        'add_new_item' => _x('Add New About', 'asp-about'),
        'edit_item' => _x('Edit About', 'asp-about'),
        'new_item' => _x('New About', 'asp-about'),
        'view_item' => _x('View About', 'asp-about'),
        'search_items' => _x('Search About', 'asp-about'),
        'not_found' => _x('No About found', 'asp-about'),
        'not_found_in_trash' => _x('No About found in Trash', 'asp-about'),
        'parent_item_colon' => _x('Parent About:', 'asp-about'),
        'menu_name' => _x('About', 'asp-about'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'About',
        'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'taxonomies' => array('category'),
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => 'asp-about',
        'can_export' => true,
        'rewrite' => array('slug' => 'asp-about'),
        'capability_type' => 'post',
//        'menu_position' => 100,
            //'show_in_menu' => 'ret-sect-all/index.php',
    );

    register_post_type('asp-about', $args);
}

/* ----------------------------------------- Display About - About --------------------------------------------------- */

function displayAbout() {
    echo "<div style='float:left;'>";
    echo "<ul>";
    global $wpdb;

    $args_post = array(
        'numberposts' => -1,
        //'category'        => $cat_id,
        'category_name' => 'about',
        'child_of' => 0,
        'orderby' => 'title',
        'order' => 'ASC',
        'post_type' => 'asp-about',
        'post_status' => 'publish');
    $arg_post_data = get_posts($args_post);

    if ($arg_post_data) {
        foreach ($arg_post_data as $post_data) {
            $each_faq = (array) $post_data;
            $id = $each_faq['ID'];
            $post_title = $each_faq['post_title'];
            $post_content = $each_faq['post_content'];
            $details .= '<h4>' . $post_title . '</h4>';
            $details .= $post_content;
        }
        echo $str .= $details;
    } else {
        echo "No data";
    }
}

add_shortcode('about-about', 'displayAbout');

/* ----------------------------------------- Display About - History --------------------------------------------------- */

function displayHistory() {
    echo "<div style='float:left;'>";
    echo "<ul>";
    global $wpdb;

    $args_post = array(
        'numberposts' => -1,
        //'category'        => $cat_id,
        'category_name' => 'history',
        'child_of' => 0,
        'orderby' => 'title',
        'order' => 'ASC',
        'post_type' => 'asp-about',
        'post_status' => 'publish');
    $arg_post_data = get_posts($args_post);
    if ($arg_post_data) {

        foreach ($arg_post_data as $post) {
            echo $post->post_title;
            echo "&nbsp;" . "|" . "&nbsp;";
        }
    } else {
        echo "No data";
    }


    if ($arg_post_data) {
        foreach ($arg_post_data as $post_data) {
            $each_faq = (array) $post_data;
            $id = $each_faq['ID'];
            $post_title = $each_faq['post_title'];
            $post_content = $each_faq['post_content'];
            $details .= '<h4>' . $post_title . '</h4>';
            $details .= $post_content;
        }
        echo $str .= $details;
    } else {
        echo "No data";
    }
}

add_shortcode('about-history', 'displayHistory');


/* ----------------------------------------- Display About - FAQS --------------------------------------------------- */

function displayFAQS() {
    $args = array(
        'orderby' => 'name',
        'hierarchical' => 1,
        'style' => 'none',
        'taxonomy' => 'category',
        'hide_empty' => 0,
        'title_li' => '',
        'parent' => 7,
        'child_of' => 0,
    );

    $categories = get_categories($args);
//    echo "<pre>";
//print_R($categories);
//echo "</pre>";
    //echo "<div style='float:left;'>";
    foreach ($categories as $post) {
        echo $internal_faq_category_name = $post->name;
        $internal_faq_category_slug = $post->slug;
        $args_post = array(
            'category_name' => $internal_faq_category_slug,
            'child_of' => 0,
            'orderby' => 'title',
            'order' => 'ASC',
            'post_type' => 'asp-about',
            'post_status' => 'publish');
        $arg_post_data = get_posts($args_post);
        if ($arg_post_data) {
            foreach ($arg_post_data as $post_data) {
                $each_faq = (array) $post_data;
                $id = $each_faq['ID'];
                $post_title = $each_faq['post_title'];
                $post_content = $each_faq['post_content'];
                $details .= '<h4>' . $post_title . '</h4>';
                $details .= $post_content;
            }
            echo "</br>";
            echo "<ul>";
            echo $str .= $details;
            echo "</ul>";
        } else {
            echo "No data";
        }
    }

    //echo "</div>";
}

add_shortcode('about-faqs', 'displayFAQS');



/* ----------------------------------------- Display About - News --------------------------------------------------- */

function displayNews() {
    $args = array(
        'orderby' => 'name',
        'hierarchical' => 1,
        'style' => 'none',
        'taxonomy' => 'category',
        'hide_empty' => 0,
        'title_li' => '',
        'parent' => 8,
        'child_of' => 0,
    );

    $categories = get_categories($args);
    echo "<pre>";
print_R($categories);
echo "</pre>";
    foreach ($categories as $post) {
        echo $internal_news_category_name = $post->name;
        $internal_news_category_slug = $post->slug;
       
         $args_post = array(
            'category_name' => $internal_news_category_slug,
            'child_of' => 0,
            'orderby' => 'title',
            'order' => 'ASC',
            'post_type' => 'asp-about',
            'post_status' => 'publish');
        $arg_post_data = get_posts($args_post);
        
        if ($arg_post_data) {
            foreach ($arg_post_data as $post_data) {
                $each_faq = (array) $post_data;
                $id = $each_faq['ID'];
                $post_title = $each_faq['post_title'];
                $post_content = $each_faq['post_content'];
                $details .= '<h4>' . $post_title . '</h4>';
                $details .= $post_content;
            }
            echo "</br>";
            echo "<ul>";
            echo $str .= $details;
            echo "</ul>";
        } else {
            echo "</br> No data";
        }
    }
    
}

add_shortcode('about-news', 'displayNews');



/* ----------------------------------------- Display About - Latest News --------------------------------------------------- */

function displayLatestNews() {
    ?>
    <div class="orangeheader">
        <div class="container">
            <section class="heading"><h1>Latest News</h1></section>
        </div>
    </div>
 <div class="newsboxmain">
        <div class="newsbox">
            <section class="top">
                <ul>
                    <?php      
    $args = array(
        'orderby' => 'name',
        'hierarchical' => 1,
        'style' => 'none',
        'taxonomy' => 'category',
        'hide_empty' => 0,
        'title_li' => '',
        'parent' => 8,
        'child_of' => 0,
    );

    $categories = get_categories($args);
    $first_category = $categories[0]->name;
 
//    echo "<pre>";
//print_R($categories);
//echo "</pre>";

    foreach ($categories as $post) {
        $internal_news_category_name = $post->name;
            if (!isset($_REQUEST['latnews']) && $first_category == $internal_news_category_name ){
          $list_class = "selected";
     }
     else {
         $list_class = "";
     }
        echo "<li><a href='#' class = '" . $list_class . "'>". $internal_news_category_name . "</a></li>";
        //$internal_news_category_slug = $post->slug;
    }
        ?>
                </ul>
                  </section>
            <div class="data">
                <?php
                query_posts('category_name=storm-response&order=ASC&orderby=date&post_type=asp-about&post_status=publish'); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
                <article class="parts">
                    <section class="image">
                        
<?php
the_post_thumbnail($post->ID, "latest-news");
//$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'latest-news' );
//$url = $thumb['0'];
?>
                        </section>
                    <section class="content">
                        <?php
                        $entire_post_content = get_post_field('post_content', $post->ID);
                         $count = strlen($entire_post_content);
                          if ($count >200) {
                    $string = substr($entire_post_content, 0, 200);
                    echo $s = substr($string, 0, strrpos($string, ' ')) . '...';
                    echo "</br><a>Read more</a>";
                  } else {
                    echo $entire_post_content;
                  }
                        ?>
                        
                        
                        <?php //echo wpautop(get_post_field('post_content', $post->ID)); ?>
                    </section>
                </article>
<?php endwhile; ?>
<?php endif; ?>
            </div>
      <?php
    
}

add_shortcode('about-latest-news', 'displayLatestNews');


/* ----------------------------------------- Display About Sections --------------------------------------------------- */

function displayAboutSections() {
    $obj = get_post_type_object('asp-about');
    echo "<h2>";
    echo $obj->labels->singular_name;
    echo "</h2>";
    $args = array(
        'orderby' => 'name',
        'hierarchical' => 1,
        'style' => 'none',
        'taxonomy' => 'category',
        'hide_empty' => 0,
        'depth' => 1,
        'title_li' => '',
        'parent' => 0,
        'exclude' => 1,
        'child_of' => 0,
    );

    $categories = get_categories($args);
    echo "<div style='float:left;'>";
    foreach ($categories as $post) {
        echo $post->name;
        echo "&nbsp";
    }
    echo "</div>";



    echo do_shortcode('[about-about]');
    echo "</br>";
    echo "</br>";
    echo "<hr>";
    echo "</br>";
    echo do_shortcode('[about-history]');
    echo "</br>";
    echo "</br>";
    echo "<hr>";
    echo "</br>";
    echo do_shortcode('[about-faqs]');
    echo "</br>";
    echo "</br>";
    echo "<hr>";
    echo "</br>";
    echo do_shortcode('[about-news]');
}

add_shortcode('about-sections', 'displayAboutSections');
