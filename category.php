<?php
global $wp_query;
global $query_string;
//$page_id = $wp_query->post->ID;
$page = $wp_query->get_queried_object();
?>

<?php get_header(); ?>

<div class="page">
        <div class="sidebar">
            <p class="menu-title">
                <?php
                $menu_object = wp_get_nav_menu_object(12);
                echo $menu_object->name;?>
            </p>
            <?php
            wp_nav_menu(array('menu' => 12));
            ?>
        </div>
        <div class="content">
            <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $custom_query = new WP_Query(array(
                'posts_per_page' => 2,
                'cat' => $page->term_id,
                'paged' => $paged,
                'meta_key' => 'wpcf-date',
                'orderby' => 'meta_value',
                'order' => 'DESC'
            ));
            while($custom_query->have_posts()) : $custom_query->the_post(); ?>
                <?php
                $post = get_post();
                $post_meta = get_post_meta($post->ID);
                $author = get_the_author_meta('ID');
                $category =  get_the_category();
                $comments_count = $post->comment_count;
                ?>
                <div class="post">
                    <div class="author__avatar">
                        <div class="img">
                            <ul class="triangles">
                                <li class="triangle">.</li>
                                <li class="triangle">.</li>
                                <li class="triangle">.</li>
                                <li class="triangle">.</li>
                            </ul>
                            <?php echo get_avatar( $author, 86 ); ?>
                        </div>
                        <div class="ya-share2" data-services="vkontakte,facebook"></div>
                    </div>
                    <div class="container">
                        <div class="post__info">
                            <div class="category">
                                <a href="<?php echo get_category_link($category[0]->term_id);?>">
                                    <?php echo $category[0]->name;?>
                                </a>
                            </div>
                            <div class="author">
                                <?php echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');?>
                            </div>
                            <div class="date"><?php echo date('d.m.Y', $post_meta['wpcf-date'][0]);?></div>
                            <div class="views">
                                <?php echo 'Просмотров ' . pvc_get_post_views($post->ID);?>
                            </div>
                        </div>
                        <h2 class="post__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="content">
                            <div class="img">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo get_the_post_thumbnail($post->ID, 'large') ?>
                                </a>
                            </div>
                            <div class="text">
                                <?php the_excerpt();?>
                            </div>
                        </div>
                        <div class="post__footer">
                            <div class="more__link"></div>
                            <div class="comments">
                                <?php if(intval($comments_count) == 0):?>
                                    <div class="counter counter__zero">Нет комментариев</div>
                                <?php else:?>
                                    <a href="<?php the_permalink(); ?>" class="counter counter__zero">
                                        <?php echo $comments_count;?> комментариев</a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            <div class="pagination">
                <?php
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $custom_query->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => false,
                    'add_args'     => false,
                    'add_fragment' => '',
                ) );
                ?>
            </div>
            <?php wp_reset_postdata(); // reset the query ?>
        </div>
    </div>

<?php get_footer();
