<?php require_once __DIR__ . '/../header.php'; ?>
<form action="/settings" method="POST">
	<div class="px-3">
		<div class="card h-100">
			<div class="card-body">
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-2 text-primary">Personal Details</h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="fullName">Username</label>
							<input type="text" class="form-control" id="username" disabled placeholder="<?= $_SESSION['username'] ?>">
							<input type="hidden" class="form-control" id="username" disabled placeholder="<?= $_SESSION['username'] ?>">
						</div>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mt-3 mb-2 text-primary">APIs</h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="api_omdb">OMDB</label>
							<input type="name" class="form-control" id="api_omdb" name="api_omdb" value="<?= $api_omdb ?>">
							<input type="hidden" class="form-control" id="api_omdb_old" name="api_omdb_old" value="<?= $api_omdb ?>">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="book">Book API (Soon)</label>
							<input type="name" class="form-control" disabled id="book" placeholder="">
						</div>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right">
							<button type="submit" id="save" name="save" class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php require_once __DIR__ . '/../footer.php'; ?>