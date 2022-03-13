@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
        <section class="content-header">
            <center><h3>Professional Info Details</h3></center>
            <button class="btn btn-primary btn-o" onclick="printDi('printarea')" style="float: right;margin-top:-50px;border-radius: 10px;margin-left: 10px"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
        </section>
    <section class="content animated fadeInRight">
        <div class="box" style="border: 2px solid #3c8dbc">
            <div class="box-body">
                <div id="printarea">
                    <div class="row">
                        <br>
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="font-size:15px;">
                                <thead>
                                    <tr style="background:#3c8dbc;color:#fff;;text-transform: capitalize">
                                        <th style="text-align: center" colspan="9">Reports</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td><span style="font-weight: bold">PROJECT</span></td>
                                        <td style="">{{ $getProfessionalInfo->pproject }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><span style="font-weight: bold">BANK NAME</span></td>
                                        <td style="">{{ $getProfessionalInfo->bank_name }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><span style="font-weight: bold">SCALE</span></td>
                                        <td style="">{{ $getProfessionalInfo->pscale }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><span style="font-weight: bold">EMPLOYEE TYPE</span></td>
                                        <td style="">{{ $getProfessionalInfo->emp_type }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><span style="font-weight: bold">EMPLOYEE BANK ACC</span></td>
                                        <td style="">{{ $getProfessionalInfo->emp_bnk_acc_no }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><span style="font-weight: bold">HOUSE TYPE</span></td>
                                        <td style="">{{ $getProfessionalInfo->h_type }}</td>
                                    </tr>
                                    <br>
                                    <tr>
                                        <td style="text-align: center" colspan="3" rowspan="1"><span style="font-weight: bold">OTHERS INFORMATION </span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center">PRESENT BASIC</th>
                                                        <th style="text-align: center">PRIVIOUS BASIC</th>
                                                        <th style="text-align: center">AMOUNT</th>
                                                        <th style="text-align: center">TIN NO</th>
                                                        <th style="text-align: center">INCREMENT DATE</th>
                                                        <th style="text-align: center">INCREMENT RATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center">{{ $getProfessionalInfo->present_basic }}</td>
                                                        <td  style="text-align: center">{{ $getProfessionalInfo->privious_basic }}</td>
                                                        <td style="text-align: center">{{ $getProfessionalInfo->amount }}</td>
                                                        <td style="text-align: center"> {{ $getProfessionalInfo->tin_no }}</td>
                                                        <td style="text-align: center">{{ $getProfessionalInfo->inc_date }}</td>
                                                        <td style="text-align: center">{{ $getProfessionalInfo->inc_rate }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center">QUATER</th>
                                                        <th style="text-align: center">STAFF BUS USE</th>
                                                        <th style="text-align: center">CAR USE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center"><?php if($getProfessionalInfo->quater == 'Y') echo 'YES'; else echo 'No' ?></td>
                                                        <td  style="text-align: center"><?php if($getProfessionalInfo->staff_bus_use == 'Y') echo 'YES'; else echo 'No' ?></td>
                                                        <td style="text-align: center"><?php if($getProfessionalInfo->car_use == 'Y') echo 'YES'; else echo 'No' ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
            $("#ProfessionalInfo").addClass('active');
        });
    </script>
</div>



@endsection