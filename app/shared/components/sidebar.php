<!-- sidebar area start -->
<div class="sidebar__area">
  <div class="sidebar__wrapper">
    <div class="sidebar__close">
      <button class="sidebar__close-btn" id="sidebar__close-btn">
        <span><i class="fal fa-times"></i></span>
        <span>close</span>
      </button>
    </div>
    <div class="sidebar__content">
      <div class="logo mb-40">
        <a href="index.html">
          <h1>R2I</h1>
        </a>
      </div>
      <div class="mobile-menu mobile-menu-2"></div>
      <div class="sidebar__info mt-350">
        <a href="<?php echo url_for('auth/login') ?>" class="w-btn w-btn-blue-2 w-btn-4 d-block mb-15 mt-15">login</a>
        <a href="<?php echo url_for('auth/signup') ?>" class="w-btn w-btn-blue d-block">sign up</a>
      </div>
    </div>
  </div>
</div>
<!-- sidebar area end -->

<div class="body-overlay"></div>