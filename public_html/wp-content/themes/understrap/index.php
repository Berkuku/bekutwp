<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<?php if (is_front_page() && is_home()) : ?>
    <?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">
    
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

    <style>
    /*.image-box {
    	text-align: center;
    	height: 200px;
    	line-height: 200px;
    	margin-bottom: 10px;
    }
    .image-box img {
    	max-height: 100%;
    }
    .title-box {
    	height: 50px;
    }
    .title-box h5 {
    	font-size: 1.1rem !important;
    }
    .content-box {
    	font-size: 13px;
    	height: 200px;
    	overflow: hidden;
    }
    .col-3 {
            border: 1px solid lightgray;
            border-radius: 5px;
    </style>

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

<?php
                if (have_posts()) : ?>
                    <div class="row">
                        <?php /* Start the Loop */
				$args =  array( 
                    'posts_per_page' => 20,
                    
                );
   
				$query = new WP_Query($args);
				
				$limit = 4;
				$counter = 0;
				
                    while ($query->have_posts()) : $query->the_post();
                            $types = get_post_meta($post->ID, 'type_news');
                            
                            switch ($types[0]) {
                                case 'a':
                                    ?>
                                    <div class="col-md-12 col-xs-12" style="padding: 0; margin-right: 10px; width: 1140px; box-shadow: 0 0 10px #00805c; margin-top: 15px;">
                                        <?php get_template_part('loop-templates/content', get_post_format()); ?>
                                    </div>
                                    <?php
                                    break;
                                case 'b':
                                    ?>
                                    <div class="col-md-12 col-xs-12" style="padding: 0; margin-right: 10px; width: 560px; box-shadow: 0 0 10px #00805c; margin-top: 15px;">
                                        <?php get_template_part('loop-templates/content', get_post_format()); ?>
                                    </div>
                                    <?php
                                    break;
                                case 'c':
                                    ?>
                                    <div class="col-md-6 col-xs-12" style="padding: 0; margin-right: 10px; width: 560px; box-shadow: 0 0 10px #00805c; margin-top: 15px;">
                                        <?php get_template_part('loop-templates/content', get_post_format()); ?>
                                    </div>
                                    <?php
                                    break;
                                case 'd':
                                    ?>
                                    <div class="col-md-4 col-xs-12" style="padding: 0;margin-right: 10px; width: 370px; box-shadow: 0 0 10px #00805c; margin-top: 15px;">
                                        <?php get_template_part('loop-templates/content', get_post_format()); ?>
                                    </div>
                                    <?php
                                    break;
                                case 'e':
                                    ?>
                                    <div class="col-md-3 col-xs-12" style="padding: 0; margin-right: 10px; width: 275px; box-shadow: 0 0 10px #00805c; margin-top: 15px;">
                                        <?php get_template_part('loop-templates/content', get_post_format()); ?>
                                    </div>
                                    <?php
                                    break;
                            }
                            
?>

                    <?php endwhile;
                        wp_reset_query();
                    ?>
                    
                    </div><!--.row-->

                <?php else : ?>

                    <?php get_template_part('loop-templates/content', 'none'); ?>

                <?php endif; ?>

            </main><!-- #main -->
            
            <!-- Do the right sidebar check -->
            <?php get_template_part('global-templates/right-sidebar-check'); ?>

        </div><!-- .row -->
    </div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>