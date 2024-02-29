<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{config('dcs.template.app_name')}}</title>
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset(config('dcs.template.app_logo'))}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
        rel="stylesheet">

    {{--    Styles --}}
    @include('template::layouts.assets._styles')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            @yield('page-content')
        </div>
    </div>
</div>
<!-- END: Content-->

{{-- Modal --}}
@include('template::layouts._modal')

<!-- BEGIN: Footer-->
@include('template::layouts.footer._footer')
<!-- END: Footer-->

{{--Scripts--}}
@include('template::layouts.assets._scripts')
</body>
<!-- END: Body-->

</html>
