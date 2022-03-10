@extends('layouts.mcsfa.app')

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>Bills </h1>
    </section>
    <section class="content animated fadeInRight">
        <div class="box" style="border: 2px solid #3c8dbc">
            <div class="box-body">
                <div class="table-responsive">
                    <table data-page-length='100' class="table table-bordered table-striped getTable">
                        <thead>
                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                <th style="text-align: center">S/N</th>
                                <th style="text-align: center">Bill Date</th>
                                <th style="text-align: center">Budget Name</th>
                                <th style="text-align: center">Budget Amount</th>
                                <th style="text-align: center">Bill Amount</th>
                                <th style="text-align: center">Vat</th>
                                <th style="text-align: center">Tax</th>
                                <th style="text-align: center">Rest Budget</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1
                            @endphp
                            @foreach($getAllBills as $value)
                            <tr>
                                <td style="text-align: center">{{ $i }}</td>
                                <td style="text-align: center">{{ $value->billdate }}</td>
                                <td style="text-align: center">{{ $value->budgetname }}</td>
                                <td style="text-align: center">{{ $value->budget_amount }}</td>
                                <td style="text-align: center">{{ $value->billamount }}</td>
                                <td style="text-align: center">{{ $value->vat }}</td>
                                <td style="text-align: center">{{ $value->tax }}</td>
                                <td style="text-align: center">{{ $value->restbgamount }}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-primary managedata" id="{{$value->bilid}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->bilid}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
                                </td>
                            </tr>
                            @php
                            $i = $i+1
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
                $("#BillManage").addClass('active');
            });
        </script>
</div>



@endsection