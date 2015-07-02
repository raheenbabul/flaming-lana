<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package asplundh
 */
?>

	<!--Footer-Start-->
    <footer id="wrapper7">
    <div class="copyright"><section class="text">    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('asplundh-footer')) : else : ?>
        <?php endif; ?></section></div>
</footer>
	<!--Footer-End-->

<?php wp_footer(); ?>

</body>
</html>
