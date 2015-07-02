<?php
/*
  Plugin Name: Asplundh Contact Us
  Version: 1.0
  Description: Plugin used to show contact details
  Author: Annet Technologies
 */
error_reporting(0);
function displayContactByState() {
    $obj = get_post_type_object('contact_by_state');
    echo "<h2>";
    echo $obj->labels->singular_name;
    echo "</h2>";
    echo "<div style='width:400px; float:left;'>";
    foreach (range('A', 'Z') as $char) {
        echo "<a href='?anchor=$char'>" . $char . "\n" . "</a>";
    }
    echo " <a href='" . SITE_URL . "/contact'>All</a></br></div>";

    if (isset($_GET['anchor'])) {
        $letter = filter_input(INPUT_GET, anchor, FILTER_SANITIZE_SPECIAL_CHARS);
//echo $letter;
    }
    echo "<div style='width:400px; float:left;'>";
    echo "<ul>";
    global $wpdb;
    // could be any letter you want
    $results = $wpdb->get_results(
            "
                SELECT * FROM $wpdb->posts
                WHERE post_title LIKE '$letter%'
                AND post_type = 'contact_by_state'
                AND post_status = 'publish'; 
                "
    );
//         echo '<pre>';
//         print_r($results);
//         echo '</pre>';
    if ($results) {
        foreach ($results as $post) {
            echo "<li>";
            echo $post->post_title;
            echo "<br/>";
            echo $post->post_content;
            echo "</li>";
            echo "<br/>";
        }
    } else {
        ?> 
        <div>No data</div>
        <?php
    }

    echo "</ul>";
    echo "</div>";
}

function displayContactBySubsidiary() {
    $obj = get_post_type_object('contact_subsidiary');
    echo "<h2>";
    echo $obj->labels->singular_name;
    echo "</h2>";

    echo "<div style='width:400px; float:left;'>";
    $loop2 = new WP_Query(array('post_type' => 'contact_subsidiary', 'posts_per_page' => -1));
    while ($loop2->have_posts()) : $loop2->the_post();
        $postid = get_the_ID();
        echo "Title: " . $title_contact_subsidiary = get_the_title();
        echo "</br>";

        $meta_value_internal = get_post_meta($postid, 'subsidiaries_internal', true);
        if ($meta_value_internal !== "") {
            foreach ($meta_value_internal as $value_internal) {
                //print_r($value_internal);
                echo $title_internal = $value_internal['internal-subsidiary-title'];
                echo $description_internal = $value_internal['internal-subsidiary-description'];
            }
        } else {
            echo "Content: " . $content_contact_subsidiary = get_post_field('post_content', $post->ID);
        }
        echo "<hr>";
        echo "</br>";
    endwhile;
    echo "</div>";
}

add_shortcode('contact-by-state', 'displayContactByState');
add_shortcode('contact-by-subsidiary', 'displayContactBySubsidiary');
?>