<?php
session_start();
?>
@extends('layouts.navbar')
@section('title', 'Profile Page')

@section('content')
<!--- Profile Form --->
<form action="updateContact" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>"> <br>


	<br />
	<h3>Update Contact Information:</h3>
	<table>

		<tr>
			<td><input type="hidden" name="contact_id" /></td>
		</tr>

		<tr>
			<td>Business Email:</td>
			<td><input type="text" name="business_email" /></td>
		</tr>

		<tr>
			<td>Phone Number:</td>
			<td><input type="text" name="phone_number" /></td>
		</tr>

		<tr>
			<td>Street Address:</td>
			<td><input type="text" name="street_address" /></td>
		</tr>

		<tr>
			<td>State:</td>
			<td><input type="text" name="state" /></td>
		</tr>

		<tr>
			<td>City:</td>
			<td><input type="text" name="city" /></td>
		</tr>
		<tr>
			<td>Zip:</td>
			<td><input type="text" name="zip_code" /></td>
		</tr>

		<tr>
			<td>About Me:</td>
			<td><input type="text" name="about_me" /></td>
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
