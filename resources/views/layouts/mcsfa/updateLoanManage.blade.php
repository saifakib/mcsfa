@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Update Loan Management</h1>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="box-body">
                <form method="post" action="{{ route('loanManageSaveUpdate') }}">
                    @csrf
                    <input type="hidden" name="taskstatus" value="update">
                    <input type="hidden" name="dataid" value="{{ $getsingleLoanManage->loanmanageid }}">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Loan Type <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="loan_type_id" class="form-control inputnumber getSelect" required="">
                                    @foreach($getLoanTypes as $values)
                                        <option <?php if($getsingleLoanManage->loan_type_id == $values->lonid) echo "selected" ?> name="loan_type_id" value="{{ $values->lonid }}">
                                            {{ $values->type_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label>Employee <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="employe_id" class="form-control inputnumber getSelect" required="">
                                    @foreach($emoployees['items'] as $values)
                                        <option <?php if($getsingleLoanManage->employe_id == $values['employe_id']) echo "selected" ?> name="employe_id" value="{{ $values['employe_id'] }}">
                                            {{ $values['name_english'] }} -> {{ $values['designation'] }} -> {{ $values['departement'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Loan Amount <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" name="loan_amount"  value="{{ $getsingleLoanManage->loan_amount }}" class="form-control inputtext"  required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Install No <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" name="install_no" value="{{ $getsingleLoanManage->install_no }}" class="form-control inputnumber" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Install Amount <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" name="install_amount" value="{{ $getsingleLoanManage->install_amount }}" class="form-control inputtext"  required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Interest Amount <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" name="interest_amount" value="{{ $getsingleLoanManage->interest_amount }}" class="form-control inputtext"  required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Interest Rate <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" name="interest_rate" value="{{ $getsingleLoanManage->interest_rate }}" class="form-control inputtext"  required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Loan Period <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" name="loan_period" value="{{ $getsingleLoanManage->loan_period }}" class="form-control inputtext"  required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Load Taken Date<span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="" name="loan_taken_date" value="{{ $getsingleLoanManage->loan_taken_date }}" class="form-control inputnumber allDate" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Interest Install Amount <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" name="interest_install_amount" value="{{ $getsingleLoanManage->interest_install_amount }}" class="form-control inputtext"  required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>WF Interest Application Y/N <span style="color: red">*</span></label>
                            <select name="wf_interest" {{ $getsingleLoanManage->wf_interest }} class="form-control inputnumber" required="">
                                <option <?php if ($getsingleLoanManage->wf_interest == 'Y')  echo "selected" ?> value="Y">Yes</option>
                                <option <?php if ($getsingleLoanManage->wf_interest == 'N')  echo "selected" ?> value="N">No</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Loan Schedule Y/N <span style="color: red">*</span></label>
                            <select name="loan_schedule" class="form-control inputnumber" required="">
                                <option <?php if ($getsingleLoanManage->loan_schedule == 'Y')  echo "selected" ?> value="Y">Yes</option>
                                <option  <?php if ($getsingleLoanManage->loan_schedule == 'N')  echo "selected" ?> value="N">No</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Interest Schedule Y/N <span style="color: red">*</span></label>
                            <select name="interest_schedule" class="form-control inputnumber" required="">
                                <option  <?php if ($getsingleLoanManage->interest_schedule == 'Y')  echo "selected" ?> value="Y">Yes</option>
                                <option  <?php if ($getsingleLoanManage->interest_schedule == 'N')  echo "selected" ?> value="N">No</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Loan Recover Y/N <span style="color: red">*</span></label>
                            <select name="loan_recover" class="form-control inputnumber" required="">
                                <option  <?php if ($getsingleLoanManage->loan_recover == 'Y')  echo "selected" ?> value="Y">Yes</option>
                                <option  <?php if ($getsingleLoanManage->loan_recover == 'N')  echo "selected" ?> value="N">No</option>
                            </select>
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
                $("#LoanManage").addClass('active');
            });
        </script>
</div>



@endsection