@layout("layout.admin")

@section("content")
@parent
<div id="content">
<div class="titlebar clearfix">
	<h2>Making: <strong>{{ e($map->title) }}</strong> UnOfficial</h2>
</div>
	{{ Form::open(null, 'POST', array('class' => 'xpadding')) }}
	{{ Form::token() }}
	<p>Are you sure you want to make <strong>{{ e($map->title) }}</strong> UnOfficial?</p>
	{{ Form::submit("Make UnOfficial", array("class" => "btn btn-danger")) }}
	{{ HTML::link_to_action("admin.maps", "Back", array(), array("class" => "btn")) }}
	{{ Form::close() }}
</div>
@endsection