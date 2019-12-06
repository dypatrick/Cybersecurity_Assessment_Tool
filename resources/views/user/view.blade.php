@extends('layouts.layout')

@section('title')
    View User
@endsection

@section('content')
    <center><h6 class="blueLineTitle">Profile of {{$user->name}}</h6></center>
    <label for="name">      Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="name" name="name" maxlength="255" value="{{$user->name}}" disabled/></label><br>
    <label for="userName">  User Name: <input type="text" id="userName" name="userName" maxlength="255" value="{{$user->username}}" disabled/></label><br>
    <label for="email">     Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="email" name="email" maxlength="255" value="{{$user->email}}" disabled/></label><br>
    <label for="jobtitle">  Job Title:&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="jobtitle" name="jobtitle" maxlength="255" value="{{$user->jobtitle}}" disabled/></label><br>
    <label for="company">   Company:&nbsp;&nbsp;&nbsp; <input type="text" id="company" name="company" maxlength="255" value="{{$user->company}}" disabled/></label><br>
    <label for="industry">  Industry:&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="industry" name="industry" maxlength="255" value="{{$user->industry}}" disabled/></label><br>
    <label for="phone">     Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="phone" name="phone" maxlength="255" value="{{$user->phone}}" disabled/></label><br>
    <label for="address">   Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="address" name="address" maxlength="255" value="{{$user->address}}" disabled/></label><br>
    <label for="city">      City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="city" name="city" maxlength="255" value="{{$user->city}}" disabled/></label><br>
    <label for="state">     State:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="state" name="state" maxlength="255" value="{{$user->state}}" disabled/></label><br>
    <label for="zipcode">   Zip Code:&nbsp;&nbsp;&nbsp; <input type="text" id="zipcode" name="zipcode" maxlength="255" value="{{$user->zipcode}}" disabled/></label><br>
    <label for="status">    Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="status" name="status" maxlength="255" value="{{is_null($user->password) || $user->password == '' ? 'Unregistered' : 'Registered'}}" disabled/></label><br>
@endsection