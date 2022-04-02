@extends('layouts.mcsfa.app')

@section('title')
Area Type
@endsection

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>Area Type Information</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Area</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid #3c8dbc">
                        <form method="post" action="{{ route('saveupdatearea') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <label>Area Type Name <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="areatype_name" class="form-control inputtext" required="">
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
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
                                <th style="text-align: center">Area Id</th>
                                <th style="text-align: center">Area Type</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1
                            @endphp
                            @foreach($getAreaType as $value)
                            <tr>
                                <td style="text-align: center">{{ $value->areatype_id}}</td>
                                <td style="text-align: center">{{ $value->areatype_name }}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-primary managedata" id="{{$value->areatype_id}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->areatype_id}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
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
                        <h3 class="modal-title text-center">Update Area Info</h3>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('saveupdatearea')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="taskstatus" value="update">
                            <input type="hidden" name="dataid" id="setdataid">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <label>Area Type Name <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="areatype_name" id="areaName" class="form-control inputtext" required="">
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
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
                        $.get('<?= URL::to("area") ?>/' + id, function (data) {
                            $('#setdataid').val(data.areatype_id);
                            $('#areaName').val(data.areatype_name);
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
                                swal(window.location.href = "{{URL::to('/deletearea')}}" + '/' + id);
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
                $("#Areas").addClass('active');
            });
        </script>
</div>



@endsection