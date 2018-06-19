<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
@include('includes/head')

<body>

@include('includes/nav')

<!-- Main jumbotron for a primary marketing message or call to action -->
@include('includes/header')

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        @yield('content')
    </div>

    @include('includes/footer')
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>
<script src="{!! asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/custom.js') !!}"></script>
<script src="{!! asset('js/slider.js') !!}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{!! asset('js/ie10-viewport-bug-workaround.js') !!}"></script>
</body>
</html>
