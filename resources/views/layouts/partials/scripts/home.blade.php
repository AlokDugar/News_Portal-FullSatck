<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('assets/vendor/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js -->
<script src="{{ asset('assets/vendor/fonts/feather-icon/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/vendor/fonts/feather-icon/js/feather-icon.js') }}"></script>
<!-- scrollbar js -->
<script src="{{ asset('assets/vendor/libs/scrollbar/js/simplebar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/scrollbar/js/custom.js') }}"></script>
<!-- Sidebar jquery -->
<script src="{{ asset('assets/vendor/libs/pages/config.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/pages/sidebar-menu.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/js/select2-custom.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/datatable/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.autoFill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/custom.js') }}"></script>
<!-- Tooltip init -->
<script src="{{ asset('assets/js/pages/tooltip-init.js') }}"></script>
<!-- Template js -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<!-- DateTime picker JS -->
<script src="{{asset('assets/vendor/libs/datepicker/flatpickr/js/flatpickr.js')}}"></script>
<script src="{{asset('assets/js/pages/datetimepicker.init.js')}}"></script>

<script type="text/javascript">
    var base_url = "{{route('dashboard')}}";
</script>

<script>
    $('div.alert').not('.alert-important').delay(2000).fadeOut(600);
</script>

@stack('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

