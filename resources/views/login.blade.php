@include('layouts.header')

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100" id="container-logar">
				<span class="login100-form-title p-b-26">
					Bem-vindo
				</span>
				<span class="login100-form-title p-b-48">
					<img class="img-logo" src="/imgs/dev-maker.png" alt="DEVMAKER" style="width: 195px;">
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
					<input class="input100" type="text" id="email" name="email" placeholder="Email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<span class="btn-show-pass">
						<i class="zmdi zmdi-eye"></i>
					</span>
					<input class="input100" type="password" id="pass" name="pass" placeholder="Senha">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<button id="btn-entrar" class="login100-form-btn">
							Entrar
						</button>
					</div>
				</div>

				<div class="text-center p-t-115">
					<span class="txt1">
						Não possui uma conta?
					</span>

					<a class="txt2" id="registre_se">
						Registre-se
					</a>
				</div>
		</div>

    @include('layouts.register')

	</div>
</div>
