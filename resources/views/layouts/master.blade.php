<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="/css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="page-wrap">
            @include('elements.header')

            <div class="container">
                @yield('content')
            </div>
        </div>

        @include('elements.footer')

        <script src="/packages/jquery/jquery-2.2.3.min.js"></script>
        <script src="/packages/bootstrap/js/bootstrap.min.js"></script>
        <script src="/packages/ckeditor/ckeditor.js"></script>

        <script type="text/javascript">
            baseUrl = <?php echo json_encode(url('/')); ?>;
        </script>
        @yield('script')
    </body>
</html>
