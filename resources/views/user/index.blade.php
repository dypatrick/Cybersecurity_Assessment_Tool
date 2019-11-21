@extends('layouts.layout')

@section('title')
    User Management
@endsection

@section('content')
    {{-- @php
        $maxYear = max($years);
    @endphp --}}
    <center><h3>User Management</h3></center>
    <br>
    {{-- <div>
        <form method="GET" action="">
            <p>&nbsp;School Year: 
                <select id="dropYear" name="dropYear" onchange="this.form.submit()">
                    @foreach($years as $year)
                        @if($year == $currentYear)
                            <option selected value="{{$year}}">{{$year}}</option>  
                        @else
                            <option value="{{$year}}">{{$year}}</option>  
                        @endif  
                    @endforeach
                </select>
            </p>
        </form>
    </div> --}}

    <table id="myTable" class="col-12 auto-filter auto-sort tableDP">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                <th>Phone</th>
                <th>Address</th>
                <th width="15%"></th>
            </tr>
            
        </thead>
        <tbody id="myBody">
            @foreach ($users as $user)
                @if($user->role != "admin")
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->company}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}, {{$user->city}}, {{$user->state}} {{$user->zipcode}}</td>
                        <td>
                            <div>
                                <a href="">
                                    <button type="button" class="btn btn-warning btn-sm" name="editUser" id="editDP" title="Edit Due Process"><i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="">
                                <button type="button" class="btn btn-danger btn-sm" name="deleteUser" data-toggle="tolltip" title="Delete This User"><i class="fa fa-trash"></i></button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endif
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