@extends('layouts.mcsfa.app')
@section('content')
<style>
    .big{
        width:2em;
        height:2em;
        cursor: pointer;
    }
</style>


<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>Allowance Information</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Allowance Info</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid #3c8dbc">
                        <form method="post" action="{{ route('allowancesaveupdate') }}">
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
                                <div class="col-md-3">
                                    <label>Allowance Code & Name<span style="color: red">*</span></label>
                                    <select style="width: 100%" name="allowance_code" class="form-control inputnumber getSelect" required="">
                                        <option value=""></option>
                                        <?php
                                        foreach ($allowancecode as $values) {
                                            ?>
                                            <option name="allowance_code" value="<?= $values->allowance_code ?>">
                                                {{ $values->allowance_code }} =>  {{ $values->title }}
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
                                <div class="col-md-3">
                                    <label>Status Code <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="status_code" class="form-control inputnumber" required="">
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
                                    <div class="form-group row">
                                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
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
                                    </div><br>
                                
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
            <form method="post" action="{{ route('allowancesaveupdate') }}">
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
                        <label>Allowance Code<span style="color: red">*</span></label>
                        <select style="width: 100%" name="allowance_code" class="form-control inputnumber getSelect" required="">
                            <option value=""></option>
                            <?php
                            foreach ($allowancecode as $values) {
                                ?>
                                <option name="allowance_code" value="<?= $values->allowance_code ?>">
                                    {{ $values->allowance_code }} =>  {{ $values->title }}
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
                                <th style="text-align: center">Allowance Code</th>
                                <th style="text-align: center">Title</th>
                                <th style="text-align: center">Status Code</th>
                                <th style="text-align: center">Percentage</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1
                            @endphp
                            @foreach($getallallowance as $value)
                            @php
                            $response = Http::get("http://192.168.3.8:8085/ords/hrm/employees/v_emp_all/" . $value->emp_no);
                            $decoded = json_decode($response, true);
                            @endphp
                            <tr>
                                <td style="text-align: center">{{ $value->emp_no}}</td>
                                <td style="text-align: center">{{$decoded['name_english']}}</td>
                                <td style="text-align: center">{{$decoded['designation']}}</td>
                                <td style="text-align: center">{{ $value->allowance_code}}</td>
                                <td style="text-align: center">{{ $value->title }}</td>
                                <td style="text-align: center">{{ $value->status_code }}</td>
                                <td style="text-align: center">{{ $value->percentage }}</td>
                                <td style="text-align: center">
                                    <a href="{{ URL::to('/')}}/allowance/{{$value->allallowanceid}}" class="btn btn-o btn-primary" id="{{$value->allallowanceid}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</a>
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->allallowanceid}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
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
                                swal(window.location.href = "{{URL::to('/deleteallallowance')}}" + '/' + id);
                            } else {
                                swal("Cancelled");
                            }
                        });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#Allowance").addClass('active');
            });
        </script>
</div>



@endsection