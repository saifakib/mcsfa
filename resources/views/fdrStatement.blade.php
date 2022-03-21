<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    </style>
<center>
    <h3 class="box-title" style="font-family: Montserrat;font-weight: bold">Bangladesh Bridge Authority</h3>
    <h4 class="box-title" style="font-family: Montserrat;font-weight: bold">FDR Statement</h4>
</center>
                            <table style="font-size:12px;">
                                <thead>
                                    <tr style="font-weight:bold;text-transform: capitalize;font-family:Montserrat">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th colspan="2"></th>
                                        <th colspan="2"></th>
                                        <th></th>
                                        <th colspan="7" style="text-align: center">Interest</th>
                                        <th></th>
                                    </tr>
                                    <tr style="font-weight:bold;text-transform: capitalize;font-family:Montserrat">
                                        <th rowspan="2" style="text-align: center">Bank Name</th>
                                        <th rowspan="2" style="text-align: center">Branch Name</th>
                                        <th rowspan="2" style="text-align: center">FDR Name & Id</th>
                                        <th rowspan="2" style="text-align: center">FDR Account</th>
                                        <th colspan="2" style="text-align: center">Opening</th>
                                        <th colspan="2" style="text-align: center">Renewal</th>
                                        <th rowspan="2" style="text-align: center">Maturity Date</th>
                                        <th rowspan="2" style="text-align: center">Interest Rate</th>
                                        <th rowspan="2" style="text-align: center">Gross Interest</th>
                                        <th colspan="4" style="text-align: center">Deduction</th>
                                        <th rowspan="2" style="text-align: center">Net Interest</th>
                                        <th rowspan="2" style="text-align: center">Net Amount(Principle + Net Interest)</th>
                                    </tr>
                                    <tr style="font-weight:bold;text-transform: capitalize;font-family:Montserrat">
                                        <th style="text-align: center">Date</th>
                                        <th style="text-align: center">Principle</th>
                                        <th style="text-align: center">Date</th>
                                        <th style="text-align: center">Principle</th>
                                        <th style="text-align: center">AIT</th>
                                        <th style="text-align: center">Circuler</th>
                                        <th style="text-align: center">Excise Duty</th>
                                        <th style="text-align: center">Total Deduction</th>
                                    </tr>
                                </thead>
                                <tbody role="rowgroup">
                                    @foreach($getfdrinfo as $value)
                                    <tr role="row">
                                        <td style="text-align: center">{{ $value->bankname }}</td>
                                        <td style="text-align: center">{{ $value->branchname }}</td>
                                        <td style="text-align: center; padding-left: 10px;padding-right: 10px;">{{ $value->fdr_name }} - {{ $value->fdr_id }}</td>
                                        <td style="text-align: center">{{ $value->fdr_number }}</td>
                                        <td style="text-align: center; padding-left: 10px;padding-right: 10px;">{{ $value->opening_date }}</td>
                                        <td style="text-align: center">{{ $value->start_amount }}</td>
                                        <td style="text-align: center; padding-left: 10px;padding-right: 10px;">{{ $value->renewal_date }}</td>
                                        <td style="text-align: center">{{ $value->renewal_amount }}</td>
                                        <td style="text-align: center; padding-left: 10px;padding-right: 10px;">{{ $value->maturity_date }}</td>
                                        <td style="text-align: center">{{ $value->interest_rate }}</td>
                                        <?php 
                                            $gross = (($value->renewal_amount / 100) * $value->interest_rate) + $value->renewal_amount;
                                            $total_deduction = $value->tax_rate + $value->excise_duty; 
                                            $net_interest = $gross - $total_deduction;
                                            $net_amount = $value->renewal_amount + $net_interest;
                                        ?>
                                        <td style="text-align: center">{{ $gross }}</td>
                                        <td style="text-align: center; padding-left: 10px;padding-right: 10px;">{{ $value->tax_rate }}</td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center">{{ $value->excise_duty }}</td>
                                        <td style="text-align: center">{{ $total_deduction }}</td>
                                        <td style="text-align: center">{{ $net_interest }}</td>
                                        <td style="text-align: center">{{ $net_amount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <br>
                                <tbody role="rowgroup">
                                    @foreach($getfdrinfo as $value)
                                    <tr role="row" >
                                        <td style="text-align: center">{{ $value->bankname }}</td>
                                        <td style="text-align: center">{{ $value->branchname }}</td>
                                        <td style="text-align: center; padding-left: 10px;padding-right: 10px;">{{ $value->fdr_name }} - {{ $value->fdr_id }}</td>
                                        <td style="text-align: center">{{ $value->fdr_number }}</td>
                                        <td style="text-align: center; padding-left: 10px;padding-right: 10px;">{{ $value->opening_date }}</td>
                                        <td style="text-align: center">{{ $value->start_amount }}</td>
                                        <td style="text-align: center; padding-left: 10px;padding-right: 10px;">{{ $value->renewal_date }}</td>
                                        <td style="text-align: center">{{ $value->renewal_amount }}</td>
                                        <td style="text-align: center; padding-left: 10px;padding-right: 10px;">{{ $value->maturity_date }}</td>
                                        <td style="text-align: center">{{ $value->interest_rate }}</td>
                                        <?php 
                                            $gross = (($value->renewal_amount / 100) * $value->interest_rate) + $value->renewal_amount;
                                            $total_deduction = $value->tax_rate + $value->excise_duty; 
                                            $net_interest = $gross - $total_deduction;
                                            $net_amount = $value->renewal_amount + $net_interest;
                                        ?>
                                        <td style="text-align: center">{{ $gross }}</td>
                                        <td style="text-align: center; padding-left: 10px;padding-right: 10px;">{{ $value->tax_rate }}</td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center">{{ $value->excise_duty }}</td>
                                        <td style="text-align: center">{{ $total_deduction }}</td>
                                        <td style="text-align: center">{{ $net_interest }}</td>
                                        <td style="text-align: center">{{ $net_amount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
