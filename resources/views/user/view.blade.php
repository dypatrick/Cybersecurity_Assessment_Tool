@extends('layouts.layout')

@section('title')
    View User
@endsection

@section('content')
    <center><h6 class="blueLineTitle">Profile of {{$user->name}}</h6></center>
    <p class="d-inline">First Name: {{$user->firstname}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <p class="d-inline">Last Name: {{$user->lastname}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <p class="d-inline">Email: {{$user->email}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <p class="d-inline">Job Title: {{$user->jobtitle}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <p class="d-inline">Company: {{$user->company}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <p class="d-inline">Industry: {{$user->industry}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<br><br>
    <p class="d-inline">Phone: {{$user->phone}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <p class="d-inline">Address: {{$user->address}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <p class="d-inline">City: {{$user->city}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <p class="d-inline">State: {{$user->state}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <p class="d-inline">Zipcode: {{$user->zipcode}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <p class="d-inline">Member Status: {{is_null($user->password) || $user->password == '' ? 'Unregistered' : 'Registered'}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <br>
    <br>
    <br>
    <center><h6 class="blueLineTitle">Assessment History of {{$user->name}}</h6></center>
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
            @php
                $results = $user->results;
            @endphp
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
                            <a href="/result/{{$result->id}}">
                                <button type="button" class="btn btn-primary btn-sm" name="viewTest" id="viewTest" title="View Assessment"><i class="fa fa-eye"></i></button>
                            </a>
                        </div>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
@endsection