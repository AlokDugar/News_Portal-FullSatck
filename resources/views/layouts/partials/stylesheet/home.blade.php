<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

<link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
<!-- Custom css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
<!-- <link rel="stylesheet" type="text/css" href="assets/css/responsive.css"> -->
<style>
    table.keytable td.focus,
    table.keytable td:focus,
    table.keytable td:active {
        background-color: transparent !important;
        outline: none !important;
        box-shadow: none !important;
    }
</style>
@stack('css')
