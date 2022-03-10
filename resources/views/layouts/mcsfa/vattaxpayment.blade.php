@extends('layouts.mcsfa.app')
@section('content')


<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>Vat and Tax Payment</h1>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-body" style="border: 2px solid #3c8dbc">
            <form method="post" action="{{ route('allowancesaveupdate') }}">
                <input type="hidden" name="taskstatus" value="search">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Office <span style="color: red">*</span></label>
                        <select style="width: 100%" name="employe_id" class="form-control inputnumber getSelect" required="">
                            <option value=""></option>
                            <?php
                            foreach ($offices as $value) {
                                ?>
                                <option name="office_id" value="<?= $value->project_id ?>">
                                    {{ $value->project_desc }}
                                </option>
                             <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Account <span style="color: red">*</span></label>
                        <select style="width: 100%" name="voucher_date" class="form-control inputnumber getSelect" required="">
                            <option value=""></option>
                            <?php
                            foreach ($accounts as $values) {
                                ?>
                                <option name="account_id" value="<?= $values->chaid ?>">
                                    {{ $values->chaid }} =>  {{ $values->acdataname }}
                                </option>
                             <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Voucher Date <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="" name="voucher_date" class="form-control inputtext allDate"  required="">
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
                                <th style="text-align: center">Supplier Code</th>
                                <th style="text-align: center">Supplier Name</th>
                                <th style="text-align: center">Vat/Tax Category</th>
                                <th style="text-align: center">Pain Amount</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach($ as $value)
                            <tr>
                                <td style="text-align: center">{{ $value-> }}</td>
                                <td style="text-align: center">{{$value-> }}</td>
                                <td style="text-align: center">{{$value-> }}</td>
                                <td style="text-align: center">{{ $value-> }}</td>
                                <td style="text-align: center">{{ $value-> }}</td>
                                <td style="text-align: center">
                                    <a href="{{ URL::to('/')}}/allowance/{{$value->}}" class="btn btn-o btn-primary" id="{{$value->allallowanceid}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</a>
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
        </div>
        <script>
            $(document).ready(function () {
                $("#VatTaxPayment").addClass('active');
            });
        </script>
</div>



@endsection