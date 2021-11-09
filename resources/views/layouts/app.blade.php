@include('layouts.header')
@include('layouts.topnav')


    <!-- Content Row -->
          <!-- Begin Page Content -->
          <div class="container-fluid py-4">
            

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">@yield('page-title')</h1>
            @yield('content')

          </div>
          </main>
          
          
          
          <!-- /.container-fluid -->
  
        </div>
        <!-- End of Main Content -->

 @include('layouts.footer');