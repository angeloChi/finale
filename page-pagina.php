<?php
/**
 * The template for displaying all pages.
 *
 * @package Square
 */


 /** Template Name: PAGINAMUSEI */
 
include_once '/storage/ssd4/799/3511799/public_html/wp-content/plugins/wp-museo/MuseoInterfaccia.php';



$postid = get_the_ID();
 
$name=get_the_title($postid);

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
				
				<?php 
				 $museoInterfaccia = new MuseoInterfaccia();
				 $museoInterfaccia->createConn();
				 $museo = $museoInterfaccia->readByName($name);
				 
				 $str = $museo->getDescrizione().'<br></br>'.
						'Località: '.$museo->getLocalita().'<br></br>'.
						'Indirizzo: '.$museo->getIndirizzo().'<br></br>'.
						'Orario apertura: '.$museo->getOrarioApertura().'<br></br>'.
						'Orario chiusura: '.$museo->getOrarioChiusura().'<br></br>'.
						'<iframe src="//www.google.com/maps/embed/v1/place?q='.$name.'
				&key=AIzaSyDzgb4di0uw6DdFUnYRLOeLYJvXSbtyaPw"></iframe><br></br>';
				echo $str;
				
				?>
				
				

				

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); //mostra articoli recenti e commenti?> 
</div>

<?php get_footer(); 

?>


