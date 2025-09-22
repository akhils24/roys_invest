<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Gallery</title>
	<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<style>
		.gallery-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:16px}
		.gallery-card{border:1px solid #e5e7eb;border-radius:8px;overflow:hidden;background:#fff}
		.gallery-card img{width:100%;height:180px;object-fit:cover;display:block}
		.gallery-card .card-body{padding:.5rem .75rem}
		.container-narrow{max-width:1100px;margin:32px auto;padding:0 16px}
	</style>
</head>
<body>
	<div class="container-narrow">
		<h1 class="mb-3">Admin Gallery</h1>

		@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@endif

		<div class="card mb-4">
			<div class="card-body">
				<form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data" class="row g-2 align-items-center">
					@csrf
					<div class="col-12 col-md-6">
						<input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp" required>
						@error('image')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<div class="form-text">Allowed: jpg, jpeg, png, webp. Max 5MB.</div>
					</div>
					<div class="col-12 col-md-auto">
						<button class="btn btn-primary" type="submit">Upload</button>
					</div>
				</form>
			</div>
		</div>

		@if($images->isEmpty())
			<div class="alert alert-info">No images uploaded yet.</div>
		@else
			<div class="gallery-grid">
				@foreach($images as $img)
					<div class="gallery-card">
						<img src="{{ $img['url'] }}" alt="{{ $img['name'] }}">
						<div class="card-body d-flex justify-content-between align-items-center">
							<div class="small text-muted text-truncate" style="max-width:60%">{{ $img['name'] }}</div>
							<form action="{{ route('admin.gallery.delete') }}" method="POST" onsubmit="return confirm('Delete this image?')">
								@csrf
								@method('DELETE')
								<input type="hidden" name="path" value="{{ $img['path'] }}">
								<button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
							</form>
						</div>
					</div>
				@endforeach
			</div>
		@endif
	</div>

	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>


