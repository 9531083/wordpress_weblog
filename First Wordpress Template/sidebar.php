<div class="col-lg-3 sidebar-container">
    <aside class="sidebar-item">
        <div class="sidebar-header">آخرین مقالات</div>
        <div class="sidebar-content">
            <ul class="posts-list">
                <?php
                $mv_posts_args = array(
                    'posts_per_page' => 6,
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num'
                );
                $mv_posts = new WP_Query($mv_posts_args);
                if ($mv_posts->have_posts()) :
                    while ($mv_posts->have_posts()) :
                        $mv_posts->the_post();
                ?>
                        <li>
                            <div class="post-image"><a href="<?php the_permalink() ?>"><img src="<?php echo (get_the_post_thumbnail_url()) ? the_post_thumbnail_url() : THEME_URI . "/assets/images/noImage.jpg"; ?>" alt=""></a></div>
                            <h2 class="post-title"><a href="<?php the_permalink() ?>" class="link"><?php the_title() ?></a></h2>
                        </li>
                <?php
                    endwhile;
                endif;
                ?>
            </ul>
        </div>
    </aside>
</div>