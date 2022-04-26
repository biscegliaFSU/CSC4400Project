<!doctype html>
<html lang="en">
		<meta charset="utf-8">
		<link href="emp_login.css" rel="stylesheet">
	<head>
		<title>Quick-serve</title>
	</head>
	<body>
			<p id="title">Quick-serve</p>
                <div id="form_body">
                    <form id="login" name="login" action="loginAction.php">
                            <label id="login-title">Employee Login</label>
                            <br><br>
                            <label class="login-subtext" for="username">U S E R N A M E</label><br>
                            <input type="text" id="username" name="username" class="textfield">
                            <br>
                            <br>
                            <label class="login-subtext" for="pass">P A S S W O R D</label><br>
                            <input type="password" id="pass" name="pass" class="textfield">
                            <br>
                            <br>
                            <a href="forgot_pass.php?"><label id="forgot">Forgot password?</label></a>
                            <br>
                            <input name="login_btn" id="login_btn" class="login-subtext" type="submit" value="L O G I N" onclick="alphanumeric(document.login.username, document.login.pass)">
                    </form>
		</div>
            
	</body>
	<script src="login_input_validation.js"></script>
</html>
