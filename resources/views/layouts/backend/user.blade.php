@include('layouts.backend.header')

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-UserSidebar/>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-UserTopNav/>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Dashboard</h1>
                    </div>

                  <div class="row">
                    @yield('content')
                  </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <x-AppFooter/>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thanking You.</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">We will waiting for you. Come back and let's crack it. Happy Study!!</div>
               
                @if (Auth::guard('web'))
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('user.logout')}}" onclick="event.preventDefault();document.getElementById('logout_form').submit();">Logout</a>
                    <form class="d-none" action="{{route('user.logout')}}" method="POST" id="logout_form">@csrf</form>
                </div>
                
                @elseif (Auth::guard('admin'))
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('admin.logout')}}" onclick="event.preventDefault();document.getElementById('admin_logout_form').submit();">Logout</a>
                    <form class="d-none" action="{{route('admin.logout')}}" method="POST" id="admin_logout_form">@csrf</form>
                </div>

                @else
                The third person is logged in..
                @endif
               

            </div>
        </div>
    </div>
    @include('layouts.backend.footer')