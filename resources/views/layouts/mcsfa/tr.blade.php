@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
    <section class="content animated fadeInRight">

        <div class="row">
            <div class="box box-primary"><br>
                <a class="btn btn-primary" href="#" style="border-radius:10px;float: right;margin-top:-10px;margin-left: 20px;margin-right: 10px;"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                <div class="panel" style="margin-top:-20px;">
                    <div class="panel-content" style="font-family: Montserrat" id="printarea">
                        <center>
                            <h3 class="box-title" style="font-family: Montserrat;font-weight: bold">Bangladesh Bridge Authority</h3>
                            <h5 class="box-title" style="font-family: Montserrat;font-weight: bold">Srtu Bhaban, Banani, Dhaka</h5>
                            <h4 class="box-title" style="font-family: Montserrat;font-weight: bold">Salary Statement of the month May-2020</h4>
                        </center>
                        <br>
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped" style="font-size:12px; text-transform: capitalize; font-family:Montserrat">
                                <thead style="font-weight: bolder">
                                    <tr style="font-weight:bold;text-transform: capitalize;font-family:Montserrat">
                                        <th style="text-align: center; vertical-align: middle" rowspan="11">Emp No</th>
                                        <th style="text-align: center; vertical-align: middle" rowspan="11">Name & Designation</th>
                                        <th style="text-align: center; vertical-align: middle" rowspan="11">Bsic</th>
                                        <th style="text-align: center" colspan="4">Allowances</th>
                                        <th style="text-align: center; vertical-align: middle" rowspan="11">Total Gross Pay</th>
                                        <th style="text-align: center" colspan="8">Deductions</th>
                                        <th style="text-align: center; vertical-align: middle" rowspan="11">Total Deduction</th>
                                        <th style="text-align: center; vertical-align: middle" rowspan="11">Salary Payable</th>
                                    </tr>
                                    <tr>
                                        <th style="text-transform: lowercase">a)</th>
                                        <th>House Rent</th>
                                        <th style="text-transform: lowercase">k)</th>
                                        <th>Dearness</th>
                                        
                                        <th style="text-transform: lowercase">a)</th>
                                        <th>CPF Fund</th>
                                        <th style="text-transform: lowercase">i)</th>
                                        <th>House Rent</th>
                                        <th style="text-transform: lowercase">a)</th>
                                        <th>Motor Loan</th>
                                        <th style="text-transform: lowercase">a)</th>
                                        <th>Motor Interest</th>
                                    </tr>
                                    <tr>
                                        <th style="text-transform: lowercase">b)</th>
                                        <th>Medical</th>
                                        <th style="text-transform: lowercase">i)</th>
                                        <th>Pension</th>

                                        <th style="text-transform: lowercase">b)</th>
                                        <th>CPF Contrib</th>
                                        <th style="text-transform: lowercase">j)</th>
                                        <th>Telephone Bill</th>
                                        <th style="text-transform: lowercase">b)</th>
                                        <th>House Loan</th>
                                        <th style="text-transform: lowercase">b)</th>
                                        <th>House Inteerst</th>
                                    </tr>
                                    <tr>
                                        <th style="text-transform: lowercase">c)</th>
                                        <th>Tiffin</th>
                                        <th style="text-transform: lowercase">m)</th>
                                        <th>PA Allowance</th>

                                        <th style="text-transform: lowercase">c)</th>
                                        <th>CPF Subscriptn</th>
                                        <th style="text-transform: lowercase">k)</th>
                                        <th>Gas Bill</th>
                                        <th style="text-transform: lowercase">c)</th>
                                        <th>GPE Loan</th>
                                        <th style="text-transform: lowercase">c)</th>
                                        <th>GPF Interest</th>
                                    </tr>
                                    <tr>
                                        <th style="text-transform: lowercase">d)</th>
                                        <th>Washing</th>
                                        <th style="text-transform: lowercase">n)</th>
                                        <th>Deputaion A</th>

                                        <th style="text-transform: lowercase">d)</th>
                                        <th>Welfare Fund</th>
                                        <th style="text-transform: lowercase">i)</th>
                                        <th>Electric Bill</th>
                                        <th style="text-transform: lowercase">d)</th>
                                        <th>CPF Loan</th>
                                        <th style="text-transform: lowercase">d)</th>
                                        <th>CPF Interest</th>
                                    </tr>
                                    <tr>
                                        <th style="text-transform: lowercase">e)</th>
                                        <th>Conveyance</th>
                                        <th style="text-transform: lowercase">o)</th>
                                        <th>Servant A</th>

                                        <th style="text-transform: lowercase">e)</th>
                                        <th>Pention</th>
                                        <th style="text-transform: lowercase">m)</th>
                                        <th>Water Bill</th>
                                        <th style="text-transform: lowercase">e)</th>
                                        <th>Comp. Loan</th>
                                        <th style="text-transform: lowercase">e)</th>
                                        <th>Comp. Interest</th>
                                    </tr>
                                    <tr>
                                        <th style="text-transform: lowercase">f)</th>
                                        <th>Entertainment</th>
                                        <th style="text-transform: lowercase">p)</th>
                                        <th>Mobile Bill</th>

                                        <th style="text-transform: lowercase">f)</th>
                                        <th>Group Ins</th>
                                        <th style="text-transform: lowercase">n)</th>
                                        <th>Swearage</th>
                                        <th style="text-transform: lowercase">f)</th>
                                        <th>Welfare Loan</th>
                                        <th style="text-transform: lowercase">f)</th>
                                        <th>Welfare Interest</th>
                                    </tr>
                                    <tr>
                                        <th style="text-transform: lowercase">g)</th>
                                        <th>Insentive</th>
                                        <th style="text-transform: lowercase">q)</th>
                                        <th>Domestic_Aid</th>

                                        <th style="text-transform: lowercase">g)</th>
                                        <th>Fuel</th>
                                        <th style="text-transform: lowercase">o)</th>
                                        <th>Incime Tax</th>
                                        <th style="text-transform: lowercase">g)</th>
                                        <th>Privil. Off Vehicle</th>
                                        <th style="text-transform: lowercase">g)</th>
                                        <th>Privlg. Off. Vehicle Interest</th>
                                    </tr>
                                    <tr>
                                        <th style="text-transform: lowercase">h)</th>
                                        <th>Charge A</th>
                                        <th style="text-transform: lowercase">r)</th>
                                        <th>Education</th>

                                        <th style="text-transform: lowercase">h)</th>
                                        <th>Car Rent</th>
                                        <th style="text-transform: lowercase">p)</th>
                                        <th>Other Deduct</th>
                                    </tr>
                                    <tr>
                                        <th style="text-transform: lowercase">i)</th>
                                        <th>CPFContrib</th>
                                        <th style="text-transform: lowercase">s)</th>
                                        <th>Privig. Off Vehicle</th>

                                        <th style="text-transform: lowercase">i)</th>
                                        <th>Service Charge</th>
                                        <th style="text-transform: lowercase">q)</th>
                                        <th>Revenue Stamp</th>
                                    </tr>
                                    <tr>
                                        <th style="text-transform: lowercase">j)</th>
                                        <th>Telephone</th>
                                        <th style="text-transform: lowercase">t)</th>
                                        <th>Others A</th>
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