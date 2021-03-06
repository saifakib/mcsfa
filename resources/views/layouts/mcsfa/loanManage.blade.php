@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>Loan Management</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Loan Info</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid hsl(202, 52%, 49%)">
                        <form method="post" action="{{ route('loanManageSaveUpdate') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Loan Type<span style="color: red">*</span></label>
                                    <select name="loan_type_id" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <?php foreach($getLoanTypes as $value) { ?>
                                            <option name="loan_type_id" value="<?= $value->lonid ?>">{{ $value->type_name }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                    <div class="col-md-8">
                                    <label class="form-label">Employee <span style="color: red">*</span></label>
                                    <select style="width: 100%" name="employe_id" class="form-control inputnumber getSelect" required="">
                                        <option value=""></option>
                                        <?php
                                        foreach ($emoployees['items'] as $values) {
                                            ?>
                                            <option name="employe_id" value="<?= $values['employe_id'] ?>">
                                                {{ $values['name_english'] }} -> {{ $values['designation'] }} -> {{ $values['departement'] }}
                                            </option>
                                         <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Loan Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="loan_amount" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Install No <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="install_no" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Install Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="install_amount" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Interest Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="interest_amount" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Interest Rate <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="interest_rate" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Loan Period <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="loan_period" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Load Taken Date<span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="" name="loan_taken_date" class="form-control inputnumber allDate" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Interest Install Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="interest_install_amount" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>WF Interest Application Y/N <span style="color: red">*</span></label>
                                    <select name="wf_interest" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Loan Schedule Y/N <span style="color: red">*</span></label>
                                    <select name="loan_schedule" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Interest Schedule Y/N <span style="color: red">*</span></label>
                                    <select name="interest_schedule" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Loan Recover Y/N <span style="color: red">*</span></label>
                                    <select name="loan_recover" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Loan Re-Schedule Y/N <span style="color: red">*</span></label>
                                    <select name="loan_reschedule" class="form-control inputnumber" required="">
                                        <option value="" selected="" disabled="">Select Type</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
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
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Loan Type ID</th>
                                <th style="text-align: center">Employee Name</th>
                                <th style="text-align: center">Loan Amount</th>
                                <th style="text-align: center">Loan Period</th>
                                <th style="text-align: center">Install no</th>
                                <th style="text-align: center">Install Amount</th>>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getLoanManage as $value)
                            @php
                            $response = Http::get("http://192.168.3.8:8085/ords/hrm/employees/v_emp_all/" . $value->employe_id);
                            $decoded = json_decode($response, true);
                            @endphp
                            <tr>
                                <td style="text-align: center">{{ $value->loanmanageid }}</td>
                                <td style="text-align: center">{{ $value->type_name }}</td>
                                <td style="text-align: center">{{ $decoded['name_english'] }}</td>
                                <td style="text-align: center">{{ $value->loan_amount }}</td>
                                <td style="text-align: center">{{ $value->loan_period }}</td>
                                <td style="text-align: center">{{ $value->install_no }}</td>
                                <td style="text-align: center">{{ $value->install_amount }}</td>
                                <td style="text-align: center">
                                    <a href="{{ URL::to('/')}}/editloanmanage/{{ $value->loanmanageid }}" class="btn btn-o btn-primary" value="edit" style="text-align: center;border-radius: 10px;" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-o btn-danger managedata" id="{{$value->loanmanageid}}" value="Delete" style="text-align: center;border-radius: 10px;" title="Delete"><i class="fa fa-remove"></i></a>
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
                                swal(window.location.href = "{{URL::to('/deleteloanmanage')}}" + '/' + id);
                            } else {
                                swal("Cancelled");
                            }
                        });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#LoanManagePanel").addClass('active');
                $("#LoanManage").addClass('active');
            });
        </script>
</div>



@endsection