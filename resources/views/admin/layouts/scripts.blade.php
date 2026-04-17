<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/plugins/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/plugins/peity/jquery.peity.min.js') }}"></script>

<script>
    $(".data-attributes span").peity("donut")
</script>

<script src="{{ asset('admin/js/main.js') }}"></script>

<script>
    new PerfectScrollbar(".user-list")
</script>

@stack('scripts')