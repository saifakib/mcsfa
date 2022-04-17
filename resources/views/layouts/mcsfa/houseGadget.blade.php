@extends('layouts.mcsfa.app')

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>House Gadget Information</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add House Gadget</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid #3c8dbc">
                        <form method="post" action="{{ route('houseGadgetSaveUpdate') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Basic Scale <span style="color: red">*</span></label>
                                    <select name="basic_scale" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="0-9700">0-9700</option>
                                        <option value="9701-16000">9701-16000</option>
                                        <option value="16001-35500">16001-35500</option>
                                        <option value="35501-78000">35501-78000</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Area <span style="color: red">*</span></label>
                                    <select name="areatype_id" id="setlocation_id" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Area</option>
                                        @foreach($getArea as $values)
                                            <option value="{{ $values->areatype_id }}">
                                                {{ $values->areatype_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Percentage <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="percentage" class="form-control inputtext" placeholder="Percentage" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Min Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="min_amt" class="form-control inputnumber" placeholder="Minimum Amount" required="">
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
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Basic Scale</th>
                                <th style="text-align: center">Area</th>
                                <th style="text-align: center">Minimum Amount</th>
                                <th style="text-align: center">Percentage</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getHouseGadget as $value)
                            <tr>
                                <td style="text-align: center">{{ $value->hg_id }}</td>
                                <td style="text-align: center">{{ $value->basic_scale }}</td>
                                <td style="text-align: center">{{ $value->areatype_name }}</td>
                                <td style="text-align: center">{{ $value->min_amount }}</td>
                                <td style="text-align: center">{{ $value->percentage }}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-primary managedata" id="{{$value->hg_id}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->hg_id}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
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
                        <h3 class="modal-title text-center">Update House Rent Info</h3>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('houseGadgetSaveUpdate')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="taskstatus" value="update">
                            <input type="hidden" name="dataid" id="setdataid">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Basic Scale <span style="color: red">*</span></label>
                                    <select name="basic_scale" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="0-9700">0-9700</option>
                                        <option value="9701-16000">9701-16000</option>
                                        <option value="16001-35500">16001-35500</option>
                                        <option value="35501-78000">35501-78000</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Location Name <span style="color: red">*</span></label>
                                    <select name="areatype_id" id="setlocation_id" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Area</option>
                                        @foreach($getArea as $values)
                                            <option value="{{ $values->areatype_id }}">
                                                {{ $values->areatype_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Min Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="min_amt" id="setmin_amount" class="form-control inputnumber" placeholder="Minimum Amount" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Percentage <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="percentage" id="setpercentage" class="form-control inputtext" placeholder="Percentage" required="">
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
                        $.get('<?= URL::to("houserentmanage") ?>/' + id, function (data) {
                            $('#setdataid').val(data.houserentid);
                            $('#setlocation_id').val(data.location_id);
                            $('#setmax_amount').val(data.max_amount);
                            $('#setmin_amount').val(data.min_amount);
                            $('#setpercentage').val(data.percentage);
                            $('#setaccount_code').val(data.account_code);
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
                                swal(window.location.href = "{{URL::to('/deletehouserent')}}" + '/' + id);
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
                $("#HouseRentInfo").addClass('active');
            });
        </script>
</div>



@endsection