  <!-- header area start -->
  <header>
    <div id="header-sticky" class="header__area header__border header__padding">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
            <div class="logo">
              <a href="<?php echo url_for('/') ?>">
                <h1>R2I</h1>
              </a>
            </div>
          </div>
          <div class="col-xxl-7 col-xl-7 col-lg-7 d-none d-lg-block">
            <div class="main-menu main-menu-2 pl-40">
              <nav id="mobile-menu">
                <ul>
                  <li class="">
                    <!-- <li class="has-dropdown"> -->
                    <a href="<?php echo url_for('/') ?>">Home</a>
                    <ul class="submenu d-none">
                      <li><a href="<?php echo url_for('/') ?>">Home 1</a></li>
                      <li><a href="index-2.html">Home 2</a></li>
                      <li><a href="index-3.html">Home 3</a></li>
                      <li><a href="index-4.html">Home 4</a></li>
                      <li><a href="index-5.html">Home 5</a></li>
                    </ul>
                  </li>
                  <li><a href="#">About</a></li>
                  <li class="has-dropdown d-none">
                    <a href="services.html">Services</a>
                    <ul class="submenu">
                      <li><a href="services.html">Services</a></li>
                      <li><a href="services-details.html">Services Details</a></li>
                    </ul>
                  </li>
                  <li class="has-dropdown d-none">
                    <a href="blog.html">Blog</a>

                    <ul class="submenu">
                      <li><a href="blog.html">Blog</a></li>
                      <li><a href="blog-standard.html">Blog Standard</a></li>
                      <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                  </li>
                  <li class="has-dropdown d-none">
                    <a href="about.html">Pages</a>
                    <ul class="submenu">
                      <li><a href="faq.html">Faq</a></li>
                      <li><a href="portfolio.html">Portfolio</a></li>
                      <li><a href="portfolio-details.html">Portfolio Details</a></li>
                      <li><a href="team.html">Team</a></li>
                      <li><a href="team-details.html">Team Details</a></li>
                      <li><a href="error.html">Error 404</a></li>
                      <li><a href="sign-up.html">Sign Up</a></li>
                      <li><a href="sign-in.html">Sign In</a></li>
                    </ul>
                  </li>
                  <li class="d-none"><a href="#">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-6">
            <div class="header__right text-end d-flex align-items-center justify-content-end">
              <div class="header__right-btn d-none d-md-flex d-xl-block">
                <a href="<?php echo url_for('auth/login') ?>" class="w-btn w-btn-transparent w-btn-transparent-2">login</a>
                <a href="<?php echo url_for('auth/signup') ?>" class="w-btn w-btn-blue w-btn-blue-header ml-30">Get Started</a>
              </div>
              <div class="sidebar__menu d-lg-none">
                <div class="sidebar-toggle-btn sidebar-toggle-btn-2" id="sidebar-toggle">
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- header area end -->