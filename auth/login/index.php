<?php
require_once('../../app/initialize.php');

$page = 'Login';
$page_title = 'R2B | Login';

include(SHARED_PATH . '/header/index.php');
?>

<main>
   <!-- sign up area start -->
   <section class="signup__area po-rel-z1 pt-100 pb-145">
      <div class="sign__shape">
         <img class="man-1" src="<?php echo url_for('assets/img/icon/sign/man-1.png') ?>" alt="">
         <img class="man-2" src="<?php echo url_for('assets/img/icon/sign/man-2.png') ?>" alt="">
         <img class="circle" src="<?php echo url_for('assets/img/icon/sign/circle.png') ?>" alt="">
         <img class="zigzag" src="<?php echo url_for('assets/img/icon/sign/zigzag.png') ?>" alt="">
         <img class="dot" src="<?php echo url_for('assets/img/icon/sign/dot.png') ?>" alt="">
         <img class="bg" src="<?php echo url_for('assets/img/icon/sign/sign-up.png') ?>" alt="">
      </div>

      <div class="container">
         <div class="row">
            <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
               <div class="page__title-wrapper text-center mb-55">
                  <h2 class="page__title-2">Sign in to <br> recharge direct.</h2>
                  <p>it you don't have an account you can <a href="#">Register here!</a></p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
               <div class="sign__wrapper white-bg">
                  <div class="sign__header mb-35">
                     <div class="sign__in text-center">
                        <a href="#" class="sign__social text-start mb-15"><i class="fab fa-facebook-f"></i>Sign in with Facebook</a>
                        <p> <span>........</span> Or, <a href="sign-in.html">sign in</a> with your email<span> ........</span> </p>
                     </div>
                  </div>

                  <div class="toast align-items-center mx-auto mb-4 ajax-response hide" role="alert" aria-live="assertive" aria-atomic="true">
                     <div class="d-flex justify-content-center">
                        <div class="toast-body message"></div>
                     </div>
                  </div>

                  <div class="sign__form">
                     <form id="login">
                        <div class="sign__input-wrapper mb-25">
                           <h5>Email</h5>
                           <div class="sign__input">
                              <input type="text" name="login[email]" placeholder="e-mail address">
                              <i class="fal fa-envelope"></i>
                           </div>
                        </div>
                        <div class="sign__input-wrapper mb-10">
                           <h5>Password</h5>
                           <div class="sign__input">
                              <input type="password" name="login[password]" placeholder="Password">
                              <i class="fal fa-lock"></i>
                           </div>
                        </div>
                        <div class="sign__action d-sm-flex justify-content-between mb-30">
                           <div class="sign__agree d-flex align-items-center">
                              <input class="m-check-input" type="checkbox" id="m-agree">
                              <label class="m-check-label" for="m-agree">Keep me signed in
                              </label>
                           </div>
                           <div class="sign__forgot">
                              <a href="#">Forgot your password?</a>
                           </div>
                        </div>
                        <button class="w-btn w-btn-11 w-100"> <span></span> Sign In</button>
                        <div class="sign__new text-center mt-20">
                           <p>New to Markit? <a href="<?php echo url_for('auth/signup') ?>">Sign Up</a></p>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- sign up area end -->
</main>


<?php include(SHARED_PATH . '/footer/index.php'); ?>

<script>
   $(document).ready(function() {

      const formMessages = $('.ajax-response');
      const form = document.getElementById('login');

      const message = (req, res) => {
         if (req == 'success') {
            const location = window.location.href = 'http://localhost/R2Business/admin/dashboard/';
         } else {
            $(formMessages).removeClass('hide');
            $(formMessages).addClass('bg-danger text-white show');
            $('.message').text(res);

            setTimeout(() => {
               $(formMessages).removeClass('show');
               $(formMessages).addClass('hide');
            }, 3000);
         }
      };

      form.addEventListener('submit', function(e) {
         e.preventDefault();
         const location = window.location.href;
         const formattedFormData = new FormData(form);

         submitForm(`${location}inc/`, formattedFormData);
      });

      const submitForm = async (url, payload) => {
         const data = await fetch(url, {
            method: "POST",
            body: payload,
         });

         const res = await data.json();

         if (res.error) {
            message("error", res.error);
         }

         if (res.message) {
            message("success", res.message);
         }
      };

   })
</script>
</body>

</html>