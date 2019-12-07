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
                <th>Register</th>
                <th width="15%"></th>
            </tr>
            
        </thead>
        <tbody id="myBody">
            @foreach ($users as $user)
                @if($user->role != "admin")
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{is_null($user->password) || $user->password == '' ? 'Unregistered' : 'Registered'}}</td>
                        {{-- <td>{{$user->phone}}</td>
                        <td>{{$user->address}}, {{$user->city}}, {{$user->state}} {{$user->zipcode}}</td> --}}
                        <td>
                            <div>
                                {{-- <a href="{{ action('UserController@show', ['id' => $user->id]) }}"> --}}
                                <a href="/user/{{$user->id}}">
                                    <button type="button" class="btn btn-primary" name="viewUser" id="viewDP" title="View User"><i class="fa fa-eye"></i>
                                    </button>
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