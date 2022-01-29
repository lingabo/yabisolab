<div class="modal-dialog text-center">
	<div class="col-sm-9 main-section">
			<div class="modal-content">
				<?php include_once("includes/errors.php"); ?>
				<div class="col-12 user-img">
					<img src="assets/image/yabiso.png" height="500" alt="YABISOLAB(logo)">
				</div>

				<div class="col-12 form-input">
						
					<form method="post"  autocomplete="off">
						<div class="form-group">
							<input type="text" name="username" class="form-control" placeholder="Entrer votre Identifiant" value="<?= get_input('username')?>" autofocus>
						</div>

						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Entrer mot de passe">
						</div>
						<button type="submit" name="kota" class="btn btn-success">
							Se connecter
						</button>
					</form>
					<div class="col-12 oublie">
						<a href="#">Mot de passe oublié </a>
					</div>
				</div>
			</div>
		</div>
</div>
