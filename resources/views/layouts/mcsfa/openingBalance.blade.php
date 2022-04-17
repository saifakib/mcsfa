@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
    <section class="content animated fadeInRight">

        <div class="row">
            <div class="box box-primary"><br>
                <center><h4 class="box-title" style="font-family:Montserrat;font-weight:bold"> Account opening Balance</h4></center>
                <div class="table-responsive">
                    <table data-page-length='50' class="table table-bordered table-striped getTable" style="font-size:12px;">
                        <thead>
                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;font-family:Montserrat">
                                <th style="text-align: center">Project</th>
                                <th style="text-align: center">Employee</th>
                                <th style="text-align: center">Balance Date</th>
                                <th style="text-align: center">Accounts</th>
                                <th style="text-align: center">Initial Balance</th>
                                <th style="text-align: center">Balance Type</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getopnbalances as $value)
                            <tr>
                                <td style="text-align: center">{{ $value->project_desc }}</td>
                                <td style="text-align: center">{{ $value->employee_name }}</td>
                                <td style="text-align: center">{{ $value->vdate }}</td>
                                <td style="text-align: center">{{ $value->acc_name }}</td>
                                <td style="text-align: center">{{ $value->init_bal }}</td>
                                <td style="text-align: center">{{ $value->bal_type }}</td>

                                <td style="text-align: center">
                                    <a href="{{ URL::to('/')}}/editopeningbalance/{{ $value->opnblnid }}" class="btn btn-o btn-primary" value="edit" style="text-align: center;border-radius: 10px;" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-o btn-danger managedata" id="{{$value->opnblnid}}" value="Delete" style="text-align: center;border-radius: 10px;" title="Delete"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
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
                $(document).on('click', '.managedata', function () {
                    var id = $(this).attr('id');
                    var value = $(this).val();
                        swal({
                            title: "Are you sure ?",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        }, function (isConfirm) {
                            if (isConfirm) {
                                swal(window.location.href = "{{URL::to('/deleteopeningbalance')}}" + '/' + id);
                            } else {
                                swal("Cancelled");
                            }
                        });
                });
            });
    </script>
        <script>
            $(document).ready(function () {
                $("#ServiceInfo").addClass('active');
            });
        </script>
</div>



@endsection