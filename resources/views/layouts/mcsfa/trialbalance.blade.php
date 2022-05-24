@include('layouts.mcsfa.partials.top')
<style>
    .sb {
        border: 1px solid #000000;
    }

    .tc {
        text-align: center;
    }

    .sb1 {
        border: 1px solid #000000;
        padding: 1rem 0;
        margin-bottom: 1rem;
    }

    .sb1p {
        padding: 1rem .5rem;
    }

    .txr {
        margin-right: 5px;
    }

    .txl {
        margin-left: 5px;
    }
</style>
<center>
    <h5 class="box-title" style="font-family: Montserrat;font-weight: bold">Bank Reconcillation Statement for the month
        of January-2022</h5>
    <h5 class="box-title" style="font-family: Montserrat;font-weight: bold">STD A/C No. 1755610, Agrani Bank, Gulshan
        Branch</h5>
</center>

<div class="section" style="margin: 0rem 12rem">
    <div class="row">
        <div class="col-sm-12" style="margin-top: 1rem">
            <div class="sb tc">
                <div class="row">
                    <div class="col-sm-3">
                        <p style="">Code</p>
                    </div>
                    <div class="col-sm-3">
                        <p>Particulars</p>
                    </div>
                    <div class="col-sm-3">
                        <p>Current Period</p>
                    </div>
                    <div class="col-sm-3">
                        <p>Previous Period</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @foreach($codes as $value) --}}
    <div class="row" style="margin-top: 1rem">
        <div class="col-sm-3" >
            <b style="margin-left: 1rem">Assets</b>
        </div>

        <div class="col-sm-12" style="margin-top: 1rem">
            <div class="tc">
                <div class="row">
                    <div class="col-sm-3">
                        <p style="">1000000</p>
                    </div>
                    <div class="col-sm-3">
                        <p>Fixed Assets</p>
                    </div>
                    <div class="col-sm-3">
                        <p>6893467395867589</p>
                    </div>
                    <div class="col-sm-3">
                        <p>6893467395867589</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12" style="margin-top: 1rem">
            <div class="tc">
                <div class="row">
                    <div class="col-sm-3">
                        <p style="">1000000</p>
                    </div>
                    <div class="col-sm-3">
                        <p>Fixed Assets</p>
                    </div>
                    <div class="col-sm-3">
                        <p>6893467395867589</p>
                    </div>
                    <div class="col-sm-3">
                        <p>6893467395867589</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12" style="margin-top: 1rem">
            <div class="tc">
                <div class="row">
                    <div class="col-sm-3">
                        <p style="">1000000</p>
                    </div>
                    <div class="col-sm-3">
                        <p>Fixed Assets</p>
                    </div>
                    <div class="col-sm-3">
                        <p>6893467395867589</p>
                    </div>
                    <div class="col-sm-3">
                        <p>6893467395867589</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12" style="margin-top: 1rem">
            <div class="tc">
                <div class="row">
                    <div class="col-sm-3">
                        <p style="">1000000</p>
                    </div>
                    <div class="col-sm-3">
                        <p>Fixed Assets</p>
                    </div>
                    <div class="col-sm-3">
                        <p>6893467395867589</p>
                    </div>
                    <div class="col-sm-3">
                        <p>6893467395867589</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- footer --}}
        <div class="col-sm-12" style="margin-top: 1rem">
            <div class="tc">
                <div class="row">
                    <div class="col-sm-6">
                        <b>Assets Total:</b>
                    </div>
                    <div class="col-sm-3 sb">
                        <p>6893467395867589</p>
                    </div>
                    <div class="col-sm-3 sb">
                        <p>6893467395867589</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
</div>