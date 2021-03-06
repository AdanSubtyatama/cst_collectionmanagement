<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }} &mdash; CollectionManagement</title>

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
        <link href="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js " />
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body >{{-- class="sidebar-mini" --}}
    <div id="app">
        <div class="main-wrapper">
           @include('layout.header');
            @include('layout.sidebar');
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $title }}</h1>
                    </div>
                    {{ $slot }}
                    
                </section>
            </div>
           @include('layout.footer');
        </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
    
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" defer></script>

{{-- <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js" defer></script> --}}
    {{-- <script src="../assets/js/stisla.js"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
   
</body>

</html>
