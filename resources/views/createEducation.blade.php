<?php session_start();?>
@extends('layouts.navbar')
@section('title', 'Profile Page')

@section('content')
<!--- Education Form --->
<form action="createEducation" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>"> <br>

	<br />
	<h3>Education:</h3>
	<table>

		<tr>
			<td><input type="hidden" name="education_id" /></td>
		</tr>

		<tr>
			<td>Degree Achieved:</td>
			<td><input type="text" name="degree" /></td>
		</tr>

		<tr>
			<td>School Name:</td>
			<td><input type="text" name="school_name" /></td>
		</tr>

		<tr>
			<td>School City:</td>
			<td><input type="text" name="school_city" /></td>
		</tr>

		<tr>
			<td>School State:</td>
			<td><input type="text" name="school_state" /></td>
		</tr>

		<tr>
			<td>School Zip Code:</td>
			<td><input type="text" name="school_zip_code" /></td>
		</tr>

		<tr>
			<td>Graduation Year:</td>
			<td><input type="text" name="graduation_year" /></td>
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
