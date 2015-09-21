<?php
/**
 * Custom template tags for this theme.
 *
 * @package Presser
 */

/**
 * Get Category List
 *
 * @return Array Category ID, Name, and Count
 */
if ( ! function_exists( 'presser_get_category_list' ) ) {
	function presser_get_category_list( $args = array() ) {
		$list       = array();
		$categories = get_categories( $args );
		$list['']   = __( 'All categories', 'presser' );

		foreach ( (array) $categories as $category ) {
			$list[ $category->cat_ID ] = $category->cat_name;
			if ( ! isset( $args['show_count'] ) ) {
				$list[ $category->cat_ID ] .= ' (' . number_format_i18n( $category->category_count ) . ')';
			}
		}

		return $list;
	}
} // endif

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
if ( ! function_exists( 'presser_comment' ) ) {

	function presser_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; //@codingStandardsIgnoreLine;

		if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

			<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div class="comment-body">
				<?php _e( 'Pingback:', 'presser' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'presser' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		<?php else : ?>

		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
			<?php if ( 0 != $args['avatar_size'] ) {
				echo get_avatar( $comment, 64 );
			}  //@codingStandardsIgnoreLine ?>

			<section id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php printf( __( '%s', 'presser' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div>
					<!-- .comment-author -->

					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'presser' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php edit_comment_link( __( 'Edit', 'presser' ), '<span class="edit-link">', '</span>' ); ?>

						<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						) ) );
						?>
					</div>
					<!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'presser' ); ?></p>
					<?php endif; ?>
				</footer>
				<!-- .comment-meta -->

				<div class="comment-content">
					<?php comment_text(); ?>
				</div>
				<!-- .comment-content -->

			</section><!-- .comment-body -->

			<?php
		endif;
	}
} // ends check for presser_comment()


if ( ! function_exists( 'presser_archives_title' ) ) :
	/**
	 * Shim for `presser_archives_title()`.
	 *
	 * Display the archive title based on the queried object.
	 *
	 * @todo Remove this function when WordPress 4.3 is released. Can this be done now?
	 *
	 * @param string $before Optional. Content to prepend to the title. Default empty.
	 * @param string $after Optional. Content to append to the title. Default empty.
	 *
	 */
	function presser_archives_title( $before = '', $after = '' ) {

		$title = '';

		if ( is_category() ) {
			$title = sprintf( __( 'Category: %s', 'presser' ), single_cat_title( '', false ) );
		} elseif ( is_search() ) {
			$title = sprintf( __( 'Search Results for: %s', 'presser' ), '<span>' . get_search_query() . '</span>' );
		} elseif ( is_tag() ) {
			$title = sprintf( __( 'Tag: %s', 'presser' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( __( 'Author: %s', 'presser' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( __( 'Year: %s', 'presser' ), get_the_date( _x( 'Y', 'yearly archives date format', 'presser' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( __( 'Month: %s', 'presser' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'presser' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( __( 'Day: %s', 'presser' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'presser' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'presser' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'presser' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title', 'presser' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'presser' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'presser' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = _x( 'Links', 'post format archive title', 'presser' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'presser' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'presser' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'presser' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'Archives: %s', 'presser' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%1$s: %2$s', 'presser' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} else {
			$title = __( 'Archives', 'presser' );
		}

		/**
		 * Filter the archive title.
		 *
		 * @param string $title Archive title to be displayed.
		 */
		$title = apply_filters( 'get_presser_archives_title', $title );

		if ( ! empty( $title ) ) {
			echo $before . $title . $after; //@codingStandardsIgnoreLine
		}
	}
endif;

/**
 * The below functionality is used because the query is set
 * in a page template, the "paged" variable is available. However,
 * if the query is on a page template that is set as the websites
 * static posts page, "paged" is always set at 0. In this case, we
 * have another variable to work with called "page", which increments
 * the pagination properly.
 *
 */
if ( ! function_exists( 'presser_get_paged_query_var' ) ) {
	function presser_get_paged_query_var() {
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		return $paged;
	}
} // endif