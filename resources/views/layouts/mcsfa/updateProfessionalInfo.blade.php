@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Update Professional Information</h1>
    </section>
    <section class="content animated fadeInRight">
        <div class="box-group" id="accordion">
            <div class="box-body">
                <form method="post" action="{{ route('professionsaveupdate') }}">
                    @csrf
                    <input type="hidden" name="taskstatus" value="update">
                    <input type="hidden" name="dataid" value="{{ $getProfessionalInfo->professioninfoid }}">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Project <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="project" class="form-control inputnumber getSelect" required="">
                                    @foreach($getProject as $values)
                                        <option <?php if($getProfessionalInfo->pproject == $values->project_desc) echo "selected" ?> name="project" value="{{ $values->project_desc }}">
                                            {{ $values->project_desc }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Scale <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="scale" class="form-control inputnumber getSelect" required="">
                                    <option  value="4000">40000</option>
                                    <option  value="5000">50000</option>
                                    <option  value="6000">60000</option>
                                    <option  value="7000">70000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Bank Name <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="bank_name" id="getbank" class="form-control inputnumber getSelect" required="">
                                    <option value="">Select Bank</option>
                                    @foreach($getbbabanks as $values)
                                        <option <?php if($getProfessionalInfo->bank_name == $values->bank) echo "selected" ?> name="bank_name" value="{{ $values->bank }}">
                                            {{ $values->bank }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Branch Name <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="bank_id" class="form-control inputnumber getSelect" id="setbranch" required=""></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Emp Bank Acc No <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="" name="emp_bnk_acc_no" value="{{ $getProfessionalInfo->emp_bnk_acc_no }}" class="form-control inputtext"  required="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Quater YN <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="quater" class="form-control inputnumber getSelect" required="">
                                    <option value="Y">Yes</option>
                                    <option value="N">None</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Staff Bus Use YN <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="staff_bus_use" class="form-control inputnumber getSelect" required="">
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Car Person Use YN <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="car_use" class="form-control inputnumber getSelect" required="">
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Employee Type <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="emp_type" class="form-control inputnumber getSelect" required="">
                                    <option value="Permanent">Permanent</option>
                                    <option value="Parttime">Parttime</option>
                                    <option value="Project">Project Base</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Present Basic <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="" name="present_basic" value="{{ $getProfessionalInfo->present_basic }}"   class="form-control inputnumber" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Privious Basic <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="" name="privious_basic" value="{{ $getProfessionalInfo->privious_basic }}"  class="form-control inputnumber" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Increment Date <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="" name="inc_date" value="{{ $getProfessionalInfo->inc_date }}"  class="form-control inputtext allDate"  required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Increment Rate <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" name="inc_rate" value="{{ $getProfessionalInfo->inc_rate }}"  class="form-control inputtext"  required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>House Type <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select style="width: 100%" name="h_type" class="form-control inputnumber getSelect" required="">
                                    @foreach($gethousetype as $values)
                                        <option name="h_type" <?php if($getProfessionalInfo->h_type == $values->housetypeid) echo "selected" ?> value="{{ $values->housetypeid }}">
                                            {{ $values->h_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Amount <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="" name="amount"  value="{{ $getProfessionalInfo->amount }}" class="form-control inputtext"  required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>TIN No <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" value="{{ $getProfessionalInfo->tin_no }}" name="tin_no" class="form-control inputtext"  required="">
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
                $(document).on('change', '#getbank', function () {
                    var value = $(this).val();
                    $.ajax({
                        data: {value: value},
                        type: "GET",
                        url: "{{URL::to('getallthebankbranch')}}",
                        success: function (data) {
                            $("#setbranch").html(data);
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