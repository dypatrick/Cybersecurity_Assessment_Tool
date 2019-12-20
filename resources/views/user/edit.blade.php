@extends('layouts.layout')

@section('title')
    Edit User Profile
@endsection

@section('content')
    <form method="post" action="{{ action('UserController@update', ['id' => $user->id]) }}" name="myForm">
        @method('PATCH')
        @csrf
        <center><h6 class="blueLineTitle">Edit Profile of {{$user->name}}</h6></center>
        <label for="firstname"> First Name: <input type="text" id="firstname" name="firstname" maxlength="255" value="{{$user->firstname}}"/></label><br>
        <label for="lastname"> Last Name: <input type="text" id="lastname" name="lastname" maxlength="255" value="{{$user->lastname}}"/></label><br>
        <label for="email"> Email: <input type="text" id="email" name="email" maxlength="255" value="{{$user->email}}"/></label><br>
        <label for="jobtitle"> Job Title: <input type="text" id="jobtitle" name="jobtitle" maxlength="255" value="{{$user->jobtitle}}"/></label><br>
        <label for="company"> Company: <input type="text" id="company" name="company" maxlength="255" value="{{$user->company}}"/></label><br>
        <label for="industry"> Industry: <input type="text" id="industry" name="industry" maxlength="255" value="{{$user->industry}}"/></label><br>
        <label for="phone"> Phone: <input type="text" id="phone" name="phone" maxlength="255" value="{{$user->phone}}"/></label><br>
        <label for="address"> Address: <input type="text" id="address" name="address" maxlength="255" value="{{$user->address}}"/></label><br>
        <label for="city"> City: <input type="text" id="city" name="city" maxlength="255" value="{{$user->city}}"/></label><br>
        <label for="state"> State: <input type="text" id="state" name="state" maxlength="255" value="{{$user->state}}"/></label><br>
        <label for="zipcode"> Zipcode: <input type="text" id="zipcode" name="zipcode" maxlength="255" value="{{$user->zipcode}}"/></label><br>
        <input type="hidden" value="{{$user->id}}" name="id">
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Save & Exit</button>
              <br> <br>
        </div>
    </form>
    {{-- <p class="d-inline">First Name: {{$user->firstname}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
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
    <p class="d-inline">Member Status: {{is_null($user->password) || $user->password == '' ? 'Unregistered' : 'Registered'}}</p>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; --}}
    <br>
    <br>
    <br>
    
@endsection