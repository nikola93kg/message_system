<?php
session_start();
require_once __DIR__ . '/tabele/Poruka.php';
require_once __DIR__ . '/tabele/Korisnik.php';

$ime = $_SESSION['korisnik_ime_prezime'];
$slika = $_SESSION['korisnik_slika'];

$poslate_poruke = Poruka::vratiSvePoslatePoruke($ime);
$primljene_poruke = Poruka::vratiSvePrimljenePoruke($ime);

Poruka::setProcitano($ime);

?>
<?php require_once "partials/head.php" ?>
<?php require_once "partials/navbar.php" ?>

<body class="poruke_body">
	<a href="#" id="naslov_toggle">
		<h4 class="poruke_naslov">Примљене поруке:</h4>
	</a>
	<div class="poruke_container" id="primljene_poruke">
		<div class="row poz">
			<div class="col-5 offset-3">
				<?php foreach ($primljene_poruke as $poruka) : ?>
					<div class="card mb-3 kartica">
						<div class="card-header">
							<h5>
								<img src="uploads/<?= $poruka->getKorisnik()->slika; ?>" class="poruke_slika">
								<?= $poruka->posiljalac . ':' ?>
								<?= $poruka->naslov ?>
							</h5>
						</div>
						<div class="card-body">
							<p class="<?= $poruka->hitno == 1 ? 'hitno' : 'procitano'; ?>">
								<?= $poruka->tekst_poruke ?>
							</p>
						</div>
						<div class="card-footer">
							<button class="btn btn-info btn-sm float-right">
								<span>
									<?php if ($poruka->procitana == 1) : ?>
										<i class="fa fa-envelope-open" title="прочитано"></i>
									<?php endif ?>
								</span>
							</button>
							<button class="btn btn-warning btn-sm float-left">
								<?= date('d.m.Y. (H:i)', strtotime($poruka->vreme)); ?>
							</button>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>

	<hr>

	<h4 class="poruke_naslov">Послате поруке:</h4>
	<div class="row poz">
		<div class="col-5 offset-3">
			<?php foreach ($poslate_poruke as $poruka) : ?>
				<div class="card mb-3 kartica">
					<div class="card-header">
						<h5>
							<img src="uploads/<?= $slika ?>" class="poruke_slika">
							<?= $ime . ' <i class="fa fa-arrow-circle-right"></i> ' . $poruka->primalac . ': ' ?>
							<?= $poruka->naslov ?>
							<button class="btn btn-danger float-right brisanje">
								<a href="logika/obrisi_poruku.php?id=<?= $poruka->id ?>">обриши</a>
							</button>
						</h5>
					</div>
					<div class="card-body">
						<p class="<?= $poruka->hitno == 1 ? 'hitno' : 'procitano'; ?>">
							<?= $poruka->tekst_poruke ?>
						</p>
					</div>
					<div class="card-footer">
						<button class="btn btn-info btn-sm float-right">
							<span>
								<?php if ($poruka->poslata == 1) : ?>
									<i class="fa fa-plane" title="послато"></i>
								<?php endif ?>
								<?php if ($poruka->procitana == 1) : ?>
									<i class="fa fa-envelope-open" title="прочитано"></i>
								<?php endif ?>
							</span>
						</button>
						<button class="btn btn-warning btn-sm float-left">
							<?= date('d.m.Y. (H:i)', strtotime($poruka->vreme)) ?>
						</button>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
	</div>

	<script>
		$(function() {
			$("#naslov_toggle").click(function() {
				$("#primljene_poruke").fadeToggle(700);
			});
		});
	</script>
	<?php require_once "partials/footer.php" ?>