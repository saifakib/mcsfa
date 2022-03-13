@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Personal Information</h1>
    </section>
    <br>
        <div class="box-body" style="margin: 15px">
            <form method="post" action="{{ route('employesuspendsaveupdate') }}">
                @csrf
                <input type="hidden" name="taskstatus" value="save">
                <div class="row">
                        <div class="col-md-3">
                            <label>Father Name <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="" name="" class="form-control inputnumber" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Mother Name <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="" name="" class="form-control inputnumber" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Birth Date <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="" name="" class="form-control inputnumber allDate" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Marital Status <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="" class="form-control inputnumber getSelect" required="">
                                    <option value="">Married</option>
                                    <option value="">No-Married</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Address <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="" name="" class="form-control inputnumber" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Permanent Address <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="" name="" class="form-control inputtext"  required="">
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Nationality <span style="color: red">*</span></label>
                        <div class="form-group">
                            <select style="width: 100%" name="" class="form-control inputnumber getSelect" required="">
                                <option value="">Bangladeshi</option>
                                <option value="">Indian</option>
                                <option value="">Srilankan</option>
                                <option value="">Chainis</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Phone No <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="" name="" class="form-control inputnumber" required="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Religion <span style="color: red">*</span></label>
                        <div class="form-group">
                            <select style="width: 100%" name="" class="form-control inputnumber getSelect" required="">
                                <option value="">Islam</option>
                                <option value="">Hindu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Passport No<span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="" name="" class="form-control inputnumber" required="">
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
    <script>
        $(document).ready(function () {
            $("#PersonalInfo").addClass('active');
        });
    </script>
</div>



@endsection