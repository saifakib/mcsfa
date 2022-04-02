@extends('layouts.mcsfa.app')

@section('title')
Location
@endsection

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>Location Information</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Location</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid #3c8dbc">
                        <form method="post" action="{{ route('saveupdatelocation') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Area Type Name <span style="color: red">*</span></label>
                                    <select name="areatype_id" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        @foreach($getAreaType as $values)
                                                <option value="{{ $values->areatype_id }}">
                                                    {{ $values->areatype_name }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Location Name <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="location_name" class="form-control inputtext" required="">
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
                                <th style="text-align: center">S/N</th>
                                <th style="text-align: center">Area Name</th>
                                <th style="text-align: center">Location</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1
                            @endphp
                            @foreach($getLocation as $value)
                            <tr>
                                <td style="text-align: center">{{ $i }}</td>
                                <td style="text-align: center">{{ $value->areatype_name }}</td>
                                <td style="text-align: center">{{ $value->location_name}}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->location_id}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
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
                                swal(window.location.href = "{{URL::to('/deletelocation')}}" + '/' + id);
                            } else {
                                swal("Cancelled");
                            }
                        });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#Locations").addClass('active');
            });
        </script>
</div>



@endsection