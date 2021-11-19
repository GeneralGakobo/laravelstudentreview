@extends('layouts.app')
@section('title', 'Add Admin')
@section('page-title', 'Add Admin')

@section('content')
@if(Session::has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ Session::get('success') }}</strong>
  <button type="button" style="float:right;" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<a href="/admin"><button class="btn btn-primary btn-small">VIEW</button></a>

<div class="card-body">
                <form method="POST" action={{ route('add-admin') }} enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                      
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for=""><strong>Name</strong></label>
                                <input type="text" name="name" class="form-control" placeholder="name" required>
                            </div>
                            <div class="col-sm-6">
                            <label for=""><strong>Email</strong></label>
                                <input type="text" class="form-control" name="email" placeholder="email" required>
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
   
  </main>
  @endsection
  @section('scripts')
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



@endsection

    
    

