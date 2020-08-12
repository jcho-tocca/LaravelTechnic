@extends('layouts.app')
@section('content')
<div class="container">
	<h1>投稿一覧</h1>
	<table class="table">
		<thead>
		  <tr>
			<th scope="col-md-1">ID</th>
			<th scope="col-md-7">タイトル</th>
			<th scope="col-md-2">編集</th>
			<th scope="col-md-2">削除</th>
		  </tr>
		</thead>
		<tbody>
			@foreach ($data as $val)
			<tr>
				<th scope="row">{{ $val->id }}</th>
				<td>{{ $val->title }}</td>
				<td>編集</td>
				<td>{{ route('post.show', $val->id) }}</td>
			  </tr>
			@endforeach
		</tbody>
	  </table>
	<ul class="list-group">
		
		
	</ul>
</div>
	
@endsection