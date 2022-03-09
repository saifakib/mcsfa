@extends('layouts.mcsfa.app')

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>Loan Schedule</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Loan Schedule</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid #3c8dbc">
                        <form method="post" action="">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Install Schedule <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="install_schedule" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Install Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="install_amount" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Recovery_month <span style="color: red">*</span></label>
                                    <select name="recovery_month" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="2022/01">2022/01</option>
                                        <option value="2022/02">2022/02</option>
                                        <option value="2022/03">2022/03</option>
                                        <option value="2022/04">2022/04</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Recovery Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="recovery_amount" class="form-control inputnumber" required="">
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
        <div class="box" style="border: 2px solid #3c8dbc">
            <div class="box-body">
                <div class="table-responsive">
                    <table data-page-length='100' class="table table-bordered table-striped getTable">
                        <thead>
                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                <th style="text-align: center">Install Serial</th>
                                <th style="text-align: center">Install Amount</th>
                                <th style="text-align: center">Recovery Amount</th>
                                <th style="text-align: center">Recovery Month</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                            $i = 1
                            @endphp
                            @foreach($ as $value)
                            <tr>
                                <td style="text-align: center">{{ $value->install_serial}}</td>
                                <td style="text-align: center">{{ $value->install_amount }}</td>
                                <td style="text-align: center">{{ $value->recovery_amount}}</td>
                                <td style="text-align: center">{{ $value->recovery_amount }}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-primary managedata" id="{{$value->loanscheduleid}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->loanscheduleid}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
                                </td>
                            </tr>
                            @php
                                $i++;
                                @endphp
                                @endforeach --}}
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
                        <form method="post" action="{{route('saveupdatehouse')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="taskstatus" value="update">
                            <input type="hidden" name="dataid" id="setdataid">
                            <br>
                            <div style="text-align: center">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" id="submeetButton" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Update</button>
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
                        $.get('<?= URL::to("getloanschedule") ?>/' + id, function (data) {
                            $('#setdataid').val(data.loanscheduleid);
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
                                swal(window.location.href = "{{URL::to('/delete')}}" + '/' + id);
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
                $("#LoanManagePanel").addClass('active');
                $("#LoanSchedule").addClass('active');
            });
        </script>
</div>



@endsection