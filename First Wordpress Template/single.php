<?php get_header();  ?>
<div class="container">
    <header id="header">
        <?php get_template_part('template-parts/navigation') ?>
        <div class="clear"></div>

    </header>


</div>


<div class="container content-row single">
    <div class="row">
        <div class="col-lg-9">
            <?php
            while (have_posts()) {
                the_post();
            ?>
                <article id="single-post">
                    <div class="post-header">
                        <div class="post-image"><img src="<?php echo (get_the_post_thumbnail_url() ? the_post_thumbnail_url() : THEME_URI . '/assets/images/noImage.jpg') ?>" alt=""></div>
                        <div class="post-data">
                            <h1 class="post-title"><?php the_title(); ?></h1>
                            <ul>
                                <li>نویسنده: <a class='archlink' href="
                                <?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author(); ?></a></li>
                                <li>تاریخ: <?php the_date() ?></li>
                                <li>
                                    <?php
                                    $post_cats = get_the_category();
                                    if ($post_cats) { ?>
                                        دسته بندی:
                                    <?php
                                        foreach ($post_cats as $post_cat) {
                                            $category_link = get_category_link($post_cat->cat_ID);
                                            echo "<a class='archlink' href='" . $category_link . "'>" . $post_cat->name . "</a>/ ";
                                        }
                                    }
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    $post_tags = get_the_tags();
                                    if ($post_tags) { ?>
                                        برچسب ها:
                                    <?php
                                        foreach ($post_tags as $post_tag) {
                                            echo $post_tag->name . '/';
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="post">
                        <p><?php the_content(); ?>
                        </p>
                    </div>
                </article>
            <?php } ?>
            <?php if (get_the_author_meta('description')) { ?>
                <section class="author-box">
                    <div class="section-title">درباره <?php echo get_the_author_meta('nickname') ?></div>
                    <div class="flex-items">
                        <div class="author-image"><?php echo get_avatar(get_the_author_meta('ID'), 180); ?></div>
                        <div class="author-desc"><?php echo get_the_author_meta('description') ?></div>
                    </div>
                </section>
            <?php } ?>
            <section class="comments">

                <ul class="commentlist">
                    <?php
                    $comments = get_comments(array(
                        'post_id' => $post->ID,
                        'status' => 'approve'
                    ));
                    wp_list_comments(array(
                        'avatar_size' => 80
                    ), $comments);
                    ?>
                </ul>
                <?php comment_form() ?>
            </section>

        </div>
        <?php get_sidebar() ?>

    </div>
</div>

<?php get_footer() ?>