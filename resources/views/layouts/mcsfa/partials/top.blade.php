
<!DOCTYPE html>
<html lang="eng"
      <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="http://192.168.3.8:8081/fa/public/images/favicon.ico">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/animate.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/mainstyle.min.css">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/all-skins.min.css">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/jquery-ui.css">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/sweetalert.css">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/select2.min.css">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/scrolltop.css">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/responsivestyle.css">
    <link rel="stylesheet" href="http://192.168.3.8:8081/fa/public/css/toastr.css">
    <style>
        /* Montserrat */
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: url('http://192.168.3.8:8081/fa/public/fonts/Montserrat-Regular.ttf');
        }

        .form-control {
            height: 40px;
        }
        .select2-container--default .select2-selection--single {
            border-radius: 10px;
            border: 1px solid #3c8dbc;
            height: 40px;
        }
        div.dataTables_wrapper div.dataTables_length select{
            width: 75px;
            display: inline-block;
            border: 1px solid #3c8dbc;
        }
        div.dataTables_wrapper div.dataTables_filter input{
            margin-left: 0.5em;
            display: inline-block;
            width: auto;
            border: 1px solid #3c8dbc;
        }
        /*            .inputbody::placeholder{
                        color: #fff;
                        font-size:18px;
                    }*/
        .form-control option {
            font-size: 16px;
        }
        .tableborder{
            border: 2px solid #3c8dbc;
        }
        .tableheader{
            background:#3c8dbc;
            color:#fff;
            font-weight:bold;
            text-transform: uppercase;
        }
        .inputtext{
            border-radius:10px;
            border:1px solid #3c8dbc;
            text-transform: capitalize
        }
        .inputnumber{
            border-radius:10px;
            border:1px solid #3c8dbc;
        }
    </style>
    <script src="http://192.168.3.8:8081/fa/public/js/jquery.min.js"></script>
    @stack('css')
</head>