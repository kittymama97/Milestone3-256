@extends('layouts.navbar')
@section('title', 'Login Success Page')

@section('content')
	<?php
if (session()->has('active')) {
    if (session()->get('active') != 1) {
        echo "<h5>Success! You are now logged in</h5>";
        "<br>";
    } 
    else {
        echo "<h5>This account has been suspended. Please contact customer service.</h5>";
    }
}
?>

@endsection