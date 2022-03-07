@extends('layouts.mcsfa.app')
@section('content')

<div id="contentWrapper" style="font-family: Montserrat">
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
        <h1>Employee Traning Information</h1>
    </section>
    <section class="content animated fadeInRight">

        <div class="box" style="border: 2px solid #3c8dbc">
            <div class="box-body">
                <div class="table-responsive">
                    <table data-page-length='100' class="table table-bordered table-striped getTable">
                        <thead>
                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                <th style="text-align: center">Traning Id</th>
                                <th style="text-align: center">Employee Id</th>
                                <th style="text-align: center">Emp Name</th>
                                <th style="text-align: center">Traning Type</th>
                                <th style="text-align: center">Date From</th>
                                <th style="text-align: center">Date To</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($emoployeestraning['items'] as $value)
                            <tr>
                                <td style="text-align: center">{{ $value['employee_training_id'] }}</td>
                                <td style="text-align: center">{{ $value['employe_id'] }}</td>
                                <td style="text-align: center">{{ $value['name_english'] }}</td>
                                <td style="text-align: center">{{ $value['training_type'] }}</td>
                                <td style="text-align: center">{{ $value['date_from'] }}</td>
                                <td style="text-align: center">{{ $value['date_to'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    </div>
    <script>
        $(document).ready(function () {
            $("#EmpTraningInfo").addClass('active');
        });
    </script>
</div>



@endsection