@extends('layouts.mcsfa.app')

{{-- @extends('mainpage')
@section('title',$title) --}}

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>List of Deduction</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Deduction</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid #3c8dbc">
                        <form method="post" action="{{ route('saveupdatededuction') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Deduction Code <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="deduction_code" class="form-control inputnumber" placeholder="Enter Deduction Code" required="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label>Title <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control inputnumber" placeholder="Enter Title" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label> Account <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="account" class="form-control inputtext" placeholder="Enter Account Name" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label> Interest <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="inst_acc" class="form-control inputtext" placeholder="Enter Interest" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Deputation Account <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="dep_acct" class="form-control inputnumber" placeholder="Enter Deduction Account" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label> Deputation Interest Acc<span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="dept_inst_acc" class="form-control inputtext" placeholder="Enter Deduction Account Interest" required="">
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
                                <th style="text-align: center">Code</th>
                                <th style="text-align: center">Title</th>
                                <th style="text-align: center">Account</th>
                                <th style="text-align: center">Interest</th>
                                <th style="text-align: center">Deduction Account</th>
                                <th style="text-align: center">Deduction Interest Acc</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1
                            @endphp
                            @foreach($getdeduction as $value)
                            <tr>
                                <td style="text-align: center">{{ $value->deduction_code}}</td>
                                <td style="text-align: center">{{ $value->title }}</td>
                                <td style="text-align: center">{{ $value->account}}</td>
                                <td style="text-align: center">{{ $value->inst_acc }}</td>
                                <td style="text-align: center">{{ $value->dep_acct }}</td>
                                <td style="text-align: center">{{ $value->dep_inst_acc }}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-primary managedata" id="{{$value->deductionid}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->deductionid}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
                                </td>
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
        <div class="modal fade" id="updateModal">
            <div class="modal-dialog">
                <div class="modal-content" style="border:5px solid #3C8DBC">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center">Update Deduction Info</h3>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('saveupdatededuction')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="taskstatus" value="update">
                            <input type="hidden" name="dataid" id="setdataid">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Deduction Code <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="deduction_code" id="setdeduccode" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <label>Title <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="title" id="settitle" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label> Account <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="account" id="setacc" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label> Interest <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="inst_acc" id="setint" class="form-control inputtext"required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Deputation Account <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="dep_acct" id="setdepuacc" class="form-control inputnumber"  required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label> Deputation Interest Acc<span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="dept_inst_acc" id="setdepuintacc" class="form-control inputtext" required="">
                                    </div>
                                </div>
                            </div><br>
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
                        $('#updateModal').modal('show');
                        $.get('<?= URL::to("getdeductiontypedata") ?>/' + id, function (data) {
                            $('#setdataid').val(data.deductionid);
                            $('#setdeduccode').val(data.deduction_code);
                            $('#settitle').val(data.title);
                            $('#setacc').val(data.account);
                            $('#setint').val(data.inst_acc);
                            $('#setdepuacc').val(data.dep_acct);
                            $('#setdepuintacc').val(data.dept_inst_acc);
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
                                swal(window.location.href = "{{URL::to('/deletededuction')}}" + '/' + id);
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
                $("#SettingsPanel").addClass('active');
                $("#Deduct").addClass('active');
            });
        </script>
</div>
@endsection