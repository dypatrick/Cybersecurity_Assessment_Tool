@extends('layouts.layout')

@section('title')
    View Assessment Details
@endsection

@section('content')
    @if($result->earned_point >= $result->passing_point)
    <center>
    <img src="/img/pass-score-detail.png" class="img-fluid">
    <img src="/img/pass-category.png" class="img-fluid">
    </center>
    @else
    <center>
    <img src="/img/fail-score-detail.png" class="img-fluid">
    <img src="/img/fail-category.png" class="img-fluid">
    </center>
    @endif
@endsection