<?php require_once __DIR__ . '/../header.php'; ?>
<div class="container">
	<form action="/settings" method="POST">
		<div class="row gutters">
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="account-settings">
							<div class="user-profile">
								<div class="user-avatar">
									<img src="/img/pp/<?= $pp ?>" width="100%" height="100%">
								</div>
								<h5 class="user-name mt-2"><?= $_SESSION['username'] ?></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
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
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<label class="d-block" for="category">Public categories</label>
								<?php foreach ($categories as $category) : ?>
									<div class="form-check-inline" id="categoryList">
										<input class="form-check-input mb-2" name="categoryList[]" <?= ($category->public == '1' ? 'checked' : 'false') ?> value="<?= $category->id ?>" id="<?= $category->id ?>" type="checkbox">
										<label class="form-check-label mb-2" for="<?= $category->id ?>"> <?= $category->name ?> </label>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" class="form-control" id="phone" placeholder="Enter phone number">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="website">Website URL</label>
									<input type="url" class="form-control" id="website" placeholder="Website url">
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
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="ciTy">City</label>
									<input type="name" class="form-control" id="ciTy" placeholder="Enter City">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="sTate">State</label>
									<input type="text" class="form-control" id="sTate" placeholder="Enter State">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="zIp">Zip Code</label>
									<input type="text" class="form-control" id="zIp" placeholder="Zip Code">
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
</div>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>