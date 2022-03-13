@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Personal Information</h1>
    </section>
    <div class="content animated fadeInRight"><br><br>
        <div class="row">
            <div class="col-md-12">
                <button class="btn" onclick="window.history.back()" style="border-radius:10px;float: left;margin-top:-10px;margin-left: 10px;background:#000;color: #fff"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                <button class="btn btn-primary" onclick="printDi('printarea')" style="border-radius:10px;float: right;margin-top:-10px;margin-left: 20px;margin-right: 10px;"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                <div class="panel" style="margin-top:-20px;">
                    <div class="panel-content" style="border: 2px solid #3C8DBC;font-family: Montserrat" id="printarea">
                        <center>
                            <h3 style="font-family: Montserrat;font-weight: bold">Bangladesh Bridge Authority</h3>
                            <h5 style="font-family: Montserrat;font-weight: bold">Setu Bhaban, Banani, Dhaka</h5><br>
                            <h4 style="font-family: Montserrat;font-weight: bold">HR Personal Information</h4>
                        </center>
                        <table class="table table-bordered" style="margin-left: 100px">
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Name</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $employee['name_english']}} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Father Name</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $employee['fater_englih']}} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Mother Name</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $employee['fater_englih']}} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Birth Date</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $employee['date_birth']}} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Gender</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $employee['gender']}} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Religion</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $employee['religion']}} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Present Address</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $employee['present_adress_adress']}} {{ $employee['present_adress_upazilla']}} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Permanent Address</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $employee['permanent_adress_adress']}} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Nationality</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $employee['nationality']}} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Phone No</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $employee['mobile_phone']}} </span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        function printDi(printarea) {
            var printContents = document.getElementById(printarea).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    <script>
        $(document).ready(function () {
            $("#PersonalInfo").addClass('active');
        });
    </script>
</div>



@endsection