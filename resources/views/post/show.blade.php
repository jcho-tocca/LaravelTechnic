@extends('layouts.app')
@section('title', '投稿詳細')
@section('content')
	<div class="container">
		<h1>投稿詳細</h1>
		<p class="text-right"><a class="btn btn-secondary" href="{{ route('post.index') }}">投稿一覧</a></p>
		<label for="title"><h2>タイトル</h2></label>
		<p>{{ $post->title }}</p>
		<label for="contents"><h2>内容</h2></label>
		<p>{!! nl2br($post->contents) !!}</p>
	</div>
@endsection