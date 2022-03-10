@extends('layouts.mcsfa.app')

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>Budget Register</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Bill</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box" style="border: 2px solid #3c8dbc">
            <div class="box-body">
                <div class="table-responsive">
                    <table data-page-length='100' class="table table-bordered table-striped getTable">
                        <thead>
                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;font-family:Montserrat">
                                <th style="text-align: center">S/N</th>
                                <th style="text-align: center">Type</th>
                                <th style="text-align: center">Name & Code</th>
                                <th style="text-align: center">Amount</th>
                                <th style="text-align: center">Project</th>
                                <th style="text-align: center">Year</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($getapprovedbudgets as $row)
                            <tr style="font-family:Montserrat">
                                <td style="text-align: center">{{$i}}</td>
                                <td style = "text-align: center"><?= $row->budgettype ?></td>
                                <td style = "text-align: center"><?= $row->budgetname ?><br>(<?= $row->budgetcode ?>)</td>
                                <td style = "text-align: center"><?= number_format($row->budgetamount, 2, '.', ',') ?> BDT</td>
                                <td style = "text-align: center">
                                    <?= $row->project_desc ?> (<?= $row->project_code ?>)
                                </td>
                                <td style = "text-align: center">
                                    <?= $row->budgetyear ?>
                                </td>
                                <td style = "text-align: center">
                                    <a class = "btn btn-o btn-primary" href="{{ URL::to('/')}}/billentry/{{ $row->budgetid }}" data-toggle = "tooltip" title = "View" style = "border-radius:10px;"><i class = "fa fa-credit-card"></i></a>
                                    <a class = "btn btn-o btn-info" href = "<?= URL::to('managebudgetdata' . '/view/' . $row->budgetid) ?>" data-toggle = "tooltip" title = "View" style = "border-radius:10px;"><i class = "fa fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
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
                $("#BudgetModule").addClass('active');
                $("#budgetBill").addClass('active');
            });
        </script>
</div>



@endsection