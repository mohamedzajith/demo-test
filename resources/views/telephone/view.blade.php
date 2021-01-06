@extends('layouts.app')

@section('styles')
    <link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>Dashboard</div>
                    <div><a href="{{route('telephone.create')}}" class="btn btn-link btn-outline-primary">Import Numbers</a></div>
                </div>
                <div class="card-body">
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100"
                           id="telephone-numbers">
                        <thead>
                        <tr>
                            <th>id #</th>
                            <th>Name</th>
                            <th>Number</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jscript')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        let table = $("#telephone-numbers").DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": true,
            "ajax":  "{{route('telephone.filter')}}",
            "searching": true,
            "columns":[
                {data: "id"},
                {data: 'name'},
                {data: "number"},
            ],
            "ordering": false,
            // "pageLength": 25,
            // "iDisplayLength": 50
        })
    </script>
@endsection
