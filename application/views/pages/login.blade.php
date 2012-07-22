@layout('layout.main')

@section('content')
	<style>body{background-attachment:scroll;}header,footer{display:none}#content{background:none;box-shadow:none;}</style>
	<div id="content" class="center">
	<a href="/"><img src="{{ URL::to_asset("images/static/logo.png") }}" /></a>
		<div id="login">
			{{ Form::open("account/login" , 'POST', array('class' => 'openid-form')) }} 
					<ul class="providers"> 
						<li class="openid" title="OpenID"><img src="{{ URL::to_asset("images/login/openid.png") }}" alt="icon" /> 
							<span><strong>http://{your-openid-url}</strong></span></li> 
						<li class="direct" title="Login with Google"><img src="{{ URL::to_asset("images/login/google.png") }}" alt="icon" />
							<span>https://www.google.com/accounts/o8/id</span></li>
						<li class="direct" title="Login with Yahoo"><img src="{{ URL::to_asset("images/login/yahoo.png") }}" alt="icon" />
							<span>http://yahoo.com/</span></li>
						<li class="direct" title="Login with your AOL screen name"><img src="{{ URL::to_asset("images/login/aol.png") }}" alt="icon" />
							<span>http://openid.aol.com/</span></li> 
						<li class="direct" title="Login with your Steam ID"><img src="{{ URL::to_asset("images/login/steam.png") }}" alt="icon" />
							<span>http://steamcommunity.com/openid</span></li> 	
					</ul>
			<fieldset class="info input-append">
				<label for="openid_identifier" class="openid">Enter your <a class="openid-logo" href="http://openid.net" rel="nofollow">OpenID</a></label> 
					<input type="text" name="openid_identifier" class="id">
					{{ Form::submit("Login", array("class" => "btn btn-primary")) }}
			</fieldset>
			<fieldset class="rememberme">
					{{ Form::checkbox("remember", true, false, array("id" => "remember")) }} 
					{{ Form::label("remember", "Keep me logged in", array("class" => "forget")) }}
			</fieldset>
			{{ Form::close() }}
			<p class="WhyOpenID">We use openID for a safe, faster, and easier way to login.<br>
			If you would like to create an OpenID account, please click <a href="http://openid.net/get-an-openid/" title="Will open in new tab" target="_blank" rel="nofollow">this link</a>.
			</p>
		</div>
	</div>
@endsection