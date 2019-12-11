@extends('layouts.layout')

@section('title')
    Assessments Management
@endsection

@section('content')
    <center><h3>Assessment Demographic</h3></center>
    <br>

    <center>
    <img src="/img/pie-chart.png" class="img-fluid">
    </center>
@endsection

@section('specificJS')
    <script src="{{ asset('/js/auto_filter.js') }}"></script>
    <script src="{{ asset('/js/auto_sort.js') }}"></script>
@endsection