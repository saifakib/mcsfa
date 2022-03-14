@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>Employee Suspend Information</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Employee Suspend Info</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid hsl(202, 52%, 49%)">
                        <form method="post" action="{{ route('employesuspendsaveupdate') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                    <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <label>Reason <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="reason" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Order Date <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="order_date" class="form-control inputnumber allDate" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date From <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="date_from" class="form-control inputtext allDate"  required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date To <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="date_to" class="form-control inputtext allDate"  required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label col-md-3">
                                        Active Y/N <span style="color: red">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="margin-right: 20px">
                                                <input type="radio" name="a_yn" value="Y" class="big" required=""><span style="position: relative;left:10px;bottom: 10px">Yes</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="a_yn" value="N" class="big" required=""><span style="position: relative;left:10px;bottom: 10px">No</span>
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
        <br>
        <div class="box" style="border: 2px solid #3c8dbc">
            <div class="box-body">
                <div class="table-responsive">
                    <table data-page-length='100' class="table table-bordered table-striped getTable">
                        <thead>
                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                <th style="text-align: center">S/N</th>
                                <th style="text-align: center">Emp ID</th>
                                {{-- <th style="text-align: center">Name</th>
                                <th style="text-align: center">Designation</th> --}}
                                <th style="text-align: center">Reason</th>
                                <th style="text-align: center">Order Date</th>
                                <th style="text-align: center">Date From</th>
                                <th style="text-align: center">Date To</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1
                            @endphp
                            @foreach($getemployeesuspend as $value)
                            <tr>
                                <td style="text-align: center">{{ $i }}</td>
                                <td style="text-align: center">{{ $value->employe_id }}</td>
                                {{-- <td style="text-align: center">{{ $value->emp_name }}</td> --}}
                                {{-- <td style="text-align: center">{{ $value->designation }}</td> --}}
                                <td style="text-align: center">{{ $value->reason}}</td>
                                <td style="text-align: center">{{ $value->order_date }}</td>
                                <td style="text-align: center">{{ $value->date_from }}</td>
                                <td style="text-align: center">{{ $value->date_to }}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-primary managedata" id="{{$value->employeesuspendid}}" value="edit" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-o btn-danger managedata" id="{{$value->employeesuspendid}}" value="delete" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
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
                        <form method="post" action="{{route('employesuspendsaveupdate')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="taskstatus" value="update">
                            <input type="hidden" name="dataid" id="setdataid">
                            <div class="row">
                                <div class="col-md-6">
                                <label class="form-label">Employee <span style="color: red">*</span></label>
                                <select style="width: 100%" name="employe_id" id="setemployeid" class="form-control inputnumber getSelect" required="">
                                    <option value=""></option>
                                    <?php
                                    foreach ($emoployees['items'] as $values) {
                                        ?>
                                        <option name="employe_id" id="setemployeid" value="<?= $values['employe_id'] ?>">
                                            {{ $values['name_english'] }} -> {{ $values['designation'] }} -> {{ $values['departement'] }}
                                        </option>
                                     <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Reason <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="reason" id="setreason" class="form-control inputnumber" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Order Date <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="order_date" id="order_date" class="form-control inputnumber allDate" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Date From <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="date_from" id="date_from" class="form-control inputtext allDate"  required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Date To <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="date_to" id="date_to" class="form-control inputtext allDate"  required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label col-md-3">
                                    Active Y/N <span style="color: red">*</span>
                                </label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-right: 20px">
                                            <input type="radio" name="a_yn" value="Y" class="big" required=""><span style="position: relative;left:10px;bottom: 10px">Yes</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="a_yn" value="N" class="big" required=""><span style="position: relative;left:10px;bottom: 10px">No</span>
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
                        $.get('<?= URL::to("employesuspend") ?>/' + id, function (data) {
                            $('#setdataid').val(data.employeesuspendid);
                            $('#setreason').val(data.reason);
                            $('#setorder_date').val(data.order_date);
                            $('#setdate_from').val(data.date_from);
                            $('#setdate_to').val(data.date_to);
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
                                swal(window.location.href = "{{URL::to('/deleteemployesuspend')}}" + '/' + id);
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
                $("#EmployeeSuspend").addClass('active');
            });
        </script>
</div>



@endsection