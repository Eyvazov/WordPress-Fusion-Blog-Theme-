<?php get_header(); ?>

    <!-- ========== End Header ========== -->

    <!-- ========== Start Main Content ========== -->

    <section class="main-content">

        <!-- ========== Start Random Posts ========== -->
        <div class="random-posts">
            <?php
            $args = ['post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 3];
            $loop = new WP_Query($args);
            ?>

            <?php if ($loop->have_posts()): while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="item-box">
                    <div class="overlay">
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('', array('class' => 'img-responsive')); ?>
                                <?php else: ?>
                                    <img class="img-responsive" src="https://via.placeholder.com/1170x780"
                                         alt="<?php the_title() ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="item-box-content">
                            <div class="categories">
                                <div class="post-category">
                                    <ul class="post-categories">
                                        <?php if ($cats = the_category()): ?>
                                            <?php foreach ($cats as $cat): ?>
                                                <?php $cats; ?></a>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <h3 class="post-title">
                                <a href="<?= the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="author-info">
                                <span class="author-avatar">
                                    <?= get_avatar(get_the_author_meta('ID')); ?>
                                </span>
                                <span class="author-name">
									<a href="author.html"><?= get_the_author_link(); ?></a>
                                </span>
                            </div>
                            <span class="post-date">
                                <i class="fa fa-calendar"></i>
								<a href="archive.html"><?= the_date(); ?></a>
                            </span>
                            <span class="post-comments">
                                <i class="fa fa-comments-o"></i>
								<a href="<?php the_permalink(); ?>"
                                   class="comment-url"><?= get_comments_number(); ?></a>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <!-- ========== End Random Posts ========== -->


        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('page-sidebar')): ?>
                <div class="col-md-8 col-sm-12">
                    <?php else: ?>
                    <div class="col-md-12 col-sm-12">
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php get_template_part('template-parts/blog') ?>
                            </div>
                        </div>
                    </div>
                    <?php if (is_active_sidebar('page-sidebar')): ?>
                        <div class="col-md-4 col-sm-12">
                            <?php dynamic_sidebar('page-sidebar'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php get_template_part('template-parts/categories'); ?>
            </div>
    </section>

    <!-- ========== End Main Content ========== -->

    <!-- ========== Start Scroll To Top ========== -->

<?php get_footer(); ?>