@php
    $setting = App\Models\Setting::first();
    $user = Auth::guard('web')->user();
    $tawk_setting = App\Models\TawkChat::first();

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @yield('title')
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">

    <link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/responsive.bootstrap4.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

        <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/clockpicker/dist/bootstrap-clockpicker.css') }}">


    <!--jquery library js-->
    <script src="{{ asset('user/js/jquery-3.6.0.min.js') }}"></script>

    <script>
        var capmaign_time = 0;
        var filter_max_val = 1000;
        var currency_icon = $;
        var themeColor = "{{ $setting->theme_one }}";
    </script>

    <script>
        var end_year = '';
        var end_month = '';
        var end_date = '';
        var capmaign_time = '';
        var campaign_end_year = ''
        var campaign_end_month = ''
        var campaign_end_date = ''
        var campaign_hour = ''
        var campaign_min = ''
        var campaign_sec = ''
        var productIds = [];
        var productYears = [];
        var productMonths = [];
        var productDays = [];
    </script>
</head>

<body>
    
    @php
            if ($setting->enable_pre_loader == 1 ) { 
    @endphp
    
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="{{ asset($setting->enable_pre_loader) }}" alt="logo">

            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div>
@php
 } 
 @endphp


    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            
     
        </div>
        <div class="header-right">
            
            {{-- <div class="user-notification">
                <div class="dropdown">
                    <a
                        class="dropdown-toggle no-arrow"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                    >
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/img.jpg" alt="" />
                                        <h3>John Doe</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a
                        class="dropdown-toggle"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                    >
                        <span class="user-icon" >
                            @if ($user->image)
                            <img src="{{ asset($user->image) }}" alt="img" class="avatar-photo" style="border:1px solid; width:50px; height:50px;">
                        @else
                            <img src="{{ asset($defaultProfile->image) }}" alt="img" />
                        @endif
                            
                        </span>
                        <span class="user-name">{{ $user->name }}</span>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                    >
                        <a class="dropdown-item" href="{{ route('user.my-profile') }}"
                            ><i class="dw dw-user1"></i> Profile</a
                        >
                        <a class="dropdown-item" href="{{ route('user.change-password') }}"
                            ><i class="dw dw-settings2"></i> Change Password</a
                        >
                        
                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                            ><i class="dw dw-logout"></i> Log Out</a
                        >
                    </div>
                </div>
            </div>
           
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{ route('user.dashboard') }}" class="dash_logo">
                <img src="{{ asset($setting->logo) }}" alt="logo">
                {{-- <img src="{{ asset($setting->logo) }}" alt="logo" class="dark-logo"> --}}
                {{-- <img src="{{ asset($setting->logo2) }}" alt="logo" class="light-logo"></a> --}}

            
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    
                    
                    <li class="">
                        <a href="{{ route('user.dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-house"></span
                            ><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-chat-right-dots"></span
                            ><span class="mtext">Chat</span>
                        </a>
                    </li>
                    <li>
                        <a href="invoice.html" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-receipt-cutoff"></span
                            ><span class="mtext">Invoice</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <div class="sidebar-small-cap">Extra</div>
                    </li>
                    
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-file-earmark-text"></span
                            ><span class="mtext">My Account</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('user.my-profile') }}">Profile</a></li>
                            <li><a href="{{ route('user.change-password') }}">Change Pasword</a></li>
                        </ul>
                    </li>

                    <li>
                        <a
                            href="{{ route('user.logout') }}"
                            class="dropdown-toggle no-arrow"
                        >
                            <span class="micon bi bi-layout-text-window-reverse"></span>
                            <span class="mtext">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="title pb-20">
                <h2 class="h3 mb-0">
                    @yield('breadcrum')
                </h2>
            </div>

           
            @yield('user-content')

            
            <div class="footer-wrap pd-20 mb-20 card-box" style="">
                {{ $setting->sitename }} - Learning System
                
            </div>
        </div>
    </div>



    @if ($tawk_setting->status == 1)
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='{{ $tawk_setting->chat_link }}';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>

    @endif
  <!--=============================
        DASHBOARD MENU END
  ==============================-->


  <!--=============================
        DASHBOARD START
  ==============================-->
 

<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="vendors/scripts/dashboard3.js"></script>
    <script src="{{ asset('backend/clockpicker/dist/bootstrap-clockpicker.js') }}"></script>



    <script src="{{ asset('toastr/toastr.min.js') }}"></script>

    <script>
        @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}');
        </script>
    @endforeach
    @endif


<script>
    (function($) {
    "use strict";
    $(document).ready(function () {

    });

    })(jQuery);
</script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
    let activeSellerId= '';
    let myId = {{ Auth::guard('web')->user()->id; }};
    function loadChatBox(id){
        $(".seller").removeClass('active');
        $("#seller-list-"+id).addClass('active')
        $("#pending-"+ id).addClass('d-none')
        $("#pending-"+ id).html(0)
        activeSellerId = id
        $.ajax({
            type:"get",
            url: "{{ url('user/load-chat-box/') }}" + "/" + id,
            success:function(response){
                $("#chat_box").html(response)
                scrollToBottomFunc()
            },
            error:function(err){
            }
        })
    }


  (function($) {
      "use strict";
      $(document).ready(function () {
            $('.clockpicker').clockpicker();

            Echo.private("App.Models.User.{{$user->id}}")
            .listen('SellerToUser', (e) => {
                if(e.seller_id == activeSellerId){
                    $.ajax({
                        type:"get",
                        url: "{{ url('user/load-new-message/') }}" + "/" + e.seller_id,
                        success:function(response){
                            $(".wsus__chat_area_body").html(response)
                            scrollToBottomFunc()
                        },
                        error:function(err){
                        }
                    })
                }else{
                    var pending = parseInt($("#pending-"+ e.seller_id).html());
                    if (pending) {
                        $("#pending-"+ e.seller_id).html(pending + 1)
                        $("#pending-"+ e.seller_id).removeClass('d-none')
                    } else {
                        $("#pending-"+ e.seller_id).html(pending + 1)
                        $("#pending-"+ e.seller_id).removeClass('d-none')
                    }
                }

            });
      });
  })(jQuery);

    function scrollToBottomFunc() {
        $('.wsus__chat_area_body').animate({
            scrollTop: $('.wsus__chat_area_body').get(0).scrollHeight
        }, 100);
    }
</script>

</body>

</html>
