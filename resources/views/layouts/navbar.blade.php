@extends('layouts.main') @section('title', 'Welcome Page')

@section('content')

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>

<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
	integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
	crossorigin="anonymous"></script>

<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
	integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
	crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">GET A JOB</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active"><a class="nav-link" href="start">Home <span
					class="sr-only">(current)</span></a></li>
			<li class="nav-item"><a class="nav-link" href="profile">Profile</a></li>
      
      <?php
    if (isset($_SESSION['USER_ID']) && ($_SESSION['ROLE'])) {
        if ($_SESSION['ROLE'] == 1) {
            ?>
      <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
				href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"> Admin </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="usersAdmin">User Administration</a>
					<a class="dropdown-item" href="jobsAdmin">Job Posts Administration</a>
					<a class="dropdown-item" href="createJobPost">Add New Job Post</a>
				</div></li>
		</ul>
    <?php }}?>
     <?php

    if (isset($_SESSION['USER_ID'])) {
        echo "<div class='btn btn-light'>Welcome " . $_SESSION['USERNAME'] . " ";
    } else {
        ?>
  <a href="login">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
		</a> <a href="registration">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</button>
		</a>
     <?php }?>
  </div>
</nav>