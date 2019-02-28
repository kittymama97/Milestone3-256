<?php session_start();?>
@extends('layouts.navbar')
@section('title', 'Profile Page')

@section('content')
<!--- Profile Form --->
<form action="updateRegistration" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>"> <br>

	<br />
	<h3>Update Registration Information:</h3>
	<table>

		<tr>
			<td><input type="hidden" name="user_id" /></td>
		</tr>

		<tr>
			<td>First Name:</td>
			<td><input type="text" name="firstname" /></td>
		</tr>

		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="lastname" /></td>
		</tr>

		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" /></td>
		</tr>

		<tr>
			<td>Password:</td>
			<td><input type="text" name="password" /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" /></td>
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
