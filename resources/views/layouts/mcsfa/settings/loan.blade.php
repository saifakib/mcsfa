@extends('layouts.mcsfa.app')

@section('title')
Loan 
@endsection

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
        <div class="content-wrapper">
        <section class="content-header">
        <h1>Loan Type Policy</h1>
        <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Loan Type</a>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="panel" style="border: none">
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body" style="border: 2px solid #3c8dbc">
                        <form method="post" action="{{ URL::to('/')}}/saveupdateloan">
                            <input type="hidden" name="_token" value="">
                            <input type="hidden" name="status" value="save">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Type <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="number" name="type" class="form-control inputnumber" placeholder="Enter Type" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label> Type Name <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="type_name" class="form-control inputtext" placeholder="Enter Type Name" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label> Interest Rate <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="interest_rate" class="form-control inputtext" placeholder="Enter Interest Rate" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Panel Interest <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="panel_interest" class="form-control inputtext" placeholder="Enter Panel Interest" required="">
                                    </div>
                                </div>
                            </div><br>
                            <div style="text-align: center">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Save</button>
                            </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="box" style="border: 2px solid #3c8dbc">
            <div class="box-body">
                <div class="table-responsive">
                    <table data-page-length='100' class="table table-bordered table-striped getTable">
                        <thead>
                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                <th style="text-align: center">Type</th>
                                <th style="text-align: center">Type Name</th>
                                <th style="text-align: center">Interest Rate</th>
                                <th style="text-align: center">Panel Interest</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center">1</td>
                                <td style="text-align: center">Welfare Found Loan</td>
                                <td style="text-align: center">5</td>
                                <td style="text-align: center">1</td>
                                <td style="text-align: center">      
                                        <button class="btn btn-o btn-primary editproject" id="4" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                        <!--<button class="btn btn-o btn-danger deleteproject" id="4" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>-->
                                    </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
        </div>
        <script>
            $(document).ready(function () {
                $("#SettingsPanel").addClass('active');
            });
        </script>
</div>



@endsection