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

  .form-select:focus,
  .form-control:focus,
  .btn:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-color: blue;
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

            <div class="sign__form">

              <div class="d-flex justify-content-center" style="min-width: 20px !important">
                <div class="col-11 col-offset-2">
                  <div class="progress mt-3" style="height: 30px">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="font-weight: bold; font-size: 15px" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="card mt-3">
                    <div class="card-body p-4 step">
                      <div class="radio-group row justify-content-between px-3 text-center" style="justify-content: center !important">
                        <div class="col-auto me-sm-2 mx-1 card-block py-0 text-center radio">
                          <div class="opt-icon">
                            <i class="fas fa-user-plus" style="font-size: 80px; margin-left: 25px"></i>
                          </div>
                          <p><b>Add new user</b></p>
                        </div>
                        <div id="suser" class="selected col-auto ms-sm-2 mx-1 card-block py-0 text-center radio">
                          <div class="opt-icon">
                            <i class="fas fa-users" style="font-size: 80px"></i>
                          </div>
                          <p><b>Search existing user</b></p>
                        </div>
                      </div>
                      <div class="searchfield text-center pb-1" style="font-size: 12px">
                        Search for example <b>Gary Hendren</b>
                      </div>
                      <div class="searchfield input-group px-5">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
                        <input id="txt-search" class="form-control" type="text" placeholder="Search" aria-label="Search" />
                      </div>
                      <div id="filter-records" class="mx-5"></div>
                    </div>
                    <div id="userinfo" class="card-body p-4 step" style="display: none">
                      <div class="text-center">
                        <h5 class="card-title font-weight-bold pb-2">
                          User information
                        </h5>
                      </div>

                      <div class="form-group row">
                        <div class="col-6">
                          <label for="fname">First Name<b style="color: #dc3545">*</b></label>
                          <input type="text" name="name" class="form-control" id="fname" required />
                          <div class="invalid-feedback">This field is required</div>
                        </div>
                        <div class="col-6">
                          <label for="lname">Last Name<b style="color: #dc3545">*</b></label>
                          <input type="text" class="form-control" id="lname" required />
                          <div class="invalid-feedback">This field is required</div>
                        </div>
                      </div>
                      <div class="form-group row pt-2">
                        <label for="team" class="control-label col-form-label">Team</label>
                        <div class="col-8">
                          <input type="text" class="form-control" id="team" />
                        </div>
                      </div>
                      <div class="form-group row pt-2">
                        <label for="address" class="control-label col-form-label">Address</label>
                        <div class="col-8">
                          <input type="text" class="form-control" id="address" />
                        </div>
                      </div>
                      <div class="form-group row pt-2">
                        <label for="tel" class="control-label col-form-label">Phone number</label>
                        <div class="col-8">
                          <input type="text" class="form-control" id="tel" />
                        </div>
                      </div>
                      <div class="text-center text-muted">
                        <b style="color: #dc3545">*</b> required fields
                      </div>
                    </div>
                    <div class="card-body p-5 step" style="display: none">Step 3</div>
                    <div class="card-body p-5 step" style="display: none">Step 4</div>
                    <div class="card-body p-5 step" style="display: none">Step 5</div>
                    <div class="card-footer">
                      <button class="action back btn btn-sm btn-outline-warning" style="display: none">
                        Back
                      </button>
                      <button class="action next btn btn-sm btn-outline-secondary float-end" disabled="">
                        Next
                      </button>
                      <button class="action submit btn btn-sm btn-outline-success float-end" style="display: none">
                        Submit
                      </button>
                    </div>
                  </div>
                </div>
              </div>

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
  //your javascript goes here
  var currentTab = 0;
  document.addEventListener("DOMContentLoaded", function(event) {


    showTab(currentTab);

  });

  function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
      // document.getElementById("regForm").submit();
      // return false;
      //alert("sdf");
      document.getElementById("nextprevious").style.display = "none";
      document.getElementById("all-steps").style.display = "none";
      document.getElementById("register").style.display = "none";
      document.getElementById("text-message").style.display = "block";




    }
    showTab(currentTab);
  }

  function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
      if (y[i].value == "") {
        y[i].className += " invalid";
        valid = false;
      }
    }
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid;
  }

  function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
  }
</script>
</body>

</html>