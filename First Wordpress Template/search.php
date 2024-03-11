<?php get_header();  ?>
<?php get_template_part('template-parts/navigation') ?>

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
        <div class="pagination"> <?php the_posts_pagination() ?></div>
        </div>
        <?php get_sidebar() ?>
        
    </div>

</div>
<?php get_footer();  ?>