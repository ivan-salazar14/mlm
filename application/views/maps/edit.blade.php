@layout("layout.main")

@section("content")
{{ HTML::link_to_action("maps@view", "View", array($map->id, $map->slug)) }}
<div id="content">
	<h2>Edit meta</h2>
	{{ Form::open("maps/edit_meta/".$map->id, "POST", array("class" => "form-horizontal")) }}
		{{ Form::token() }}
		{{ Form::field("text", "title", "Title", array(Input::old("title", $map->title), array('class' => 'input-large')), array('error' => $errors->first('title'))) }}
		{{ Form::field("textarea", "summary", "Summary", array(Input::old("summary", $map->summary), array('class' => 'input-xxlarge')), array("help" => "Short description about your map. (255 characters max)", 'error' => $errors->first('summary'))) }}
		{{ Form::field("wysiwyg", "description", "Long Description", array(Input::old("description", $map->description), array('class' => 'input-xxlarge')), array('error' => $errors->first('description'))) }}
		{{ Form::actions(Form::submit("Submit", array("class" => "btn-primary"))) }}
	{{ Form::close() }}
	<h2>Downloads</h2>
	<table class="table">
		<thead>
			<tr>
				<th>URL</th>
				<th>Direct?</th>
				<th>Actions</th>
				<th>{{ HTML::link_to_action("maps@edit_link", "+ Add", array($map->id)) }}</th>
			</tr>
		</thead>
		<tbody>
			@forelse($map->links as $link)
				<tr>
					<td>{{ HTML::image($link->favicon, "favicon")." ".HTML::link($link->url, $link->url) }} <small>{{$link->type}}</small></td>
					<td>{{ $link->direct ? "&#10004;" : "" }}</td>
					<td>{{ HTML::link_to_action("maps@edit_link", "Edit", array($map->id, $link->id)) }}</td>
					<td>{{ HTML::link_to_action("maps@delete_link", "Delete", array($map->id, $link->id)) }}</td>
				</tr>
			@empty
				<tr>
					<td colspan="4">No links found!</td>
				</tr>
			@endforelse
		</tbody>
	</table>
	<h2>Images</h2>
	<ul class="thumbnails">
		@forelse($map->images as $image)
			<li class="span2">
				<a href="{{ e($image->file_original) }}" class="thumbnail">{{ HTML::image($image->file_small) }}</a>
				{{ HTML::link_to_action("maps@delete_image", "Delete", array($map->id, $image->id)) }}
			</li>
		@empty
			<li>
				No images found!
			</li>
		@endforelse
	</ul>
	<h3>Upload new</h3>
	{{ Form::open_for_files("maps/upload_image/".$map->id) }}
		{{ Form::token() }}
		{{ Form::field("file", "uploaded", "Image", array(array('class' => 'input-large')), array('error' => $errors->first('uploaded'))) }}
		{{ Form::field("text", "name", "Name", array(Input::old("name"), array('class' => 'input-large')), array('error' => $errors->first('name'))) }}
		{{ Form::submit("Upload", array("class" => "btn-primary")) }}
	{{ Form::close() }}
</div>
@endsection