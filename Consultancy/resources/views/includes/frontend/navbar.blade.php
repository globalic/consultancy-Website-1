@section('style')
<style>
.menu-hovers a:hover { 
  background-color: yellow;

}
</style>
@endsection
<header class="xs-header-nav">
    <div class="container">
        <div class="row  menu-item">
            <div class="col-lg-12">
                <nav id="navigation1" class="navigation header-nav clearfix">
                    <div class="nav-menus-wrapper clearfix">
                        
                        <ul class="nav-menu">
                        <li><a href="{{route('welcome')}}">Home</a></li>
							</li>
                        @if($nav_status->about_us == 1)
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">About Us<span class="caret"></span></a>
							    <ul class="dropdown-menu " style= "background-color: #01639c;">
                                @foreach($about as $key)
                                <li class ="dropdown-item" ><a style="" href="{{route('about.show',$key->id)}}">{{$key->title}}</a></li>            
                                  @endforeach
							    </ul>
							@endif
                            @if($nav_status->services == 1)
                            </li><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
							    <ul class="dropdown-menu " style= "background-color: #01639c;">
                                @foreach($service as $key)
                                <li class ="dropdown-item" ><a style="" href="{{route('service.show',$key->id)}}">{{$key->title}}</a></li>            
                                  @endforeach
							    </ul>
                                @endif
                            </li>
                            @if($nav_status->abroad_study == 1)
                            </li><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Abroad Study<span class="caret"></span></a>
							    <ul class="dropdown-menu " style= "background-color: #01639c;">
                                @foreach($abroad as $key)
                                <li class ="dropdown-item" ><a style="" href="{{route('abroad.show',$key->id)}}">{{$key->title}}</a></li>            
                                  @endforeach
							    </ul>
							</li>
                            @endif
                            @if($nav_status->expert_messages == 1)
                            </li><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Expert Messages<span class="caret"></span></a>
							    <ul class="dropdown-menu " style= "background-color: #01639c;">
                                @foreach($experts as $key)
                                <li class ="dropdown-item" ><a style="" href="{{route('messages.show',$key->id)}}">{{$key->title}}</a></li>            
                                  @endforeach
							    </ul>
                            </li>
                            @endif
                            @if($nav_status->gallery == 1)
                            </li><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gallery<span class="caret"></span></a>
							    <ul class="dropdown-menu " style= "background-color: #01639c;">
                                <li class ="dropdown-item" ><a style="" href="{{route('gallery.show')}}">Image Gallery</a></li>  
                                <li class ="dropdown-item" ><a style="" href="{{route('video.show')}}">Video Gallery</a></li>  
							    </ul>
							</li>
                            </li>  
                            @endif
                            <li><a href="{{route('store.index')}}">Contacts</a></li>
                            @if($nav_status->apply_online == 1)
                            <li><a href="#">Apply Online</a></li>
                            @endif
                        </ul>
                        
                    </div>
                </nav>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</header>