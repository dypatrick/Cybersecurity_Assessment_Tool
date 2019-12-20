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
    <div>
        <center><form method="GET" action="{{ action('UserController@index') }}">
            <p class="d-inline">&nbsp;Member Status: 
                <select id="memberStatus" name="memberStatus">
                    <option value="" selected>Select</option> 
                    <option value="Unregistered">Unregistered</option> 
                    <option value="Registered">Registered</option> 
                </select>
            </p>
            <p class="d-inline">&nbsp;&nbsp;&nbsp;State: 
                <select id="state" name="state">
                    <option value="" selected>Select</option> 
                    @foreach($states as $state)
                        <option value="{{$state}}">{{$state}}</option>  
                    @endforeach
                </select>
            </p>
            <p class="d-inline">&nbsp;&nbsp;&nbsp;From: 
                <input type="date" id="fromDate" name="fromDate">
            </p>
            <p class="d-inline">&nbsp;&nbsp;&nbsp;To: 
                <input type="date" id="toDate" name="toDate">
            </p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Sort</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
        </form></center>
        <br>
        <center><a href="/export"><button type="button" class="btn btn-primary d-inline" title="New Due Process">Export User Data</button></a></center>
        
    </div>
    <br>

    <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Member Status</th>
                <th>City</th>
                <th>State</th>
                <th width="15%"></th>
            </tr>
            
        </thead>
        <tbody id="myBody">
            @foreach ($users as $user)
                @if($user->role != "admin")
                    <tr>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{is_null($user->password) || $user->password == '' ? 'Unregistered' : 'Registered'}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->state}}</td>
                        {{-- <td>{{$user->phone}}</td>
                        <td>{{$user->address}}, {{$user->city}}, {{$user->state}} {{$user->zipcode}}</td> --}}
                        <td>
                            <div>
                                {{-- <a href="{{ action('UserController@show', ['id' => $user->id]) }}"> --}}
                                <a href="/user/{{$user->id}}">
                                    <button type="button" class="btn btn-primary btn-sm" name="viewUser" id="viewDP" title="View Test Results"><i class="fa fa-eye"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    

</div>
@endsection

@section('specificJS')
    <script src="{{ asset('/js/auto_filter.js') }}"></script>
    <script src="{{ asset('/js/auto_sort.js') }}"></script>
    <script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
            //$('#myTable').DataTable();
        $('#myBody').DataTable({
        "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
        });
 
    });
    </script>
@endsection