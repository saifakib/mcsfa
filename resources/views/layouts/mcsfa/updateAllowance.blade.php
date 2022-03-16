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
        <h1>Update Allowance</h1>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
               
                    <div class="box-body" style="border: 2px solid #3c8dbc">
                        <form method="post" action="{{ route('allowancesaveupdate') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="update">
                            <input type="hidden" name="dataid" value="{{$allallowance->allallowanceid}}">
                            <div class="row">
                                    <div class="col-md-12">
                                    <label class="form-label">Employee <span style="color: red">*</span></label>
                                    <select style="width: 100%" name="employe_id" class="form-control inputnumber getSelect" required="">
                                        @foreach($emoployees['items'] as $values)
                                            <option <?php if($allallowance->emp_no == $values['employe_id']) echo "selected" ?> value="{{ $values['employe_id'] }}">
                                                {{ $values['name_english'] }} -> {{ $values['designation'] }} -> {{ $values['departement'] }}
                                            </option>
                                        @endforeach
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
                                            <option <?php if($allallowance->allowance_code == $values->allowance_code) echo "selected" ?> value="<?= $values->allowance_code ?>">
                                                {{ $values->allowance_code }} =>  {{ $values->title }}
                                            </option>
                                         <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Amount <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="amount" value="{{ $allallowance->amount }}" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Parcentage <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="parcentage" value="{{ $allallowance->percentage }}" class="form-control inputtext"  required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Status Code <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="status_code" value="{{ $allallowance->status_code }}" class="form-control inputnumber" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Remarks <span style="color: red">*</span></label>
                                    <div class="form-group"> 
                                        <input type="text" name="remarks" value="{{ $allallowance->remarks }}" class="form-control inputtext"  required="">
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
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div style="text-align: center">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Update</button>
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
                $("#Allowance").addClass('active');
            });
        </script>
</div>



@endsection