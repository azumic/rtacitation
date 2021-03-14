<?php 
$activepage = ControlURL::cPage();
if(!session::isLogin()){
	helper::redirect('/login');
}


$objuser = new user();
$user = $objuser->get_user_data();
?>


<!DOCTYPE html>
<html lang="en">
    <head>

    <base href="/">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="main.css">
        <title><?php echo SITE_TITLE;?></title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <style>
    .hthtml{
	 height: 100%;
}
.anbody{
	 height: 100%;
     padding:150px;
	 display: flex;
	 align-items: center;
	 justify-content: center;
}
 .loader {
	 position: relative;
	 width: 75px;
	 height: 100px;
}
 .loader__bar {
	 position: absolute;
	 bottom: 0;
	 width: 10px;
	 height: 50%;
	 background: #291B2C;
	 transform-origin: center bottom;
	 box-shadow: 1px 1px 0 rgba(0, 0, 0, .2);
}
 .loader__bar:nth-child(1) {
	 left: 0px;
	 transform: scale(1, 0.2);
	 animation: barUp1 4s infinite;
}
 .loader__bar:nth-child(2) {
	 left: 15px;
	 transform: scale(1, 0.4);
	 animation: barUp2 4s infinite;
}
 .loader__bar:nth-child(3) {
	 left: 30px;
	 transform: scale(1, 0.6);
	 animation: barUp3 4s infinite;
}
 .loader__bar:nth-child(4) {
	 left: 45px;
	 transform: scale(1, 0.8);
	 animation: barUp4 4s infinite;
}
 .loader__bar:nth-child(5) {
	 left: 60px;
	 transform: scale(1, 1);
	 animation: barUp5 4s infinite;
}
 .loader__ball {
	 position: absolute;
	 bottom: 10px;
	 left: 0;
	 width: 10px;
	 height: 10px;
	 background: #CCA969;
	 border-radius: 50%;
	 animation: ball 4s infinite;
}
 @keyframes ball {
	 0% {
		 transform: translate(0, 0);
	}
	 5% {
		 transform: translate(8px, -14px);
	}
	 10% {
		 transform: translate(15px, -10px);
	}
	 17% {
		 transform: translate(23px, -24px);
	}
	 20% {
		 transform: translate(30px, -20px);
	}
	 27% {
		 transform: translate(38px, -34px);
	}
	 30% {
		 transform: translate(45px, -30px);
	}
	 37% {
		 transform: translate(53px, -44px);
	}
	 40% {
		 transform: translate(60px, -40px);
	}
	 50% {
		 transform: translate(60px, 0);
	}
	 57% {
		 transform: translate(53px, -14px);
	}
	 60% {
		 transform: translate(45px, -10px);
	}
	 67% {
		 transform: translate(37px, -24px);
	}
	 70% {
		 transform: translate(30px, -20px);
	}
	 77% {
		 transform: translate(22px, -34px);
	}
	 80% {
		 transform: translate(15px, -30px);
	}
	 87% {
		 transform: translate(7px, -44px);
	}
	 90% {
		 transform: translate(0, -40px);
	}
	 100% {
		 transform: translate(0, 0);
	}
}
 @keyframes barUp1 {
	 0% {
		 transform: scale(1, 0.2);
	}
	 40% {
		 transform: scale(1, 0.2);
	}
	 50% {
		 transform: scale(1, 1);
	}
	 90% {
		 transform: scale(1, 1);
	}
	 100% {
		 transform: scale(1, 0.2);
	}
}
 @keyframes barUp2 {
	 0% {
		 transform: scale(1, 0.4);
	}
	 40% {
		 transform: scale(1, 0.4);
	}
	 50% {
		 transform: scale(1, 0.8);
	}
	 90% {
		 transform: scale(1, 0.8);
	}
	 100% {
		 transform: scale(1, 0.4);
	}
}
 @keyframes barUp3 {
	 0% {
		 transform: scale(1, 0.6);
	}
	 100% {
		 transform: scale(1, 0.6);
	}
}
 @keyframes barUp4 {
	 0% {
		 transform: scale(1, 0.8);
	}
	 40% {
		 transform: scale(1, 0.8);
	}
	 50% {
		 transform: scale(1, 0.4);
	}
	 90% {
		 transform: scale(1, 0.4);
	}
	 100% {
		 transform: scale(1, 0.8);
	}
}
 @keyframes barUp5 {
	 0% {
		 transform: scale(1, 1);
	}
	 40% {
		 transform: scale(1, 1);
	}
	 50% {
		 transform: scale(1, 0.2);
	}
	 90% {
		 transform: scale(1, 0.2);
	}
	 100% {
		 transform: scale(1, 1);
	}
}
 
    </style>

    </head>
    <body id="body-pd" class="body-pd">
        <header class="header body-pd" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

			<div class="p-1">
				<a href="/profile" class="text-decoration-none text-dark">
					<svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
						<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
					</svg>&nbsp;<?php echo $user['a_fname'];?>
				</a>
			</div>
            
        </header>

        <div class="l-navbar show" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__link text-decoration-none">
                        <i class='bx bxs-shield-alt-2 nav__icon'></i>
                        <span class="nav__logo-name"><?php echo SITE_TITLE;?></span>
                    </a>

                    <div class="nav__list">

					<?php if($_SESSION[session::$role] == 'Admin'):?>
                        <a href="/license" class="nav__link text-decoration-none <?php if($activepage == "license"): echo "active"; endif;?>">
                            <i class='bx bx-news nav__icon'></i>
                            <span class="nav__name" >License</span>
                        </a>
					<?php endif;?>
     
					<?php if($_SESSION[session::$role] == 'User' || $_SESSION[session::$role] == 'Admin'):?>
                        <a href="/location" class="nav__link text-decoration-none <?php if($activepage == "location"): echo "active"; endif;?>">
                            <i class='bx bx-map-pin nav__icon' ></i>
                            <span class="nav__name">Location</span>
                        </a>
					<?php endif;?>
                        
					<?php if($_SESSION[session::$role] == 'Admin'):?>
                        <a href="/vehicle" class="nav__link text-decoration-none <?php if($activepage == "vehicle"): echo "active"; endif;?>">
                            <i class='bx bx-car nav__icon'></i>
                            <span class="nav__name">Vehicle</span>
                        </a>
					<?php endif;?>

					<?php if($_SESSION[session::$role] == 'Admin'):?>
                        <a href="/offense" class="nav__link text-decoration-none <?php if($activepage == "offense"): echo "active"; endif;?>">
                            <i class='bx bx-wallet-alt nav__icon'></i>
                            <span class="nav__name">Offense</span>
                        </a>
					<?php endif;?>

					<?php if($_SESSION[session::$role] == 'Admin'):?>
                        <a href="/violation" class="nav__link text-decoration-none <?php if($activepage == "violation"): echo "active"; endif;?>">
                            <i class='bx bx-error nav__icon'></i>
                            <span class="nav__name">Violation</span>
                        </a>
					<?php endif;?>	

					<?php if($_SESSION[session::$role] == 'User' || $_SESSION[session::$role] == 'Admin'):?>
                        <a href="/citation" class="nav__link text-decoration-none <?php if($activepage == "citation"): echo "active"; endif;?>">
                            <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                            <span class="nav__name">Citation</span>
                        </a>
					<?php endif;?>

					<?php if($_SESSION[session::$role] == 'Admin'):?>
                        <a href="/penalty" class="nav__link text-decoration-none <?php if($activepage == "penalty"): echo "active"; endif;?>">
                            <i class='bx bx-book-alt nav__icon'></i>
                            <span class="nav__name">Penalty</span>
                        </a>
					<?php endif;?>

					<?php if($_SESSION[session::$role] == 'User'):?>
                        <a href="/report" class="nav__link text-decoration-none <?php if($activepage == "report"): echo "active"; endif;?>">
                            <i class='bx bxs-report nav__icon'></i>
                            <span class="nav__name">Report</span>
                        </a>
					<?php endif;?>

					<?php if($_SESSION[session::$role] == 'Admin'):?>
                        <a href="/reportv" class="nav__link text-decoration-none <?php if($activepage == "reportv"): echo "active"; endif;?>">
                            <i class='bx bxs-report nav__icon'></i>
                            <span class="nav__name">Report</span>
                        </a>
					<?php endif;?>

					<?php if($_SESSION[session::$role] == 'Admin'):?>
                        <a href="/personnel" class="nav__link text-decoration-none <?php if($activepage == "personnel"): echo "active"; endif;?>">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Personnel</span>
                        </a>
					<?php endif;?>

					
                    </div>
                </div>

                <a href="/logout" class="nav__link text-decoration-none">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>
<br><br>




  <!-- Preload S -->
  <div class="hthtml" id="preloader" style="margin-top:50px;">
    <div class="anbody">
        <div class="loader">
            <div class="loader__bar"></div>
                    <div class="loader__bar"></div>
                        <div class="loader__bar"></div>
                    <div class="loader__bar"></div>
                <div class="loader__bar"></div>
            <div class="loader__ball"></div>
        </div>
        <sup class="blink_me">Loading</sup>
    </div>
</div>
<!-- Preload E -->


<main class="flex-shrink-0 animate__animated animate__fadeIn" id="main" hidden>
  <div class="container">



