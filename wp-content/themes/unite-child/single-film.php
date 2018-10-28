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
			echo "<hr>Ticket Price::".$key_name[0];
			
			$key_name = get_post_custom_values($key = 'release_date');
			echo "<hr>Release Date::".$key_name[0];
			echo "<hr>";
			
			?> 

			<?php unite_post_nav(); 
			
			
			
			$terms = get_terms( 'country' );
			print_r($terms);
			/*foreach ($terms as $term) {
				// $cognome_nome will be "P Elena" or "P Andrea" in your case
				$cognome_nome = get_field('country', $term->taxonomy.'_'.$term->term_id);
		   }*/
		   
		   
			

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