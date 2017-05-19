<!DOCTYPE html>
<html lang="en">
<head>
	<title>RHM - @yield("title")</title>
	<!-- BEGIN META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="rhm,rent,housing,manage">
	<meta name="description" content="Easy & hassle free Rent & Housing Management Web Application">
	<!-- END META -->

	<!-- BEGIN STYLESHEETS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
	<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/materialadmin.css" />
	<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/material-design-iconic-font.min.css" />
	<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/toastr.css" />
	<link type="text/css" rel="stylesheet" href="{{url('/')}}/css/custom.css" />
	<!-- Extra CSS files from child page -->
	@yield("extraStyle")

	<style>
		.section-header {
			height: 30px;
		}
		.height-9, .size-9 {
			height: 320px;
		}
		.height-5, .size-5 {
			height: 310px;
		}
		.flatno .tile .tile-text {

			font-size: 14px;

		}
		.header-nav-options .dropdown > a .badge {
			font-size: 16px;
			top: -13px;

		}
	</style>
	<!-- END STYLESHEETS -->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script type="text/javascript" src="{{url('/')}}/assets/js/libs/utils/html5shiv.js"></script>
	<script type="text/javascript" src="{{url('/')}}/assets/js/libs/utils/respond.min.js"></script>
	<![endif]-->
</head>
<body class="menubar-hoverable header-fixed menubar-pin ">

<!-- BEGIN HEADER-->
<header id="header" class="no-print">
	<div class="headerbar">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="headerbar-left">
			<ul class="header-nav header-nav-options">
				<li class="header-nav-brand" >
					<div class="brand-holder">
						<a href="{{URL::Route('user.dashboard')}}">
							<span class="text-lg text-bold text-primary">Rent & Housing Manage</span>
						</a>
					</div>
				</li>
				<li>
					<a id="menubarToggler" class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
						<i class="fa fa-bars"></i>
					</a>
				</li>
			</ul>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="headerbar-right">
			<ul class="header-nav header-nav-options">
				<div id="myNoti" class="hide">
				</div>
				<li class="dropdown">
					<a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
						<i class="fa fa-taka">&#2547;</i><sup class="badge style-danger" id="notiColBadge">0</sup>
					</a>
					<ul class="dropdown-menu animation-expand" id="notiCol">
						<li class="dropdown-header">Collections</li>
						<li class="dropdown-header">Options</li>
						<li><a href="{{URL::route('collection.index')}}">View All Collections <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
						<li><a href="#" data-type="collection" class="btnMarkRead">Mark As Read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
					</ul><!--end .dropdown-menu -->
				</li><!--end .dropdown -->
				<li class="dropdown">
					<a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
						<i class="fa fa-2x fa-money"></i><sup class="badge style-danger" id="notiDueBadge">0</sup>
					</a>
					<ul class="dropdown-menu animation-expand" id="notiDue">
						<li class="dropdown-header">This Month Dues</li>
						<li class="dropdown-header">Options</li>
						<li><a href="{{URL::route('report.dues')}}">View All Dues <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
						<li><a href="#" data-type="due" class="btnMarkRead">Mark As Read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
					</ul><!--end .dropdown-menu -->
				</li><!--end .dropdown -->

				<li class="dropdown">
					<a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
						<i class="fa fa-2x fa-home"></i><sup class="badge style-danger" id="notiToBadge">0</sup>
					</a>
					<ul class="dropdown-menu animation-expand" id="notiTo">
						<li class="dropdown-header">To-Let</li>

						<li class="dropdown-header">Options</li>
						<li><a href="{{URL::route('flat.index')}}">View all To-Let <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
						<li><a href="#" data-type="tolet" class="btnMarkRead">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
					</ul><!--end .dropdown-menu -->
				</li><!--end .dropdown -->

			</ul><!--end .header-nav-options -->
			<ul class="header-nav header-nav-profile">
				<li class="dropdown">
					<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
						<img src="{{URL::asset('assets')}}/img/avatar.png" alt="" />
						<span class="profile-info">
								{{ session('name')}}
							<small>{{getUserRole(auth()->user())}}</small>
							</span>
					</a>
					<ul class="dropdown-menu animation-dock">
						<li><a href="{{URL::Route('user.profile')}}"><i class="fa fa-fw fa-user"></i> My profile</a></li>
						<li><a href="{{URL::Route('user.lock')}}"><i class="fa fa-fw fa-lock"></i> Lock</a></li>
						<li><a href="{{URL::Route('user.logout')}}"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
					</ul><!--end .dropdown-menu -->
				</li><!--end .dropdown -->
			</ul><!--end .header-nav-profile -->

		</div><!--end #header-navbar-collapse -->
	</div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">

	<!-- BEGIN OFFCANVAS LEFT -->
	<div class="offcanvas">
	</div><!--end .offcanvas-->
	<!-- END OFFCANVAS LEFT -->

	<!-- BEGIN CONTENT-->
	<div id="content">
		<!-- BEGIN CHILD PAGE-->
	@yield('content')
	<!-- END CHILD PAGE-->
	</div><!--end #content-->
	<!-- END CONTENT -->

	<!-- BEGIN MENUBAR-->
	<div id="menubar" class="no-print">
		<div class="menubar-fixed-panel">
			<div>
				<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			<div class="expanded">
				<a href="{{URL::Route('user.dashboard')}}">
					<span class="text-lg text-bold text-primary ">Rent&nbsp;Housing Manage</span>
				</a>
			</div>
		</div>
		<div class="menubar-scroll-panel">

			<!-- BEGIN MAIN MENU -->
			<ul id="main-menu" class="gui-controls">

				<!-- BEGIN DASHBOARD -->
				<li class="dd">
					<a href="{{URL::Route('user.dashboard')}}" >
						<div class="gui-icon"><i class="md md-home"></i></div>
						<span class="title">Dashboard</span>
					</a>
				</li><!--end /menu-li -->
				<!-- END DASHBOARD -->

			@if(Gate::check('user.create') || Gate::check('user.index'))
				<!-- BEGIN user -->
					<li class="gui-folder">
						<a>
							<div class="gui-icon"><i class="md md-account-child"></i></div>
							<span class="title">Administration</span>
						</a>
						<!--start submenu -->
						<ul>
							@if(Gate::check('user.create'))
								<li><a href="{{URL::Route('user.create')}}" ><span class="title">New user</span></a></li>
							@endif
							@if(Gate::check('user.create') )
								<li><a href="{{URL::Route('user.index')}}" ><span class="title">All users</span></a></li>
							@endif
						</ul><!--end /submenu -->
					</li><!--end /menu-li -->
					<!-- END user -->
			@endif
			<!-- BEGIN PROJECT -->
				<li class="gui-folder">
					<a>
						<div class="gui-icon"><i class="md md-account-balance"></i></div>
						<span class="title">Projects</span>
					</a>
					<!--start submenu -->
					<ul>
						<li><a href="{{URL::Route('project.create')}}" ><span class="title">New</span></a></li>
						<li><a href="{{URL::Route('project.index')}}" ><span class="title">All</span></a></li>
					</ul><!--end /submenu -->
				</li><!--end /menu-li -->
				<!-- END PROJECT -->
				<!-- BEGIN Flat -->
				<li class="gui-folder">
					<a>
						<div class="gui-icon"><i class="md md-business"></i></div>
						<span class="title">Flats</span>
					</a>
					<!--start submenu -->
					<ul>
						<li><a href="{{URL::Route('flat.create')}}" ><span class="title">Allocate</span></a></li>
						<li><a href="{{URL::Route('flat.index')}}" ><span class="title">All</span></a></li>
					</ul><!--end /submenu -->
				</li><!--end /menu-li -->
				<!-- END Flat -->
				<!-- BEGIN CUSTOMER -->
				<li class="gui-folder">
					<a>
						<div class="gui-icon"><i class="md md-account-child"></i></div>
						<span class="title">Cutomers</span>
					</a>
					<!--start submenu -->
					<ul>
						<li><a href="{{URL::Route('customer.create')}}" ><span class="title">New</span></a></li>
						<li><a href="{{URL::Route('customer.index')}}" ><span class="title">All</span></a></li>
					</ul><!--end /submenu -->
				</li>
				<!-- END CUSTOMER -->
				<!-- BEGIN Rent -->
				<li class="gui-folder">
					<a>
						<div class="gui-icon"><i class="md md-markunread-mailbox"></i></div>
						<span class="title">Rent</span>
					</a>
					<!--start submenu -->
					<ul>
						<li><a href="{{URL::Route('rent.create')}}" ><span class="title">New</span></a></li>
						<li><a href="{{URL::Route('rent.index')}}" ><span class="title">All</span></a></li>
					</ul><!--end /submenu -->
				</li>
				<!-- END Rent -->
				<!-- BEGIN Collection -->
				<li class="gui-folder">
					<a>
						<div class="gui-icon"><i class="fa fa-taka">&#2547;</i></div>
						<span class="title">Collection</span>
					</a>
					<!--start submenu -->
					<ul>
						<li><a href="{{URL::Route('collection.create')}}" ><span class="title">New</span></a></li>
						<li><a href="{{URL::Route('collection.index')}}" ><span class="title">All</span></a></li>
					</ul><!--end /submenu -->
				</li>
				<!-- END Collection -->
				<!-- BEGIN Collection -->
				<li class="gui-folder">
					<a>
						<div class="gui-icon"><i class="fa fa-money"></i></div>
						<span class="title">Expense</span>
					</a>
					<!--start submenu -->
					<ul>
						<li><a href="{{URL::Route('expense.create')}}" ><span class="title">New</span></a></li>
						<li><a href="{{URL::Route('expense.index')}}" ><span class="title">All</span></a></li>
					</ul><!--end /submenu -->
				</li>
				<!-- END Collection -->
			@if(Gate::check('report.projects') || Gate::check('report.dues') || Gate::check('report.flats') || Gate::check('report.customers') || Gate::check('report.rents') || Gate::check('report.collections') || Gate::check('report.expenses') || Gate::check('report.balance'))
				<!-- BEGIN REPORT -->
					<li class="gui-folder">
						<a>
							<div class="gui-icon"><i class="md md-file-download"></i></div>
							<span class="title">Reports</span>
						</a>
						<!--start submenu -->
						<ul>
							@if(Gate::check('report.projects'))
								<li><a href="{{URL::Route('report.projects')}}" ><span class="title">Projects</span></a></li>
							@endif
							@if(Gate::check('report.flats'))
								<li><a href="{{URL::Route('report.flats')}}" ><span class="title">Flats</span></a></li>
							@endif
							@if(Gate::check('report.customers'))
								<li><a href="{{URL::Route('report.customers')}}" ><span class="title">Cutomers</span></a></li>
							@endif
							@if(Gate::check('report.rents'))
								<li><a href="{{URL::Route('report.rents')}}" ><span class="title">Rents</span></a></li>
							@endif
							@if(Gate::check('report.collections'))
								<li><a href="{{URL::Route('report.collections')}}" ><span class="title">Collections</span></a></li>
							@endif
							@if(Gate::check('report.dues'))
								<li><a href="{{URL::Route('report.dues')}}" ><span class="title">Collection Dues</span></a></li>
							@endif
							@if(Gate::check('report.expenses'))
								<li><a href="{{URL::Route('report.expenses')}}" ><span class="title">Expenses</span></a></li>
							@endif
							@if(Gate::check('report.balance'))
								<li><a href="{{URL::Route('report.balance')}}" ><span class="title">Account Balance</span></a></li>
							@endif
						</ul><!--end /submenu -->
					</li><!--end /menu-li -->
					<!-- END REPORT -->
			@endif

			@if(Gate::check('mail.compose'))
				<!-- BEGIN mail -->
					<li class="gui-folder">
						<a href="{{URL::Route('mail.compose')}}">
							<div class="gui-icon"><i class="md md-send"></i></div>
							<span class="title">Send Mail</span>
						</a>

					</li><!--end /menu-li -->
					<!-- END mail -->
				@endif

			</ul><!--end .main-menu -->
			<!-- END MAIN MENU -->

			<div class="menubar-foot-panel">
				<small class="no-linebreak hidden-folded">
					<span class="opacity-75">Copyright &copy; 2017</span> <strong>sagproperty</strong>
				</small>
			</div>
		</div><!--end .menubar-scroll-panel-->
	</div><!--end #menubar-->
	<!-- END MENUBAR -->
</div><!--end #base-->
<!-- END BASE -->

<!-- BEGIN JAVASCRIPT -->
<script src="{{url('/')}}/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/spin.js/spin.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/toastr.js"></script>

<script src="{{url('/')}}/assets/js/core/source/App.js"></script>
<script src="{{url('/')}}/assets/js/core/source/AppNavigation.js"></script>
<script src="{{url('/')}}/assets/js/core/source/AppOffcanvas.js"></script>
<script src="{{url('/')}}/assets/js/core/source/AppCard.js"></script>
<script src="{{url('/')}}/assets/js/core/source/AppForm.js"></script>
<script src="{{url('/')}}/assets/js/core/source/AppVendor.js"></script>
<script type="text/javascript">
	var makeNotificationItem = function(notification,typeClass){
        var notiItem = '<li class="'+typeClass+'">';
        notiItem+= '<a class="alert alert-callout alert-warning" href="javascript:void(0);">';
        notiItem+= '<strong>'+notification.title+'</strong><br/>';
        notiItem+= '<small>&#2547; '+parseFloat(notification.value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</small>';
        notiItem+= '</a>';
        notiItem+= '</li>';
        return notiItem;
	};
    var addNotification = function(listElement,typeClass,notifications){
        $('#'+listElement+' li.'+typeClass).remove();
        $.each(notifications,function (index,notification) {
			var notiItem = makeNotificationItem(notification,typeClass);
			$('#'+listElement+' li:first-child').after(notiItem);
        });
    };
    var fetchAllNotifications = function () {
        var url= '{{URL::route('notification.fetch.all')}}';
        var assetsURL = '{{URL::asset('assets')}}';
        var soundLink = assetsURL+'/'+'sound/notification';
        $.getJSON(url,function (notifications) {
            //console.log(notifications);
            if(notifications.hasNotify){
                //collection notification
                var lenCollection = notifications.collection.length;
                if(lenCollection){
                    addNotification('notiCol','notiColItem',notifications.collection);
                }
                $('#notiColBadge').text(lenCollection);

                //due notification
                var lenDue = notifications.due.length;
                if(lenDue){
                    addNotification('notiDue','notiDueItem',notifications.due);
                }
                $('#notiDueBadge').text(lenDue);

                //tolet notification
                var lenTolet = notifications.tolet.length;
                if(lenTolet){
                    addNotification('notiTo','notiToItem',notifications.tolet);
                }
                $('#notiToBadge').text(lenTolet);

                //make sound
                var soundElement ='<audio autoplay="autoplay">';
                soundElement +='<source src="' + soundLink + '.mp3" type="audio/mpeg" />';
                soundElement +='<source src="' + soundLink + '.ogg" type="audio/ogg" />';
                soundElement +='<embed hidden="true" autostart="true" loop="false" src="' + soundLink +'.mp3" />';
                soundElement +='</audio>';
                $('#myNoti').empty();
                $('#myNoti').append(soundElement);

            }
        });
    };
    $( document ).ready(function() {
        var pgurl = window.location.href.substr(window.location.href);
        $("#main-menu li a").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' ){
                $("#main-menu li").removeClass('active');
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().addClass("active");
            }
        });
        <!-- Toastr -->
        toastr.options.hideDuration = 0;
        toastr.clear();
        toastr.options.closeButton = 'true';
        toastr.options.progressBar = 'false';
        toastr.options.debug = 'flase';
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.showDuration = 330;
        toastr.options.hideDuration = 330;
        toastr.options.timeOut = 5000;
        toastr.options.extendedTimeOut = 1000;
        toastr.options.showEasing = 'swing';
        toastr.options.hideEasing = 'swing';
        toastr.options.showMethod = 'slideDown';
        toastr.options.hideMethod = 'slideUp';
        toastr.options.onclick = null;
        @if(Session::has('success'))
toastr.success('{{Session::get("success")["body"]}}','{{Session::get("success")["title"]}}');
        @endif
        @if(Session::has('error'))
toastr.error('{{Session::get("error")["body"]}}','{{Session::get("success")["title"]}}');
        @endif
        @if(Session::has('warning'))
toastr.warning('{{Session::get("warning")["body"]}}','{{Session::get("success")["title"]}}');
		@endif
        <!-- toastr end -->

        $('.btnMarkRead').click(function (e) {
            e.preventDefault();
            var notiType = $(this).attr('data-type');
            var url= '{{URL::route('notification.read')}}'+"?type="+$(this).attr('data-type');
            var that = $(this);
            $.getJSON(url,function (response) {
                //console.log(response);
                that.parent().parent().closest('li').find('a>sup').text(0);
                if(notiType=="collection"){
                    that.parent().parent().find('li.notiColItem').remove();
                }
                if(notiType=="due"){
                    that.parent().parent().find('li.notiDueItem').remove();
                }
                if(notiType=="tolet"){
                    that.parent().parent().find('li.notiToItem').remove();
                }
            });
        });

        window.setInterval(function(){
            var d = new Date();

            console.log(d);
            fetchAllNotifications();

        }, (1000*60*5));
        //fetchAllNotifications();

    });

</script>
<!-- Extra js from child page -->
@yield("extraScript")

<!-- END JAVASCRIPT -->

</body>
</html>
