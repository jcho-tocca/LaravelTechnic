@extends('layouts.app')
@section('title', '投稿編集')
@section('content')
	<div class="container">
		<h1>投稿登録</h1>
		<p class="text-right"><a class="btn btn-secondary" href="{{ route('post.index') }}">投稿一覧</a></p>
		<form action="{{ route('post.update', $post->id) }}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
			<label for="title"><h2>タイトル</h2></label>
			<input class="form-control" type="text" id="title" name="title" value="{{ old('title', isset($post->title) ? $post->title : '') }}" placeholder="タイトル">
			</div>
			@error('title')
				<div class="alert alert-danger" role="alert">
					{{ $message }}	
				</div>
			@enderror
			<div class="form-group">
			<label for="contents"><h2>内容</h2></label>
			<textarea class="form-control" id="contents" name="contents" rows="10" placeholder="内容">{{ old('contents', isset($post->contents) ? $post->contents : '') }}</textarea>
			</div>
			@error('contents')
				<div class="alert alert-danger" role="alert">
					{{ $message }}	
				</div>
			@enderror
			<button type="submit" class="btn btn-primary">編集</button>
		</form>
	</div>
@endsection