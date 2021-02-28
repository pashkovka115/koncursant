</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
@include('admin.layouts.footer')
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
@include('admin.layouts.right-sidebar')
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/node-waves/node-waves.min.js')}}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js')}}"></script>

@yield('footer')
</body>
</html>
