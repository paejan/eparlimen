<body>
	<script language="javascript">
	function do_keluar(){
		swal({
			title: 'Adakah anda pasti untuk keluar?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Teruskan',
			cancelButtonText: 'Tidak, Batal!',
			reverseButtons: true
		}).then(function () {
			$.ajax({
				url:'include/logout_menu.php', //&datas='+datas,
				type:'POST',
				//dataType: 'json',
				beforeSend: function () {
					$('.btn-primary').attr("disabled","disabled");
					$('.modal-body').css('opacity', '.5');
				},
				data: $("form").serialize(),
				//data: datas,
				success: function(data){
					console.log(data);
				}
			});
		});
	}
	</script>
		<form name="jakim" method="post" action="" enctype="multipart/form-data" autocomplete="off">
		<section class="body" style="background-image:url({{asset('images/bg-body.jpeg')}})">
			<!-- start: header -->
			<header class="header"  style="background-image:url({{asset('images/bg-body.jpeg')}})">
				<div class="logo-container">
					<a href="/dashboard" class="logo">
						<img src="{{asset('images/lg_motac.png')}}" height="60" alt="Sistem e-Parlimen" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar" style="cursor:pointer"></i>
					</div>
                    <div id="userbox" class="userbox1 visible-xs"> Menu
                    	<figure class="profile-picture">
								<img src="{{asset('images/person.jpg')}}" alt="{{ Auth::user()->nama_kakitangan }}" class="img-circle" data-lock-picture="images/person.jpg" />
						</figure>
                        <a href="#" data-toggle="dropdown"></a>
						<div class="dropdown-menu" style="margin-left:-50px;width:250px">
							<div style="padding-left:10px"><br>
							<span class="name"><b>{{ Auth::user()->nama_kakitangan }}</b></span>
							<span class="role">{{ Auth::user()->jawatan_kakitangan }}:{{ Auth::user()->user_level }}</span>
							</div>

							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="/profile" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> Profile Saya</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="/password" data-toggle="modal" data-target="#myModal"><i class="fa fa-key"></i> Tukar Kata Laluan</a>
								</li>
								<li title="Sila klik disini untuk log keluar daripada sistem">
									<a role="menuitem" tabindex="-1" href="logout"><i class="fa fa-power-off"></i> Log Keluar</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- start: search & user box -->
				<div class="header-right visible-lg">
					<div id="userbox" class="userbox  visible-lg">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="{{asset('images/person.jpg')}}" alt="{{ Auth::user()->nama_kakitangan }}" class="img-circle" data-lock-picture="{{asset('images/person.jpg')}}" />
							</figure>
							<div class="profile-info" data-lock-name="wwwww" data-lock-email="">
								<span class="name"><b>{{ Auth::user()->nama_kakitangan }}</b></span>
								<span class="name">{{ Auth::user()->jawatan_kakitangan }}({{ Auth::user()->type }})</span>
							</div>
							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>{{ $bahagian[0] ?? '' }}</li>
								<li>{{ $user ?? '???' }}</li>
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="/profile" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> Profile Saya</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="/password" data-toggle="modal" data-target="#myModal"><i class="fa fa-key"></i> Tukar Kata Laluan</a>
								</li>
								<!--<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Kunci Paparan Skrin</a>
								</li>-->
								<li title="Sila klik disini untuk log keluar daripada sistem">
									<a role="menuitem" tabindex="-1" href="/logout"><i class="fa fa-power-off"></i> Log Keluar</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
                <div class="header-right1 visible-xs">
                </div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

<style>
.button:active {
  transform: translateY(4px);
}

</style>
<div class="inner-wrapper">
    <!-- start: sidebar -->
    <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
            <div class="sidebar-title">
                <font color="white"><b>Menu Sistem</b></font>
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <div class="nano">
            <div class="nano-content">
                <nav id="menu" class="nav-main" role="navigation">
                    <ul class="nav nav-main">
						<li class="@if(\Request::is('dashboard*')) nav-expanded nav-active @endif">
							<a href="/dashboard">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Dashboard Parlimen</span>
							</a>
						</li>

						@foreach($group as $g)

						@php
						$mdi= $g->grp_id;
						if($mdi==1){$fa_menu = 'fa-search';}
						else if($mdi==2){$fa_menu = 'fa-check';}
						else if($mdi==3){$fa_menu = 'fa-file-code-o';}
						else if($mdi==4){$fa_menu = 'fa-pencil-square-o';}
						else if($mdi==5){$fa_menu = 'fa-filter';}
						else if($mdi==6){$fa_menu = 'fa-file-text';}
						else if($mdi==7){$fa_menu = 'fa-certificate';}
						else if($mdi==8){$fa_menu = 'fa-book';}

						@endphp
						<li class="nav-parent @if(strtolower($g->grp_name) == pathinfo(Request::route()->getName())['dirname']) nav-expanded nav-active @endif ">
						@if(strtolower($g->grp_name) == 'lain lain' && pathinfo(Request::route()->getName())['dirname'] == 'pengulungan')
						<li class="nav-parent nav-expanded nav-active ">
						@elseif(strtolower($g->grp_name) == 'pegawai bertugas' && pathinfo(Request::route()->getName())['dirname'] == 'peg_bertugas')
						<li class="nav-parent nav-expanded nav-active ">
						@endif
							<a href="#">
								<i class="fa {{ $fa_menu }}" aria-hidden="true"></i>
								<span>{{ $g->grp_name }}</span>
							</a>
							<ul class="nav nav-children">
								@foreach($menu as $m)
								@if($m->grp_id == $g->grp_id)
								<li class="@if(pathinfo(Request::route()->getName())['filename'] == pathinfo($m->menu_link)['filename']) nav-active @endif">
									<a href="/{{ substr($m->menu_link, 0, strrpos($m->menu_link, '.')) }}" title="">
										<span class="fa fa-circle-o"></span> {{ $m->menu_name }}
									</a>
								</li>
								@endif
								@endforeach
							</ul>
						</li>
						@endforeach

                        <li class="@if(\Request::is('rujukan*')) nav-expanded nav-active @endif">
                            <a href="/rujukan">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <span>Rujukan</span>
                            </a>
                        </li>
                        <li class="@if(\Request::is('carian*')) nav-expanded nav-active @endif">
                            <a href="/carian">
                                <i class="fa fa-filter" aria-hidden="true"></i>
                                <span>Carian</span>
                            </a>
                        </li>

                        <li>
                            <a href="/logout">
                                <i class="fa fa-external-link" aria-hidden="true"></i>
                                <span> Log Keluar</span>
                            </a>
                        </li>

						<li>
                            <div style="padding-left:15px;height:50px">
                                <span><b>Hi {{ Auth::user()->nama_kakitangan }}</b><br /></span>
                            	@include('components.time')&nbsp;
                            </div>
                        </li>

                    </ul>
                    <br /><br /><br />
                </nav>

            </div>

        </div>

    </aside>
    <!-- end: sidebar -->
