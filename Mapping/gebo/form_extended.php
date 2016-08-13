
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gebo Admin Panel</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <!-- jQuery UI theme -->
            <link rel="stylesheet" href="lib/jquery-ui/css/Aristo/Aristo.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
		<!-- colorbox -->
            <link rel="stylesheet" href="lib/colorbox/colorbox.css" />
        <!-- code prettify -->
            <link rel="stylesheet" href="lib/google-code-prettify/prettify.css" />    
        <!-- sticky notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />    
        <!-- aditional icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css" />
		<!-- flags -->
            <link rel="stylesheet" href="img/flags/flags.css" />	
        <!-- datatables -->
            <link rel="stylesheet" href="lib/datatables/extras/TableTools/media/css/TableTools.css">

        <!-- datepicker -->
            <link rel="stylesheet" href="lib/datepicker/datepicker.css" />
		<!-- datepicker -->
            <link rel="stylesheet" href="lib/timepicker/css/bootstrap-timepicker.css" />
        <!-- tag handler -->
            <link rel="stylesheet" href="lib/tag_handler/css/jquery.taghandler.css" />
        <!-- uniform -->
            <link rel="stylesheet" href="lib/uniform/Aristo/uniform.aristo.css" />
		<!-- multiselect -->
            <link rel="stylesheet" href="lib/multi-select/css/multi-select.css" />
		<!-- enhanced select -->
            <link rel="stylesheet" href="lib/chosen/chosen.css" />
        <!-- upload -->
            <link rel="stylesheet" href="lib/plupload/js/jquery.plupload.queue/css/plupload-gebo.css" />
        <!-- colorpicker -->
            <link rel="stylesheet" href="lib/colorpicker/css/colorpicker.css" />
        <!-- switch buttons -->
            <link rel="stylesheet" href="lib/bootstrap-switch/static/stylesheets/bootstrap-switch.css" />

        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
		<!-- theme color-->
            <link rel="stylesheet" href="css/blue.css" id="link_theme" />	
            
            <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
	
        <!-- favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
		
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
        <![endif]-->
        	
        <!--[if lt IE 9]>
			<script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
			<script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->

    </head>
    <body class="full_width">
		<div class="style_switcher">
			<div class="sepH_c">
				<p>Colors:</p>
				<div class="clearfix">
					<a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
					<a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
					<a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
					<a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
					<a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
					<a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
				</div>
			</div>
			<div class="sepH_c">
				<p>Backgrounds:</p>
				<div class="clearfix">
					<span class="style_item jQptrn style_active ptrn_def" title=""></span>
					<span class="ssw_ptrn_a style_item jQptrn" title="ptrn_a"></span>
					<span class="ssw_ptrn_b style_item jQptrn" title="ptrn_b"></span>
					<span class="ssw_ptrn_c style_item jQptrn" title="ptrn_c"></span>
					<span class="ssw_ptrn_d style_item jQptrn" title="ptrn_d"></span>
					<span class="ssw_ptrn_e style_item jQptrn" title="ptrn_e"></span>
				</div>
			</div>
			<div class="sepH_c">
				<p>Layout:</p>
				<div class="clearfix">
					<label class="radio-inline"><input name="ssw_layout" id="ssw_layout_fluid" value="" checked="" type="radio"> Fluid</label>
					<label class="radio-inline"><input name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed" type="radio"> Fixed</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Sidebar position:</p>
				<div class="clearfix">
					<label class="radio-inline"><input name="ssw_sidebar" id="ssw_sidebar_left" value="" checked="" type="radio"> Left</label>
					<label class="radio-inline"><input name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right" type="radio"> Right</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Show top menu on:</p>
				<div class="clearfix">
					<label class="radio-inline"><input name="ssw_menu" id="ssw_menu_click" value="" checked="" type="radio"> Click</label>
					<label class="radio-inline"><input name="ssw_menu" id="ssw_menu_hover" value="menu_hover" type="radio"> Hover</label>
				</div>
			</div>
			
			<div class="gh_button-group">
				<a href="#" id="showCss" class="btn btn-primary btn-sm">Show CSS</a>
				<a href="#" id="resetDefault" class="btn btn-default btn-sm">Reset</a>
			</div>
			<div class="hide">
				<ul id="ssw_styles">
					<li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span>}</li>
					<li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
				</ul>
			</div>
		</div>
		
		<div id="maincontainer" class="clearfix">
			<header>
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="navbar-inner">
						<div class="container">
							<a class="brand pull-left" href="index.php?uid=1&amp;page=dashboard">Gebo Admin <span class="sml_t">3</span></a>
							<ul class="nav navbar-nav" id="mobile-nav">
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-list-alt"></span> Forms <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="index.php?uid=1&amp;page=form_elements">Form elements</a></li>
										<li><a href="index.php?uid=1&amp;page=form_extended">Extended form elements</a></li>
										<li><a href="index.php?uid=1&amp;page=form_validation">Form Validation</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-th"></span> Components <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="index.php?uid=1&amp;page=alerts_btns">Alerts &amp; Buttons</a></li>
										<li><a href="index.php?uid=1&amp;page=icons">Icons</a></li>
										<li><a href="index.php?uid=1&amp;page=notifications">Notifications</a></li>
										<li><a href="index.php?uid=1&amp;page=tables">Tables</a></li>
										<li><a href="index.php?uid=1&amp;page=tables_more">Tables (more examples)</a></li>
										<li><a href="index.php?uid=1&amp;page=tabs_accordion">Tabs &amp; Accordion</a></li>
										<li><a href="index.php?uid=1&amp;page=tooltips">Tooltips, Popovers</a></li>
										<li><a href="index.php?uid=1&amp;page=typography">Typography</a></li>
										<li><a href="index.php?uid=1&amp;page=widgets">Widget boxes</a></li>
										<li class="dropdown">
											<a href="#">Sub menu <b class="caret-right"></b></a>
											<ul class="dropdown-menu">
												<li><a href="#">Sub menu 1.1</a></li>
												<li><a href="#">Sub menu 1.2</a></li>
												<li><a href="#">Sub menu 1.3</a></li>
												<li>
													<a href="#">Sub menu 1.4 <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="#">Sub menu 1.4.1</a></li>
														<li><a href="#">Sub menu 1.4.2</a></li>
														<li><a href="#">Sub menu 1.4.3</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-wrench"></span> Plugins <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="index.php?uid=1&amp;page=charts">Charts</a></li>
										<li><a href="index.php?uid=1&amp;page=calendar">Calendar</a></li>
										<li><a href="index.php?uid=1&amp;page=datatable">Datatable</a></li>
										<li><a href="index.php?uid=1&amp;page=dynamic_tree">Dynamic tree</a></li>
										<li><a href="index.php?uid=1&amp;page=editable_elements">Editable elements</a></li>
										<li><a href="index.php?uid=1&amp;page=file_manager">File Manager</a></li>
										<li><a href="index.php?uid=1&amp;page=floating_header">Floating List Header</a></li>
										<li><a href="index.php?uid=1&amp;page=google_maps">Google Maps</a></li>
										<li><a href="index.php?uid=1&amp;page=gallery">Gallery Grid</a></li>
										<li><a href="index.php?uid=1&amp;page=wizard">Wizard</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-file"></span> Pages <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="index.php?uid=1&amp;page=blog_page"> Blog Page</a></li>
										<li><a href="index.php?uid=1&amp;page=chat"> Chat</a></li>
										<li><a href="error_404.html"> Error 404</a></li>
										<li><a href="index.php?uid=1&amp;page=invoice"> Invoice</a></li>
										<li><a href="index.php?uid=1&amp;page=mailbox">Mailbox</a></li>
										<li><a href="index.php?uid=1&amp;page=search_page">Search page</a></li>
										<li><a href="index.php?uid=1&amp;page=user_profile">User profile</a></li>
										<li><a href="index.php?uid=1&amp;page=user_static">User profile (static)</a></li>
									</ul>
								</li>
							</ul>
							<ul class="nav navbar-nav user_menu pull-right">
								<li class="hidden-phone hidden-tablet">
									<div class="nb_boxes clearfix">
										<a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
										<a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
									</div>
								</li>
								<li class="divider-vertical hidden-sm hidden-xs"></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav_condensed" data-toggle="dropdown"><i class="flag-gb"></i> <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="javascript:void(0)"><i class="flag-de"></i> Deutsch</a></li>
										<li><a href="javascript:void(0)"><i class="flag-fr"></i> Fran�ais</a></li>
										<li><a href="javascript:void(0)"><i class="flag-es"></i> Espa�ol</a></li>
										<li><a href="javascript:void(0)"><i class="flag-ru"></i> P??????</a></li>
									</ul>
								</li>
								<li class="divider-vertical hidden-sm hidden-xs"></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/user_avatar.png" alt="" class="user_avatar">Johny Smith <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="index.php?uid=1&amp;page=user_profile">My Profile</a></li>
										<li><a href="javascrip:void(0)">Another action</a></li>
										<li class="divider"></li>
										<li><a href="index.php">Log Out</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				
				<div class="modal fade" id="myMail">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title">New Messages</h3>
							</div>
							<div class="modal-body">
								<div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
								<table class="table table-condensed table-striped" data-provides="rowlink">
									<thead>
										<tr>
											<th>Sender</th>
											<th>Subject</th>
											<th>Date</th>
											<th>Size</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Declan Pamphlett</td>
											<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>23/05/2012</td>
											<td>25KB</td>
										</tr>
										<tr>
											<td>Erin Church</td>
											<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>24/05/2012</td>
											<td>15KB</td>
										</tr>
										<tr>
											<td>Koby Auld</td>
											<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>25/05/2012</td>
											<td>28KB</td>
										</tr>
										<tr>
											<td>Anthony Pound</td>
											<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
											<td>25/05/2012</td>
											<td>33KB</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default">Go to mailbox</button>
							</div>
						</div>
					</div>
				</div>
				
				<div class="modal fade" id="myTasks">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title">New Tasks</h3>
							</div>
							<div class="modal-body">
								<div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
								<table class="table table-condensed table-striped" data-provides="rowlink">
									<thead>
										<tr>
											<th>id</th>
											<th>Summary</th>
											<th>Updated</th>
											<th>Priority</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>P-23</td>
											<td><a href="javascript:void(0)">Admin should not break if URL�</a></td>
											<td>23/05/2012</td>
											<td><span class="label label-danger">High</span></td>
											<td>Open</td>
										</tr>
										<tr>
											<td>P-18</td>
											<td><a href="javascript:void(0)">Displaying submenus in custom�</a></td>
											<td>22/05/2012</td>
											<td><span class="label label-warning">Medium</span></td>
											<td>Reopen</td>
										</tr>
										<tr>
											<td>P-25</td>
											<td><a href="javascript:void(0)">Featured image on post types�</a></td>
											<td>22/05/2012</td>
											<td><span class="label label-success">Low</span></td>
											<td>Updated</td>
										</tr>
										<tr>
											<td>P-10</td>
											<td><a href="javascript:void(0)">Multiple feed fixes and�</a></td>
											<td>17/05/2012</td>
											<td><span class="label label-warning">Medium</span></td>
											<td>Open</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default">Go to task manager</button>
							</div>
						</div>
					</div>
				</div>
				
			</header>
        

            <div id="contentwrapper">
                <div class="main_content">
                    						<div id="jCrumbs" class="breadCrumb module">
    <ul>
        <li>
            <a href="#"><i class="glyphicon glyphicon-home"></i></a>
        </li>
        <li>
            <a href="#">Sports & Toys</a>
        </li>
        <li>
            <a href="#">Toys & Hobbies</a>
        </li>
        <li>
            <a href="#">Learning & Educational</a>
        </li>
        <li>
            <a href="#">Astronomy & Telescopes</a>
        </li>
        <li>
            Telescope 3735SX 
        </li>
    </ul>
</div>					                    <div class="modal fade" id="modal_form">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Modal form</h3>
			</div>
			<div class="modal-body">
				<form action="">
					<p class="sepH_c"><span class="label label-default">Form elemets in modal window</span></p>
					<div class="formSep">
						<div class="input-group bootstrap-timepicker">
							<input id="tp_modal" type="text" class="form-control">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
						</div>
						<span class="help-block">Timepicker</span>
					</div>
					<div class="formSep">
						<input class="form-control" id="cp_modal" type="text">
						<span class="help-block">Colorpicker</span>
					</div>
					<div>
						<input class="form-control" id="dp_modal" type="text">
						<span class="help-block">Datepicker</span>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="formSep">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<a data-toggle="modal" href="#modal_form" class="btn btn-default btn-sm">Open modal with some elements</a>
		</div>
	</div>
</div>

<div class="formSep">
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<p><span class="label label-default">UI Sliders</span></p>
			<div class="sepH_c">
				<p class="sepH_a">Donation amount ($50 increments): <strong class="ui_slider1_val"></strong></p>
				<div class="ui_slider1"></div>
				<input class="form-control" name="ui_slider_default_val" id="ui_slider_default_val" type="hidden">
			</div>
			<div class="sepH_c">
				<p class="sepH_a">Price Range: <strong class="ui_slider2_val"></strong></p>
				<div class="ui_slider2"></div>
				<input class="form-control" name="ui_slider_min" id="ui_slider_min_val" type="hidden">
				<input class="form-control" name="ui_slider_max" id="ui_slider_max_val" type="hidden">
			</div>
			<div class="sepH_c">
				<form class="form-inline">
					<label for="ui_slider3_sel" class="sepH_b">Minimum number of beds</label>
					<select name="ui_slider3_sel" id="ui_slider3_sel" class="sepH_b">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
					</select>
				</form>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p><span class="label label-default">UI Progressbars</span></p>
			<div id="progress1" class="sepH_b">
				<div class="percent"></div>
				<div class="pbar"></div>
				<div class="elapsed"></div>
			</div>
			<div id="progress2" class="sepH_b">
				<div class="percent"></div>
				<div class="pbar"></div>
				<div class="elapsed"></div>
			</div>
			<div id="progress3">
				<div class="percent"></div>
				<div class="pbar"></div>
				<div class="elapsed"></div>
			</div>
		</div>
	</div>
</div>

<div class="formSep">
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<p><span class="label label-default">Optgroup</span></p>
			<select id="optgroup" multiple="multiple">
				<optgroup label="Friends">
					<option value="1">Yoda</option>
					<option value="2">Obiwan</option>
				</optgroup>
				<optgroup label="Enemies">
					<option value="3">Palpatine</option>
					<option value="4">Darth Vader</option>
				</optgroup>
			</select>
		</div>
		<div class="col-sm-6 col-md-6">
			<p><span class="label label-default">Public methods</span></p>
			<div class="sepH_b">
				<select id="public-methods" multiple="multiple">
					<option value="fr">France</option>
					<option value="uk">United Kingdom</option>
					<option value="us">United States</option>
					<option value="ch">China</option>
				</select>
			</div>
			<div class="btn-toolbar sepH_a">
				<div class="btn-group">
					<a href="#" id="select-all" class="btn btn-default btn-xs">Select all</a>
					<a href="#" id="deselect-all" class="btn btn-default btn-xs">Deselect all</a>
				</div>
			</div>
			<div class="btn-toolbar">
				<div class="btn-group">
					<a href="#" id="select-fr" class="btn btn-default btn-xs">Select France</a>
					<a href="#" id="deselect-fr" class="btn btn-default btn-xs">Deselect France</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<p><span class="label label-default">Custom headers</span></p>
			<select id="custom-headers" multiple="multiple">
				<option value="fr">France</option>
				<option value="uk">United Kingdom</option>
				<option value="us">United States</option>
				<option value="ch">China</option>
			</select>
		</div>
		<div class="col-sm-6 col-md-6">
			<p><span class="label label-default">Searchable</span></p>
			<select id="searchable" multiple="multiple">
				<optgroup label="Africa"><option value="DZ">Algeria</option><option value="AO">Angola</option><option value="BJ">Benin</option><option value="BW">Botswana</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="CM">Cameroon</option>option value="CV">Cape Verde</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="KM">Comoros</option><option value="CD">Congo [DRC]</option><option value="CG">Congo [Republic]</option><option value="DJ">Djibouti</option><option value="EG">Egypt</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="ET">Ethiopia</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GH">Ghana</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="CI">Ivory Coast</option><option value="KE">Kenya</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="ML">Mali</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="NA">Namibia</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="RW">Rwanda</option><option value="RE">R�union</option><option value="SH">Saint Helena</option><option value="SN">Senegal</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="SD">Sudan</option><option value="SZ">Swaziland</option><option value="ST">S�o Tom� and Pr�ncipe</option><option value="TZ">Tanzania</option><option value="TG">Togo</option><option value="TN">Tunisia</option><option value="UG">Uganda</option><option value="EH">Western Sahara</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></optgroup><optgroup label="Antarctica"><option value="AQ">Antarctica</option><option value="BV">Bouvet Island</option><option value="TF">French Southern Territories</option><option value="HM">Heard Island and McDonald Island</option><option value="GS">South Georgia and the South Sandwich Islands</option></optgroup><optgroup label="Asia"><option value="AF">Afghanistan</option><option value="AM">Armenia</option><option value="AZ">Azerbaijan</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BT">Bhutan</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei</option><option value="KH">Cambodia</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos [Keeling] Islands</option><option value="GE">Georgia</option><option value="HK">Hong Kong</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IL">Israel</option><option value="JP">Japan</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LB">Lebanon</option><option value="MO">Macau</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="MN">Mongolia</option><option value="MM">Myanmar [Burma]</option><option value="NP">Nepal</option><option value="KP">North Korea</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territories</option><option value="PH">Philippines</option><option value="QA">Qatar</option><option value="SA">Saudi Arabia</option><option value="SG">Singapore</option><option value="KR">South Korea</option><option value="LK">Sri Lanka</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TH">Thailand</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="AE">United Arab Emirates</option><option value="UZ">Uzbekistan</option><option value="VN">Vietnam</option><option value="YE">Yemen</option></optgroup><optgroup label="Europe"><option value="AL">Albania</option><option value="AD">Andorra</option><option value="AT">Austria</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BA">Bosnia and Herzegovina</option><option value="BG">Bulgaria</option><option value="HR">Croatia</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="EE">Estonia</option><option value="FO">Faroe Islands</option><option value="FI">Finland</option><option value="FR">France</option><option value="DE">Germany</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GG">Guernsey</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IT">Italy</option><option value="JE">Jersey</option><option value="XK">Kosovo</option><option value="LV">Latvia</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MK">Macedonia</option><option value="MT">Malta</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="ME">Montenegro</option><option value="NL">Netherlands</option><option value="NO">Norway</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="SM">San Marino</option><option value="RS">Serbia</option><option value="CS">Serbia and Montenegro</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="ES">Spain</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="UA">Ukraine</option><option value="GB">United Kingdom</option><option value="VA">Vatican City</option><option value="AX">�land Islands</option></optgroup><optgroup label="North America"><option value="AI">Anguilla</option><option value="AG">Antigua and Barbuda</option><option value="AW">Aruba</option><option value="BS">Bahamas</option><option value="BB">Barbados</option><option value="BZ">Belize</option><option value="BM">Bermuda</option><option value="BQ">Bonaire, Saint Eustatius and Saba</option><option value="VG">British Virgin Islands</option><option value="CA">Canada</option><option value="KY">Cayman Islands</option><option value="CR">Costa Rica</option><option value="CU">Cuba</option><option value="CW">Curacao</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="SV">El Salvador</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GT">Guatemala</option><option value="HT">Haiti</option><option value="HN">Honduras</option><option value="JM">Jamaica</option><option value="MQ">Martinique</option><option value="MX">Mexico</option><option value="MS">Montserrat</option><option value="AN">Netherlands Antilles</option><option value="NI">Nicaragua</option><option value="PA">Panama</option><option value="PR">Puerto Rico</option><option value="BL">Saint Barth�lemy</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="SX">Sint Maarten</option><option value="TT">Trinidad and Tobago</option><option value="TC">Turks and Caicos Islands</option><option value="VI">U.S. Virgin Islands</option><option value="US">United States</option></optgroup><optgroup label="South America"><option value="AR">Argentina</option><option value="BO">Bolivia</option><option value="BR">Brazil</option><option value="CL">Chile</option><option value="CO">Colombia</option><option value="EC">Ecuador</option><option value="FK">Falkland Islands</option><option value="GF">French Guiana</option><option value="GY">Guyana</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="SR">Suriname</option><option value="UY">Uruguay</option><option value="VE">Venezuela</option></optgroup><optgroup label="Oceania"><option value="AS">American Samoa</option><option value="AU">Australia</option><option value="CK">Cook Islands</option><option value="TL">East Timor</option><option value="FJ">Fiji</option><option value="PF">French Polynesia</option><option value="GU">Guam</option><option value="KI">Kiribati</option><option value="MH">Marshall Islands</option><option value="FM">Micronesia</option><option value="NR">Nauru</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="PW">Palau</option><option value="PG">Papua New Guinea</option><option value="PN">Pitcairn Islands</option><option value="WS">Samoa</option><option value="SB">Solomon Islands</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TV">Tuvalu</option><option value="UM">U.S. Minor Outlying Islands</option><option value="VU">Vanuatu</option><option value="WF">Wallis and Futuna</option></optgroup>
			</select>
		</div>
	</div>
</div>

<div class="formSep">
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<p><span class="label label-default">Enhanced Select</span></p>
			<select name="chosen_a" id="chosen_a" data-placeholder="Choose a Country..." class="chzn_a form-control">
				<option value=""></option>
				<option value="DZ">Algeria</option><option value="AO">Angola</option><option value="BJ">Benin</option><option value="BW">Botswana</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="CM">Cameroon</option><option value="CV">Cape Verde</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="KM">Comoros</option><option value="CD">Congo [DRC]</option><option value="CG">Congo [Republic]</option><option value="DJ">Djibouti</option><option value="EG">Egypt</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="ET">Ethiopia</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GH">Ghana</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="CI">Ivory Coast</option><option value="KE">Kenya</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="ML">Mali</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="NA">Namibia</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="RW">Rwanda</option><option value="RE">R�union</option><option value="SH">Saint Helena</option><option value="SN">Senegal</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="SD">Sudan</option><option value="SZ">Swaziland</option><option value="ST">S�o Tom� and Pr�ncipe</option><option value="TZ">Tanzania</option><option value="TG">Togo</option><option value="TN">Tunisia</option><option value="UG">Uganda</option><option value="EH">Western Sahara</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option><option value="AQ">Antarctica</option><option value="BV">Bouvet Island</option><option value="TF">French Southern Territories</option><option value="HM">Heard Island and McDonald Island</option><option value="GS">South Georgia and the South Sandwich Islands</option><option value="AF">Afghanistan</option><option value="AM">Armenia</option><option value="AZ">Azerbaijan</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BT">Bhutan</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei</option><option value="KH">Cambodia</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos [Keeling] Islands</option><option value="GE">Georgia</option><option value="HK">Hong Kong</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IL">Israel</option><option value="JP">Japan</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LB">Lebanon</option><option value="MO">Macau</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="MN">Mongolia</option><option value="MM">Myanmar [Burma]</option><option value="NP">Nepal</option><option value="KP">North Korea</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territories</option><option value="PH">Philippines</option><option value="QA">Qatar</option><option value="SA">Saudi Arabia</option><option value="SG">Singapore</option><option value="KR">South Korea</option><option value="LK">Sri Lanka</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TH">Thailand</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="AE">United Arab Emirates</option><option value="UZ">Uzbekistan</option><option value="VN">Vietnam</option><option value="YE">Yemen</option><option value="AL">Albania</option><option value="AD">Andorra</option><option value="AT">Austria</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BA">Bosnia and Herzegovina</option><option value="BG">Bulgaria</option><option value="HR">Croatia</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="EE">Estonia</option><option value="FO">Faroe Islands</option><option value="FI">Finland</option><option value="FR">France</option><option value="DE">Germany</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GG">Guernsey</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IT">Italy</option><option value="JE">Jersey</option><option value="XK">Kosovo</option><option value="LV">Latvia</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MK">Macedonia</option><option value="MT">Malta</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="ME">Montenegro</option><option value="NL">Netherlands</option><option value="NO">Norway</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="SM">San Marino</option><option value="RS">Serbia</option><option value="CS">Serbia and Montenegro</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="ES">Spain</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="UA">Ukraine</option><option value="GB">United Kingdom</option><option value="VA">Vatican City</option><option value="AX">�land Islands</option><option value="AI">Anguilla</option><option value="AG">Antigua and Barbuda</option><option value="AW">Aruba</option><option value="BS">Bahamas</option><option value="BB">Barbados</option><option value="BZ">Belize</option><option value="BM">Bermuda</option><option value="BQ">Bonaire, Saint Eustatius and Saba</option><option value="VG">British Virgin Islands</option><option value="CA">Canada</option><option value="KY">Cayman Islands</option><option value="CR">Costa Rica</option><option value="CU">Cuba</option><option value="CW">Curacao</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="SV">El Salvador</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GT">Guatemala</option><option value="HT">Haiti</option><option value="HN">Honduras</option><option value="JM">Jamaica</option><option value="MQ">Martinique</option><option value="MX">Mexico</option><option value="MS">Montserrat</option><option value="AN">Netherlands Antilles</option><option value="NI">Nicaragua</option><option value="PA">Panama</option><option value="PR">Puerto Rico</option><option value="BL">Saint Barth�lemy</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="SX">Sint Maarten</option><option value="TT">Trinidad and Tobago</option><option value="TC">Turks and Caicos Islands</option><option value="VI">U.S. Virgin Islands</option><option value="US">United States</option><option value="AR">Argentina</option><option value="BO">Bolivia</option><option value="BR">Brazil</option><option value="CL">Chile</option><option value="CO">Colombia</option><option value="EC">Ecuador</option><option value="FK">Falkland Islands</option><option value="GF">French Guiana</option><option value="GY">Guyana</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="SR">Suriname</option><option value="UY">Uruguay</option><option value="VE">Venezuela</option><option value="AS">American Samoa</option><option value="AU">Australia</option><option value="CK">Cook Islands</option><option value="TL">East Timor</option><option value="FJ">Fiji</option><option value="PF">French Polynesia</option><option value="GU">Guam</option><option value="KI">Kiribati</option><option value="MH">Marshall Islands</option><option value="FM">Micronesia</option><option value="NR">Nauru</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="PW">Palau</option><option value="PG">Papua New Guinea</option><option value="PN">Pitcairn Islands</option><option value="WS">Samoa</option><option value="SB">Solomon Islands</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TV">Tuvalu</option><option value="UM">U.S. Minor Outlying Islands</option><option value="VU">Vanuatu</option><option value="WF">Wallis and Futuna</option>			</select>
		</div>
		<div class="col-sm-6 col-md-6">
			<p><span class="label label-default">Enhanced Multi-Select</span></p>
			<select name="chosen_b" id="chosen_b" multiple="" data-placeholder="Choose a Country..." class="chzn_b form-control">
				<optgroup label="Africa"><option value="DZ">Algeria</option><option value="AO">Angola</option><option value="BJ">Benin</option><option value="BW">Botswana</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="CM">Cameroon</option><option value="CV">Cape Verde</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="KM">Comoros</option><option value="CD">Congo [DRC]</option><option value="CG">Congo [Republic]</option><option value="DJ">Djibouti</option><option value="EG">Egypt</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="ET">Ethiopia</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GH">Ghana</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="CI">Ivory Coast</option><option value="KE">Kenya</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="ML">Mali</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="NA">Namibia</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="RW">Rwanda</option><option value="RE">R�union</option><option value="SH">Saint Helena</option><option value="SN">Senegal</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="SD">Sudan</option><option value="SZ">Swaziland</option><option value="ST">S�o Tom� and Pr�ncipe</option><option value="TZ">Tanzania</option><option value="TG">Togo</option><option value="TN">Tunisia</option><option value="UG">Uganda</option><option value="EH">Western Sahara</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></optgroup><optgroup label="Antarctica"><option value="AQ">Antarctica</option><option value="BV">Bouvet Island</option><option value="TF">French Southern Territories</option><option value="HM">Heard Island and McDonald Island</option><option value="GS">South Georgia and the South Sandwich Islands</option></optgroup><optgroup label="Asia"><option value="AF">Afghanistan</option><option value="AM">Armenia</option><option value="AZ">Azerbaijan</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BT">Bhutan</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei</option><option value="KH">Cambodia</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos [Keeling] Islands</option><option value="GE">Georgia</option><option value="HK">Hong Kong</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IL">Israel</option><option value="JP">Japan</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LB">Lebanon</option><option value="MO">Macau</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="MN">Mongolia</option><option value="MM">Myanmar [Burma]</option><option value="NP">Nepal</option><option value="KP">North Korea</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territories</option><option value="PH">Philippines</option><option value="QA">Qatar</option><option value="SA">Saudi Arabia</option><option value="SG">Singapore</option><option value="KR">South Korea</option><option value="LK">Sri Lanka</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TH">Thailand</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="AE">United Arab Emirates</option><option value="UZ">Uzbekistan</option><option value="VN">Vietnam</option><option value="YE">Yemen</option></optgroup><optgroup label="Europe"><option value="AL">Albania</option><option value="AD">Andorra</option><option value="AT">Austria</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BA">Bosnia and Herzegovina</option><option value="BG">Bulgaria</option><option value="HR">Croatia</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="EE">Estonia</option><option value="FO">Faroe Islands</option><option value="FI">Finland</option><option value="FR">France</option><option value="DE">Germany</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GG">Guernsey</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IT">Italy</option><option value="JE">Jersey</option><option value="XK">Kosovo</option><option value="LV">Latvia</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MK">Macedonia</option><option value="MT">Malta</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="ME">Montenegro</option><option value="NL">Netherlands</option><option value="NO">Norway</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="SM">San Marino</option><option value="RS">Serbia</option><option value="CS">Serbia and Montenegro</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="ES">Spain</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="UA">Ukraine</option><option value="GB">United Kingdom</option><option value="VA">Vatican City</option><option value="AX">�land Islands</option></optgroup><optgroup label="North America"><option value="AI">Anguilla</option><option value="AG">Antigua and Barbuda</option><option value="AW">Aruba</option><option value="BS">Bahamas</option><option value="BB">Barbados</option><option value="BZ">Belize</option><option value="BM">Bermuda</option><option value="BQ">Bonaire, Saint Eustatius and Saba</option><option value="VG">British Virgin Islands</option><option value="CA">Canada</option><option value="KY">Cayman Islands</option><option value="CR">Costa Rica</option><option value="CU">Cuba</option><option value="CW">Curacao</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="SV">El Salvador</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GT">Guatemala</option><option value="HT">Haiti</option><option value="HN">Honduras</option><option value="JM">Jamaica</option><option value="MQ">Martinique</option><option value="MX">Mexico</option><option value="MS">Montserrat</option><option value="AN">Netherlands Antilles</option><option value="NI">Nicaragua</option><option value="PA">Panama</option><option value="PR">Puerto Rico</option><option value="BL">Saint Barth�lemy</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="SX">Sint Maarten</option><option value="TT">Trinidad and Tobago</option><option value="TC">Turks and Caicos Islands</option><option value="VI">U.S. Virgin Islands</option><option value="US">United States</option></optgroup><optgroup label="South America"><option value="AR">Argentina</option><option value="BO">Bolivia</option><option value="BR">Brazil</option><option value="CL">Chile</option><option value="CO">Colombia</option><option value="EC">Ecuador</option><option value="FK">Falkland Islands</option><option value="GF">French Guiana</option><option value="GY">Guyana</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="SR">Suriname</option><option value="UY">Uruguay</option><option value="VE">Venezuela</option></optgroup><optgroup label="Oceania"><option value="AS">American Samoa</option><option value="AU">Australia</option><option value="CK">Cook Islands</option><option value="TL">East Timor</option><option value="FJ">Fiji</option><option value="PF">French Polynesia</option><option value="GU">Guam</option><option value="KI">Kiribati</option><option value="MH">Marshall Islands</option><option value="FM">Micronesia</option><option value="NR">Nauru</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="PW">Palau</option><option value="PG">Papua New Guinea</option><option value="PN">Pitcairn Islands</option><option value="WS">Samoa</option><option value="SB">Solomon Islands</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TV">Tuvalu</option><option value="UM">U.S. Minor Outlying Islands</option><option value="VU">Vanuatu</option><option value="WF">Wallis and Futuna</option></optgroup>			</select>
		</div>
	</div>
</div>

<div class="formSep">
	<p><span class="label label-default">Uniform</span></p>
	<div class="row">
		<div class="col-sm-4 col-md-4">
			<select class="uni_style">
				<option>Lorem ipsum dolor sit amet amet, lorem ipsum</option>
				<option>Lorem ipsum dolor sit amet</option>
				<option>Lorem ipsum dolor sit amet</option>
				<option>Lorem ipsum dolor sit amet</option>
				<option>Lorem ipsum dolor sit amet</option>
			</select>
			<input name="uni_file" id="uni_file" class="uni_style form-control" type="file">
		</div>
		<div class="col-sm-4 col-md-4">
			<label class="uni-checkbox">
				<input value="option1" name="uni_c1" class="uni_style" type="checkbox">
				Lorem ipsum dolor sit amet
			</label>
			<label class="uni-checkbox">
				<input value="option2" name="uni_c2" class="uni_style" type="checkbox">
				Lorem ipsum dolor sit amet
			</label>
			<label class="uni-checkbox">
				<input value="option3" name="uni_c3" class="uni_style" type="checkbox">
				Lorem ipsum dolor sit amet
			</label>
			<label class="uni-checkbox">
				<input value="option3" name="uni_c3" disabled="disabled" class="uni_style" type="checkbox">
				Disabled
			</label>
		</div>
		<div class="col-sm-4 col-md-4">
			<label class="uni-radio">
				<input checked="" value="option1" id="uni_r1a" name="uni_r" class="uni_style" type="radio">
				Lorem ipsum dolor sit amet
			</label>
			<label class="uni-radio">
				<input value="option2" id="uni_r1b" name="uni_r" class="uni_style" type="radio">
				Lorem ipsum dolor sit amet
			</label>
			<label class="uni-radio">
				<input value="option2" id="uni_r1c" name="uni_r" disabled="disabled" class="uni_style" type="radio">
				Disabled
			</label>
		</div>
	</div>
</div>

<div class="formSep">
	<p><span class="label label-default">File upload</span></p>
	<div class="row">
		<div class="col-sm-6">
			<div data-provides="fileupload" class="fileupload fileupload-new">
				<div class="input-group">
					<div class="form-control">
						<i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span>
					</div>
					<div class="input-group-btn">
						<a data-dismiss="fileupload" class="btn btn-default fileupload-exists" href="#">Remove</a>
						<span class="btn btn-default btn-file">
							<span class="fileupload-new">Select file</span>
							<span class="fileupload-exists">Change</span>
							<input type="file">
						</span>
					</div>
				</div>
			</div>  
		</div>
		<div class="col-sm-6">
			<div data-provides="fileupload" class="fileupload fileupload-new">
				<span class="btn btn-default btn-file">
					<span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file">
				</span>
				<span class="fileupload-preview"></span>
				<button style="float:none" data-dismiss="fileupload" class="close fileupload-exists" type="button">�</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<div data-provides="fileupload" class="fileupload fileupload-new">
				<div style="width: 180px; height: 120px;" class="fileupload-preview img-thumbnail sepH_a"></div>
				<div>
					<span class="btn btn-default btn-file">
						<span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file">
					</span>
					<a data-dismiss="fileupload" class="btn btn-default fileupload-exists" href="#">Remove</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div data-provides="fileupload" class="fileupload fileupload-new">
				<div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a"><img alt="" src="http://www.placehold.it/168x110/EFEFEF/AAAAAA&text=no+image"></div>
				<div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists img-thumbnail sepH_a"></div>
				<div>
					<span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file"></span>
					<a data-dismiss="fileupload" class="btn btn-default fileupload-exists" href="#">Remove</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="sepH_c">
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="fileupload-new img-thumbnail" style="width: 50px; height: 50px;"><img alt="" src="http://www.placehold.it/40x40/EFEFEF/AAAAAA&text=no+image"></div>
					<div class="fileupload-preview fileupload-exists img-thumbnail" style="width: 50px; height: 50px;"></div>
					<span class="btn btn-sm btn-default btn-file">
						<span class="fileupload-new">Select image</span>
					<span class="fileupload-exists">Change</span><input type="file"></span>
					<a href="#" class="btn btn-sm btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
				</div>
			</div>
			<div class="fileupload fileupload-new pull-right text-right" data-provides="fileupload">
				<span class="btn btn-default btn-sm btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file"></span>
				<a href="#" class="btn btn-sm btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
				<div class="fileupload-new img-thumbnail" style="width: 50px; height: 50px;"><img alt="" src="http://www.placehold.it/40x40/EFEFEF/AAAAAA&text=no+image"></div>
				<div class="fileupload-preview fileupload-exists img-thumbnail" style="width: 50px; height: 50px;"></div>
			</div>                              
		</div>
	</div>
</div>

<div class="formSep">
	<p><span class="label label-default">Masked inputs</span></p>
	<div class="row">
		<div class="col-sm-3 col-md-3">
			<label for="mask_date">Date</label>
			<input class="form-control" id="mask_date" type="text">
			<span class="help-block">99/99/9999</span>
		</div>
		<div class="col-sm-3 col-md-3">
			<label for="mask_phone">Phone</label>
			<input class="form-control" id="mask_phone" type="text">
			<span class="help-block">(999) 999-9999</span>
		</div>
		<div class="col-sm-3 col-md-3">
			<label for="mask_ssn">SSN Number</label>
			<input class="form-control" id="mask_ssn" type="text">
			<span class="help-block">999-99-9999</span>
		</div>
		<div class="col-sm-3 col-md-3">
			<label for="mask_product">Product number</label>
			<input class="form-control" id="mask_product" type="text">
			<span class="help-block">AA-999-A999</span>
		</div>
	</div>
</div>

<div class="formSep">
	<p class="sepH_c"><span class="label label-default">Datepickers</span></p>
	<div class="row">
		<div class="col-sm-3 col-md-3">
			<input class="form-control" id="dp1" type="text">
			<span class="help-block">Default datepicker</span>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="input-group date" id="dp2" data-date-format="dd/mm/yyyy">
				<input class="form-control" readonly="" type="text">
				<span class="input-group-addon"><i class="splashy-calendar_day"></i></span>
			</div>
			<span class="help-block">As component</span>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="input-group date" id="dp_start">
				<input class="form-control" readonly="" type="text">
				<span class="input-group-addon"><i class="splashy-calendar_day_up"></i></span>
			</div>
			<span class="help-block">Daterange - date start</span>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="input-group date" id="dp_end">
				<input class="form-control" readonly="" type="text">
				<span class="input-group-addon"><i class="splashy-calendar_day_down"></i></span>
			</div>
			<span class="help-block">Daterange - date end</span>
		</div>
	</div>
</div>

<div class="formSep">
	<p class="sepH_c"><span class="label label-default">Colorpicker</span></p>
	<div class="row">
		<div class="col-sm-3 col-md-3">
			<input class="form-control" id="cp1" value="#2eb97a" type="text">
			<span class="help-block">Hex format</span>
		</div>
		<div class="col-sm-3 col-md-3">
			<input class="form-control" value="rgb(0,194,255,0.78)" id="cp2" data-color-format="rgba" type="text">
			<span class="help-block">Rgba format</span>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="input-group color" data-color="rgb(218,57,41)" data-color-format="rgb" id="cp3">
				<input class="form-control" value="" readonly="" type="text">
				<span class="input-group-addon"><i style="background-color: rgb(218,57,41)"></i></span>
			</div>
			<span class="help-block">As component</span>
		</div>
	</div>
</div>

<div class="formSep">
	<p class="sepH_c"><span class="label label-default">Timepickers</span></p>
	<div class="row">
		<div class="col-sm-3 col-md-3">
			<div class="bootstrap-timepicker">
				<input class="form-control" id="tp_1" type="text">
			</div>
			<span class="help-block">Show as modal (24h)</span>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="bootstrap-timepicker">
				<input class="form-control" id="tp_2" type="text">
			</div>
			<span class="help-block">Show as dropdown (12h)</span>
		</div>
	</div>
</div>

<div class="formSep">
	<p class="sepH_c"><span class="label label-default">Password strength checker</span></p>
	<div class="row">
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<input placeholder="Password, min. 6 chars" class="form-control" id="pass_check" type="password">
			</div>
			<div id="pass_progress" class="progress">
				<div class="progress-bar progress-bar-danger" style="width: 0"></div>
			</div>
		</div>
	</div>
</div>

<div class="formSep">
	<p class="sepH_c"><span class="label label-default">Textarea word and character limiter</span></p>
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<textarea name="txtarea_limit_chars" id="txtarea_limit_chars" cols="1" rows="4" class="sepH_a form-control"></textarea>
		</div>
		<div class="col-sm-6 col-md-6">
			<textarea name="txtarea_limit_words" id="txtarea_limit_words" cols="1" rows="4" class="sepH_a form-control"></textarea>
		</div>
	</div>
</div>

<div class="formSep">
	<p class="sepH_c"><span class="label label-default">Auto-Expanding Textarea</span></p>
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<textarea name="auto_expand" id="auto_expand" cols="1" rows="4" class="form-control"></textarea>
		</div>
	</div>
</div>

<div class="formSep">
	<p><span class="label label-default">Tag Handler</span></p>
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<ul id="array_tag_handler"></ul>
			<span class="help-block">The Tag Handler initialized with preset tags, and autocomplete is turned on</span>
		</div>
		<div class="col-sm-6 col-md-6">
			<ul id="max_tags_tag_handler"></ul>
			<span class="help-block">Maximum 5 tags allowed.</span>
		</div>
	</div>
</div>

<div class="formSep">
	<p><span class="label label-default">Spinners</span></p>
	<div class="row">
		<div class="col-sm-3 col-md-3">
			<label for="sp_basic">Basic</label>
			<input id="sp_basic" name="sp_basic" class="form-control" value="100" type="text">
		</div>
		<div class="col-sm-3 col-md-3">
			<label for="sp_dec">Decimal</label>
			<input id="sp_dec" name="sp_dec" class="form-control" value="10.25" type="text">
		</div>
		<div class="col-sm-3 col-md-3">
			<label for="sp_currency">Currency</label>
			<input id="sp_currency" name="sp_currency" class="form-control" value="2" type="text">
			<span class="help-block">min:2, max:20</span>
		</div>
        <div class="col-sm-3 col-md-3">
			<label for="sp_overflow">Overflow</label>
			<input id="sp_overflow" name="sp_overflow" class="form-control" value="1" type="text">
		</div>
	</div>
</div>
<div class="formSep">
    <p><span class="label label-default">WYSIWG Editor with integrated File Manager</span></p>
    <textarea name="wysiwg_full" id="wysiwg_full" cols="30" rows="10"></textarea>
</div>
<div class="formSep">
    <p><span class="label label-default">Multiupload</span></p>
    <div id="multi_upload" class="gebo-upload">
        <p>You browser doesn't have Flash, Silverlight or HTML5 support.</p>
    </div>
</div>
<div class="formSep">
    <p><span class="label label-default">Toggle buttons</span></p>
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <label>Large</label>
			<div class="make-switch switch-large">
				<input type="checkbox" checked>
			</div>
        </div>
		<div class="col-sm-3 col-md-3">
			<label>Default</label>
			<div class="make-switch">
				<input type="checkbox" checked>
			</div>
        </div>
		<div class="col-sm-3 col-md-3">
			<label>Small</label>
			<div class="make-switch switch-small">
				<input type="checkbox" checked>
			</div>
        </div>
		<div class="col-sm-3 col-md-3">
			<label>Mini</label>
			<div class="make-switch switch-mini">
				<input type="checkbox" checked>
			</div>
        </div>
    </div>
	<div class="row">
		<div class="col-sm-3 col-md-3">
			<label>Color "primary"</label>
			<div class="make-switch" data-on="primary">
				<input type="checkbox" checked>
			</div>
		</div>
		<div class="col-sm-3 col-md-3">
			<label>Color "info"</label>
			<div class="make-switch" data-on="info">
				<input type="checkbox" checked>
			</div>
		</div>
		<div class="col-sm-3 col-md-3">
			<label>Color "success"</label>
			<div class="make-switch" data-on="success">
				<input type="checkbox" checked>
			</div>
		</div>
		<div class="col-sm-3 col-md-3">
			<label>Color "warning"</label>
			<div class="make-switch" data-on="warning">
				<input type="checkbox" checked>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3 col-md-3">
			<label>Color "danger"</label>
			<div class="make-switch" data-on="danger">
				<input type="checkbox" checked>
			</div>
		</div>
		<div class="col-sm-3 col-md-3">
			<label>Color "default"</label>
			<div class="make-switch" data-on="default">
				<input type="checkbox" checked>
			</div>
		</div>
	</div>
</div>                </div>
            </div>
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<div class="sidebar">
	
	<div class="sidebar_inner_scroll">
		<div class="sidebar_inner">
			<form action="index.php?uid=1&amp;page=search_page" class="input-group input-group-sm" method="post">
				<input autocomplete="off" name="query" class="search_query form-control input-sm" size="16" placeholder="Search..." type="text">
				<span class="input-group-btn"><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button></span>
			</form>
			<div id="side_accordion" class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
							<i class="glyphicon glyphicon-folder-close"></i> Content
						</a>
					</div>
					<div class="accordion-body collapse" id="collapseOne">
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="javascript:void(0)">Articles</a></li>
								<li><a href="javascript:void(0)">News</a></li>
								<li><a href="javascript:void(0)">Newsletters</a></li>
								<li><a href="javascript:void(0)">Comments</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
							<i class="glyphicon glyphicon-th"></i> Modules
						</a>
					</div>
					<div class="accordion-body collapse" id="collapseTwo">
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="javascript:void(0)">Content blocks</a></li>
								<li><a href="javascript:void(0)">Tags</a></li>
								<li><a href="javascript:void(0)">Blog</a></li>
								<li><a href="javascript:void(0)">FAQ</a></li>
								<li><a href="javascript:void(0)">Formbuilder</a></li>
								<li><a href="javascript:void(0)">Location</a></li>
								<li><a href="javascript:void(0)">Profiles</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
							<i class="glyphicon glyphicon-user"></i> Account manager
						</a>
					</div>
					<div class="accordion-body collapse" id="collapseThree">
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="javascript:void(0)">Members</a></li>
								<li><a href="javascript:void(0)">Members groups</a></li>
								<li><a href="javascript:void(0)">Users</a></li>
								<li><a href="javascript:void(0)">Users groups</a></li>
							</ul>
							
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
							<i class="glyphicon glyphicon-cog"></i> Configuration
						</a>
					</div>
					<div class="accordion-body collapse in" id="collapseFour">
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li class="nav-header">People</li>
								<li class="active"><a href="javascript:void(0)">Account Settings</a></li>
								<li><a href="javascript:void(0)">IP Adress Blocking</a></li>
								<li class="nav-header">System</li>
								<li><a href="javascript:void(0)">Site information</a></li>
								<li><a href="javascript:void(0)">Actions</a></li>
								<li><a href="javascript:void(0)">Cron</a></li>
								<li class="divider"></li>
								<li><a href="javascript:void(0)">Help</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="#collapseLong" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
							<i class="glyphicon glyphicon-leaf"></i> Long content (scrollbar)
						</a>
					</div>
					<div class="accordion-body collapse" id="collapseLong">
						<div class="panel-body">
							Some text to show sidebar scroll bar<br>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rhoncus, orci ac fermentum imperdiet, purus sapien pharetra diam, at varius nibh tellus tristique sem. Nulla congue odio ut augue volutpat congue. Nullam id nisl ut augue posuere ullamcorper vitae eget nunc. Quisque justo turpis, tristique non fermentum ac, feugiat quis lorem. Ut pellentesque, turpis quis auctor laoreet, nibh erat volutpat est, id mattis mi elit non massa. Suspendisse diam dui, fringilla id pretium non, dapibus eget enim. Duis fermentum quam a leo luctus tincidunt euismod sit amet arcu. Duis bibendum ultricies libero sed feugiat. Duis ut sapien risus. Morbi non nulla sit amet eros fringilla blandit id vel augue. Nam placerat ligula lacinia tellus molestie molestie vestibulum leo tincidunt.
							Duis auctor varius risus vitae commodo. Fusce nec odio massa, ut dapibus justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus, mauris sit amet feugiat tempor, nulla diam gravida magna, in facilisis sapien tellus non ligula. Mauris sapien turpis, sodales ac lacinia sit amet, porttitor in lacus. Pellentesque tincidunt malesuada magna, in egestas augue sodales vel. Praesent iaculis sapien at ante sodales facilisis.
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
						   <i class="glyphicon glyphicon-th"></i> Calculator
						</a>
					</div>
					<div class="accordion-body collapse" id="collapse7">
						<div class="panel-body">
							<form name="Calc" id="calc">
								<div class="formSep input-group input-group-sm">
									<input class="form-control" name="Input" type="text"/>
									<span class="input-group-btn">
										<button type="button" class="btn btn-default" name="clear" value="c" onclick="Calc.Input.value = ''">
											<i class="glyphicon glyphicon-remove"></i>
										</button>
									</span>
								</div>
								<div class="form-group">
									<input class="btn form-control btn-default input-sm" name="seven" value="7" onclick="Calc.Input.value += '7'" type="button">
									<input class="btn form-control btn-default input-sm" name="eight" value="8" onclick="Calc.Input.value += '8'" type="button">
									<input class="btn form-control btn-default input-sm" name="nine" value="9" onclick="Calc.Input.value += '9'" type="button">
									<input class="btn form-control btn-default input-sm" name="div" value="/" onclick="Calc.Input.value += ' / '" type="button">
								</div>
								<div class="form-group">
									<input class="btn form-control btn-default input-sm" name="four" value="4" onclick="Calc.Input.value += '4'" type="button">
									<input class="btn form-control btn-default input-sm" name="five" value="5" onclick="Calc.Input.value += '5'" type="button">
									<input class="btn form-control btn-default input-sm" name="six" value="6" onclick="Calc.Input.value += '6'" type="button">
									<input class="btn form-control btn-default input-sm" name="times" value="x" onclick="Calc.Input.value += ' * '" type="button">
								</div>
								<div class="form-group">
									<input class="btn form-control btn-default input-sm" name="one" value="1" onclick="Calc.Input.value += '1'" type="button">
									<input class="btn form-control btn-default input-sm" name="two" value="2" onclick="Calc.Input.value += '2'" type="button">
									<input class="btn form-control btn-default input-sm" name="three" value="3" onclick="Calc.Input.value += '3'" type="button">
									<input class="btn form-control btn-default input-sm" name="minus" value="-" onclick="Calc.Input.value += ' - '" type="button">
								</div>
								<div class="formSep form-group">
									<input class="btn form-control btn-default input-sm" name="dot" value="." onclick="Calc.Input.value += '.'" type="button">
									<input class="btn form-control btn-default input-sm" name="zero" value="0" onclick="Calc.Input.value += '0'" type="button">
									<input class="btn form-control btn-default input-sm" name="DoIt" value="=" onclick="Calc.Input.value = Math.round( eval(Calc.Input.value) * 1000)/1000" type="button">
									<input class="btn form-control btn-default input-sm" name="plus" value="+" onclick="Calc.Input.value += ' + '" type="button">
								</div>
								Contributed by <a href="http://themeforest.net/user/maumao">maumao</a>
							</form>
						</div>
					 </div>
				</div>
	
			</div>
			
			<div class="push"></div>
		</div>
					   
		<div class="sidebar_info">
			<ul class="list-unstyled">
				<li>
					<span class="act act-warning">65</span>
					<strong>New comments</strong>
				</li>
				<li>
					<span class="act act-success">10</span>
					<strong>New articles</strong>
				</li>
				<li>
					<span class="act act-danger">85</span>
					<strong>New registrations</strong>
				</li>
			</ul>
		</div> 
	</div>
	
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate.min.js"></script>
    <script src="lib/jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>
    <!-- touch events for jquery ui-->
	<script src="js/forms/jquery.ui.touch-punch.min.js"></script>
    <!-- easing plugin -->
	<script src="js/jquery.easing.1.3.min.js"></script>
    <!-- smart resize event -->
	<script src="js/jquery.debouncedresize.min.js"></script>
    <!-- js cookie plugin -->
	<script src="js/jquery_cookie_min.js"></script>
    <!-- main bootstrap js -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- bootstrap plugins -->
	<script src="js/bootstrap.plugins.min.js"></script>
	<!-- typeahead -->
	<script src="lib/typeahead/typeahead.min.js"></script>
    <!-- code prettifier -->
	<script src="lib/google-code-prettify/prettify.min.js"></script>
    <!-- sticky messages -->
	<script src="lib/sticky/sticky.min.js"></script>
    <!-- tooltips -->
	<script src="lib/qtip2/jquery.qtip.min.js"></script>
    <!-- lightbox -->
	<script src="lib/colorbox/jquery.colorbox.min.js"></script>
    <!-- jBreadcrumbs -->
	<script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
	<!-- hidden elements width/height -->
	<script src="js/jquery.actual.min.js"></script>
	<!-- custom scrollbar -->
	<script src="lib/slimScroll/jquery.slimscroll.js"></script>
	<!-- fix for ios orientation change -->
	<script src="js/ios-orientationchange-fix.js"></script>
	<!-- to top -->
	<script src="lib/UItoTop/jquery.ui.totop.min.js"></script>
	<!-- mobile nav -->
	<script src="js/selectNav.js"></script>

	<!-- common functions -->
	<script src="js/gebo_common.js"></script>

		
	<!-- globalize for jQuery UI-->
    <script src="lib/jquery-ui/external/globalize.js"></script>
    <!-- masked inputs -->
	<script src="js/forms/jquery.inputmask.min.js"></script>
	<!-- autosize textareas -->
	<script src="js/forms/jquery.autosize.min.js"></script>
	<!-- textarea limiter/counter -->
	<script src="js/forms/jquery.counter.min.js"></script>
	<!-- datepicker -->
	<script src="lib/datepicker/bootstrap-datepicker.min.js"></script>
	<!-- timepicker -->
	<script src="lib/timepicker/js/bootstrap-timepicker.min.js"></script>
	<!-- tag handler -->
	<script src="lib/tag_handler/jquery.taghandler.min.js"></script>
	<!-- styled form elements -->
	<script src="lib/uniform/jquery.uniform.min.js"></script>
	<!-- animated progressbars -->
	<script src="js/forms/jquery.progressbar.anim.js"></script>
	<!-- multiselect -->
	<script src="lib/multi-select/js/jquery.multi-select.js"></script>
	<script src="lib/multi-select/js/jquery.quicksearch.js"></script>
	<!-- enhanced select (chosen) -->
	<script src="lib/chosen/chosen.jquery.min.js"></script>
	<!-- TinyMce WYSIWG editor -->
	<script src="lib/tiny_mce/jquery.tinymce.js"></script>
    <!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
    <script type="text/javascript" src="lib/plupload/js/plupload.full.js"></script>
    <script type="text/javascript" src="lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
	<!-- colorpicker -->
	<script src="lib/colorpicker/bootstrap-colorpicker.js"></script>
	<!-- password strength checker -->
	<script src="lib/complexify/jquery.complexify.min.js"></script>
	<!-- switch buttons -->
    <script src="lib/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
    <!-- form functions -->
	<script src="js/gebo_forms.js"></script>

	
	
    <script>
        $(document).ready(function() {
			//* jQuery.browser.mobile (http://detectmobilebrowser.com/)
			//* jQuery.browser.mobile will be true if the browser is a mobile device
			(function(a){jQuery.browser.mobile=/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);
			//replace themeforest iframe
			if(jQuery.browser.mobile) {
				if (top !== self) top.location.href = self.location.href;
			}
        });
    </script>
	

</div>					</body>
				</html>
