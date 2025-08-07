@extends('users.layouts.app')

@section('title', 'Blog Details')

@section('content')
<main class="main">
  <div class="container mt-5">
    <h1>Blog Detail Page</h1>
    <p>This is a dummy UI for the blog titled: <strong>{{ $slug }}</strong></p>
    <a href="{{ url('/blog') }}">← Back to Blog</a>
  </div>
</main>
@endsection
