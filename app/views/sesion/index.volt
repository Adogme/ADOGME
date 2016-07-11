<div id="fb-root"></div>
<script>
	// This is called with the results from from FB.getLoginStatus().
	  function statusChangeCallback(response) {
	    console.log('statusChangeCallback');
	    console.log(response);
	    if (response.status === 'connected') {
	      testAPI();
	    } else if (response.status === 'not_authorized') {
	    } else {
	    }
	  }

	  function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
	  }

	  window.fbAsyncInit = function() {
		  FB.init({
		    appId      : '200140426987807',
		    cookie     : true,
		    xfbml      : true,
		    version    : 'v2.2'
		  });

		  /*FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		  });*/
	  };

	  // Load the SDK asynchronously
	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/en_US/sdk.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));

	  function testAPI() {
	    FB.api('/me', 'GET', {fields: 'first_name, last_name, name, id, email, gender'}, function(response) {
	      //alert('Successful login for: ' + response.name);
	      $.post("<?php echo $this->url->get('sesion/fbLogin') ?>", {nombre:response.first_name,email:response.email,apellido:response.last_name,genero:response.gender}, function(data)
			{
			 	window.location = "<?php echo $this->url->get('cuenta/index') ?>";
		    })
	    });
	  }
</script>
{{ content() }}

<br>
<br>
<br>
<br>
<div id="formulario-login" class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
	<div class="panel panel-default">
		<div class="panel-heading">LogIn</div>
		<div class="panel-body">
			{{ form('sesion/login', 'id': 'loginForm', 'method': 'post') }}
				<div class="form-group">
					<!--<input type="email" id="email" placeholder="Email" class="form-control">-->
					{{ form.render('email', ['class': 'form-control']) }}
				</div>

				<div class="form-group">
					{{ form.render('password', ['class': 'form-control']) }}
				</div>

				<div class="form-group">
					{{ link_to('registro', 'Registrarse', 'class': 'btn btn-primary col-sm-5') }}
					{{ submit_button('Iniciar Sesion', 'class': 'btn btn-primary col-sm-5 col-sm-offset-2') }}
				</div>
				
				<div class="form-group">
					<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
					</fb:login-button>
				</div>
			{{ end_form() }}

			
		</div>
	</div>
</div>