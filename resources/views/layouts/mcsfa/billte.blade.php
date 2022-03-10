@extends('layouts.mcsfa.app')

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
        <h1 style="margin-left: 40px">Bill Entry</h1>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="box-body" style="margin: 60px">
                        <form method="post" action="{{ route('bilRegistaterSaveUpdate') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Budget & Amount <span style="color: red">*</span></label>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $budget->budgetid }}" name="budget_id">
                                        <input type="" value="{{ $budget->budgetname }}" class="form-control inputnumber" readonly required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php
                                        $fixedbg=$budget->budgetamount;
                                        $lastbudget=@$lastbudget->restbgamount;
                                        if($lastbudget){
                                            $budgetamount=$lastbudget;
                                        }else{
                                            $budgetamount=$fixedbg;
                                        }
                                        ?>
                                        <input type="number" name="budgetamount" value="{{ $budgetamount}}" class="form-control inputnumber" readonly required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Bill Amount <span style="color: red">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="amount" class="form-control inputnumber" placeholder="Enter Bill Amount" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Vat <span style="color: red">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="" name="vat" class="form-control inputnumber" placeholder="Enter Vat" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Tax <span style="color: red">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="" name="tax" class="form-control inputtext" placeholder="Enter Tax" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Date <span style="color: red">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="" name="date" class="form-control inputnumber allDate" placeholder="Enter Date" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Description <span style="color: red">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea id="" name="description" class="form-control inputtext" placeholder="Bill Description" required="">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Remarks <span style="color: red">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="" name="remarks" class="form-control inputtext" placeholder="Remarks" required="">
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
    </section>
        </div>

        <script>
            $(document).ready(function () {
                $("#BillRegistation").addClass('active');
            });
        </script>
</div>



@endsection