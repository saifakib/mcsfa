@extends('layouts.mcsfa.app')

@section('title')
Payble Account Payment
@endsection

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Payble Account Payment</h1>
        </section>
        <section class="content animated fadeInRight">
            <div class="box-body" style="border: 2px solid #3c8dbc">
                <form method="get" action="{{ URL::to('/')}}/payblepaymentsearch">
                    <input type="hidden" name="taskstatus" value="search">
                    <div class="row">
                        <label class="control-label col-md-3"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Office
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="project_code" class="form-control inputnumber" required="">
                                    <option value="">Select Office</option>
                                    @foreach($getProjects as $values)
                                        <option value="{{ $values->project_code }}">
                                            {{ $values->project_desc }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <label class="control-label col-md-3"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Account Code
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select style="width: 100%" name="acc_code" class="form-control inputnumber getSelect" required="">
                                    <option value="">Select Account Code</option>
                                    <?php
                                    foreach ($accounts as $values) {
                                        ?>
                                        <option value="<?= $values->acdatacode ?>">
                                            {{ $values->acdatacode }} =>  {{ $values->acdataname }}
                                        </option>
                                     <?php } ?>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <label class="control-label col-md-3"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Voucher Data
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="" name="v_date" class="form-control inputnumber allDate" placeholder="Enter Date" required="">
                            </div>     
                        </div>
                    </div>
                    <br>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Search</button>
                    </div>   
                </form>
            </div>
            <br>

            <div class="box" style="border: 2px solid #3c8dbc">
                <div class="box-body">
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-bordered table-striped getTable">
                            <thead>
                                <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Code</th>
                                    <th style="text-align: center">Type</th>
                                    <th style="text-align: center">Employee/Supplier</th> 
                                    <th style="text-align: center">Paid Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1
                                @endphp
                                @foreach($getVoucher as $value)
                                <tr>
                                    <td style="text-align: center">{{ $i }}</td>
                                    <td style="text-align: center">{{ $value->accode }}</td>
                                    <td style="text-align: center">{{ $value->paidtype }}</td>
                                    <td style="text-align: center">{{ $value->paidto }}</td>
                                    <td style="text-align: center">{{ $value->debitamount }}</td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
        <script>
            $(document).ready(function () {
                $("#PayableAccount").addClass('active');
            });
        </script>
</div>



@endsection