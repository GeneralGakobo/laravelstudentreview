
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
   Sign Up
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href={{ asset("css/nucleo-icons.css")}} rel="stylesheet" />
  <link href={{ asset("css/nucleo-svg.css")}} rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href={{ asset("css/material-dashboard.css?v=3.0.0")}} rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
             
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url({{ asset('img/signup.jpg')}}); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
              <div class="card-header">
                  <h4 class="font-weight-bolder">{{ __('Register') }}</h4>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
                <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                        <div class="form-group row">
                      
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for=""><strong>First Name</strong></label>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="col-sm-6">
                            <label for=""><strong>Last Name</strong></label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for=""><strong>Registration No</strong></label>
                             <input type="text" class="form-control form-control-user" id="reg_no" name="reg_no"
                                    placeholder="Registration Number" required>
                        </div>
                        
                        <input type="hidden" value="4" name="user_type_id">
                      
                            <div class="col-sm-6" >
                            <label for=""><strong>Select Course</strong></label>
                                <select name="course_id" class="form-control">
                                    <option value=''>--Select Course--</option>
                                    <?php
                                    $major = DB::table('courses')->select('courses.*')->get();
                                    foreach($major as $key => $value){
                                    echo "<option value='$value->id'>$value->course_name</option>";
                                    }
                                    ?>
                                </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for=""><strong>Select Study Year</strong></label>
                            <select name="study_year_id" class="form-control">
                                <option value=''>--Select Study Year--</option>
                                <?php
                                    $major = DB::table('study_years')->select('study_years.*')->get();
                                    foreach($major as $key => $value){
                                    echo "<option value='$value->id'>$value->study_year</option>";
                                    }
                                    ?>
                            </select>
                            </div>
                            <div class="col-sm-6" >
                            <label for=""><strong>Select Gender</strong></label>
                                <select name="gender" class="form-control">
                                    <option value=''>--Select Gender--</option>2
                                    <option value="male">MALE</option>
                                    <option value="female">FEMALE</option>
                                  
                                </select>
                                </div>
                        </div>
                        <div class="form-group">
                        <label for=""><strong>Phone No</strong></label>
                            <input type="tel" name="mobile" class="form-control" id="exampleInputPhone"
                                placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                        <label for=""><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Email Address">
                        </div>
                       
                       
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for=""><strong>Password</strong></label>
                                <input type="password" name="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Password">
                            </div>
                            <div class="col-sm-6">
                            <label for=""><strong>Repeat Password</strong></label>
                                <input type="password" name="repeat_password" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Repeat Password">
                            </div>
                        </div>
                        <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                       
                        
                        <hr>
                      
                    </form>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src={{ asset("js/popper.min.js")}}></script>
  <script src={{ asset("js/bootstrap.min.js")}}></script>
  <script src={{ asset("js/perfect-scrollbar.min.js")}}></script>
  <script src={{ asset("js/smooth-scrollbar.min.js")}}></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src={{ asset("js/material-dashboard.min.js?v=3.0.0")}}></script>

</body>

</html>


