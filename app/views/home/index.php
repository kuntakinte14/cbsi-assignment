<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$('document').ready(function()
{
	console.log('ready to process form');	

    /* validation */
    $("#login-form").validate({
		rules:
			{
			password: {
				required: true,
			},
			user_email: {
	            required: true,
	            email: true
	        },
	    },
	    messages:
		    {
		    password:{
			    required: "please enter your password"
	        },
	        user_email: "please enter your email address",
	    },
	    submitHandler: submitForm 
	}); 
	/* validation */
	
    /* login submit */
    function submitForm()
    {  
		var email = encodeURIComponent($("#user_email").val());
		var password = encodeURIComponent($("#password").val());
    
		$.ajax({
			type : 'GET',
			url  : 'auth/login/'+email+'/'+password,
			beforeSend: function()
			{ 
				$("#error").fadeOut();
				$("#btn-login").html('Sending ...');
			},
			success: function(response)
			{
				response = response.split(',');
				if(response[0]=="success")
				{
					// hide login form and display welcome message
					$("#btn-login").hide();
					$("#login-box").hide();
					$("#main").html("Welcome "+response[1]+" "+response[2]);
				}
				else
				{
					$("#error").fadeIn(1000, function()
					{
						$("#error").html('ERROR: the provided email and password could not be found<br>&nbsp;');
						$("#btn-login").html('Sign In');
					});
				}
			}
		});
    	return false;
	}
    /* login submit */  

    /* SSO login submit */
    $("#ssologin-form").submit(function(e) {

        e.preventDefault();

		$.ajax({
			type : 'GET',
			url  : 'auth/ssologin/',
			success: function(response)
			{
				response = response.split(',');
				if(response[0]=="success")
				{
					// hide login form and display welcome message
					$("#btn-login").hide();
					$("#login-box").hide();
					$("#main").html("Your Single Sign-on request was successful, welcome "+response[1]+" "+response[2]);
				}
				else
				{
					$("#error").fadeIn(1000, function()
					{
						$("#error").html('ERROR: Your Single Sign-on request failed<br>&nbsp;');
						$("#btn-login").html('Sign In');
					});
				}
			}
		});
    });
    /* SSO login submit */
});
</script>
<style>
div#error {
	color:red;
}
</style>
</head>
<body>
<div id="main">
	<div id="login-box">
		<h2>Log In to WebApp</h2>	
		<form method="post" id="login-form">
		<div id="error">
	    	<!-- error will be shown here ! -->
	    </div>
	    <div>
	    	<input type="email" placeholder="Email address" name="user_email" id="user_email" />
	    	<span id="check-e"></span>
		</div
	    <div>
	        <input type="password" placeholder="Password" name="password" id="password" />
	    </div>
	    <div>
			<button type="submit" name="btn-login" id="btn-login">
	      		<span></span>Sign In
	  		</button> 
	    </div>  
	    </form>
	    &nbsp;<br>&nbsp;<br>OR<br>&nbsp;<br>&nbsp;<br>
	    <form method="post" id="ssologin-form">
	    	<button type="submit" name="btn-ssologin" id="btn-ssologin">
	      		<span></span>Utilize SSO
	  		</button>
	    </form>
	</div>
</div>    
</body>
</html>
