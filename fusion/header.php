<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="FusionBlog - Personal Blog Theme">
    <meta name="keywords"
          content="Html, Css, jQuery, JavaScript, FusionBlog, blog, personal blog, template, news theme">

    <!-- Title -->
    <title><?= the_title(); ?> - <?= get_bloginfo('name'); ?></title>
    <!-- Favicon -->
    <link rel="icon" href="https://via.placeholder.com/80x80">


    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- ========== Start Loading ========== -->


<!-- ========== End Loading ========== -->

<!-- ========== Start Header ========== -->

<header>
    <div class="site-brand text-center">
        <div class="container">
            <a href="<?= home_url(); ?>">
                <h2><?php bloginfo('name'); ?></h2>
            </a>
            <p class="site-description"><?php bloginfo('description') ?></p>
        </div>
    </div>
    <?php get_template_part('template-parts/menu'); ?>
</header>