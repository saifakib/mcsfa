   <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .printbutton{
        border-radius: 10px;
        float: right;
        background-color: #367fa9;
        color: #fff;
        padding: 10px;
        font-weight: bold;
        cursor: pointer;
    }
    .backbutton{
        border-radius: 10px;
        float: left;
        background-color: #367fa9;
        color: #fff;
        padding: 10px;
        font-weight: bold;
        cursor: pointer;
    }
</style>
<button onclick="window.location.href ='{{URL::to('allsalarystatement?month='.$month.'&task=view')}}'" class="backbutton"> Back</button>
<button onclick="printDi('printarea')" class="printbutton"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
<div id="printarea">
    <center>
        <h3 class="box-title" style="font-family: Montserrat;font-weight: bold">Bangladesh Bridge Authority</h3>
        <h5 class="box-title" style="font-family: Montserrat;font-weight: bold;margin-top: -15px;">Setu Bhaban, Banani, Dhaka</h5>
        <h4 class="box-title" style="font-family: Montserrat;font-weight: bold;margin-top: -15px;">Salary Statement of the month <?= $monthdata ?></h4>
    </center>
    <table style="font-size:12px;">
        <thead>
            <tr style="font-weight:bold;text-transform: capitalize;font-family:Montserrat">
                <th style="text-align: center; vertical-align: middle" rowspan="2">Emp No</th>
                <th style="text-align: center; vertical-align: middle" rowspan="2">Name & Designation</th>
                <th style="text-align: center; vertical-align: middle" rowspan="2">Basic</th>
                <th style="text-align: center" colspan="4">Allowances</th>
                <th style="text-align: center; vertical-align: middle" rowspan="2">Total Gross Pay</th>
                <th style="text-align: center" colspan="8">Deductions</th>
                <th style="text-align: center; vertical-align: middle" rowspan="2">Total Deduction</th>
                <th style="text-align: center; vertical-align: middle" rowspan="2">Salary Payable</th>
            </tr>
            <tr style="font-weight:bold;text-transform: capitalize;font-family:Montserrat; text-align: left;">
                <th style="text-transform: lowercase; vertical-align: baseline">
                    <span style="display: block">a)</span>
                    <span style="display: block">b)</span>
                    <span style="display: block">c)</span>
                    <span style="display: block">d)</span>
                    <span style="display: block">e)</span>
                    <span style="display: block">f)</span>
                    <span style="display: block">g)</span>
                    <span style="display: block">h)</span>
                    <span style="display: block">i)</span>
                    <span style="display: block">J)</span>
                </th>
                <th style="vertical-align: baseline;">
                    <span style="display: block">House Rent</span>
                    <span style="display: block">Medical</span>
                    <span style="display: block">Tiffin</span>
                    <span style="display: block">Washing</span>
                    <span style="display: block">Conveyance</span>
                    <span style="display: block">Entertainment</span>
                    <span style="display: block">Insentive</span>
                    <span style="display: block">Charge A</span>
                    <span style="display: block">CPFContrib</span>
                    <span style="display: block">Telephone</span>
                </th>
                <th style="text-transform: lowercase; vertical-align: baseline">
                    <span style="display: block">k)</span>
                    <span style="display: block">l)</span>
                    <span style="display: block">m)</span>
                    <span style="display: block">n)</span>
                    <span style="display: block">o)</span>
                    <span style="display: block">p)</span>
                    <span style="display: block">q)</span>
                    <span style="display: block">r)</span>
                    <span style="display: block">s)</span>
                    <span style="display: block">t)</span>
                </th>
                <th style="vertical-align: baseline">
                    <span style="display: block">Dearness</span>
                    <span style="display: block">Pension</span>
                    <span style="display: block">PA Allowance</span>
                    <span style="display: block">Deputaion A</span>
                    <span style="display: block">Servant A</span>
                    <span style="display: block">Mobile Bill</span>
                    <span style="display: block">Domestic_Aid</span>
                    <span style="display: block">Education</span>
                    <span style="display: block">Privig. Off Vehicle</span>
                    <span style="display: block">Others A.</span>
                </th>
                <th style="text-transform: lowercase; vertical-align: baseline">
                    <span style="display: block">a)</span>
                    <span style="display: block">b)</span>
                    <span style="display: block">c)</span>
                    <span style="display: block">d)</span>
                    <span style="display: block">e)</span>
                    <span style="display: block">f)</span>
                    <span style="display: block">g)</span>
                    <span style="display: block">h)</span>
                    <span style="display: block">i)</span>
                </th>
                <th style="vertical-align: baseline">
                    <span style="display: block">GPF Fund</span>
                    <span style="display: block">CPF Contrib</span>
                    <span style="display: block">CPF Subscriptn</span>
                    <span style="display: block">Welfare Fund</span>
                    <span style="display: block">Pention</span>
                    <span style="display: block">Group Ins</span>
                    <span style="display: block">Fuel</span>
                    <span style="display: block">Car Rent</span>
                    <span style="display: block">Service Charge</span>
                </th>
                <th style="text-transform: lowercase; vertical-align: baseline">
                    <span style="display: block">j)</span>
                    <span style="display: block">k)</span>
                    <span style="display: block">l)</span>
                    <span style="display: block">m)</span>
                    <span style="display: block">n)</span>
                    <span style="display: block">o)</span>
                    <span style="display: block">p)</span>
                    <span style="display: block">q)</span>
                    <span style="display: block">r)</span>
                </th>
                <th style="vertical-align: baseline; ">
                    <span style="display: block">House Rent</span>
                    <span style="display: block">Telephone Bill</span>
                    <span style="display: block">Gas Bill</span>
                    <span style="display: block">Electric Bill</span>
                    <span style="display: block">Water Bill</span>
                    <span style="display: block">Swearage</span>
                    <span style="display: block">Incime Tax</span>
                    <span style="display: block">Other Deduct</span>
                    <span style="display: block">Revenue Stamp</span>
                </th>
                <th style="text-transform: lowercase; vertical-align: baseline">
                    <span style="display: block">a)</span>
                    <span style="display: block">b)</span>
                    <span style="display: block">c)</span>
                    <span style="display: block">d)</span>
                    <span style="display: block">e)</span>
                    <span style="display: block">f)</span>
                    <span style="display: block">g)</span>
                </th>
                <th style="vertical-align: baseline">
                    <span style="display: block">Motor Loan</span>
                    <span style="display: block">House Loan</span>
                    <span style="display: block">GPE Loan</span>
                    <span style="display: block">CPF Loan</span>
                    <span style="display: block">Comp. Loan</span>
                    <span style="display: block">Welfare Loan</span>
                    <span style="display: block">Privil. Off Vehicle Loan</span>
                </th>
                <th style="text-transform: lowercase; vertical-align: baseline"> 
                    <span style="display: block">a)</span>
                    <span style="display: block">b)</span>
                    <span style="display: block">c)</span>
                    <span style="display: block">d)</span>
                    <span style="display: block">e)</span>
                    <span style="display: block">f)</span>
                    <span style="display: block">g)</span>
                </th>
                <th style="vertical-align: baseline">
                    <span style="display: block">Motor Loan</span>
                    <span style="display: block">House Loan</span>
                    <span style="display: block">GPE Loan</span>
                    <span style="display: block">CPF Loan</span>
                    <span style="display: block">Comp. Loan</span>
                    <span style="display: block">Welfare Loan</span>
                    <span style="display: block">Privil. Off Vehicle Loan</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($salarystatement as $value) {
                ?>
                <tr style="text-transform: capitalize;font-family:Montserrat">
                    <td style="text-align: center; vertical-align: baseline; width: 50px" rowspan="11"><?= $value->empregidno ?></td>
                    <td style="text-align: justify; vertical-align: baseline; width: 200px" rowspan="11"><?= $value->employeeame ?>, <?= $value->designation ?>,<br> <?= $value->gscale ?></td>
                    <td style="text-align: center; vertical-align: baseline;  width: 100px" rowspan="11"><?= number_format($value->basicamount, 2, '.', ',') ?></td>
                    <td  style="" colspan="4"></td >
                    <td  style="text-align: center; vertical-align: baseline; width: 100px" rowspan="11"><?= number_format($value->totalgrosepay, 2, '.', ',') ?></td >
                    <td  style="" colspan="8"></td >
                    <td  style="text-align: center; vertical-align: baseline; width: 100px" rowspan="11"><?= number_format($value->totaldeduction, 2, '.', ',') ?></td >
                    <td  style="text-align: center; vertical-align: baseline; width: 100px" rowspan="11"><?= number_format($value->payablesalary, 2, '.', ',') ?></td >
                </tr>
                <tr style="text-align: right">
                    <td style="text-transform: lowercase">a)</td >
                    <td><?= number_format($value->house , 2, '.', ',') ?></td >
                    <td style="text-transform: lowercase">k)</td >
                    <td><?= number_format($value->dearness , 2, '.', ',') ?></td>
                    <td  style="text-transform: lowercase">a)</td >
                    <td ><?= number_format($value->gpfd  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">j)</td >
                    <td ><?= number_format($value->housrent  , 2, '.', ',') ?> </td >
                    <td  style="text-transform: lowercase">a)</td >
                    <td ><?= number_format($value->motorloan  , 2, '.', ',') ?> (install_no) </td >
                    <td  style="text-transform: lowercase">a)</td >
                    <td ></td >
                </tr>
                <tr style="text-align: right">
                    <td  style="text-transform: lowercase">b)</td >
                    <td ><?= number_format($value->medical , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">i)</td >
                    <td ><?= number_format($value->pension  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">b)</td >
                    <td ><?= number_format($value->cpfcontrib  , 2, '.', ',') ?> </td >
                    <td  style="text-transform: lowercase">j)</td >
                    <td ><?= number_format($value->telephonebill   , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">b)</td >
                    <td ><?= number_format($value->housebldgloan  , 2, '.', ',') ?> (install_no)</td >
                    <td  style="text-transform: lowercase">b)</td >
                    <td ><?= number_format($value->housebldgloanint  , 2, '.', ',') ?> </td >
                </tr>
                <tr style="text-align: right">
                    <td  style="text-transform: lowercase">c)</td >
                    <td ><?= number_format($value->tiffin , 2, '.', ',') ?> </td >
                    <td  style="text-transform: lowercase">m)</td >
                    <td ><?= number_format($value->pa , 2, '.', ',') ?></td >

                    <td  style="text-transform: lowercase">c)</td >
                    <td ><?= number_format($value->cpfsubscrptn  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">k)</td >
                    <td ><?= number_format($value->gasbill  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">c)</td >
                    <td ><?= number_format($value->gpfloan  , 2, '.', ',') ?> (install_no)</td >
                    <td  style="text-transform: lowercase">c)</td >
                    <td ><?= number_format($value->gpfloanint  , 2, '.', ',') ?></td >
                </tr>
                <tr style="text-align: right">
                    <td  style="text-transform: lowercase">d)</td >
                    <td ><?= number_format($value->washing  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">n)</td >
                    <td ><?= number_format($value->deputation  , 2, '.', ',') ?></td >

                    <td  style="text-transform: lowercase">d)</td >
                    <td ><?= number_format($value->welfare  , 2, '.', ',') ?> </td >
                    <td  style="text-transform: lowercase">i)</td >
                    <td ><?= number_format($value->electricbill  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">d)</td >
                    <td ><?= number_format($value->cpfloan  , 2, '.', ',') ?> (install_no)</td >
                    <td  style="text-transform: lowercase">d)</td >
                    <td ><?= number_format($value->cpfloanint  , 2, '.', ',') ?></td >
                </tr>
                <tr style="text-align: right">
                    <td  style="text-transform: lowercase">e)</td >
                    <td ><?= number_format($value->conveyance  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">o)</td >
                    <td ><?= number_format($value->servent  , 2, '.', ',') ?></td >

                    <td  style="text-transform: lowercase">e)</td >
                    <td ><?= number_format($value->pension  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">m)</td >
                    <td ><?= number_format($value->wasabill  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">e)</td >
                    <td ><?= number_format($value->computerloan  , 2, '.', ',') ?> (install_no)</td >
                    <td  style="text-transform: lowercase">e)</td >
                    <td ><?= number_format($value->computerloanint  , 2, '.', ',') ?></td >
                </tr>
                <tr style="text-align: right">
                    <td  style="text-transform: lowercase">f)</td >
                    <td ><?= number_format($value->entertainment    , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">p)</td >
                    <td ><?= number_format($value->mobile   , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">f)</td >
                    <td >.00</td >
                    <td  style="text-transform: lowercase">n)</td >
                    <td >.00</td >
                    <td  style="text-transform: lowercase">f)</td >
                    <td > (install_no)</td >
                    <td  style="text-transform: lowercase">f)</td >
                    <td ></td >
                </tr>
                <tr style="text-align: right">
                    <td  style="text-transform: lowercase">g)</td >
                    <td ><?= number_format($value->insentive , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">q)</td >
                    <td ><?= number_format($value->domistic , 2, '.', ',') ?></td >

                    <td  style="text-transform: lowercase">g)</td >
                    <td ><?= number_format($value->fuel  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">o)</td >
                    <td ><?= number_format($value->incometax  , 2, '.', ',') ?> </td >
                    <td  style="text-transform: lowercase">g)</td >
                    <td > (install_no)</td >
                    <td  style="text-transform: lowercase">g)</td >
                    <td ></td >
                </tr>
                <tr style="text-align: right">
                    <td  style="text-transform: lowercase">h)</td >
                    <td ><?= number_format($value->charge   , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">r)</td >
                    <td ><?= number_format($value->education   , 2, '.', ',') ?> </td >

                    <td  style="text-transform: lowercase">h)</td >
                    <td ><?= number_format($value->carrent   , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">p)</td >
                    <td ><?= number_format($value->othersd , 2, '.', ',') ?></td >
                    <td rowspan="3"></td >
                    <td rowspan="3"></td >
                    <td rowspan="3"></td >
                    <td rowspan="3"></td >
                </tr>
                <tr style="text-align: right">
                    <td  style="text-transform: lowercase">i)</td >
                    <td ><?= number_format($value->cpfcontrib  , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">s)</td >
                    <td ></td >

                    <td  style="text-transform: lowercase">i)</td >
                    <td ><?= number_format($value->serviced , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">q)</td >
                    <td ><?= number_format($value->revenuestamp , 2, '.', ',') ?></td >
                </tr>
                <tr style="text-align: right">
                    <td  style="text-transform: lowercase">j)</td >
                    <td ><?= number_format($value->telephone , 2, '.', ',') ?></td >
                    <td  style="text-transform: lowercase">t)</td >
                    <td ><?= number_format($value->othersd , 2, '.', ',') ?></td >

                    <td></td >
                    <td ></td>
                    <td></td >
                    <td ></td >
                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>

    </table>
</div>
<script type="text/javascript">
//    function printDi(printarea) {
//        var css = '@page { size: landscape; }',
//                head = document.head || document.getElementsByTagName('printarea')[0],
//                style = document.createElement('style');
//
//        style.type = 'text/css';
//        style.media = 'print';
//
//        if (style.styleSheet) {
//            style.styleSheet.cssText = css;
//        } else {
//            style.appendChild(document.createTextNode(css));
//        }
//
//        head.appendChild(style);
//
//        window.print();
//    }
    function printDi(printarea) {
        var printContents = document.getElementById(printarea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
   
   