<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('welcome')}}"><img src="{{url('/images/company_logo'.'/'.$website->logo) }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{route('welcome')}}"><img src="{{url('backend/images/logo2.png')}}" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Manage Your Website</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('slider.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-picture-o"></i>Slider</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('slider.index')}}">Manage Slider</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('slider.create')}}">Add slider</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('AboutUs.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-address-book"></i>About Us</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('AboutUs.index')}}">Manage About Us</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('AboutUs.create')}}">Add New</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('Youtube.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-youtube"></i>Youtube Links</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('Youtube.index')}}">Manage Youtube</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('Youtube.create')}}">Add New</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('Youtube.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-youtube"></i>Gallery</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('gallery.index')}}">Manage Gallery</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('gallery.create')}}">Add New</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('OurService.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-ticket"></i>Our Services</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('OurService.index')}}">Manage Services</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('OurService.create')}}">Add New</a></li>
                        </ul>
                    </li>
                    <!-- <li class="menu-item-has-children dropdown">
                        <a href="{{route('ClientReview.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-thumbs-up"></i>Client Review</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('ClientReview.index')}}">Manage Review</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('ClientReview.create')}}">Add New</a></li>
                        </ul>
                    </li> -->
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('NewsUpdates.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa ti-receipt"></i>News & Updates</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('NewsUpdates.index')}}">Manage News</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('NewsUpdates.create')}}">Add New</a></li>
                        </ul>
                    </li>
                  
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('AbroadStudy.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-fighter-jet"></i>Abroad Study</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('AbroadStudy.index')}}"> Manage Abroad Study</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('AbroadStudy.create')}}">Add New</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('our_experts.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-level-up"></i>Experts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('our_experts.index')}}"> Manage Experts</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('our_experts.create')}}">Add New</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('expert-messages.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comment"></i>Expert Messages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('expert-messages.index')}}">Manage Messages</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('expert-messages.create')}}">Add New</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('parteners.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Parteners</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('parteners.index')}}">Manage parteners</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('parteners.create')}}">Add New</a></li>
                        </ul>
                    </li>
                  
                    @cannot('isAdmin')
                    <li class="menu-item-has-children dropdown">
                        <a href="{{route('users.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Admins</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-tasks"></i><a href="{{route('users.index')}}"> Manage Admins</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="{{route('users.create')}}">Add New</a></li>
                        </ul>
                    </li>
                    @endcan
                    <h3 class="menu-title">Others</h3>
                    <li>
                        <a href="{{route('ClientReview.index')}}"> <i class="menu-icon fa fa-thumbs-up"></i>Client Review</a>
                    </li>
                    <li>
                        <a href="{{route('mails.index')}}"> <i class="menu-icon ti-email"></i>Mails</a>
                    </li>
                    @cannot('isAdmin')
                    <li>
                        <a href="{{route('settings.index')}}"> <i class="menu-icon ti-settings"></i>Settings</a>
                    </li>
                    @endcan
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>