<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gallery</title>
	<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<style>
		.gallery-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:16px}
		.gallery-card{border:1px solid #e5e7eb;border-radius:8px;overflow:hidden;background:#fff}
		.gallery-card img{width:100%;height:220px;object-fit:cover;display:block}
		.gallery-name{font-size:.9rem;padding:.5rem .75rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
		.container-narrow{max-width:1100px;margin:32px auto;padding:0 16px}
	</style>
</head>
<body>
	<div class="container-narrow">
		<h1 class="mb-3">Gallery</h1>

		@if($images->isEmpty())
			<div class="alert alert-info">No images uploaded yet.</div>
		@else
			<div class="gallery-grid">
				@foreach($images as $img)
					<div class="gallery-card">
						<img src="{{ $img['url'] }}" alt="{{ $img['name'] }}">
						<div class="gallery-name">{{ $img['name'] }}</div>
					</div>
				@endforeach
			</div>
		@endif
	</div>

	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>


