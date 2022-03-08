<!DOCTYPE html>
<html lang="eng"
      <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') || BBA F&A</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}images/favicon.ico">
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/animate.css">
    <link rel="stylesheet" href="{{asset('/')}}css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/mainstyle.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/all-skins.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('/')}}css/sweetalert.css">
    <link rel="stylesheet" href="{{asset('/')}}css/select2.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/scrolltop.css">
    <link rel="stylesheet" href="{{asset('/')}}css/responsivestyle.css">
    <link rel="stylesheet" href="{{asset('/')}}css/toastr.css">
    <style>
        /* Montserrat */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: url('{{asset("/")}}fonts/Montserrat-Regular.ttf');
        }
        .form-control {
            height: 40px;
        }
        .select2-container--default .select2-selection--single {
            border-radius: 10px;
            border: 1px solid #3C8DBC;
            height: 40px;
        }
        div.dataTables_wrapper div.dataTables_length select{
            width: 75px;
            display: inline-block;
            border: 1px solid #3C8DBC;
        }
        div.dataTables_wrapper div.dataTables_filter input{
            margin-left: 0.5em;
            display: inline-block;
            width: auto;
            border: 1px solid #3C8DBC;
        }
        /*            .inputbody::placeholder{
                        color: #fff;
                        font-size:18px;
                    }*/
        .form-control option {
            font-size: 16px;
        }
        .tableborder{
            border: 2px solid #3C8DBC;
        }
        .tableheader{
            background:#3c8dbc;
            color:#fff;
            font-weight:bold;
            text-transform: uppercase;
        }
        .inputtext{
            border-radius:10px;
            border:1px solid #3C8DBC;
            text-transform: capitalize
        }
        .inputnumber{
            border-radius:10px;
            border:1px solid #3C8DBC;
        }
    </style>
    <script src="{{asset('/')}}js/jquery.min.js"></script>
</head>