@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Update Sub Opening Banlance Information</h1>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="box-body">
                <form method="post" action="{{ route('subopeningbanalaceSaveUpdate') }}">
                    @csrf
                    <input type="hidden" name="taskstatus" value="update">
                    <input type="hidden" name="dataid" value="{{ $getsubopnbal->subopnbalid }}">
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Office <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="project_id" class="form-control inputnumber" required="">
                                    <option value="">Select Office</option>
                                    @foreach($getProjects as $values)
                                    <option <?php if($getsubopnbal->project_id == $values->project_id) echo "selected" ?> value="{{ $values->project_id }}">
                                        {{ $values->project_desc }}
                                    </option>
                                @endforeach
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Sub Accounts For <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="acc_for" id="accFor" class="form-control inputnumber getSelect" required="">
                                    <option value="">Select Type</option>
                                    <option <?php if($getsubopnbal->acc_for == "employee") echo "selected" ?>  value="employee">Employee</option>
                                    <option <?php if($getsubopnbal->acc_for == "supplier") echo "selected" ?>  value="supplier">Supplier</option>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Employee/Supplier Name <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="emporsup_id" class="form-control inputnumber getSelect" id="setes" required="">
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Account <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="acc_code" class="form-control inputnumber getSelect" required="">
                                    <option value=""></option>
                                    @foreach($accounts['items'] as $values)
                                        <option <?php if($getsubopnbal->acc_code == $values['code']) echo "selected" ?> value="{{ $values['code'] }}">
                                            {{ $values['account_name'] }}
                                        </option>
                                    @endforeach
                                </select> 
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Amount <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="3" name="bal" value="{{ $getsubopnbal->bal }}" class="form-control inputnumber">
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Balance Type <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="bal_type" class="form-control inputnumber">
                                    <option <?php if($getsubopnbal->bal_type == "Debit") echo "selected" ?> value="Debit">Debit</option>
                                    <option <?php if($getsubopnbal->bal_type == "Credit") echo "selected" ?> value="Credit">Credit</option>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <br>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Update</button>
                    </div>   
                </form>
            </div>
        <br>
    </section>

    </div>
    <script>
        $(document).ready(function () {
            $(document).on('change', '#accFor', function () {
                var value = $(this).val();
                $.ajax({
                    data: {value: value},
                    type: "GET",
                    url: "{{URL::to('getemporsupplier')}}",
                    success: function (data) {
                        $("#setes").html(data);
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