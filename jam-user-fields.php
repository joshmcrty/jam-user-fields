<?php
/*
Plugin Name: JAM User Fields
Plugin URI: http://joshmccarty.com
Description: Adds Twitter, Facebook, Pinterest, LinkedIn, Google+, GitHub, and YouTube contact fields for users.
Version: 0.1
Author: Josh McCarty
Author URI: http://joshmccarty.com
License: GPL v2
*/

/*  Copyright 2012 Josh McCarty  (email : josh@joshmccarty.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Add additional contact fields for the user profile page in the WordPress admin.
if ( ! function_exists( 'jam_user_fields' ) ) :
	function jam_user_fields( $array ) {
		$array[ 'twitter' ] = 'Twitter <span class="description">(Username)</span>';
		$array[ 'facebook' ] = 'Facebook <span class="description">(Profile URL)</span>';
		$array[ 'pinterest' ] = 'Pinterest <span class="description">(Username)</span>';
		$array[ 'linkedin' ] = 'LinkedIn <span class="description">(<strong>Public</strong> Profile URL)</span>';
		$array[ 'googleplus' ] = 'Google+ <span class="description">(Profile URL)</span>';
		$array[ 'github' ] = 'GitHub <span class="description">(Username)</span>';
		$array[ 'youtube' ] = 'YouTube <span class="description">(Username)</span>';
		return $array;
	}
	add_filter( 'user_contactmethods', 'jam_user_fields' );
endif;

// Display the additional fields. This function MUST be called from within the loop on the author page (usually author.php)
if ( ! function_exists( 'jam_display_user_fields' ) ) :
	function jam_display_user_fields() {

?><ul class="jam-user-fields">
	<?php if ( get_the_author_meta( 'twitter' ) ) : ?>
	<li class="jam-user-fields-item">
		<a class="jam-user-fields-link" href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" rel="me" title="@<?php the_author_meta( 'twitter' ); ?> on Twitter">
			<img class="jam-user-fields-logo" src="<?php echo plugins_url( 'images/twitter.png', __FILE__ ); ?>" alt="Twitter" />
		</a>
	</li>
	<?php endif;
	if ( get_the_author_meta( 'facebook' ) ) : ?>
	<li class="jam-user-fields-item">
		<a class="jam-user-fields-link" href="<?php the_author_meta( 'facebook' ); ?>" rel="me" title="<?php the_author_meta( 'display_name' ); ?> on Facebook">
			<img class="jam-user-fields-logo" src="<?php echo plugins_url( 'images/facebook.png', __FILE__ ); ?>" alt="Facebook" />
		</a>
	</li>
	<?php endif;
	if ( get_the_author_meta( 'pinterest' ) ) : ?>
	<li class="jam-user-fields-item">
		<a class="jam-user-fields-link" href="http://pinterest.com/<?php the_author_meta( 'pinterest' ); ?>" rel="me" title="<?php the_author_meta( 'pinterest' ); ?> on Pinterest">
			<img class="jam-user-fields-logo" src="<?php echo plugins_url( 'images/pinterest.png', __FILE__ ); ?>" alt="Pinterest" />
		</a>
	</li>
	<?php endif;
	if ( get_the_author_meta( 'linkedin' ) ) : ?>
	<li class="jam-user-fields-item">
		<a class="jam-user-fields-link" href="<?php the_author_meta( 'linkedin' ); ?>" rel="me" title="<?php the_author_meta( 'display_name' ); ?> on LinkedIn">
			<img class="jam-user-fields-logo" src="<?php echo plugins_url( 'images/linkedin.png', __FILE__ ); ?>" alt="LinkedIn" />
		</a>
	</li>
	<?php endif;
	if ( get_the_author_meta( 'googleplus' ) ) : ?>
	<li class="jam-user-fields-item">
		<a class="jam-user-fields-link" href="<?php the_author_meta( 'googleplus' ); ?>" rel="me" title="<?php the_author_meta( 'display_name' ); ?> on Google+">
			<img class="jam-user-fields-logo" src="<?php echo plugins_url( 'images/googleplus.png', __FILE__ ); ?>" alt="Google+" />
		</a>
	</li>
	<?php endif;
	if ( get_the_author_meta( 'github' ) ) : ?>
	<li class="jam-user-fields-item">
		<a class="jam-user-fields-link" href="http://github.com/<?php the_author_meta( 'github' ); ?>" rel="me" title="<?php the_author_meta( 'github' ); ?> on GitHub">
			<img class="jam-user-fields-logo" src="<?php echo plugins_url( 'images/github.png', __FILE__ ); ?>" alt="GitHub" />
		</a>
	</li>
	<?php endif;
	if ( get_the_author_meta( 'youtube' ) ) : ?>
	<li class="jam-user-fields-item">
		<a class="jam-user-fields-link" href="http://youtube.com/<?php the_author_meta( 'youtube' ); ?>" rel="me" title="<?php the_author_meta( 'youtube' ); ?> on YouTube">
			<img class="jam-user-fields-logo" src="<?php echo plugins_url( 'images/youtube.png', __FILE__ ); ?>" alt="YouTube" />
		</a>
	</li>
	<?php endif; ?>
</ul>


	<?php }
endif;

// Output styles for the additional fields.
if ( ! function_exists( 'jam_style_user_fields' ) ) :
	function jam_style_user_fields() { ?>

<style type="text/css">
	.jam-user-fields {
		list-style-type: none;
		margin-left: 0;
		padding-left: 0;
	}
	.jam-user-fields-item {
		display: inline-block;
		padding-right: 20px;
	}
	.jam-user-fields-link" {
		display: block;
	}
	.jam-user-fields-logo {
		border: none;
		display: block;
	}
</style>

	<?php }
endif;
add_action( 'wp_head', 'jam_style_user_fields' );
?>