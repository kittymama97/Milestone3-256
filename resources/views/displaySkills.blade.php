<?php
session_start();
use App\Services\Business\ProfileBusinessService;
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
		<th>Delete</th>
		<th>Edit</th>
		<th>Skills ID</th>
		<th>Skills</th>
		<th>User ID</th>
	</thead>
	<tbody>

<?php
// user business service is called
$bs = new ProfileBusinessService();
$skills = $bs->showSkills();
// for loop to populate the data table in the displayUsers view
for ($x = 0; $x < count($skills); $x ++) {
    echo "<tr>";
    echo "<td><form action='skillsDelete'><input type='hidden' name='id' value=" . $skills[$x]['SKILLS_ID'] . "><input type='submit' value='Delete'></form>  </td>";
    echo "<td><form action='skillsEdit'><input type='hidden' name='id' value=" . $skills[$x]['SKILLS_ID'] . "><input type='submit' value='Suspend'></form>  </td>";
}
echo "<td>" . $skills[$x]['SKILLS_ID'] . "</td>";
echo "<td>" . $skills[$x]['USER_SKILLS'] . "</td>";
echo "<td>" . $skills[$x]['USER_USER_ID'] . "</td>";

?>















</table>
<!-- //loops through person array and prints values -->

@endsection
