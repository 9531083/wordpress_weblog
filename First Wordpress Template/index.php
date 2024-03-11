<?php get_header();  ?>
<div class="container">
    <header id="header">
        <?php //include 'template-parts/navigation.php' 
        ?>
        <?php get_template_part('template-parts/navigation') ?>
        <div class="clear"></div>
        <section id="h-posts">
            <div class="row">
                <?php
                $big_post_args = array(
                    'posts_per_page' => 1,
                    'p' => 1852
                );
                $big_post = new WP_Query($big_post_args);
                if ($big_post->have_posts()) :
                    while ($big_post->have_posts()) :
                        $big_post->the_post();
                ?>
                        <div class="col-lg-6 big-post">
                            <div class="p-image">
                                <a href="<?php the_permalink() ?>"><img src="<?php echo (get_the_post_thumbnail_url()) ? the_post_thumbnail_url() : THEME_URI . "/assets/images/noImage.jpg"; ?>" alt=""></a>
                            </div>
                            <span class="p-date"><?php the_date() ?> </span>
                            <a class="header-links" href="<?php the_permalink() ?>">
                                <h1 class="p-title"><?php the_title() ?> </h1>
                            </a>
                            <p class="p-summary"><?php the_excerpt() ?></p>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
                <div class="col-lg-6 aside">
                    <?php
                    $side_posts_args = array(
                        'posts_per_page' => 5,
                    );
                    $side_posts = new WP_Query($side_posts_args);
                    if ($side_posts->have_posts()) :
                        while ($side_posts->have_posts()) :
                            $side_posts->the_post();
                    ?>
                            <div class="post-item">
                                <div class="row">
                                    <div class="col-4 p-image">
                                        <a href="<?php the_permalink() ?>"><img src="<?php echo (get_the_post_thumbnail_url()) ? the_post_thumbnail_url() : THEME_URI . "/assets/images/noImage.jpg"; ?>" alt=""></a>
                                    </div>
                                    <div class="col-8 p-data">
                                        <span class="p-date"><?php the_date() ?> </span>
                                        <a class="header-links" href="<?php the_permalink() ?>">
                                            <h1 class="p-title"><?php the_title() ?> </h1>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </section>
    </header>

    <section id="last-posts">
        <div class="row">
            <?php
            $cat_posts_args = array(
                'posts_per_page' => 4,
                'cat' => 17
            );
            $cat_posts = new WP_Query($cat_posts_args);
            if ($cat_posts->have_posts()) :
                while ($cat_posts->have_posts()) :
                    $cat_posts->the_post();
            ?>
                    <div class="col-lg-3 post-item">
                        <div class="p-image">
                            <a href="<?php the_permalink() ?>"><img src="<?php echo (get_the_post_thumbnail_url()) ? the_post_thumbnail_url() : THEME_URI . "/assets/images/noImage.jpg"; ?>" alt=""></a>
                        </div>
                        <span class="p-date"> <?php the_date() ?> </span>
                        <a class="link" href="<?php the_permalink() ?>">
                            <h2 class="p-title"><?php the_title() ?></h2>
                        </a>
                        <p class="p-summary">
                            <?php
                            $brief = get_the_excerpt();
                            echo substr($brief, 0, strpos($brief, ' ', 120)) . '<a href="' . get_the_permalink() . '">[...]</a>';
                            ?>
                        </p>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </section>
</div>

<div class="container">
    <section id="sub">
        <div class="row">
            <div class="col-lg-6 image">
                <img src="<?php echo THEME_URI ?>/assets/images/banner.png" alt="" height="400">
            </div>
            <div class="col-lg-6 text">
                <h2>هنوز اینستاگرام مارو نداری؟</h2>
                <h3>آخرین مقالات عملی و فرهنگی در پیج اینستاگرام ما</h3>
                <button id="follow"><i class="fab fa-instagram"></i><a href="https://www.instagram.com/majid_morshedlou/"> همین الان فالو کن</a></button>
            </div>
        </div>
    </section>
</div>

<div class="container content-row">
    <div class="row">
        <div class="col-lg-9">
            <div class="posts">
                <div class="post-item">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                    ?>
                            <div class="row">
                                <div class="col-lg-8">

                                    <h1 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                                    <p class="post-desc">
                                        <?php the_excerpt() ?>
                                        <!-- <?php
                                                $brief = get_the_excerpt();
                                                echo substr($brief, 0, strpos($brief, ' ', 450)) . '<a href="' . get_the_permalink() . '">[...]</a>';
                                                ?> -->
                                    </p>
                                    <span class="post-data">
                                        <span class="author"><a href="#"><?php the_author() ?>- </a></span>
                                        <span class="date"> <?php the_date() ?> </span>
                                    </span>

                                </div>
                                <div class="col-lg-4">
                                    <div class="post-image">
                                        <a href="<?php the_permalink() ?>">
                                            <img src="
                                            <?php
                                            echo (get_the_post_thumbnail_url()) ? the_post_thumbnail_url() : THEME_URI . "/assets/images/noImage.jpg";
                                            ?>
                                            " alt="error!!">
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <hr>
            <div class="pagination"> <?php get_the_posts_pagination() ?></div>
        </div>
        <?php get_sidebar() ?>
    </div>


</div>
<?php get_footer(); ?>