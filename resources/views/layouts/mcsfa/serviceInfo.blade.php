@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Service Information</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Service Info</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid rgb(60, 141, 188)">
                        <form method="post" action="{{ route('serviceinfomanageSaveUpdate') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Service Code <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="ser_code" value="{{ $lastser_code }}" class="form-control inputtext" readonly required="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label>Service Name <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="ser_name" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Service Percentages <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="ser_per" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Entry Date <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="entry_date" class="form-control inputtext allDate"  required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Challan Code <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="challan_code" class="form-control inputtext"  required="">
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
                                <th style="text-align: center">Service No</th>
                                <th style="text-align: center">Service Code</th>
                                <th style="text-align: center">Service Name</th>
                                <th style="text-align: center">Service Percentage</th>
                                <th style="text-align: center">Entry Date</th>
                                <th style="text-align: center">Challan Code</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $value)
                            <tr>
                                <td style="text-align: center">{{ $value->ser_no }}</td>
                                <td style="text-align: center">{{ $value->ser_code }}</td>
                                <td style="text-align: center">{{ $value->ser_name }}</td>
                                <td style="text-align: center">{{ $value->ser_per }}</td>
                                <td style="text-align: center">{{ $value->entry_date }}</td>
                                <td style="text-align: center">{{ $value->challan_code }}</td>

                                <td style="text-align: center">
                                    <a href="{{ URL::to('/')}}//{{ $value->ser_no }}" class="btn btn-o btn-primary" value="edit" style="text-align: center;border-radius: 10px;" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-o btn-danger managedata" id="{{$value->ser_no}}" value="Delete" style="text-align: center;border-radius: 10px;" title="Delete"><i class="fa fa-remove"></i></a>
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
                            swal(window.location.href = "{{URL::to('/deleteserviceinfo')}}" + '/' + id);
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