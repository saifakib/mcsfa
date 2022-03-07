@extends('layouts.mcsfa.app')

@section('title')
House Type
@endsection

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>House Type Information</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add House</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid #3c8dbc">
                        <form method="post" action="{{ route('saveupdatehouse') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>House Type <span style="color: red">*</span></label>
                                    <select name="h_type" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="B">C</option>
                                        <option value="C">D</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Max Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="max_amt" class="form-control inputnumber" placeholder="Max Amount" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Service Charge <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="service_charge" class="form-control inputtext" placeholder="Service Charge" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Min Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="min_amt" class="form-control inputnumber" placeholder="Mai Amount" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>House Rent% <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="house_rent" class="form-control inputtext" placeholder="House Rent" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>HR Deduction <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="hr_deduction" class="form-control inputnumber" placeholder="HR Deduction" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3">
                                        Percentage Y/N <span style="color: red">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="margin-right: 20px">
                                                <input type="radio" name="p_yn" value="Y" class="big" required=""><span style="position: relative;left:10px;bottom: 10px">Yes</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="p_yn" value="N" class="big" required=""><span style="position: relative;left:10px;bottom: 10px">No</span>
                                            </label>
                                        </div>
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
                                <th style="text-align: center">Type</th>
                                <th style="text-align: center">Service Charge</th>
                                <th style="text-align: center">House Rent</th>
                                <th style="text-align: center">Max Amount</th>
                                <th style="text-align: center">Min Amount</th>
                                <th style="text-align: center">HR Deduction</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1
                            @endphp
                            @foreach($gethousetype as $value)
                            <tr>
                                <td style="text-align: center">{{ $value->h_type}}</td>
                                <td style="text-align: center">{{ $value->service_charge }}</td>
                                <td style="text-align: center">{{ $value->house_rent}}</td>
                                <td style="text-align: center">{{ $value->max_amt }}</td>
                                <td style="text-align: center">{{ $value->min_amt }}</td>
                                <td style="text-align: center">{{ $value->hr_deduction }}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-primary managedata" id="{{$value->housetypeid}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->housetypeid}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
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
                        <form method="post" action="{{route('saveupdatehouse')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="taskstatus" value="update">
                            <input type="hidden" name="dataid" id="setdataid">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>House Type <span style="color: red">*</span></label>
                                    <select name="h_type" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="B">C</option>
                                        <option value="C">D</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Max Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="max_amt" id="setmax" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Service Charge <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="service_charge" id="setcharge" class="form-control inputtext" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Min Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="min_amt" id="setmin" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>House Rent% <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="house_rent" id="setrent" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>HR Deduction <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="hr_deduction" id="sethr" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label col-md-3">
                                        Percentage Y/N <span style="color: red">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="margin-right: 20px">
                                                <input type="radio" name="p_yn" value="Y" class="big" required=""><span style="position: relative;left:10px;bottom: 10px">Yes</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="p_yn" value="N" class="big" required=""><span style="position: relative;left:10px;bottom: 10px">No</span>
                                            </label>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
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
                        $.get('<?= URL::to("gethousetypedata") ?>/' + id, function (data) {
                            $('#setdataid').val(data.housetypeid);
                            $('#sethtype').val(data.h_type);
                            $('#setcharge').val(data.service_charge);
                            $('#setmax').val(data.max_amt);
                            $('#setmin').val(data.min_amt);
                            $('#setrent').val(data.house_rent);
                            $('#sethr').val(data.hr_deduction);
                            $('#setp').val(data.p_yn);
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
                                swal(window.location.href = "{{URL::to('/deletehousetype')}}" + '/' + id);
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
                $("#House").addClass('active');
            });
        </script>
</div>



@endsection