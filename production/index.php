<?php

session_start();
    if ( !isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
require 'function.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>SIMAQRCODE-DOSEN</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>SIMAQRCODE</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">Data Mahasiswa</a></li>
                      <li><a href="form_advanced.html">Data Dosen</a></li>
                      <li><a href="form_validation.html">Data Mata Kuliah</a></li>
                    </ul>
                  </li>
                  
                  <li><a href="general_elements.html"><i class="fa fa-desktop"></i> Ambil QRCODE</a></li>

                  <li><a href="general_elements.html"><i class="fa fa-camera"></i> Scan QRCODE</a></li>
                     
                  <li><a><i class="fa fa-table"></i> Data Absensi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">History Absensi</a></li>
                      <li><a href="tables_dynamic.html">Rekap Absensi</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            
            
            
          </div>
        </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Dashboard <small>UNIVERSITAS YAPIS PAPUA</small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                <div class="count">179</div>
                <h3>Data Mata Kuliah</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div>

            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                <div class="count">179</div>
                <h3>Data Mahasiswa</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div>

            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                <div class="count">179</div>
                <h3>Data Dosen</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Weekly Summary <small>Activity shares</small></h2>
                    
                  </div>
                  <div class="x_content">
                    <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                      <div class="col-md-12" style="overflow:hidden;">
                        <div class="row" style="text-align: center;">
                          <div class="col-md-4"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                            <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0px; width: 110px; height: 110px;"></canvas>
                            <h4 style="margin:0">Bounce Rates</h4>
                          </div>
                          <div class="col-md-4"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                            <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0px; width: 110px; height: 110px;"></canvas>
                            <h4 style="margin:0">New Traffic</h4>
                          </div>
                          <div class="col-md-4"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                            <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0px; width: 110px; height: 110px;"></canvas>
                            <h4 style="margin:0">Device Share</h4>
                          </div>
                        </div>
                        
                        <h4 style="margin:18px">Weekly sales progress</h4>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            

            <div class="col-md-6 col-sm-6 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Daily active users <small>Sessions</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="temperature"><b>Monday</b>, 07:30 AM
                        <span>F</span>
                        <span><b>C</b></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="weather-icon">
                        <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="weather-text">
                        <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="weather-text pull-right">
                      <h3 class="degrees">23</h3>
                    </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="row weather-days">
                    <div class="col-sm-2">
                      <div class="daily-weather">
                        <h2 class="day">Mon</h2>
                        <h3 class="degrees">25</h3>
                        <canvas id="clear-day" width="32" height="32"></canvas>
                        <h5>15 <i>km/h</i></h5>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="daily-weather">
                        <h2 class="day">Tue</h2>
                        <h3 class="degrees">25</h3>
                        <canvas height="32" width="32" id="rain"></canvas>
                        <h5>12 <i>km/h</i></h5>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="daily-weather">
                        <h2 class="day">Wed</h2>
                        <h3 class="degrees">27</h3>
                        <canvas height="32" width="32" id="snow"></canvas>
                        <h5>14 <i>km/h</i></h5>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="daily-weather">
                        <h2 class="day">Thu</h2>
                        <h3 class="degrees">28</h3>
                        <canvas height="32" width="32" id="sleet"></canvas>
                        <h5>15 <i>km/h</i></h5>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="daily-weather">
                        <h2 class="day">Fri</h2>
                        <h3 class="degrees">28</h3>
                        <canvas height="32" width="32" id="wind"></canvas>
                        <h5>11 <i>km/h</i></h5>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="daily-weather">
                        <h2 class="day">Sat</h2>
                        <h3 class="degrees">26</h3>
                        <canvas height="32" width="32" id="cloudy"></canvas>
                        <h5>10 <i>km/h</i></h5>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <br />
   
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
             Develope By  &copy; Mario Cahyo W</a>
          </div> 
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
