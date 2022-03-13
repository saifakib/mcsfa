@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Professional Information</h1>
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
                        <br>
                        <table class="table table-bordered" style="margin-left: 100px">
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Project</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->pproject }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Bank Name</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->bank_name }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Scale</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->pscale }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Employee Type</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->emp_type }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Employee Bank Acc</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->emp_bnk_acc_no }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>House Type</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->h_type }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Present Basic</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->present_basic }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Privious Basic</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->privious_basic }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Amount</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->amount }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Increment Data</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->inc_date }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Increment Rate</b> :</span></td>
                                <td><span style="margin-left: 50px;">{{ $getProfessionalInfo->inc_rate }} </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Quater</b> :</span></td>
                                <td><span style="margin-left: 50px;"><?php if($getProfessionalInfo->quater == 'Y') echo 'YES'; else echo 'No' ?> </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Staff Bus Use</b> :</span></td>
                                <td><span style="margin-left: 50px;"><?php if($getProfessionalInfo->staff_bus_use == 'Y') echo 'YES'; else echo 'No' ?> </span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 100px;"><b>Car Use</b> :</span></td>
                                <td><span style="margin-left: 50px;"><?php if($getProfessionalInfo->car_use == 'Y') echo 'YES'; else echo 'No' ?> </span></td>
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