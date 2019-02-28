<?php session_start();?>
@extends('layouts.navbar')
@section('title', 'Profile Page')

@section('content')

<a href="updateRegistration">Edit Credentials</a>
<br>
<a href="updateContactInformation"> Edit Contact Information</a>
<br>
<a href="createSkills">Add Skills</a>
<br>
<a href="displaySkills">Manage Skills</a>
<br>
<a href="createEducation">Add Education</a>
<br>
<a href="displayEducation"> Edit Education</a>
<br>
<a href="createJobHistory">Add Job History</a>
<br>
<a href="displayJobHistory"> Edit Job History</a>
<br>
@endsection
