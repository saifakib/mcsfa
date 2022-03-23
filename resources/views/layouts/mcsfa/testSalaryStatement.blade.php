@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
    <section class="content animated fadeInRight">

        <div class="row">
            <div class="box box-primary"><br>
                <a class="btn btn-primary" href="#" style="border-radius:10px;float: right;margin-top:-10px;margin-left: 20px;margin-right: 10px;"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                <div class="panel" style="margin-top:-20px;">
                    <div class="panel-content" style="border: 2px solid #3C8DBC;font-family: Montserrat" id="printarea">
                        <center>
                            <h3 class="box-title" style="font-family: Montserrat;font-weight: bold">Bangladesh Bridge Authority</h3>
                            <h5 class="box-title" style="font-family: Montserrat;font-weight: bold">Srtu Bhaban, Banani, Dhaka</h5>
                            <h4 class="box-title" style="font-family: Montserrat;font-weight: bold">Salary Statement of the month May-2020</h4>
                        </center>
                        <br>
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped" style="font-size:12px;">
                                <thead>
                                    <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: capitalize;font-family:Montserrat">
                                        <th style="text-align: center" rowspan="2">Emp No</th>
                                        <th style="text-align: center" rowspan="2">Name & Designation</th>
                                        <th style="text-align: center" rowspan="2">Bsic</th>
                                        <th style="text-align: center" colspan="4">Allowances</th>
                                        <th style="text-align: center" rowspan="2">Total Gross Pay</th>
                                        <th style="text-align: center" colspan="8">Deductions</th>
                                        <th style="text-align: center" rowspan="2">Total Deduction</th>
                                        <th style="text-align: center" rowspan="2">Salary Payable</th>
                                        <th style="text-align: center" rowspan="2">Employee Signature</th>
                                    </tr>
                                    <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: capitalize;font-family:Montserrat">
                                        <th style="text-transform: capitalize">
                                            <span style="display: block">a)</span>
                                            <span style="display: block">b)</span>
                                            <span style="display: block">c)</span>
                                            <span style="display: block">d)</span>
                                            <span style="display: block">e)</span>
                                            <span style="display: block">f)</span>
                                            <span style="display: block">g)</span>
                                            <span style="display: block">h)</span>
                                            <span style="display: block">i)</span>
                                            <span style="display: block">J)</span>
                                        </th>
                                        <th>
                                            <span style="display: block">House Rent</span>
                                            <span style="display: block">Medical</span>
                                            <span style="display: block">Tiffin</span>
                                            <span style="display: block">Washing</span>
                                            <span style="display: block">Conveyance</span>
                                            <span style="display: block">Entertainment</span>
                                            <span style="display: block">Insentive</span>
                                            <span style="display: block">Charge A</span>
                                            <span style="display: block">CPFContrib</span>
                                            <span style="display: block">Telephone</span>
                                        </th>
                                        <th>
                                            <span style="display: block">k)</span>
                                            <span style="display: block">l)</span>
                                            <span style="display: block">m)</span>
                                            <span style="display: block">n)</span>
                                            <span style="display: block">o)</span>
                                            <span style="display: block">p)</span>
                                            <span style="display: block">q)</span>
                                            <span style="display: block">r)</span>
                                            <span style="display: block">s)</span>
                                            <span style="display: block">t)</span>
                                        </th>
                                        <th>
                                            <span style="display: block">Dearness</span>
                                            <span style="display: block">Pension</span>
                                            <span style="display: block">PA Allowance</span>
                                            <span style="display: block">Deputaion A</span>
                                            <span style="display: block">Servant A</span>
                                            <span style="display: block">Mobile Bill</span>
                                            <span style="display: block">Domestic_Aid</span>
                                            <span style="display: block">Education</span>
                                            <span style="display: block">Privig. Off Vehicle</span>
                                            <span style="display: block">Others A.</span>
                                        </th>
                                        <th>
                                            <span style="display: block">a)</span>
                                            <span style="display: block">b)</span>
                                            <span style="display: block">c)</span>
                                            <span style="display: block">d)</span>
                                            <span style="display: block">e)</span>
                                            <span style="display: block">f)</span>
                                            <span style="display: block">g)</span>
                                            <span style="display: block">h)</span>
                                            <span style="display: block">i)</span>
                                        </th>
                                        <th>
                                            <span style="display: block">GPF Fund</span>
                                            <span style="display: block">CPF Contrib</span>
                                            <span style="display: block">CPF Subscriptn</span>
                                            <span style="display: block">Welfare Fund</span>
                                            <span style="display: block">Pention</span>
                                            <span style="display: block">Group Ins</span>
                                            <span style="display: block">Fuel</span>
                                            <span style="display: block">Car Rent</span>
                                            <span style="display: block">Service Charge</span>
                                        </th>
                                        <th>
                                            <span style="display: block">j)</span>
                                            <span style="display: block">k)</span>
                                            <span style="display: block">l)</span>
                                            <span style="display: block">m)</span>
                                            <span style="display: block">n)</span>
                                            <span style="display: block">o)</span>
                                            <span style="display: block">p)</span>
                                            <span style="display: block">q)</span>
                                            <span style="display: block">r)</span>
                                        </th>
                                        <th>
                                            <span style="display: block">House Rent</span>
                                            <span style="display: block">Telephone Bill</span>
                                            <span style="display: block">Gas Bill</span>
                                            <span style="display: block">Electric Bill</span>
                                            <span style="display: block">Water Bill</span>
                                            <span style="display: block">Swearage</span>
                                            <span style="display: block">Incime Tax</span>
                                            <span style="display: block">Other Deduct</span>
                                            <span style="display: block">Revenue Stamp</span>
                                        </th>
                                        <th>
                                            <span style="display: block">a)</span>
                                            <span style="display: block">b)</span>
                                            <span style="display: block">c)</span>
                                            <span style="display: block">d)</span>
                                            <span style="display: block">e)</span>
                                            <span style="display: block">f)</span>
                                            <span style="display: block">g)</span>
                                        </th>
                                        <th>
                                            <span style="display: block">Motor Loan</span>
                                            <span style="display: block">House Loan</span>
                                            <span style="display: block">GPE Loan</span>
                                            <span style="display: block">CPF Loan</span>
                                            <span style="display: block">Comp. Loan</span>
                                            <span style="display: block">Welfare Loan</span>
                                            <span style="display: block">Privil. Off Vehicle Loan</span>
                                        </th>
                                        <th>
                                            <span style="display: block">a)</span>
                                            <span style="display: block">b)</span>
                                            <span style="display: block">c)</span>
                                            <span style="display: block">d)</span>
                                            <span style="display: block">e)</span>
                                            <span style="display: block">f)</span>
                                            <span style="display: block">g)</span>
                                        </th>
                                        <th>
                                            <span style="display: block">Motor Loan</span>
                                            <span style="display: block">House Loan</span>
                                            <span style="display: block">GPE Loan</span>
                                            <span style="display: block">CPF Loan</span>
                                            <span style="display: block">Comp. Loan</span>
                                            <span style="display: block">Welfare Loan</span>
                                            <span style="display: block">Privil. Off Vehicle Loan</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody> 
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
        <script>
            $(document).ready(function () {
                $("#").addClass('active');
            });
        </script>
</div>



@endsection