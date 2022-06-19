<?php
require_once('../../app/initialize.php');

$page = 'Signup';
$page_title = 'R2B | Signup';

include(SHARED_PATH . '/header/index.php');
?>

<style>
  .sign__wrapper {
    padding: 30px 30px;
  }
</style>
<main>
  <!-- sign up area start -->
  <section class="signup__area po-rel-z1 pt-100 pb-145">
    <div class="sign__shape">
      <img class="man-1" src="<?php echo url_for('assets/img/icon/sign/man-3.png') ?>" alt="">
      <img class="man-2 man-22" src="<?php echo url_for('assets/img/icon/sign/man-2.png') ?>" alt="">
      <img class="circle" src="<?php echo url_for('assets/img/icon/sign/circle.png') ?>" alt="">
      <img class="zigzag" src="<?php echo url_for('assets/img/icon/sign/zigzag.png') ?>" alt="">
      <img class="dot" src="<?php echo url_for('assets/img/icon/sign/dot.png') ?>" alt="">
      <img class="bg" src="<?php echo url_for('assets/img/icon/sign/sign-up.png') ?>" alt="">
      <img class="flower" src="<?php echo url_for('assets/img/icon/sign/flower.png') ?>" alt="">
    </div>

    <div class="container">
      <div class="row">
        <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
          <div class="page__title-wrapper text-center mb-55">
            <h2 class="page__title-2">Create a free <br> Account</h2>
            <p>I'm a subhead that goes with a story.</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
          <div class="sign__wrapper white-bg">
            <div class="sign__header mb-35">
              <div class="sign__in text-center">
                <a href="#" class="sign__social g-plus text-start mb-15"><i class="fab fa-google-plus-g"></i>Sign Up with Google</a>
                <p> <span>........</span> Or, <a href="sign-up.html">sign up</a> with your email<span> ........</span> </p>
              </div>
            </div>


            <div class="toast align-items-center mx-auto mb-4 ajax-response hide" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex justify-content-center">
                <div class="toast-body message"></div>
              </div>
            </div>


            <div class="sign__form">
              <form id="register">
                <div class="row">
                  <div class="col-md-6">
                    <div class="sign__input-wrapper mb-25">
                      <h5>First Name</h5>
                      <div class="sign__input">
                        <input type="text" name="reg[first_name]" placeholder="First Name">
                        <i class="fal fa-user"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="sign__input-wrapper mb-25">
                      <h5>Last Name</h5>
                      <div class="sign__input">
                        <input type="text" name="reg[last_name]" placeholder="Last Name">
                        <i class="fal fa-user"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="sign__input-wrapper mb-25">
                      <h5>Email</h5>
                      <div class="sign__input">
                        <input type="email" name="reg[email]" placeholder="e-mail address">
                        <i class="fal fa-envelope"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="sign__input-wrapper mb-25">
                      <h5>Phone number</h5>
                      <div class="sign__input">
                        <input type="tel" name="reg[phone]" placeholder="Phone number">
                        <i class="fal fa-phone"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="sign__input-wrapper mb-25">
                      <h5>Password</h5>
                      <div class="sign__input">
                        <input type="password" name="reg[password]" placeholder="Password">
                        <i class="fal fa-lock"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="sign__input-wrapper mb-10">
                      <h5>Re-Password</h5>
                      <div class="sign__input">
                        <input type="password" name="reg[confirm_password]" placeholder="Re-Password">
                        <i class="fal fa-lock"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <button type="submit" class="w-btn w-btn-11 w-100"> <span></span> Next</button>

                  </div>


                </div>

                <!-- <div class="sign__action d-flex justify-content-between mb-30">
                  <div class="sign__agree d-flex align-items-center">
                    <input class="m-check-input" type="checkbox" id="m-agree">
                    <label class="m-check-label" for="m-agree">I agree to the <a href="#">Terms & Conditions</a>
                    </label>
                  </div>
                </div>

                <button class="w-btn w-btn-11 w-100"> <span></span> Sign Up</button> -->

                <div class="sign__new text-center mt-20">
                  <p>Already in Markit ? <a href="sign-in.html"> Sign In</a></p>
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

<div aria-live="polite" aria-atomic="true" class="position-relative">
  <!-- Position it: -->
  <!-- - `.toast-container` for spacing between toasts -->
  <!-- - `.position-absolute`, `top-0` & `end-0` to position the toasts in the upper right corner -->
  <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
  <div class="toast-container position-absolute bottom-0 end-0 p-3">

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="..." class="rounded me-2" alt="...">
        <strong class="me-auto">Bootstrap</strong>
        <small class="text-muted">2 seconds ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Heads up, toasts will stack automatically
      </div>
    </div>
  </div>
</div>




<?php include(SHARED_PATH . '/footer/index.php'); ?>

<script>
  $(document).ready(function() {

    const formMessages = $('.ajax-response');
    const form = document.getElementById('register');

    const message = (req, res) => {
      if (req == 'success') {
        $(formMessages).removeClass('hide');
        $(formMessages).addClass('bg-success text-white show');
        $('.message').text(res.message);

        setTimeout(() => {
          $(formMessages).removeClass('show');
          $(formMessages).addClass('hide');
          const location = window.location.href = 'http://localhost/R2Business/auth/login/';
        }, 3000);


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

      submitForm(`${location}inc/create/`, formattedFormData);
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