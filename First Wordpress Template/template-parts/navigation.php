<nav class="container" id="nav">
    <div class="logo"><a href="<?php echo SITE_URL ?>"><img src="<?php echo THEME_URI ?>/assets/images/logo.png" alt=""></a></div>
    <?php if ('has_nav_menu') {
        wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'container' => 'div',
                'container_class' => 'right'
            )
        );
        echo "<br/>";
    } else { ?>
        <ul class="right">
            <li><a href="https://www.google.com">صفحه اصلی</a></li>
            <li><a href="https://www.google.com">همه مقالات</a></li>
            <li><a href="https://www.google.com">آموزش برنامه نویسی</a></li>
            <li><a href="https://www.google.com">درباره</a></li>
            <li><a href="https://www.google.com">تماس</a></li>
            <li><a href="https://www.google.com">تیم</a></li>
        </ul>
    <?php } ?>
    <ul class="left">
    <li><?php  dynamic_sidebar('primary'); ?></li>
        <!-- <li><a href="#"><i class="fab fa-facebook"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-github"></i></a></li>
        <li><a href="#"><i class="fab fa-twitch"></i></a></li> -->
    </ul>
    
</nav>