@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Increment Information</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Increment Info</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid rgb(60, 141, 188)">
                        <form method="post" action="{{ route('incrementinfosaveupdate') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Increment Date <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="increment_date" class="form-control inputtext allDate"  required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Increment Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="increment_amount" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div style="text-align: center">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Add</button>
                            </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="box" style="border: 2px solid #3c8dbc">
            <div class="box-body">
                <div class="table-responsive">
                    <table data-page-length='100' class="table table-bordered table-striped getTable">
                        <thead>
                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                <th style="text-align: center">Increment No</th>
                                <th style="text-align: center">Increment Date</th>
                                <th style="text-align: center">Increment Amount</th>
                                <th style="text-align: center">Year Month</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getincrementinfo as $value)
                            <tr>
                                <td style="text-align: center">{{ $value->incrementid }}</td>
                                <td style="text-align: center">{{ $value->increment_date }}</td>
                                <td style="text-align: center">{{ $value->increment_amount }}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-primary managedata" id="{{$value->incrementid}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->incrementid}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
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
    <div class="modal fade" id="updateModal">
        <div class="modal-dialog">
            <div class="modal-content" style="border:5px solid #3C8DBC">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title text-center">Update Deduction Info</h3>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('incrementinfosaveupdate') }}">
                        @csrf
                        <input type="hidden" name="taskstatus" value="update">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Increment Date <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="" name="increment_date" id="setincrement_date" class="form-control inputtext allDate"  required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Increment Amount <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="number" name="increment_amount" id="setincrement_amount" class="form-control inputtext"  required="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Update</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.managedata', function () {
                var id = $(this).attr('id');
                var value = $(this).val();
                if (value === 'edit') {
                    $.get('<?= URL::to("editincrementinfo") ?>/' + id, function (data) {
                        $('#setdataid').val(data.incrementid);
                        $('#setincrement_date').val(data.increment_date);
                        $('#setincrement_amount').val(data.increment_amount);
                        $('#updateModal').modal('show');
                    });
                } else {
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
                            swal(window.location.href = "{{URL::to('/deleteincrementinfo')}}" + '/' + id);
                        } else {
                            swal("Cancelled");
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#IncrementInfo").addClass('active');
        });
    </script>
</div>



@endsection