@extends('layouts.app')
@section('title', '投稿一覧')
@section('content')
<div class="container">
	<h1>投稿一覧</h1>
	<p class="float-right"><a class="btn btn-primary" href="{{ route('post.create') }}">新規追加</a></p>
	<table class="table">
		<thead>
			<tr class="d-flex">
				<th class="col-1">ID</th>
				<th class="col-5">タイトル</th>
				<th class="col-2">編集日</th>
				<th class="col-2">登録日</th>
				<th class="col-1">編集</th>
				<th class="col-1">削除</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posts as $val)
			<tr class="d-flex">
				<th class="col-1">{{ $val->id }}</th>
				<td class="col-5"><a href="{{ route('post.show', $val->id) }}">{{ $val->title }}</a></td>
				<td class="col-2">{{ $val->updated_at }}</td>
				<td class="col-2">{{ $val->created_at }}</td>
				<td class="col-1"><a class="btn btn-success" href="{{ route('post.edit', $val->id) }}">編集</td>
				<td class="col-1"><a class="btn btn-danger del" href="{{ route('post.show', $val->id) }}">削除</a></td>
			  </tr>
			@endforeach
		</tbody>
	  </table>
	  {{ $posts->links() }}
</div>
@endsection
@section('script')
<script>
$(function () {
	$('.del').on('click', function (e) {
		e.preventDefault();

		var href = $(this).prop('href');

		if (confirm('本当に削除しますか？')) { 
			$('<form/>', {action:href , method: 'post'})
				.append($('<input/>', {type: 'hidden', name: '_token', value: $('meta[name="csrf-token"]').attr('content')}))
				.append($('<input/>', {type: 'hidden', name: '_method', value: 'DELETE'}))
				.appendTo(document.body)
				.submit();
		}

		return false;
	 });
});
</script>
@endsection