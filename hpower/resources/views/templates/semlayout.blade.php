<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
         <title>H-POWER GROUP</title>

         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="manifest" href="{{ asset('manifest.json') }}">
        <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">
        <meta name="theme-color" content="#ffffff">
        <meta name="description" content="">
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head> 
<body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
@include('components.semheader')



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
<script>
        url="{{ route("get-result") }}";
        $('input.search').typeahead({
                source:function(value, process){
                        return $.get(url,{value:value},function(data){ 
                                return process(data);
                        });
                }
        });
</script>
</html>