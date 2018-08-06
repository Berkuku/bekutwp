<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <a href="<?php echo get_permalink($post->ID, false) ?>" style="text-decoration: none;">
        <header class="entry-header" style="border: 1px solid #026549; padding: 0 0 5px 0; height: 415px; overflow: hidden; position: relative;">
                <span style="background-image: url('<?= get_the_post_thumbnail_url($post->ID, 'large'); ?>');
                        background-size: cover; background-position: center; display: inline-block; background-repeat: no-repeat; height: 325px;width:100%;"></span>
            <div class="text-center" style=" padding: 5px 6px; color: black;font-size: 16px;"><?php the_title(); ?></div>
        </header><!-- .entry-header -->
        <!--<div class="entry-content"></div>--><!-- .entry-content -->
        <!--<footer class="entry-footer"></footer>--><!-- .entry-footer -->
    </a>
</article><!-- #post-## -->
