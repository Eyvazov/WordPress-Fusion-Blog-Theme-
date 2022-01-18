<?php get_header(); ?>
    <section class="main-content post-single">
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('page-sidebar')): ?>
                <div class="col-md-8 col-sm-12">
                    <?php else: ?>
                    <div class="col-md-12 col-sm-12">
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="post-item">
                                    <div class="post-thumbnail">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('', ['class' => 'img-responsive']); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="post-header">
                                        <h3 class="post-title"><?php the_title(); ?></h3>
                                    </div>
                                    <div class="post-content">
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="post-footer">
                                        <div class="social-icons pull-right">
                                            <ul class="social-icons-menu list-unstyled">
                                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?php if (is_active_sidebar('page-sidebar')): ?>
                        <?php get_sidebar(); ?>
                    <?php endif; ?>
                </div>
            </div>
    </section>
<?php get_footer(); ?>