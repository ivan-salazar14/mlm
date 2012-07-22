@layout('layout.admin')

@section('content')
@parent
<div id="content">
	<div class="titlebar clearfix">
		<h2>Pages</h2>
	</div>
	<table id="sortable" class="table table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>URL Slug</th>
				<th>Link</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($pages as $page)
			<tr>
				<td>{{ $page->id }}</td>
				<td>{{ $page->title }}</td>
				<td>{{ $page->url_slug }}</td>
				<td><a href="{{ URL::to($page->url_slug) }}">View</a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@endsection