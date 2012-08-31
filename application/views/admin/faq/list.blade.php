@layout("layout.admin")

@section("content")
@parent
<div id="content">
	<div class="titlebar clearfix">
		<h2>FAQ</h2>
	</div>
	<table id="sortable" class="table table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Question</th>
				<th>Date created</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		@foreach ($faq as $item)
		<tbody>
			<tr>
				<td>{{ $item->id }}</td>
				<td><A HREF={{ "faq#".$item->question}}>{{ $item->question }}</A></td>
				<td>{{ date("F j, Y h:i e", strtotime($item->created_at)) }}</td>
				<td>
				<div class="btn-group">
					<a class="btn btn-primary" href="#" data-toggle="dropdown" >Actions</a>
					<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="{{ URL::to_action("admin.faq@edit", array($item->id)) }}"><i class="icon-pencil"></i> Edit</a></li>
						<li><a href="{{ URL::to_action("admin.faq@delete", array($item->id)) }}"><i class="icon-trash"></i> Delete</a></li>
						</ul>
				</div>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@endsection