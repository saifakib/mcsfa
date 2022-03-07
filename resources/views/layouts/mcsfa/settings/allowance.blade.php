@extends('layouts.mcsfa.app')
@section('title',"kjvsjf")
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>List of Allowance</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Allowance</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid #3c8dbc">
                        <form method="post" action="{{ route('saveupdateallowance') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Allowance Code <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="allowance_code" class="form-control inputnumber" placeholder="Enter Allowance Code" required="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label> Title <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control inputtext" placeholder="Enter Title" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label> Account No <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="account" class="form-control inputtext" placeholder="Enter Account Number" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><span style="color: red">*</span></label>
                                    <select name="dr_cr" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="debit">Debit</option>
                                        <option value="credit">Credit</option>
                                    </select>
                                </div>
                            </div><br>
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
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">allowance_code</th>
                                    <th style="text-align: center">Title</th>
                                    <th style="text-align: center">Account No</th>
                                    <th style="text-align: center"></th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- <tr>
                            <td style="text-align: center">1</td>
                                    <td style="text-align: center"></td>
                                    <td style="text-align: center"></td>
                                    <td style="text-align: center"></td>
                                    <td style="text-align: center"></td>
                                    <td style="text-align: center">
                                        <button class="btn btn-o btn-primary managedata" id="" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-o btn-danger managedata" id="" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
                                    </td>
                                </tr> --}}
                                @php
                                $i=1
                                @endphp
                                @foreach($getallowance as $value)
                                <tr>
                                    <td style="text-align: center">{{$i}}</td>
                                    <td style="text-align: center">{{$value->allowance_code}}</td>
                                    <td style="text-align: center">{{$value->title}}</td>
                                    <td style="text-align: center">{{$value->account}}</td>
                                    <td style="text-align: center">{{$value->dr_cr}}</td>
                                    <td style="text-align: center">
                                        <button class="btn btn-o btn-primary managedata" id="{{$value->allowanceid}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-o btn-danger managedata" id="{{$value->allowanceid}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
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
</div>

<div class="modal fade" id="updateModal">
    <div class="modal-dialog">
        <div class="modal-content" style="border:5px solid #3C8DBC">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Update Allowance Info</h3>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('saveupdateallowance')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="taskstatus" value="update">
                    <input type="hidden" name="dataid" id="setdataid">
                    <div class="row">
                    <div class="col-md-4">
                                    <label>Allowance Code <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="allowance_code" class="form-control inputnumber"  id="setallowance_code" required="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label> Title <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control inputtext"  id="settitle" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label> Account No <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="account" class="form-control inputtext"  id="setaccount" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><span style="color: red">*</span></label>
                                    <select name="dr_cr" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="debit">Debit</option>
                                        <option value="credit">Credit</option>
                                    </select>
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
                // $.get('<?= URL::to("getallowancetypedata") ?>/' + id, function (data) {
                //     $('#setdataid').val(data.allowanceid);
                //     $('#setallowance_code').val(data.allowance_code);
                //     $('#settitle').val(data.title);
                //     $('#setaccount').val(data.account);
                //     $('#updateModal').modal('show');
                // });
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
                        swal(window.location.href = "{{URL::to('/deleteallowance')}}" + '/' + id);
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
        $("#Allw").addClass('active');
    });
</script>

@endsection