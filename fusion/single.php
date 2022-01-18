<?php get_header(); ?>
    <section class="main-content post-single">
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('post-sidebar')): ?>
                <div class="col-md-8 col-sm-12">
                    <?php else: ?>
                    <div class="col-md-12 col-sm-12">
                        <?php endif; ?>
                        <div class="row">
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="col-xs-12">
                                    <div class="post-item">
                                        <?php if (has_post_thumbnail()): ?>
                                            <div class="post-thumbnail">
                                                <?= the_post_thumbnail('', ['class' => 'img-responsive']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="post-category">
                                            <?php if ($cats = the_category()): ?>
                                                <ul class="post-categories">
                                                    <?php foreach ($cats as $cat): ?>
                                                        <li>
                                                            <a href="category.html"><?= $cat; ?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                        <div class="post-header">
                                            <h3 class="post-title"><?= the_title(); ?></h3>
                                            <span class="post-date">
                                            <i class="fa fa-calendar"></i>
											<a href="archive.html"><?= get_the_date(); ?></a>
                                        </span>
                                            <span class="post-comments">
                                            <i class="fa fa-comments-o"></i>
											<a href="javascript:void(0)"
                                               class="comment-url"><?= get_comments_number() ?></a>
                                        </span>
                                        </div>
                                        <div class="post-content">
                                            <?= the_content(); ?>
                                        </div>
                                        <div class="post-footer">
                                            <div class="post-tags pull-left">
                                                <div class="post-tags pull-left">
                                                    <span class="title"><?= __('Etiketlər:'); ?> </span>
                                                    <?= sprintf(get_the_tag_list()) ?>
                                                </div>
                                            </div>
                                            <div class="social-icons pull-right">
                                                <ul class="social-icons-menu list-unstyled">
                                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Author bio -->
                                    <div class="author-box">
                                        <div class="author-image">
                                            <?= get_avatar(get_the_author_meta('ID')); ?>
                                        </div>
                                        <div class="author-info">
                                            <h3 class="author-name"><?= get_the_author_link() ?></h3>
                                            <p class="author-desc"><?= get_the_author_meta('description') ?></p>
                                            <div class="social-icons">
                                                <ul class="social-icons-menu list-unstyled">
                                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-navigation">
                                        <div class="post-navigation-prev pull-left">
                                            <?php previous_post_link($format = '<span>' . __('Əvvəlki Yazı') . '</span> %link'); ?>
                                            </a>
                                        </div>
                                        <div class="post-navigation-next pull-right">
                                            <?php next_post_link($format = '<span>' . __('Sonrakı Yazı') . '</span>%link'); ?>
                                        </div>
                                    </div>
                                    <div class="related-posts">
                                        <?php
                                        $args = ['post_type' => 'post', 'post_status' => 'publish', 'orderby' => 'rand', 'posts_per_page' => 2];
                                        $releated_post = new WP_Query($args);
                                        if ($releated_post->have_posts()): ?>
                                            <h4 class="related-posts-title"><?= __('Bunlarda Xoşunuza Gələ Bilər'); ?></h4>
                                            <div class="row">
                                                <?php if ($releated_post->have_posts()): while ($releated_post->have_posts()) : $releated_post->the_post(); ?>
                                                    <div class="col-md-6">
                                                        <div class="related-post">
                                                            <div class="post-thumbnail">
                                                                <a href="<?= the_permalink(); ?>">
                                                                    <?php if (has_post_thumbnail()): ?>
                                                                        <?= the_post_thumbnail('', ['class' => 'img-responsive']); ?>
                                                                    <?php else: ?>
                                                                        <img src="https://via.placeholder.com/1170x780"
                                                                             class="img-responsive"
                                                                             alt="<?= the_title(); ?>">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="post-info">
                                                                <div class="post-header">
                                                                    <h3 class="post-title">
                                                                        <a href="<?= the_permalink(); ?>">
                                                                            <?= the_title(); ?>
                                                                        </a>
                                                                    </h3>
                                                                    <span class="author">
																<?= get_the_author_link(); ?>
                                                            </span>
                                                                    <span class="date">
																<a href="archive.html"><?= the_date(); ?></a>
                                                            </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endwhile; endif; ?>
                                            </div>
                                        <?php endif;
                                        wp_reset_postdata(); ?>
                                    </div>
                                    <?php
                                    if (comments_open() || get_comments_number()) {
                                        comments_template();
                                    }; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?php
                    if (is_active_sidebar('post-sidebar')): ?>
                        <div class="col-md-4 col-sm-12">
                            <?php dynamic_sidebar('post-sidebar');?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
    </section>

<?php get_footer(); ?>