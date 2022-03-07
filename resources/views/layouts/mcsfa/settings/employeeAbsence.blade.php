@extends('layouts.mcsfa.app')

@section('title')
eMPLOYEE sEARCH
@endsection

@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
            <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Employee Absence Information</h1>
        </section>
        <section class="content animated fadeInRight">
            <div class="box-body" style="border: 2px solid #3c8dbc">
                            <form method="post" action="{{ URL::to('/')}}/saveupdateloan">
                                <input type="hidden" name="_token" value="">
                                <input type="hidden" name="status" value="save">
                                <div class="row">
                                    <label class="control-label col-md-3"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                        Date
                                    </label>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" name="DATE" class="form-control inputnumber" placeholder="Enter Date" required="">
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
                                    <th style="text-align: center">Employee No</th>
                                    <th style="text-align: center">Employee Name</th>
                                    <th style="text-align: center">Designation</th>
                                    <th style="text-align: center">Total Absence</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center">1</td>
                                    <td style="text-align: center">Mahfuz Aveek</td>
                                    <td style="text-align: center">Sr</td>
                                    <td style="text-align: center">1</td>
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