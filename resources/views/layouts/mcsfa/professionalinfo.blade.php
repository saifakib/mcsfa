@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Professional Information</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Professional Info</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid rgb(60, 141, 188)">
                        <form method="post" action="{{ route('professionsaveupdate') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Project <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <select style="width: 100%" name="project" class="form-control inputnumber getSelect" required="">
                                            @foreach($getOffice as $values)
                                                <option name="project" value="{{ $values->office_name }}">
                                                    {{ $values->office_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Scale <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <select style="width: 100%" name="scale" class="form-control inputnumber getSelect" required="">
                                            <option  value="4000">40000</option>
                                            <option  value="5000">50000</option>
                                            <option  value="6000">60000</option>
                                            <option  value="7000">70000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Bank Name <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <select style="width: 100%" name="bank_name" id="getbank" class="form-control inputnumber getSelect" required="">
                                            <option value="">Select Bank</option>
                                            @foreach($getbbabanks as $values)
                                                <option name="bank_name" value="{{ $values->bank }}">
                                                    {{ $values->bank }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Branch Name <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <select style="width: 100%" name="bank_id" class="form-control inputnumber getSelect" id="setbranch" required=""></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Emp Bank Acc No <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="emp_bnk_acc_no" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Quater YN <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <select style="width: 100%" name="quater" class="form-control inputnumber getSelect" required="">
                                            <option value="Y">Yes</option>
                                            <option value="N">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Staff Bus Use YN <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <select style="width: 100%" name="staff_bus_use" class="form-control inputnumber getSelect" required="">
                                            <option value="Y">Yes</option>
                                            <option selected value="N">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Car Person Use YN <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <select style="width: 100%" name="car_use" class="form-control inputnumber getSelect" required="">
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Employee Type <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <select style="width: 100%" name="emp_type" class="form-control inputnumber getSelect" required="">
                                            <option value="Permanent">Permanent</option>
                                            <option value="Parttime">Parttime</option>
                                            <option value="Project">Project Base</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Present Basic <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="present_basic" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Privious Basic <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="privious_basic" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Increment Date <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="inc_date" class="form-control inputtext allDate"  required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Increment Rate <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="inc_rate" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>House Type <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <select style="width: 100%" name="h_type" class="form-control inputnumber getSelect" required="">
                                            @foreach($gethousetype as $values)
                                                <option name="h_type" value="{{ $values->housetypeid }}">
                                                    {{ $values->h_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="amount" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>TIN No <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="tin_no" class="form-control inputtext"  required="">
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
                                <th style="text-align: center">Project</th>
                                <th style="text-align: center">Scale Date</th>
                                <th style="text-align: center">Bank Name</th>
                                <th style="text-align: center">Employee Type</th>
                                <th style="text-align: center">House Type</th>
                                <th style="text-align: center">Amount</th>
                                <th style="text-align: center">TIN No</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getProfessionalInfo as $value)
                            <tr>
                                <td style="text-align: center">{{ $value->pproject }}</td>
                                <td style="text-align: center">{{ $value->pscale }}</td>
                                <td style="text-align: center">{{ $value->bank_name }}</td>
                                <td style="text-align: center">{{ $value->emp_type }}</td>
                                <td style="text-align: center">{{ $value->h_type }}</td>
                                <td style="text-align: center">{{ $value->amount }}</td>
                                <td style="text-align: center">{{ $value->tin_no }}</td>

                                <td style="text-align: center">
                                    <a href="{{ URL::to('/')}}/professionalinfo/{{ $value->professioninfoid }}" class="btn btn-o btn-info" value="view" style="text-align: center;border-radius: 10px;" title="View"><i class="fa fa-eye"></i></a>
                                    <a href="{{ URL::to('/')}}/editprofessionalinfo/{{ $value->professioninfoid }}" class="btn btn-o btn-primary" value="edit" style="text-align: center;border-radius: 10px;" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-o btn-danger managedata" id="{{$value->professioninfoid}}" value="Delete" style="text-align: center;border-radius: 10px;" title="Delete"><i class="fa fa-remove"></i></a>
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
                            swal(window.location.href = "{{URL::to('/deleteprofessionalinfo')}}" + '/' + id);
                        } else {
                            swal("Cancelled");
                        }
                    });
                
            });
        });
    </script>
    <script>
        $(document).ready(function () {
                $(document).on('change', '#getbank', function () {
                    var value = $(this).val();
                    $.ajax({
                        data: {value: value},
                        type: "GET",
                        url: "{{URL::to('getallthebankbranch')}}",
                        success: function (data) {
                            $("#setbranch").html(data);
                        },
                        error: function () {
                            alert('Something is wrong !');
                        }
                    });
                });
            });
            
        </script>
        <script>
            $(document).ready(function () {
                $("#ProfessionalInfo").addClass('active');
            });
        </script>
</div>



@endsection