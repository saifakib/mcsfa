@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
    <section class="content animated fadeInRight">

        <div class="row">
            <div class="box box-primary"><br>
                <a class="btn btn-primary" href="{{ URL::to('/') }}/fdrStatementReport-pdf" style="border-radius:10px;float: right;margin-top:-10px;margin-left: 20px;margin-right: 10px;"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                <div class="panel" style="margin-top:-20px;">
                    <div class="panel-content" style="border: 2px solid #3C8DBC;font-family: Montserrat" id="printarea">
                        <center>
                            <h3 class="box-title" style="font-family: Montserrat;font-weight: bold">Bangladesh Bridge Authority</h3>
                            <h4 class="box-title" style="font-family: Montserrat;font-weight: bold">FDR Statement</h4>
                        </center>
                        <br>
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped" style="font-size:12px;">
                                <thead>
                                    <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;font-family:Montserrat">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th colspan="2"></th>
                                        <th colspan="2"></th>
                                        <th></th>
                                        <th colspan="7" style="text-align: center">Interest</th>
                                        <th></th>
                                    </tr>
                                    <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;font-family:Montserrat">
                                        <th rowspan="2" style="text-align: center">Branch Name</th>
                                        <th rowspan="2" style="text-align: center; padding-left: 30px;padding-right: 30px;">FDR Name & Id</th>
                                        <th rowspan="2" style="text-align: center">FDR Number/Account</th>
                                        <th colspan="2" style="text-align: center">Opening</th>
                                        <th colspan="2" style="text-align: center">Renewal</th>
                                        <th rowspan="2" style="text-align: center">Maturity Date</th>
                                        <th rowspan="2" style="text-align: center">Interest Rate</th>
                                        <th rowspan="2" style="text-align: center">Gross Interest</th>
                                        <th colspan="4" style="text-align: center">Deduction</th>
                                        <th rowspan="2" style="text-align: center">Net Interest</th>
                                        <th rowspan="2" style="text-align: center">Net Amount(Principle + Net Interest)</th>
                                    </tr>
                                    <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;font-family:Montserrat">
                                        <th style="text-align: center; padding-left: 30px;padding-right: 30px;">Date</th>
                                        <th style="text-align: center">Principle</th>
                                        <th style="text-align: center; padding-left: 30px;padding-right: 30px;">Date</th>
                                        <th style="text-align: center">Principle</th>
                                        <th style="text-align: center">AIT</th>
                                        <th style="text-align: center">Circuler</th>
                                        <th style="text-align: center">Excise Duty</th>
                                        <th style="text-align: center">Total Deduction</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                @foreach($getfdrbankinfo as $bvalue)
                                    <h3>Bank Name: {{$bvalue->bankname}}</h3>
                                    @php
                                    $getfdrinfo=DB::table('FA_FDRINFO')->orderBy('branchname','asc')->where('bankname',$bvalue->bankname)->get();
                                    @endphp
                                        @foreach($getfdrinfo as $value)
                                        <tr>
                                            <td style="text-align: center">{{ $value->branchname }}</td>
                                            <td style="text-align: center">{{ $value->fdr_name }} - {{ $value->fdr_id }}</td>
                                            <td style="text-align: center">{{ $value->fdr_number }}</td>
                                            <td style="text-align: center">{{ $value->opening_date }}</td>
                                            <td style="text-align: center">{{ $value->start_amount }}</td>
                                            <td style="text-align: center">{{ $value->renewal_date }}</td>
                                            <td style="text-align: center">{{ $value->renewal_amount }}</td>
                                            <td style="text-align: center">{{ $value->maturity_date }}</td>
                                            <td style="text-align: center">{{ $value->interest_rate }}</td>
                                            <?php 
                                                $gross = (($value->renewal_amount / 100) * $value->interest_rate) + $value->renewal_amount;
                                                $total_deduction = $value->tax_rate + $value->excise_duty; 
                                                $net_interest = $gross - $total_deduction;
                                                $net_amount = $value->renewal_amount + $net_interest;
                                            ?>
                                            <td style="text-align: center">{{ $gross }}</td>
                                            <td style="text-align: center">{{ $value->tax_rate }}</td>
                                            <td style="text-align: center"></td>
                                            <td style="text-align: center">{{ $value->excise_duty }}</td>
                                            <td style="text-align: center">{{ $total_deduction }}</td>
                                            <td style="text-align: center">{{ $net_interest }}</td>
                                            <td style="text-align: center">{{ $net_amount }}</td>
                                        </tr>
                                        @endforeach
                                @endforeach
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
                $("#ServiceInfo").addClass('active');
            });
        </script>
</div>



@endsection