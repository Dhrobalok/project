
    @stack('js')
    <script src="{{asset('assets/js/dashmix.core.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/dashmix.app.min.js')}}"></script> --}}
    <script src="{{asset('assets/js/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/pages/be_pages_dashboard.min.js')}}"></script> --}}
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/be_tables_datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/es6-promise/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/be_comp_dialogs.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script src = "{{ asset('assets/js/tabledit.min.js') }}"></script>
    <script src = "{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src = "{{ asset('assets/js/plugins/canvasjs.min.js') }}"></script>
    <script src = "{{ asset('js/ajax_crud_table_module.js') }}"></script>
    <script src = "{{ asset('js/script.js') }}"></script>


    {{-- <script>jQuery(function () { Dashmix.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'pw-strength']); });</script> --}}
    <script>
      function showSuccessWindow(message)
      {
          $('#message').text(message);
          $('#success').modal('show');
      }
    </script>