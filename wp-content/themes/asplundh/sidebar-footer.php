<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package asplundh
 */

if ( ! is_active_sidebar( 'asplundh-footer' ) ) {
	return;
}
?>

	<?php dynamic_sidebar( 'asplundh-footer' ); ?>
