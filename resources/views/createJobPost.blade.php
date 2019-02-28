
<?php
session_start();
use App\Services\Business\UserBusinessService;
use App\Services\Business\JobBusinessService;
?>
@extends('layouts.navbar')
@section('title', 'Admin Page')

@section('content')
<form action="createJobPost" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>"> <br>

	<br />
	<h3>Job:</h3>
	<table>

		<tr>
			<td><input type="hidden" name="job_id" /></td>
		</tr>

		<tr>
			<td>Company Name:</td>
			<td><input type="text" name="company_name" /></td>
		</tr>

		<tr>
			<td>Company City:</td>
			<td><input type="text" name="company_city" /></td>
		</tr>

		<tr>
			<td>Company State:</td>
			<td><input type="text" name="company_state" /></td>
		</tr>

		<tr>
			<td>Company Zip Code:</td>
			<td><input type="text" name="company_zip_code" /></td>
		</tr>

		<tr>
			<td>Job Title:</td>
			<td><input type="text" name="job_title" /></td>
		</tr>

		<tr>
			<td>Job Description:</td>
			<td><input type="text" name="job_description" /></td>
		</tr>

		<tr>
			<td>Date Posted:</td>
			<td><input type="text" name="date_posted" /></td>
		</tr>
	</table>

	<br>

	<table>
		<tr>
		
		
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Submit" /></td>
		</tr>
	</table>
</form>

@endsection
