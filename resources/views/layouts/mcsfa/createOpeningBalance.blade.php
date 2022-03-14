@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Accounts Opening Balance Entry Form</h1>
        </section>
        <section class="content animated fadeInRight">
            <div class="box-group" id="accordion">
                <div class="panel" style="border: none">
                    <div class="box-body">
                            <form method="post" action="{{ route('openingbanalaceSaveUpdate') }}">
                                @csrf
                                <input type="hidden" name="taskstatus" value="save">
                                <div class="form-group row">
                                    <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                        Office <span style="color: red">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="project_id" class="form-control inputnumber" required="">
                                                <option value="">Select Office</option>
                                                @foreach($getProjects as $values)
                                                <option value="{{ $values->project_id }}">
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
                                                <?php
                                                foreach ($emoployees['items'] as $values) {
                                                    ?>
                                                    <option value="<?= $values['employe_id'] ?>">
                                                        {{ $values['name_english'] }} => {{ $values['designation'] }} => {{ $values['departement'] }}
                                                    </option>
                                                <?php } ?>
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
                                            <input class="form-control inputnumber allDate" name="vdate" type="text" placeholder="Select Date" required="">
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
                                                <?php
                                                foreach ($accounts['items'] as $values) {
                                                    ?>
                                                    <option value="<?= $values['account_name'] ?>">
                                                        {{ $values['account_name'] }}
                                                    </option>
                                                <?php } ?>
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
                                            <input type="text" id="3" name="init_bal" class="form-control inputnumber">
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
                                                <option value="">Balance Type</option>
                                                <option value="Debit">Debit</option>
                                                <option value="Credit">Credit</option>
                                            </select>
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
            <br>
        </section>
    </div>
    <script>
        $(document).ready(function () {
            $("#OpeningBalance").addClass('active');
            $("#openingbalanceCreate").addClass('active');
        });
    </script>
</div>

@endsection