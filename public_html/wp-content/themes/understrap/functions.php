<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

 function tags4meta() {
     $posttags = get_the_tags();
         foreach((array)$posttags as $tag) {
         $tags4meta .= $tag->name . ',';
    }
 if (!is_single()) { ?>добавьте,ваши,ключевые слова,таким,образом<?php }
 echo "$tags4meta";
 }
 
 //Custom excerpt for featured posts and meta descriptions
 function the_content_limit($max_char, $more_link_text =
 '(more...)', $stripteaser = 0, $more_file = '') {
 $content = get_the_content($more_link_text, $stripteaser, $more_file);
 $content = apply_filters('the_content', $content);
 $content = str_replace(']]>', ']]&gt;', $content);
 $content = strip_tags($content);
 
if (strlen($_GET['p']) > 0) {
 echo $content;
 }
 else if ((strlen($content)>$max_char) && ($space = strpos($content, " ", $max_char ))) {
 $content = substr($content, 0, $space);
 $content = $content;
 echo $content;
 }
 else {
 echo $content;
 }
 }

 
 


