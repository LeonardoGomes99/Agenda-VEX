
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('css/home.css')}}">
<script src="{{asset('js/home-code.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
<title>Home</title>






<meta name="csrf-token" content="{{ csrf_token() }}" />
<h2>Agenda Vex</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form>
			<h1>Criar um Conta</h1>			
			<input id="nome-r" type="text" placeholder="Nome" />
			<input id="email-r" type="email" placeholder="Email" />
			<input id="senha-r" type="password" placeholder="Senha" />
			<input id="senhav-r" type="password" placeholder="Digite a Senha Novamente" />
			<input type="button" id="Registrar" style="background-color:#4e73df;border: white;color:white" value="Registrar">
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form>
			<h1>Login</h1>			
			<input id="email-l" type="email" placeholder="Email" />
			<input id="senha-l" type="password" placeholder="Senha" />
			<input type="button" id="Login" style="background-color:#4e73df;border: white;color:white" value="Entrar">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bem Vindo de Volta</h1>
				<p>Para se manter conectado conosco, faça o login com suas informações pessoais</p>
				<button class="ghost" id="signIn">Login</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Olá Amigo(a)!</h1>
				<p>Insira seus dados pessoais e comece a jornada conosco</p>
				<button class="ghost" id="signUp">Registrar</button>
			</div>
		</div>
	</div>
</div>

