<?php
/**
 * Theme Footer Section for our theme.
 *
 * Displays all of the footer section and closing of the #main div.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
?>

</div><!-- .inner-wrap -->
</div><!-- #main -->

<?php if ( is_active_sidebar( 'colormag_advertisement_above_the_footer_sidebar' ) ) { ?>
	<div class="advertisement_above_footer">
		<div class="inner-wrap">
			<?php dynamic_sidebar( 'colormag_advertisement_above_the_footer_sidebar' ); ?>
		</div>
	</div>
<?php } ?>

<?php do_action( 'colormag_before_footer' ); ?>

<?php
// Add the main total header area display type dynamic class
$main_total_footer_option_layout_class = get_theme_mod( 'colormag_main_footer_layout_display_type', 'type_one' );

$class_name = '';
if ( $main_total_footer_option_layout_class == 'type_two' ) {
	$class_name = 'colormag-footer--classic';
}
?>

<?php if (function_exists ('seznamPartnerAdFooter')) { seznamPartnerAdFooter(); } ?>
<div id="szn-ssp-rectangle"></div>

<footer id="colophon" class="clearfix <?php echo esc_attr( $class_name ); ?>">
	<?php get_sidebar( 'footer' ); ?>
	<div class="footer-socket-wrapper clearfix">
		<div class="inner-wrap">
			<div class="footer-socket-area">
				<div class="footer-socket-right-section">
					<?php
					if ( get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) {
						colormag_social_links();
					}
					?>
				</div>
				<div class="footer-socket-left-sectoin">
					<?php do_action( 'colormag_footer_copyright' ); ?>
				</div>
			</div>
		</div>
	</div>
</footer>

<dialog role="alertdialog" aria-labelledby="ad-title" aria-describedby="szn-ssp-popup">
	<div role="document" tabindex="0">
		<h5 id="ad-title">Reklama</h5>
		<div id="szn-ssp-popup"></div>
	</div>
	<button title="x">zavřít reklamu</button>
</dialog>

<a href="#masthead" id="scroll-up"><i class="fa fa-chevron-up"></i></a>
</div><!-- #page -->
<script type="module">
	import( '/js/modules/servicFrontend.mjs' ).then( function ( /** @type { Module } */ module ) {
		return module.ServicFrontend;
	} ).then( function ( /** @type { Function } */ ServicFrontend ) {
		new ServicFrontend( 'BC0hGb3w6NcJhwY3JcAtwD0OkaO6lgNpeZHQCbbED4tV-9hZUl2W4Iw_4mGOH_Ei_wZzN5Sc8vyBgopkHRDZSx8' );
	});
</script>
<script src="/js/szn-ssp.js" crossorigin="anonymous" integrity="sha256-ndhJPA7241Uh900uaayWLiEonV23Ad2sKtZYWZsYe/M="></script>
<?php wp_footer(); ?>
</body>
</html>
