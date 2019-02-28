<?php
session_start();
use App\Services\Business\JobBusinessService;
?>
@extends('layouts.navbar')
@section('title', 'Admin Page')

@section('content')

<head>
<style>
#user {
	font-family: "Comic Sans", Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 100%;
}

#user td, #user th {
	border: 1px solid #ddd;
	padding: 8px;
}

#user tr:nth-child(even) {
	background-color: #f2f2f2;
}

#user tr:hover {
	background-color: #ddd;
}

#user th {
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: left;
	background-color: #4CAF50;
	color: white;
}

#user thead {
	background-color: #aabd8c;
}
</style>

</head>
<table id="user">
	<thead>
		<th>Job ID</th>
		<th>Employer Name</th>
		<th>Employer City</th>
		<th>Employer State</th>
		<th>Employer Zip Code</th>
		<th>Job Title</th>
		<th>Job Description</th>
		<th>Date Posted</th>
	</thead>
	<tbody>

<?php
// user business service is called
$bs = new JobBusinessService();
$jobs = $bs->showJobPosts();
// for loop to populate the data table in the displayUsers view
for ($x = 0; $x < count($jobs); $x ++) {
    echo "<tr>";
    echo "<td>" . $jobs[$x]['JOB_ID'] . "</td>";
    echo "<td>" . $jobs[$x]['COMPANY_NAME'] . "</td>";
    echo "<td>" . $jobs[$x]['COMPANY_CITY'] . "</td>";
    echo "<td>" . $jobs[$x]['COMPANY_STATE'] . "</td>";
    echo "<td>" . $jobs[$x]['COMPANY_ZIP_CODE'] . "</td>";
    echo "<td>" . $jobs[$x]['JOB_TITLE'] . "</td>";
    echo "<td>" . $jobs[$x]['JOB_DESCRIPTION'] . "</td>";
    echo "<td>" . $jobs[$x]['DATE_POSTED'] . "</td>";
}
?>

</table>
<!-- //loops through jobs array and prints values -->
@endsection
