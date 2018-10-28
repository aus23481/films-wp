<?php
/**
 * The Template for displaying all single custome posts.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">
		
	

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content-film', 'single' ); 
			
			$key_name = get_post_custom_values($key = 'ticket_price');
			echo "<hr><b>Ticket Price::</b>".$key_name[0];
			
			$key_name = get_post_custom_values($key = 'release_date');
			echo "<hr><b>Release Date::</b>".$key_name[0];
			echo "<hr>";


			//Taxonomy		   
			$terms = get_the_terms( $post->ID, 'country' );
			if ( !empty( $terms ) ){
				foreach ($terms as $term) {
					echo "<b>Country::</b>".ucfirst($term->slug)."<hr>";
				}
			}
 
 
			$terms = get_the_terms( $post->ID, 'genre' );
			if ( !empty( $terms ) ){
				foreach ($terms as $term) {
					echo "<b>Genre::</b>".$term->slug."<hr>";
				}
			}
 
			//year
			$terms = get_the_terms( $post->ID, 'year' );
			if ( !empty( $terms ) ){
				foreach ($terms as $term) {
					echo "<b>Year::</b>".$term->slug."<hr>";
				}
			}
 
 
			//Actors
			$terms = get_the_terms( $post->ID, 'actors' );
			if ( !empty( $terms ) ){
				foreach ($terms as $term) {
					echo "<b>Actor::</b>".$term->slug."<hr>";
				}
			}
			
			
			?> 

			<?php unite_post_nav(); 
			
			
		   
		   
			

			?>
			

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>