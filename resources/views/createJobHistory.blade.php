<?php session_start();?>
@extends('layouts.navbar')
@section('title', 'Job History Page')

@section('content')
<!--- Job History Form --->
<form action="createJobHistory" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>"> <br>

	<br />
	<h3>Job History:</h3>
	<table>

		<tr>
			<td><input type="hidden" name="job_history_id" /></td>
		</tr>

		<tr>
			<td>Current Job:</td>
			<td><input type="text" name="current_job" /></td>
		</tr>

		<tr>
			<td>Previous Job:</td>
			<td><input type="text" name="previous_job" /></td>
		</tr>

		<tr>
			<td>Current Employment Dates:</td>
			<td><input type="text" name="current_employment_date" /></td>
		</tr>

		<tr>
			<td>Previous Employment Dates:</td>
			<td><input type="text" name="previous_employment_date" /></td>
		</tr>

		<tr>
			<td>Current Employment Location:</td>
			<td><input type="text" name="current_employment_location" /></td>
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
