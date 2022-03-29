@extends('layouts.mcsfa.app')
@section('content')

<style>
    .big {
        width: 2em;
        height: 2em;
        cursor: pointer;
    }
</style>

<div id="contentWrapper" style="font-family: Montserrat">
    <div class="content-wrapper">
        <section class="content-header">
            <h1></h1>
        </section>
        <section class="content animated fadeInRight">
            <div class="box-group" id="accordion">
                <div class="panel" style="border: none">
                    <div class="box-body">
                        <form method="post" action="{{ route('allowancesetpostupdate') }}">
                            @csrf
                            <input type="hidden" name="taskstatus" value="save">
                            <div class="form-group row" style="margin-top: 10px">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <select style="width: 90%" name="employe_id"
                                        class="form-control inputnumber getSelect" required="">
                                        <option value="">Select Employee</option>
                                        <?php
                                            foreach ($emoployees['items'] as $values) {
                                                ?>
                                        <option name="employe_id" value="<?= $values['employe_id'] ?>">
                                            {{ $values['name_english'] }} -> {{ $values['designation'] }} ->
                                            {{ $values['departement'] }}
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <br>
                            <div class="form-group row" style="margin-left: 10px">
                                <div class="col-md-4">
                                    <h4 label class="control-label"><b>Allowance Code & Title</b></h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 label class="control-label"><b>Select Type</b></h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 label class="control-label"><b>Amount Or Percentage</b></h4>
                                </div>
                            </div>
                            {{-- <?php
                                //$i=1;
                                ?>
                                @foreach($alloeances as $value)
                                <div class="row" style="margin-left: 10px">
                                    <div class="col-md-4">
                                        <input type="text" name="dataname<?=$i?>" class="form-control inputnumber" value="{{ $value->allowance_code}}
                            => {{ $value->title }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus<?=$i?>" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper<?=$i?>" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <?php// $i++;?>
                @endforeach --}}
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname1" class="form-control inputnumber" value="A-101 => Medical"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus1" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper1" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname2" class="form-control inputnumber" value="A-102 => Tiffin"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus2" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper2" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname3" class="form-control inputnumber"
                            value="A-103 => Entertainment" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus3" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper3" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname4" class="form-control inputnumber" value="A-104 => Washing"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus4" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper4" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname5" class="form-control inputnumber" value="A-105 => Conveyance"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus5" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper5" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname6" class="form-control inputnumber" value="A-106 => Insentive"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus6" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper6" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname7" class="form-control inputnumber" value="A-107 => House Rent"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus7" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper7" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname8" class="form-control inputnumber" value="A-108 => Charge A."
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus8" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper8" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname9" class="form-control inputnumber"
                            value="A-109 => CPF Contrib" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus9" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper9" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname10" class="form-control inputnumber"
                            value="A-110 => Dearness A." readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus10" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper10" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname11" class="form-control inputnumber" value="A-111 => Pension"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus11" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper11" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname12" class="form-control inputnumber"
                            value="A-112 => PA Allowance" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus12" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper12" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname13" class="form-control inputnumber" value="A-113 => Arear"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus13" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper13" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname14" class="form-control inputnumber"
                            value="A-114 => Deputation Allowance" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus14" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper14" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname15" class="form-control inputnumber"
                            value="A-115 => Servent Allowance" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus15" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper15" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname16" class="form-control inputnumber"
                            value="A-116 => Mobile Bill" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus16" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper16" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname17" class="form-control inputnumber" value="A-117 => Others"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus17" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper17" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname18" class="form-control inputnumber"
                            value="A-118 => Domistic Aid" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus18" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper18" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname19" class="form-control inputnumber" value="A-119 => Education"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus19" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper19" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname20" class="form-control inputnumber" value="A-120 => Basic"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus20" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper20" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname21" class="form-control inputnumber"
                            value="A-121 => Vehicle for Privileged Officers" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus21" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper21" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 10px">
                    <div class="col-md-4">
                        <input type="text" name="dataname22" class="form-control inputnumber"
                            value="A-122 => Telephone Allowance" readonly>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="apstatus22" class="form-control inputnumber">
                                <option value="">Select Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="amporper22" class="form-control inputnumber"
                                placeholder="Enter Amount or Percentage">
                        </div>
                    </div>
                </div>
                <br>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')"
                        style="border-radius: 10px;"><i class="fa fa-save"></i> Add</button>
                </div>
                </form>
            </div>
    </div>
</div>
<br>
</section>
</div>
<script>


</script>
<script>
    $(document).ready(function () {
            $("#AllowanceSet").addClass('active');
        });
</script>
</div>

@endsection