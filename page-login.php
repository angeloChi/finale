
<?php
/**
 * The template for displaying all pages.
 *
 * @package Square
 */


 /** Template Name: PAGINALOGIN */
 

 
 
 
 
 
 
 
 


get_header(); ?>

<header class="sq-main-header">
	<div class="sq-container">
		<?php the_title( '<h1 class="sq-main-title">', '</h1>' );?>
	</div>
</header><!-- .entry-header -->

<div class="sq-container sq-clearfix">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

								
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
				
				
				
				<!--<br><br>
				<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d928.0382602090453!2d2.3374628279715157!3d48.86033486373533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671d877937b0f%3A0xb975fcfa192f84d4!2sMuseo+del+Louvre!5e0!3m2!1sit!2sit!4v1508955195153" width="250" height="200" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
					-->

				

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


</div>

<?php get_footer(); 

?>




