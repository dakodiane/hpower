<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
         <title>H-POWER GROUP</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
        <link rel="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link  type="text/css" src="{{ asset('js/select.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head> 
<body>
@include('components.header')


@yield('document')


        <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
        <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('vendors/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('js/dataTables.select.min.js')}}"></script>
        <script src="{{asset('js/off-canvas.js')}}"></script>
        <script src="{{asset('js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('js/template.js')}}"></script>
        <script src="{{asset('js/settings.js')}}"></script>
        <script src="{{asset('js/todolist.js')}}"></script>
        <script src="{{asset('js/dashboard.js')}}"></script>
        <script src="{{asset('js/Chart.roundedBarCharts.js')}}"></script>
      
        <script src="{{asset('js/file-upload.js')}}"></script>
        <script src="{{asset('js/typeahead.js')}}"></script>
        <script src="{{asset('js/select2.js')}}"></script>
        
</body>
</html>