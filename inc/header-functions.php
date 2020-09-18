<?php
/**
 * Contains all the fucntions and components related to header part.
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
/* * ************************************************************************************* */

if ( ! function_exists( 'colormag_social_links' ) ) :

	/**
	 * This function is for social links display on header
	 *
	 * Get links through Theme Options
	 */
	function colormag_social_links() {

		$colormag_social_links = array(
			'colormag_social_facebook' => __( 'Facebook', 'colormag' ),
			'colormag_social_twitter' => __( 'Twitter', 'colormag' ),
			'colormag_social_googleplus' => __( 'Google-Plus', 'colormag' ),
			'colormag_social_instagram' => __( 'Instagram', 'colormag' ),
			'colormag_social_pinterest' => __( 'Pinterest', 'colormag' ),
			'colormag_social_youtube' => __( 'YouTube', 'colormag' )
		);
		?>
		<div class="social-links clearfix">
			<ul>
				<?php
				$i = 0;
				$colormag_links_output = '';
				foreach ( $colormag_social_links as $key => $value ) {
					$link = get_theme_mod( $key, '' );
					if ( ! empty( $link ) ) {
						if ( get_theme_mod( $key . '_checkbox', 0 ) == 1 ) {
							$new_tab = 'target="_blank"';
						} else {
							$new_tab = '';
						}
						$colormag_links_output .= '<li><a href="' . esc_url( $link ) . '" ' . $new_tab . '><i class="fa fa-' . strtolower( $value ) . '"></i></a></li>';
					}
					$i ++;
				}
				echo $colormag_links_output;
				?>
			</ul>
		</div><!-- .social-links -->
		<?php
	}

endif;

/* * ************************************************************************************* */

// Filter the get_header_image_tag() for option of adding the link back to home page option
function colormag_header_image_markup( $html, $header, $attr ) {
	$output = '';
	$header_image = get_header_image();

	if ( ! empty( $header_image ) ) {
		if ( get_theme_mod( 'colormag_header_image_link', 0 ) == 1 ) {
			$output .= '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">';
		}

		$output .= '<div class="header-image-wrap"><img src="' . esc_url( $header_image ) . '" class="header-image" width="' . get_custom_header()->width . '" height="' . get_custom_header()->height . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '"></div>';

		if ( get_theme_mod( 'colormag_header_image_link', 0 ) == 1 ) {
			$output .= '</a>';
		}
	}

	return $output;
}

function colormag_header_image_markup_filter() {
	add_filter( 'get_header_image_tag', 'colormag_header_image_markup', 10, 3 );
}

add_action( 'colormag_header_image_markup_render', 'colormag_header_image_markup_filter' );

/* * ************************************************************************************* */

if ( ! function_exists( 'colormag_render_header_image' ) ) :

	/**
	 * Shows the small info text on top header part
	 */
	function colormag_render_header_image() {
		if ( function_exists( 'the_custom_header_markup' ) ) {
			do_action( 'colormag_header_image_markup_render' );
			the_custom_header_markup();
		} else {
			$header_image = get_header_image();
			if ( ! empty( $header_image ) ) {
				if ( get_theme_mod( 'colormag_header_image_link', 0 ) == 1 ) {
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php } ?>
					<div class="header-image-wrap"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></div>
					<?php if ( get_theme_mod( 'colormag_header_image_link', 0 ) == 1 ) { ?>
					</a>
					<?php
				}
			}
		}
	}

endif;

if ( ! function_exists( 'colormag_top_header_bar_display' ) ) :

	/**
	 * Function to display the top header bar
	 *
	 * @since ColorMag 1.2.2
	 */
	function colormag_top_header_bar_display() {
		if ( get_theme_mod( 'colormag_breaking_news', 0 ) == 1 || get_theme_mod( 'colormag_date_display', 0 ) == 1 ) :
			?>
			<div class="news-bar">
				<div class="inner-wrap clearfix">
					<?php
					if ( get_theme_mod( 'colormag_date_display', 0 ) == 1 )
						colormag_date_display();
					?>

					<?php
					if ( get_theme_mod( 'colormag_breaking_news', 0 ) == 1 )
						colormag_breaking_news();
					?>

					<?php
					if ( get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) {
						colormag_social_links();
					}
					?>
				</div>
			</div>
			<?php
		endif;
	}

endif;

if ( ! function_exists( 'colormag_middle_header_bar_display' ) ) :

	/**
	 * Function to display the middle header bar
	 *
	 * @since ColorMag 1.2.2
	 */
	function colormag_middle_header_bar_display() {
		?>

		<div class="inner-wrap">

		</div><!-- .inner-wrap -->

		<?php
	}

endif;

if ( ! function_exists( 'colormag_below_header_bar_display' ) ) :

	/**
	 * Function to display the middle header bar
	 *
	 * @since ColorMag 1.2.2
	 */
	function colormag_below_header_bar_display() {
		?>
		<div id="szn-ssp-leaderboard"></div>
		<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
			<div class="inner-wrap clearfix">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" style="padding: 0px 0px;"><img class="menu-logo" src="https://vedator.org/wp-content/uploads/2017/11/logo.png" height="40px" width="166px" /></a>
				<?php
				if ( get_theme_mod( 'colormag_home_icon_display', 0 ) == 1 ) {
					if ( is_front_page() ) {
						$home_icon_class = 'home-icon front_page_on';
					} else {
						$home_icon_class = 'home-icon';
					}
					?>
				
					<div class="<?php echo $home_icon_class; ?>">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><i class="fa fa-home"></i></a>
					</div>

					<?php
				}
				?>

				<h4 class="menu-toggle"></h4>
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-primary-container', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' ) );
				} else {
					wp_page_menu();
				}
				?>

				<?php if ( get_theme_mod( 'colormag_random_post_in_menu', 0 ) == 1 ) { ?>
					<?php colormag_random_post(); ?>
				<?php } ?>

				<?php if ( get_theme_mod( 'colormag_search_icon_in_menu', 0 ) == 1 ) { ?>
					<i class="fa fa-search search-top"></i>
					<div class="search-form-top">
						<?php get_search_form(); ?>
					</div>
				<?php } ?>
			</div>
		</nav>

		<?php
	}

endif;
