
<div class="header-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-3 pos-s">
                <button class="menu-toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
                <nav class="navbar navbar-default">
                    <?php
                    wp_nav_menu( array(
                        'theme_location'  => 'header',
                        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                        'container'       => 'div',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id'    => 'bs-example-navbar-collapse-1',
                        'menu_class'      => 'nav navbar-nav',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ) );
                    ?>
                </nav>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-9 text-md-center">
                <div class="search-toggle">
                    <i class="fa fa-search"></i>
                </div>
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
<div class="search-area">
				<span class="close-search">
                    <i class="fa fa-close"></i>
				</span>
    <div class="display-table">
        <div class="display-table-cell">
            <form role="search" method="get" class="search-form" action="#">
                <input type="search" class="search-field" placeholder="Search..." name="s" required="required"/>
                <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div>