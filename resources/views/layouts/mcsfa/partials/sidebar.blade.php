<aside class="main-sidebar">
    <section class="sidebar">
    <div class="user-panel"> </div>
    <ul class="sidebar-menu" data-widget="tree">
    <li id="Dashboard"><a href="/dashboard" style="font-size:12px"> <span>Dashboard</span></a></li>

    
    <li id="SettingsPanel" class="treeview">
        <a href="javascript:void(0)" style="">
            <span><i class="fa fa-gears"></i> Settings</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li id="OfcInfo"><a style="" href="{{ URL::to('/')}}/settings/officeInfo">Office Information</a></li>
            <li id="LoanType"><a style="" href="{{ URL::to('/')}}/settings/loan">Loan Type</a></li>
            <li id="EmpAbsInfo"><a style="" href="{{ URL::to('/')}}/settings/employee-absence">Employee Absence Information</a></li>
            <li id="PayScale"><a style="" href="{{ URL::to('/')}}/">Pay Scale</a></li>
            <li id="Degn"><a style="" href="{{ URL::to('/')}}/">Designation</a></li>
            <li id="Dept"><a style="" href="{{ URL::to('/')}}/">Department</a></li>
            <li id="SubDept"><a style="" href="{{ URL::to('/')}}/">Sub Department</a></li>
            <li id="Allw"><a style="" href="{{ URL::to('/')}}/missettings/allowance">Allowance Type</a></li>
            <li id="Deduct"><a style="" href="{{ URL::to('/')}}/missettings/deduction">Deduction Type</a></li>
            <li id="House"><a style="" href="{{ URL::to('/')}}/missettings/house">House Type</a></li>
            <li id="Areas"><a style="" href="{{ URL::to('/')}}/missettings/area">Area Type</a></li>
            <li id="Locations"><a style="" href="{{ URL::to('/')}}/missettings/location">Add Location</a></li>
        </ul>
    </li>                                        
    <li id="Allowance"><a href="{{ URL::to('/')}}/allowance" style="font-size:12px"> <span>Allowance</span></a></li>
    <li id="AllowanceSet"><a href="{{ URL::to('/')}}/allowanceset" style="font-size:12px"> <span>Allowance Set</span></a></li>
    <li id="Deduction"><a href="{{ URL::to('/')}}/deduction" style="font-size:12px"> <span>Deduction</span></a></li>
    <li id="DeductionSet"><a href="{{ URL::to('/')}}/deductionset" style="font-size:12px"> <span>Deduction Set</span></a></li>
    <li id="EmployeeSuspend"><a href="{{ URL::to('/')}}/employesuspend" style="font-size:12px"> <span>Employee Suspend Info</span></a></li>
    <li id="ProfessionalInfo"><a href="{{ URL::to('/')}}/professionalinfo" style="font-size:12px"> <span>Professional Info</span></a></li>
    <li id="PersonalInfo"><a href="{{ URL::to('/')}}/personalinfo/807" style="font-size:12px"> <span>Personal Info</span></a></li>
    <li id="IncrementInfo"><a href="{{ URL::to('/')}}/incrementinfo" style="font-size:12px"> <span>Increment Info</span></a></li>
    <li id="EmpTraningInfo"><a href="{{ URL::to('/')}}/employeetraninginfo" style="font-size:12px"> <span>Employee Traning Info</span></a></li>
    <li id="HouseRentInfo"><a href="{{ URL::to('/')}}/houserentmanage" style="font-size:12px"> <span>House Rent Info</span></a></li>
    <li id="VatTaxPayment"><a href="{{ URL::to('/')}}/vattaxpayment" style="font-size:12px"> <span>Vat & Tax Payment</span></a></li>
    <li id="BudgetModule" class="treeview">
        <a href="javascript:void(0)" style="font-size:12px"> Budget
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li id="budgetCreate"><a  href="#"><i class="fa fa-circle-o"></i> Entry</a></li>
            <li id="budgetManage"><a  href="#"><i class="fa fa-circle-o"></i> Manage</a></li>
            <li id="budgetBill"><a  href="{{ URL::to('/')}}/bill"><i class="fa fa-circle-o"></i> Bill</a></li>
            <li id="BillManage"><a  href="{{ URL::to('/')}}/billmanage"><i class="fa fa-circle-o"></i> Manage Bill</a></li>
        </ul>
    </li>
    {{-- <li id="BillRegistation"><a href="{{ URL::to('/')}}/billregister" style="font-size:12px"> <span>Bill Registation</span></a></li> --}}

    <li id="LoanManagePanel" class="treeview">
        <a href="javascript:void(0)" style="">
            <span> Loan Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li id="LoanManage"><a href="{{ URL::to('/')}}/loanmanage" style="font-size:12px"> <span>Loan Management</span></a></li>
            <li id="LoanSchedule"><a href="{{ URL::to('/')}}/loanschedule" style="font-size:12px"> <span>Loan Schedule</span></a></li>
            <li id="LoanRecovery"><a href="{{ URL::to('/')}}/loanrecovery" style="font-size:12px"> <span>Loan Recovery & Posting</span></a></li>
            <li id="LoanReshedule"><a href="" style="font-size:12px"> <span>Loan Reshedule</span></a></li>
        </ul>
    </li> 

    <li id="CPFandGPECollection"><a href="{" style="font-size:12px"> <span>CPF & GPE Collection</span></a></li>

    <li id="SettingsPanel" class="treeview">
        <a href="javascript:void(0)" style="">
            <span><i class="fa fa-gears"></i> Reports</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li id=""><a style="" href="javascript:void(0)">Office Information</a></li>
            <li id=""><a style="" href="javascript:void(0)">Employee Information</a></li>
            <li id=""><a style="" href="javascript:void(0)">Employee Wise Allowance Deduction</a></li>
            <li id=""><a style="" href="javascript:void(0)">Employee Wise Increment Info</a></li>
            <li id=""><a style="" href="javascript:void(0)">Salary Sate</a></li>
            <li id=""><a style="" href="javascript:void(0)">Bank Statement</a></li>
            <li id=""><a style="" href="javascript:void(0)">Loan Ledger</a></li>
            <li id=""><a style="" href="javascript:void(0)">Loan Recovery by Month</a></li>
            <li id=""><a style="" href="javascript:void(0)">GPF and CPE Collection</a></li>
            <li id=""><a style="" href="javascript:void(0)">CPE Con. Sub. Loan Statement</a></li>
            <li id=""><a style="" href="javascript:void(0)">Employee Bonus List</a></li>
            <li id=""><a style="" href="javascript:void(0)">Employee Arrer Salary Report</a></li>
            <li id=""><a style="" href="javascript:void(0)">Yearly Employee Salary Statement</a></li>

           
        </ul>
    </li> 

    <li id="ServiceInfo"><a href="{{ URL::to('/')}}/serviceinfo" style="font-size:12px"> <span>Service Info</span></a></li>
    

      
    <li id="OpeningBalance" class="treeview">
        <a style="font-size:12px" href="javascript:void(0)"> Opening Balance
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li id="openingbalanceCreate"><a style="font-size:12px" href="{{ URL::to('/')}}/openingbanalace_create">Create</a></li>
            <li id="openingbalanceManage"><a style="font-size:12px" href="{{ URL::to('/')}}/openingbalance">Manage</a></li>
            <!--<li id="openingbalanceReport"><a style="font-size:12px" href="#">Report</a></li>-->
        </ul>
    </li>
    <li id="SubOpeningBalance" class="treeview">
        <a style="font-size:12px" href="javascript:void(0)"> Sub Opening Balance
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li id="subopeningbalanceCreate"><a style="font-size:12px" href="{{ URL::to('/')}}/subopeningbanalace_create">Create</a></li>
            <li id="subopeningbalanceManage"><a style="font-size:12px" href="{{ URL::to('/')}}/subopeningbalance">Manage</a></li>
            <!--<li id="subopeningbalanceReport"><a style="font-size:12px" href="#">Report</a></li>-->
        </ul>
    </li>
    <li id="CPFVoucherModule" class="treeview">
        <a style="font-size:12px" href="javascript:void(0)"> Voucher
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li id="cpfvoucherCreate"><a style="font-size:12px" href="http://192.168.3.231/fa/cpfvoucher/create">Create</a></li>
            <li id="cpfvoucherManage"><a style="font-size:12px" href="http://192.168.3.231/fa/cpfvoucher/manage">Manage</a></li>
            <!--<li id="cpfvoucherReport"><a style="font-size:12px" href="">Report</a></li>-->
        </ul>
    </li>

    <li id="PayableAccount"><a href="{{ URL::to('/')}}/payblepayment" style="font-size:12px"> <span>Payable Account Payment</span></a></li>

</ul>
</section>
</aside>