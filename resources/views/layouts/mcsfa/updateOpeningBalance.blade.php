@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Update Opening Banlance Information</h1>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="box-body">
                <form method="post" action="{{ route('openingbanalaceSaveUpdate') }}">
                    @csrf
                    <input type="hidden" name="taskstatus" value="update">
                    <input type="hidden" name="dataid" value="{{ $getopnbal->opnblnid }}">
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Office <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="project_id" class="form-control inputnumber" required="">
                                    <option value="">Select Office</option>
                                    @foreach($getProjects as $values)
                                    <option <?php if($getopnbal->project_id == $values->project_id) echo "selected" ?> value="{{ $values->project_id }}">
                                        {{ $values->project_desc }}
                                    </option>
                                @endforeach
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Employee <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="employee_id" class="form-control inputnumber getSelect" required="">
                                    <option value="">Select Office</option>
                                    @foreach($emoployees['items'] as $values)
                                        <option <?php if($getopnbal->employee_id == $values['employe_id']) echo "selected" ?> name="employe_id" value="{{ $values['employe_id'] }}">
                                            {{ $values['name_english'] }} => {{ $values['designation'] }} => {{ $values['departement'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Balance Date <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control inputnumber allDate" name="vdate" value="{{ $getopnbal->vdate }}" type="text" required="">
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Account Name <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="acc_name" class="form-control inputnumber getSelect" required="">
                                    <option value=""></option>
                                    @foreach($accounts['items'] as $values)
                                        <option <?php if($getopnbal->acc_name == $values['account_name']) echo "selected" ?> value="{{ $values['account_name'] }}">
                                            {{ $values['account_name'] }}
                                        </option>
                                    @endforeach
                                </select> 
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                            Initial Balance <span style="color: red">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="3" name="init_bal" value="{{ $getopnbal->init_bal }}" class="form-control inputnumber">
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
                                    <option <?php if($getopnbal->bal_type == "Debit") echo "selected" ?> value="Debit">Debit</option>
                                    <option <?php if($getopnbal->bal_type == "Credit") echo "selected" ?> value="Credit">Credit</option>
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
                $("#ProfessionalInfo").addClass('active');
            });
        </script>
</div>



@endsection