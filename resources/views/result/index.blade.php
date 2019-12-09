@extends('layouts.layout')

@section('title')
    Assessments Management
@endsection

@section('content')
    <center><h3>Assessment Management</h3></center>
    <br>

    <table id="myTable" class="col-12 auto-filter auto-sort tableDP ">
        <thead>
            <tr>
                <th>User's name</th>
                <th>Email</th>
                <th width="10%">Point Earned</th>
                <th width="10%">Passing Point</th>
                <th width="10%">Time Used</th>
                <th width="10%">Status</th>
                <th width="15%"></th>
            </tr>
        </thead>
        <tbody id="myBody">
            @foreach ($results as $result)
                <tr>
                    <td>{{$result->user->name}}</td>
                    <td>{{$result->user->email}}</td>
                    <td>{{$result->earned_point}}</td>
                    <td>{{$result->passing_point}}</td>
                    <td>{{$result->time_used}}</td>
                    <td>{{$result->earned_point >= $result->passing_point ? 'Passed' : 'Failed'}}</td>
                    <td>
                        <div>
                            {{-- <a href="">
                                <button type="button" class="btn btn-primary btn-sm" name="viewUser" id="viewDP" title="View Due Process"><i class="fa fa-eye"></i></button>
                            </a> --}}
                        </div>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
    
    {{-- @if($currentYear >= ($maxYear-1))
        <form method="get" action="{{ action('DueProcessController@create') }}">
            <button type="submit" class="btn btn-primary float-right" title="New Due Process">Create New Due Process</button>
        </form>
    @endif --}}
@endsection

@section('specificJS')
    <script src="{{ asset('/js/auto_filter.js') }}"></script>
    <script src="{{ asset('/js/auto_sort.js') }}"></script>
@endsection