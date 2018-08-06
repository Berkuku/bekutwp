<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php// get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						//the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php $post_col_number = 0;?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
                            if (($post_col_number == 0) or ($post_col_number % 3 == 0)){
                            echo "<div class=\"row row_margin\">";
                        }
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						//get_template_part( 'loop-templates/content', get_post_format() );
						?>
                         <div class="card col-sm-4" style="float: left; height: 450px;">
                            <div class="col_margin">
                                <div style="width:300px; height:300px; overflow:hidden; text-align:center; line-height:300px; margin:auto;">
                                    <img class="card-img-top" src="<?php echo(get_the_post_thumbnail_url());?>" style="width:100%;">
                                </div>
                                <div class="row align-items-end">
                                    <div class="card-body">
                                        <h6 class="card-title"><?php echo(the_title());?></h6>
                                        <!--<p class="card-text"><?php// the_excerpt();?></p>-->
                                        <a href="<?php the_permalink();?>" class="btn btn-primary test" >Читать новость</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php 
                        $post_col_number = $post_col_number + 1;
                        if ($post_col_number % 3 == 0){
                            echo "</div>";
                        };
                        ?>
					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>