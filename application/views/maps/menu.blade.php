<nav id="pagemenu" class="clearfix">
	<ul class="nav nav-tabs">
    <li>{{HTML::link("maps", "All") }}</li>
	<li {{ (Input::get('order') == 'newest') ? 'class="active"' : ''}}>{{HTML::link("maps/filter?order=newest", "Newest") }}</li>
    <li {{ (Input::get('order') == 'best') ? 'class="active"' : ''}}>{{ HTML::link("maps/filter?order=best", "Highest ranked") }}</li>
    <li {{ (Input::get('official') == 'true') ? 'class="active"' : ''}}>{{ HTML::link("maps/filter?official=true", "Official Maps") }}</li>
	<li {{ (Input::get('featured') == 'true') ? 'class="active"' : ''}}>{{ HTML::link('maps/filter?featured=true', 'Featured Maps'); }}</li>
		<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <b class="caret"></b></a>
				<ul class="dropdown-menu">
					@foreach(Config::get("maps.types") as $cat_short => $category)
						<li {{ (Input::get('type') == $cat_short) ? 'class="active"' : ''}}>{{ HTML::link("maps/filter/?type={$cat_short}", $category) }} </li>
					@endforeach
				</ul>
			</li>
		<li {{ URI::is('maps/new') ? 'class="rside active"' : 'class="rside btn-inverse borderless"' }}>{{ HTML::link("maps/new", "New Map", array("class" => "white")) }}</li>
		@if (Auth::check())
		<li {{ Input::get("ownmaps") == true ? 'class="rside active"' : 'class="rside"' }}><a href="{{ URL::to("maps/filter/?ownmaps=1") }}">Your Maps</a></li>
		@endif
	</ul>
</nav>

@if ($menu == "multiview")

<ul id="multiview-controller" class="submenu nav nav-pills">
	<li class="disabled"><a href="#">Views:</a></li>
	<li data-multiview="grid"><a href="javascript:;" title="Map Image and title">Grid</a></li>
	<li data-multiview="big"><a href="javascript:;" title="Map Image and all details">Big</a></li>
	<li data-multiview="list"><a href="javascript:;" title="Only details">List</a></li>
</ul>

@elseif ($menu == "map" || $menu == "mapedit")
	@if(Auth::check() && Auth::user()->admin || $is_owner)
	<ul class="submenu nav nav-pills">
		<li class="disabled"><a href="#">Actions:</a></li>
		@if(Auth::check() && Auth::user()->admin)
			<li>{{ HTML::link_to_action("admin@maps@view", "Moderate Map", array($map->id)) }}</li>
		@endif
		@if($is_owner)
			<li>{{ HTML::link_to_action("maps@edit", "Edit Map", array($map->id)) }}</li>
		@endif
		@if ($menu == "mapedit")
			<li>{{ HTML::link_to_action("maps@view", "Back to Map", array($map->id, $map->slug)) }}</li>
		@endif
	</ul>
	@endif
@elseif ($menu == "new")
@endif