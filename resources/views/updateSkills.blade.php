<?php session_start();?>
@extends('layouts.navbar')
@section('title', 'Skills')

@section('content')
<!--- Job History Form --->
<form action="updateSkills" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>"> <br>

	<br />
	<h3>Update Skills:</h3>
	<table>

		<tr>
			<td><input type="hidden" name="skills_id" /></td>
		</tr>

		<tr>
			<td>Skills:</td>
			<td><input type="text" name="user_skills" /></td>
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
