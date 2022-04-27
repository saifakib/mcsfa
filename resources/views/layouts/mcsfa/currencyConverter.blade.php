@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Currency Converter</h1>
    </section>
    <section class="content animated fadeInRight">
        
            <div class="box-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <label>Amount <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" id="amount" name="amount" value="" class="form-control inputtext"  required="">
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <label>From  <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" id="from" name="from" class="form-control getSelect" required="">
                                    <option value='AUD'>AUD</option>
                                    <option value='BDT'>BDT</option>
                                    <option value='BGN'>BGN</option>
                                    <option value='BRL'>BRL</option>
                                    <option value='CAD'>CAD</option>
                                    <option value='CHF'>CHF</option>
                                    <option value='CNY'>CNY</option>
                                    <option value='CZK'>CZK</option>
                                    <option value='DKK'>DKK</option>
                                    <option value='EUR'>EUR</option>
                                    <option value='GBP'>GBP</option>
                                    <option value='HKD'>HKD</option>
                                    <option value='HRK'>HRK</option>
                                    <option value='HUF'>HUF</option>
                                    <option value='IDR'>IDR</option>
                                    <option value='ILS'>ILS</option>
                                    <option value='INR'>INR</option>
                                    <option value='ISK'>ISK</option>
                                    <option value='JPY'>JPY</option>
                                    <option value='KRW'>KRW</option>
                                    <option value='MXN'>MXN</option>
                                    <option value='MYR'>MYR</option>
                                    <option value='NOK'>NOK</option>
                                    <option value='NZD'>NZD</option>
                                    <option value='PHP'>PHP</option>
                                    <option value='PLN'>PLN</option>
                                    <option value='RON'>RON</option>
                                    <option value='RUB'>RUB</option>
                                    <option value='SEK'>SEK</option>
                                    <option value='SGD'>SGD</option>
                                    <option value='THB'>THB</option>
                                    <option value='TRY'>TRY</option>
                                    <option value='USD'>USD</option>
                                    <option value='ZAR'>ZAR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>To  <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" id="to" name="to" class="form-control getSelect" required="">
                                    <option value='AUD'>AUD</option>
                                    <option value='BDT'>BDT</option>
                                    <option value='BGN'>BGN</option>
                                    <option value='BRL'>BRL</option>
                                    <option value='CAD'>CAD</option>
                                    <option value='CHF'>CHF</option>
                                    <option value='CNY'>CNY</option>
                                    <option value='CZK'>CZK</option>
                                    <option value='DKK'>DKK</option>
                                    <option value='EUR'>EUR</option>
                                    <option value='GBP'>GBP</option>
                                    <option value='HKD'>HKD</option>
                                    <option value='HRK'>HRK</option>
                                    <option value='HUF'>HUF</option>
                                    <option value='IDR'>IDR</option>
                                    <option value='ILS'>ILS</option>
                                    <option value='INR'>INR</option>
                                    <option value='ISK'>ISK</option>
                                    <option value='JPY'>JPY</option>
                                    <option value='KRW'>KRW</option>
                                    <option value='MXN'>MXN</option>
                                    <option value='MYR'>MYR</option>
                                    <option value='NOK'>NOK</option>
                                    <option value='NZD'>NZD</option>
                                    <option value='PHP'>PHP</option>
                                    <option value='PLN'>PLN</option>
                                    <option value='RON'>RON</option>
                                    <option value='RUB'>RUB</option>
                                    <option value='SEK'>SEK</option>
                                    <option value='SGD'>SGD</option>
                                    <option value='THB'>THB</option>
                                    <option value='TRY'>TRY</option>
                                    <option value='USD'>USD</option>
                                    <option value='ZAR'>ZAR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <br>
                    <div style="text-align: center">
                        <button type="submit" id="converter" class="btn btn-primary" style="border-radius: 10px;"><i class="fa fa-save"></i> Converter</button>
                    </div>  
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <label>Convert Amount <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" id="convertamount" name="convertamount" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div> 
            </div>
        <br>
    </section>

    </div>
    <script>
        $(document).ready(function () {
                $(document).on('click', '#converter', function () {
                    var amount = $('#amount').val();
                    var from = $('#from').val();
                    var to = $('#to').val();
                    $.ajax({
                        data: {
                            amount: amount,
                            from: from,
                            to: to
                        },
                        type: "GET",
                        url: "{{URL::to('currencyConverterCH')}}",
                        success: function (data) {
                            $("#convertamount").val(data);
                        },
                        error: function () {
                            alert('Something is wrong !');
                        }
                    });
                });
            });
    </script>
</div>



@endsection