@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Deduction Information</h1>
            <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Deduction Info</a>
        </section>
        <section class="content animated fadeInRight">
            <div class="box-group" id="accordion">
                <div class="panel" style="border: none">
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="box-body" style="border: 2px solid #3c8dbc">
                            <form method="post" action="{{ route('deductionsaveupdate') }}">
                                @csrf
                                <input type="hidden" name="taskstatus" value="save">
                                <div class="row">
                                        <div class="col-md-12">
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
                                    <div class="col-md-4">
                                        <label>Deduction Code<span style="color: red">*</span></label>
                                        <select style="width: 100%" name="deduction_code" class="form-control inputnumber getSelect" required="">
                                            <option value=""></option>
                                            <?php
                                            foreach ($getdeductiocode as $values) {
                                                ?>
                                                <option name="deduction_code" value="{{ $values->deduction_code }}">
                                                    {{ $values->title }}
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Amount <span style="color: red">*</span></label>
                                        <div class="form-group">
                                            <input type="number" name="amount" class="form-control inputnumber" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Parcentage <span style="color: red">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="parcentage" class="form-control inputtext"  required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Remarks <span style="color: red">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="remarks" class="form-control inputtext"  required="">
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
            <div class="box-body" style="border: 2px solid #3c8dbc">
                <form method="get" action="{{ route('deductionsearch') }}">
                    <input type="hidden" name="taskstatus" value="search">
                    <div class="row">
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <label>Deduction Code<span style="color: red">*</span></label>
                            <select style="width: 100%" name="deduction_code" class="form-control inputnumber getSelect" required="">
                                <option value=""></option>
                                <?php
                                foreach ($getdeductiocode as $values) {
                                    ?>
                                    <option name="deduction_code" value="{{ $values->deduction_code }}">
                                        {{ $values->title }}
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Amount <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" name="amount" class="form-control inputnumber" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Parcentage <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" name="parcentage" class="form-control inputtext"  required="">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Search</button>
                    </div>   
                </form>
            </div>
            <br>
            <div class="box" style="border: 2px solid #3c8dbc">
                <div class="box-body">
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-bordered table-striped getTable">
                            <thead>
                                <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                    <th style="text-align: center">Emp No</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Designation</th>
                                    <th style="text-align: center">Deduction Code</th>
                                    <th style="text-align: center">Title</th>
                                    <th style="text-align: center">Percentage</th>
                                    <th style="text-align: center">Amount</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1
                                @endphp
                                @foreach($getdeductioninfo as $value)
                                <tr>
                                    <td style="text-align: center">{{ $value->emp_no}}</td>
                                    <td style="text-align: center">{{ $value->emp_name}}</td>
                                    <td style="text-align: center">{{ $value->designation }}</td>
                                    <td style="text-align: center">{{ $value->deduction_code}}</td>
                                    <td style="text-align: center">{{ $value->title }}</td>
                                    <td style="text-align: center">{{ $value->percentage }}</td>
                                    <td style="text-align: center">{{ $value->amount }}</td>
                                    <td style="text-align: center">
                                        <button class="btn btn-o btn-primary managedata" id="{{$value->deductioninfoid}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-o btn-danger managedata" id="{{$value->deductioninfoid}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
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
                        <form method="post" action="{{route('allowancesaveupdate')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="taskstatus" value="update">
                            <input type="hidden" name="dataid" id="setdataid">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Employee <span style="color: red">*</span></label>
                                    <select style="width: 100%" name="employe_id" id="setemployeeid" class="form-control inputnumber getSelect" required="">
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
                                <div class="col-md-4">
                                    <label>Deduction Code<span style="color: red">*</span></label>
                                    <select style="width: 100%" name="allowance_code" id="setdeduction_code" class="form-control inputnumber getSelect" required="">
                                        <option value=""></option>
                                        <?php
                                        foreach ($getdeductiocode as $values) {
                                            ?>
                                            <option name="deduction_code" value="{{ $values->deduction_code}}">
                                                {{ $values->title }}
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="amount" id="setamount" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Parcentage <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="parcentage" id="setpercentage" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Remarks <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="remarks" id="setremarks" class="form-control inputtext"  required="">
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
                        $.get('<?= URL::to("deduction") ?>/' + id, function (data) {
                            $('#setdataid').val(data.housetypeid);
                            $('#setemployeeid').val(data.emp_no);
                            $('#setdeduction_code').val(data.allowance_code);
                            $('#setamount').val(data.amount);
                            $('#setpercantage').val(data.percentage);
                            $('#setremarks').val(data.remarks);
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
                                swal(window.location.href = "{{URL::to('/deletedeductioninfo')}}" + '/' + id);
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
                $("#Deduction").addClass('active');
            });
        </script>
</div>



@endsection