  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- App JavaScript-->
  <script src="{{asset('/js/app.js')}}"></script>

  <!-- DataTables JavaScript-->
  <script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Individual Scripts -->
  @yield('scripts')
