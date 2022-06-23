@extends('layouts.master')
@section('title')
    Billing list
    @stop()
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add a product</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('Edit'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Billss</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Billing List</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
        </div>
    </div>
    <div class="row row-sm">
    </div>
    <!--/div-->

    <!--div-->

    <!--/div-->

    <!--div-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="col-sm-6 col-md-4 col-xl-3">
                        <a href="invoices/create" class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale">Add Bill</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">Invoice number</th>
                            <th class="border-bottom-0">Invoice date</th>
                            <th class="border-bottom-0">Due date</th>
                            <th class="border-bottom-0">Product</th>
                            <th class="border-bottom-0">Section</th>
                            <th class="border-bottom-0">Discount</th>
                            <th class="border-bottom-0">Tax rate</th>
                            <th class="border-bottom-0">Tax value</th>
                            <th class="border-bottom-0">Total</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0">Value Status</th>
                            <th class="border-bottom-0">Notes</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                        <tr>
                        <?php $i = 0 ?>
                        @foreach($invoices as $invoice)
                            <?php $i++ ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$invoice -> invoice_number}}</td>
                                <td>{{$invoice -> invoice_Date}}</td>
                                <td>{{$invoice -> Due_date}}</td>
                                <td>{{$invoice -> product}}</td>
                                <td><a
                                     href="{{ url('InvoicesDetails') }}/{{ $invoice->id }}">{{ $invoice->section->section_name }}</a>
                                </td>
                                <td>{{ $invoice-> Discount }}</td>
                                <td>{{ $invoice-> Rate_VAT }}</td>
                                <td>{{ $invoice-> Value_VAT }}</td>
                                <td>{{ $invoice-> Total }}</td>
                                <td>
                                    @if ($invoice->Value_Status == 1)
                                        <span class="text-success">{{ $invoice->Status }}</span>
                                    @elseif($invoice->Value_Status == 2)
                                        <span class="text-danger">{{ $invoice->Status }}</span>
                                    @else
                                        <span class="text-warning">{{ $invoice->Status }}</span>
                                    @endif

                                </td>
                                <td>{{$invoice -> Value_Status}}</td>
                                <td>{{$invoice -> note}}</td>

                                <td>

                                    <button class="modal-effect btn btn-sm btn-info"
                                            data-name="{{ $invoice->Products_name }}" data-pro_id="{{ $invoice->id }}"
                                            data-section_name="{{ $invoice->section->section_name }}"
                                            data-description="{{ $invoice->description }}" data-toggle="modal"
                                            data-target="#edit_Product">Edit</button>

                                    <button class="modal-effect btn btn-sm btn-danger" data-pro_id="{{ $invoice->id }}"
                                            data-name="{{ $invoice -> Products_name }}" data-toggle="modal"
                                            data-target="#modaldemo9">Delete</button>

                                </td>
                            </tr>
                        @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

    <!--div-->

    </div>

    </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
