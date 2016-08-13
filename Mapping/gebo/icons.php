
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

        <!-- smoke_js -->
            <link rel="stylesheet" href="img/font-awesome/css/font-awesome.min.css" />

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
</div>					                    <div class="row">
    <div class="col-sm-12 col-md-12">
		
		<h3 class="heading"><a href="http://fortawesome.github.io/Font-Awesome/icons/">Font Awesome icons</a> <small>(361 icons)</small></h3>
		<div class="icon_copy_awesome sepH_c" data-iconset="awesome">Click on icon to generate code <span></span></div>
		<ul class="icon_list_awesome clearfix">
			<li title="icon-glass"><i class="icon-glass"></i></li>
			<li title="icon-music"><i class="icon-music"></i></li>
			<li title="icon-search"><i class="icon-search"></i></li>
			<li title="icon-envelope-alt"><i class="icon-envelope-alt"></i></li>
			<li title="icon-heart"><i class="icon-heart"></i></li>
			<li title="icon-star"><i class="icon-star"></i></li>
			<li title="icon-star-empty"><i class="icon-star-empty"></i></li>
			<li title="icon-user"><i class="icon-user"></i></li>
			<li title="icon-film"><i class="icon-film"></i></li>
			<li title="icon-th-large"><i class="icon-th-large"></i></li>
			<li title="icon-th"><i class="icon-th"></i></li>
			<li title="icon-th-list"><i class="icon-th-list"></i></li>
			<li title="icon-ok"><i class="icon-ok"></i></li>
			<li title="icon-remove"><i class="icon-remove"></i></li>
			<li title="icon-zoom-in"><i class="icon-zoom-in"></i></li>
			<li title="icon-zoom-out"><i class="icon-zoom-out"></i></li>
			<li title="icon-off"><i class="icon-off"></i></li>
			<li title="icon-signal"><i class="icon-signal"></i></li>
			<li title="icon-cog"><i class="icon-cog"></i></li>
			<li title="icon-trash"><i class="icon-trash"></i></li>
			<li title="icon-home"><i class="icon-home"></i></li>
			<li title="icon-file-alt"><i class="icon-file-alt"></i></li>
			<li title="icon-time"><i class="icon-time"></i></li>
			<li title="icon-road"><i class="icon-road"></i></li>
			<li title="icon-download-alt"><i class="icon-download-alt"></i></li>
			<li title="icon-download"><i class="icon-download"></i></li>
			<li title="icon-upload"><i class="icon-upload"></i></li>
			<li title="icon-inbox"><i class="icon-inbox"></i></li>
			<li title="icon-play-circle"><i class="icon-play-circle"></i></li>
			<li title="icon-repeat"><i class="icon-repeat"></i></li>
			<li title="icon-refresh"><i class="icon-refresh"></i></li>
			<li title="icon-list-alt"><i class="icon-list-alt"></i></li>
			<li title="icon-lock"><i class="icon-lock"></i></li>
			<li title="icon-flag"><i class="icon-flag"></i></li>
			<li title="icon-headphones"><i class="icon-headphones"></i></li>
			<li title="icon-volume-off"><i class="icon-volume-off"></i></li>
			<li title="icon-volume-down"><i class="icon-volume-down"></i></li>
			<li title="icon-volume-up"><i class="icon-volume-up"></i></li>
			<li title="icon-qrcode"><i class="icon-qrcode"></i></li>
			<li title="icon-barcode"><i class="icon-barcode"></i></li>
			<li title="icon-tag"><i class="icon-tag"></i></li>
			<li title="icon-tags"><i class="icon-tags"></i></li>
			<li title="icon-book"><i class="icon-book"></i></li>
			<li title="icon-bookmark"><i class="icon-bookmark"></i></li>
			<li title="icon-print"><i class="icon-print"></i></li>
			<li title="icon-camera"><i class="icon-camera"></i></li>
			<li title="icon-font"><i class="icon-font"></i></li>
			<li title="icon-bold"><i class="icon-bold"></i></li>
			<li title="icon-italic"><i class="icon-italic"></i></li>
			<li title="icon-text-height"><i class="icon-text-height"></i></li>
			<li title="icon-text-width"><i class="icon-text-width"></i></li>
			<li title="icon-align-left"><i class="icon-align-left"></i></li>
			<li title="icon-align-center"><i class="icon-align-center"></i></li>
			<li title="icon-align-right"><i class="icon-align-right"></i></li>
			<li title="icon-align-justify"><i class="icon-align-justify"></i></li>
			<li title="icon-list"><i class="icon-list"></i></li>
			<li title="icon-indent-left"><i class="icon-indent-left"></i></li>
			<li title="icon-indent-right"><i class="icon-indent-right"></i></li>
			<li title="icon-facetime-video"><i class="icon-facetime-video"></i></li>
			<li title="icon-picture"><i class="icon-picture"></i></li>
			<li title="icon-pencil"><i class="icon-pencil"></i></li>
			<li title="icon-map-marker"><i class="icon-map-marker"></i></li>
			<li title="icon-adjust"><i class="icon-adjust"></i></li>
			<li title="icon-tint"><i class="icon-tint"></i></li>
			<li title="icon-edit"><i class="icon-edit"></i></li>
			<li title="icon-share"><i class="icon-share"></i></li>
			<li title="icon-check"><i class="icon-check"></i></li>
			<li title="icon-move"><i class="icon-move"></i></li>
			<li title="icon-step-backward"><i class="icon-step-backward"></i></li>
			<li title="icon-fast-backward"><i class="icon-fast-backward"></i></li>
			<li title="icon-backward"><i class="icon-backward"></i></li>
			<li title="icon-play"><i class="icon-play"></i></li>
			<li title="icon-pause"><i class="icon-pause"></i></li>
			<li title="icon-stop"><i class="icon-stop"></i></li>
			<li title="icon-forward"><i class="icon-forward"></i></li>
			<li title="icon-fast-forward"><i class="icon-fast-forward"></i></li>
			<li title="icon-step-forward"><i class="icon-step-forward"></i></li>
			<li title="icon-eject"><i class="icon-eject"></i></li>
			<li title="icon-chevron-left"><i class="icon-chevron-left"></i></li>
			<li title="icon-chevron-right"><i class="icon-chevron-right"></i></li>
			<li title="icon-plus-sign"><i class="icon-plus-sign"></i></li>
			<li title="icon-minus-sign"><i class="icon-minus-sign"></i></li>
			<li title="icon-remove-sign"><i class="icon-remove-sign"></i></li>
			<li title="icon-ok-sign"><i class="icon-ok-sign"></i></li>
			<li title="icon-question-sign"><i class="icon-question-sign"></i></li>
			<li title="icon-info-sign"><i class="icon-info-sign"></i></li>
			<li title="icon-screenshot"><i class="icon-screenshot"></i></li>
			<li title="icon-remove-circle"><i class="icon-remove-circle"></i></li>
			<li title="icon-ok-circle"><i class="icon-ok-circle"></i></li>
			<li title="icon-ban-circle"><i class="icon-ban-circle"></i></li>
			<li title="icon-arrow-left"><i class="icon-arrow-left"></i></li>
			<li title="icon-arrow-right"><i class="icon-arrow-right"></i></li>
			<li title="icon-arrow-up"><i class="icon-arrow-up"></i></li>
			<li title="icon-arrow-down"><i class="icon-arrow-down"></i></li>
			<li title="icon-share-alt"><i class="icon-share-alt"></i></li>
			<li title="icon-resize-full"><i class="icon-resize-full"></i></li>
			<li title="icon-resize-small"><i class="icon-resize-small"></i></li>
			<li title="icon-plus"><i class="icon-plus"></i></li>
			<li title="icon-minus"><i class="icon-minus"></i></li>
			<li title="icon-asterisk"><i class="icon-asterisk"></i></li>
			<li title="icon-exclamation-sign"><i class="icon-exclamation-sign"></i></li>
			<li title="icon-gift"><i class="icon-gift"></i></li>
			<li title="icon-leaf"><i class="icon-leaf"></i></li>
			<li title="icon-fire"><i class="icon-fire"></i></li>
			<li title="icon-eye-open"><i class="icon-eye-open"></i></li>
			<li title="icon-eye-close"><i class="icon-eye-close"></i></li>
			<li title="icon-warning-sign"><i class="icon-warning-sign"></i></li>
			<li title="icon-plane"><i class="icon-plane"></i></li>
			<li title="icon-calendar"><i class="icon-calendar"></i></li>
			<li title="icon-random"><i class="icon-random"></i></li>
			<li title="icon-comment"><i class="icon-comment"></i></li>
			<li title="icon-magnet"><i class="icon-magnet"></i></li>
			<li title="icon-chevron-up"><i class="icon-chevron-up"></i></li>
			<li title="icon-chevron-down"><i class="icon-chevron-down"></i></li>
			<li title="icon-retweet"><i class="icon-retweet"></i></li>
			<li title="icon-shopping-cart"><i class="icon-shopping-cart"></i></li>
			<li title="icon-folder-close"><i class="icon-folder-close"></i></li>
			<li title="icon-folder-open"><i class="icon-folder-open"></i></li>
			<li title="icon-resize-vertical"><i class="icon-resize-vertical"></i></li>
			<li title="icon-resize-horizontal"><i class="icon-resize-horizontal"></i></li>
			<li title="icon-bar-chart"><i class="icon-bar-chart"></i></li>
			<li title="icon-twitter-sign"><i class="icon-twitter-sign"></i></li>
			<li title="icon-facebook-sign"><i class="icon-facebook-sign"></i></li>
			<li title="icon-camera-retro"><i class="icon-camera-retro"></i></li>
			<li title="icon-key"><i class="icon-key"></i></li>
			<li title="icon-cogs"><i class="icon-cogs"></i></li>
			<li title="icon-comments"><i class="icon-comments"></i></li>
			<li title="icon-thumbs-up-alt"><i class="icon-thumbs-up-alt"></i></li>
			<li title="icon-thumbs-down-alt"><i class="icon-thumbs-down-alt"></i></li>
			<li title="icon-star-half"><i class="icon-star-half"></i></li>
			<li title="icon-heart-empty"><i class="icon-heart-empty"></i></li>
			<li title="icon-signout"><i class="icon-signout"></i></li>
			<li title="icon-linkedin-sign"><i class="icon-linkedin-sign"></i></li>
			<li title="icon-pushpin"><i class="icon-pushpin"></i></li>
			<li title="icon-external-link"><i class="icon-external-link"></i></li>
			<li title="icon-signin"><i class="icon-signin"></i></li>
			<li title="icon-trophy"><i class="icon-trophy"></i></li>
			<li title="icon-github-sign"><i class="icon-github-sign"></i></li>
			<li title="icon-upload-alt"><i class="icon-upload-alt"></i></li>
			<li title="icon-lemon"><i class="icon-lemon"></i></li>
			<li title="icon-phone"><i class="icon-phone"></i></li>
			<li title="icon-check-empty"><i class="icon-check-empty"></i></li>
			<li title="icon-bookmark-empty"><i class="icon-bookmark-empty"></i></li>
			<li title="icon-phone-sign"><i class="icon-phone-sign"></i></li>
			<li title="icon-twitter"><i class="icon-twitter"></i></li>
			<li title="icon-facebook"><i class="icon-facebook"></i></li>
			<li title="icon-github"><i class="icon-github"></i></li>
			<li title="icon-unlock"><i class="icon-unlock"></i></li>
			<li title="icon-credit-card"><i class="icon-credit-card"></i></li>
			<li title="icon-rss"><i class="icon-rss"></i></li>
			<li title="icon-hdd"><i class="icon-hdd"></i></li>
			<li title="icon-bullhorn"><i class="icon-bullhorn"></i></li>
			<li title="icon-bell"><i class="icon-bell"></i></li>
			<li title="icon-certificate"><i class="icon-certificate"></i></li>
			<li title="icon-hand-right"><i class="icon-hand-right"></i></li>
			<li title="icon-hand-left"><i class="icon-hand-left"></i></li>
			<li title="icon-hand-up"><i class="icon-hand-up"></i></li>
			<li title="icon-hand-down"><i class="icon-hand-down"></i></li>
			<li title="icon-circle-arrow-left"><i class="icon-circle-arrow-left"></i></li>
			<li title="icon-circle-arrow-right"><i class="icon-circle-arrow-right"></i></li>
			<li title="icon-circle-arrow-up"><i class="icon-circle-arrow-up"></i></li>
			<li title="icon-circle-arrow-down"><i class="icon-circle-arrow-down"></i></li>
			<li title="icon-globe"><i class="icon-globe"></i></li>
			<li title="icon-wrench"><i class="icon-wrench"></i></li>
			<li title="icon-tasks"><i class="icon-tasks"></i></li>
			<li title="icon-filter"><i class="icon-filter"></i></li>
			<li title="icon-briefcase"><i class="icon-briefcase"></i></li>
			<li title="icon-fullscreen"><i class="icon-fullscreen"></i></li>
			<li title="icon-group"><i class="icon-group"></i></li>
			<li title="icon-link"><i class="icon-link"></i></li>
			<li title="icon-cloud"><i class="icon-cloud"></i></li>
			<li title="icon-beaker"><i class="icon-beaker"></i></li>
			<li title="icon-cut"><i class="icon-cut"></i></li>
			<li title="icon-copy"><i class="icon-copy"></i></li>
			<li title="icon-paper-clip"><i class="icon-paper-clip"></i></li>
			<li title="icon-save"><i class="icon-save"></i></li>
			<li title="icon-sign-blank"><i class="icon-sign-blank"></i></li>
			<li title="icon-reorder"><i class="icon-reorder"></i></li>
			<li title="icon-list-ul"><i class="icon-list-ul"></i></li>
			<li title="icon-list-ol"><i class="icon-list-ol"></i></li>
			<li title="icon-strikethrough"><i class="icon-strikethrough"></i></li>
			<li title="icon-underline"><i class="icon-underline"></i></li>
			<li title="icon-table"><i class="icon-table"></i></li>
			<li title="icon-magic"><i class="icon-magic"></i></li>
			<li title="icon-truck"><i class="icon-truck"></i></li>
			<li title="icon-pinterest"><i class="icon-pinterest"></i></li>
			<li title="icon-pinterest-sign"><i class="icon-pinterest-sign"></i></li>
			<li title="icon-google-plus-sign"><i class="icon-google-plus-sign"></i></li>
			<li title="icon-google-plus"><i class="icon-google-plus"></i></li>
			<li title="icon-money"><i class="icon-money"></i></li>
			<li title="icon-caret-down"><i class="icon-caret-down"></i></li>
			<li title="icon-caret-up"><i class="icon-caret-up"></i></li>
			<li title="icon-caret-left"><i class="icon-caret-left"></i></li>
			<li title="icon-caret-right"><i class="icon-caret-right"></i></li>
			<li title="icon-columns"><i class="icon-columns"></i></li>
			<li title="icon-sort"><i class="icon-sort"></i></li>
			<li title="icon-sort-down"><i class="icon-sort-down"></i></li>
			<li title="icon-sort-up"><i class="icon-sort-up"></i></li>
			<li title="icon-envelope"><i class="icon-envelope"></i></li>
			<li title="icon-linkedin"><i class="icon-linkedin"></i></li>
			<li title="icon-undo"><i class="icon-undo"></i></li>
			<li title="icon-legal"><i class="icon-legal"></i></li>
			<li title="icon-dashboard"><i class="icon-dashboard"></i></li>
			<li title="icon-comment-alt"><i class="icon-comment-alt"></i></li>
			<li title="icon-comments-alt"><i class="icon-comments-alt"></i></li>
			<li title="icon-bolt"><i class="icon-bolt"></i></li>
			<li title="icon-sitemap"><i class="icon-sitemap"></i></li>
			<li title="icon-umbrella"><i class="icon-umbrella"></i></li>
			<li title="icon-paste"><i class="icon-paste">/i></li>
			<li title="icon-lightbulb"><i class="icon-lightbulb"></i></li>
			<li title="icon-exchange"><i class="icon-exchange"></i></li>
			<li title="icon-cloud-download"><i class="icon-cloud-download"></i></li>
			<li title="icon-cloud-upload"><i class="icon-cloud-upload"></i></li>
			<li title="icon-user-md"><i class="icon-user-md"></i></li>
			<li title="icon-stethoscope"><i class="icon-stethoscope"></i></li>
			<li title="icon-suitcase"><i class="icon-suitcase"></i></li>
			<li title="icon-bell-alt"><i class="icon-bell-alt"></i></li>
			<li title="icon-coffee"><i class="icon-coffee"></i></li>
			<li title="icon-food"><i class="icon-food"></i></li>
			<li title="icon-file-text-alt"><i class="icon-file-text-alt"></i></li>
			<li title="icon-building"><i class="icon-building"></i></li>
			<li title="icon-hospital"><i class="icon-hospital"></i></li>
			<li title="icon-ambulance"><i class="icon-ambulance"></i></li>
			<li title="icon-medkit"><i class="icon-medkit"></i></li>
			<li title="icon-fighter-jet"><i class="icon-fighter-jet"></i></li>
			<li title="icon-beer"><i class="icon-beer"></i></li>
			<li title="icon-h-sign"><i class="icon-h-sign"></i></li>
			<li title="icon-plus-sign-alt"><i class="icon-plus-sign-alt"></i></li>
			<li title="icon-double-angle-left"><i class="icon-double-angle-left"></i></li>
			<li title="icon-double-angle-right"><i class="icon-double-angle-right"></i></li>
			<li title="icon-double-angle-up"><i class="icon-double-angle-up"></i></li>
			<li title="icon-double-angle-down"><i class="icon-double-angle-down"></i></li>
			<li title="icon-angle-left"><i class="icon-angle-left"></i></li>
			<li title="icon-angle-right"><i class="icon-angle-right"></i></li>
			<li title="icon-angle-up"><i class="icon-angle-up"></i></li>
			<li title="icon-angle-down"><i class="icon-angle-down"></i></li>
			<li title="icon-desktop"><i class="icon-desktop"></i></li>
			<li title="icon-laptop"><i class="icon-laptop"></i></li>
			<li title="icon-tablet"><i class="icon-tablet"></i></li>
			<li title="icon-mobile-phone"><i class="icon-mobile-phone"></i></li>
			<li title="icon-circle-blank"><i class="icon-circle-blank"></i></li>
			<li title="icon-quote-left"><i class="icon-quote-left"></i></li>
			<li title="icon-quote-right"><i class="icon-quote-right"></i></li>
			<li title="icon-spinner"><i class="icon-spinner"></i></li>
			<li title="icon-circle"><i class="icon-circle"></i></li>
			<li title="icon-reply"><i class="icon-reply"></i></li>
			<li title="icon-github-alt"><i class="icon-github-alt"></i></li>
			<li title="icon-folder-close-alt"><i class="icon-folder-close-alt"></i></li>
			<li title="icon-folder-open-alt"><i class="icon-folder-open-alt"></i></li>
			<li title="icon-expand-alt"><i class="icon-expand-alt"></i></li>
			<li title="icon-collapse-alt"><i class="icon-collapse-alt"></i></li>
			<li title="icon-smile"><i class="icon-smile"></i></li>
			<li title="icon-frown"><i class="icon-frown"></i></li>
			<li title="icon-meh"><i class="icon-meh"></i></li>
			<li title="icon-gamepad"><i class="icon-gamepad"></i></li>
			<li title="icon-keyboard"><i class="icon-keyboard"></i></li>
			<li title="icon-flag-alt"><i class="icon-flag-alt"></i></li>
			<li title="icon-flag-checkered"><i class="icon-flag-checkered"></i></li>
			<li title="icon-terminal"><i class="icon-terminal"></i></li>
			<li title="icon-code"><i class="icon-code"></i></li>
			<li title="icon-reply-all"><i class="icon-reply-all"></i></li>
			<li title="icon-mail-reply-all"><i class="icon-mail-reply-all"></i></li>
			<li title="icon-star-half-empty"><i class="icon-star-half-empty"></i></li>
			<li title="icon-location-arrow"><i class="icon-location-arrow"></i></li>
			<li title="icon-crop"><i class="icon-crop"></i></li>
			<li title="icon-code-fork"><i class="icon-code-fork"></i></li>
			<li title="icon-unlink"><i class="icon-unlink"></i></li>
			<li title="icon-question"><i class="icon-question"></i></li>
			<li title="icon-info"><i class="icon-info"></i></li>
			<li title="icon-exclamation"><i class="icon-exclamation"></i></li>
			<li title="icon-superscript"><i class="icon-superscript"></i></li>
			<li title="icon-subscript"><i class="icon-subscript"></i></li>
			<li title="icon-eraser"><i class="icon-eraser"></i></li>
			<li title="icon-puzzle-piece"><i class="icon-puzzle-piece"></i></li>
			<li title="icon-microphone"><i class="icon-microphone"></i></li>
			<li title="icon-microphone-off"><i class="icon-microphone-off"></i></li>
			<li title="icon-shield"><i class="icon-shield"></i></li>
			<li title="icon-calendar-empty"><i class="icon-calendar-empty"></i></li>
			<li title="icon-fire-extinguisher"><i class="icon-fire-extinguisher"></i></li>
			<li title="icon-rocket"><i class="icon-rocket"></i></li>
			<li title="icon-maxcdn"><i class="icon-maxcdn"></i></li>
			<li title="icon-chevron-sign-left"><i class="icon-chevron-sign-left"></i></li>
			<li title="icon-chevron-sign-right"><i class="icon-chevron-sign-right"></i></li>
			<li title="icon-chevron-sign-up"><i class="icon-chevron-sign-up"></i></li>
			<li title="icon-chevron-sign-down"><i class="icon-chevron-sign-down"></i></li>
			<li title="icon-html5"><i class="icon-html5"></i></li>
			<li title="icon-css3"><i class="icon-css3"></i></li>
			<li title="icon-anchor"><i class="icon-anchor"></i></li>
			<li title="icon-unlock-alt"><i class="icon-unlock-alt"></i></li>
			<li title="icon-bullseye"><i class="icon-bullseye"></i></li>
			<li title="icon-ellipsis-horizontal"><i class="icon-ellipsis-horizontal"></i></li>
			<li title="icon-ellipsis-vertical"><i class="icon-ellipsis-vertical"></i></li>
			<li title="icon-rss-sign"><i class="icon-rss-sign"></i></li>
			<li title="icon-play-sign"><i class="icon-play-sign"></i></li>
			<li title="icon-ticket"><i class="icon-ticket"></i></li>
			<li title="icon-minus-sign-alt"><i class="icon-minus-sign-alt"></i></li>
			<li title="icon-check-minus"><i class="icon-check-minus"></i></li>
			<li title="icon-level-up"><i class="icon-level-up"></i></li>
			<li title="icon-level-down"><i class="icon-level-down"></i></li>
			<li title="icon-check-sign"><i class="icon-check-sign"></i></li>
			<li title="icon-edit-sign"><i class="icon-edit-sign"></i></li>
			<li title="icon-external-link-sign"><i class="icon-external-link-sign"></i></li>
			<li title="icon-share-sign"><i class="icon-share-sign"></i></li>
			<li title="icon-compass"><i class="icon-compass"></i></li>
			<li title="icon-collapse"><i class="icon-collapse"></i></li>
			<li title="icon-collapse-top"><i class="icon-collapse-top"></i></li>
			<li title="icon-expand"><i class="icon-expand"></i></li>
			<li title="icon-eur"><i class="icon-eur"></i></li>
			<li title="icon-gbp"><i class="icon-gbp"></i></li>
			<li title="icon-usd"><i class="icon-usd"></i></li>
			<li title="icon-inr"><i class="icon-inr"></i></li>
			<li title="icon-jpy"><i class="icon-jpy"></i></li>
			<li title="icon-cny"><i class="icon-cny"></i></li>
			<li title="icon-krw"><i class="icon-krw"></i></li>
			<li title="icon-btc"><i class="icon-btc"></i></li>
			<li title="icon-file"><i class="icon-file"></i></li>
			<li title="icon-file-text"><i class="icon-file-text"></i></li>
			<li title="icon-sort-by-alphabet"><i class="icon-sort-by-alphabet"></i></li>
			<li title="icon-sort-by-alphabet-alt"><i class="icon-sort-by-alphabet-alt"></i></li>
			<li title="icon-sort-by-attributes"><i class="icon-sort-by-attributes"></i></li>
			<li title="icon-sort-by-attributes-alt"><i class="icon-sort-by-attributes-alt"></i></li>
			<li title="icon-sort-by-order"><i class="icon-sort-by-order"></i></li>
			<li title="icon-sort-by-order-alt"><i class="icon-sort-by-order-alt"></i></li>
			<li title="icon-thumbs-up"><i class="icon-thumbs-up"></i></li>
			<li title="icon-thumbs-down"><i class="icon-thumbs-down"></i></li>
			<li title="icon-youtube-sign"><i class="icon-youtube-sign"></i></li>
			<li title="icon-youtube"><i class="icon-youtube"></i></li>
			<li title="icon-xing"><i class="icon-xing"></i></li>
			<li title="icon-xing-sign"><i class="icon-xing-sign"></i></li>
			<li title="icon-youtube-play"><i class="icon-youtube-play"></i></li>
			<li title="icon-dropbox"><i class="icon-dropbox"></i></li>
			<li title="icon-stackexchange"><i class="icon-stackexchange"></i></li>
			<li title="icon-instagram"><i class="icon-instagram"></i></li>
			<li title="icon-flickr"><i class="icon-flickr"></i></li>
			<li title="icon-adn"><i class="icon-adn"></i></li>
			<li title="icon-bitbucket"><i class="icon-bitbucket"></i></li>
			<li title="icon-bitbucket-sign"><i class="icon-bitbucket-sign"></i></li>
			<li title="icon-tumblr"><i class="icon-tumblr"></i></li>
			<li title="icon-tumblr-sign"><i class="icon-tumblr-sign"></i></li>
			<li title="icon-long-arrow-down"><i class="icon-long-arrow-down"></i></li>
			<li title="icon-long-arrow-up"><i class="icon-long-arrow-up"></i></li>
			<li title="icon-long-arrow-left"><i class="icon-long-arrow-left"></i></li>
			<li title="icon-long-arrow-right"><i class="icon-long-arrow-right"></i></li>
			<li title="icon-apple"><i class="icon-apple"></i></li>
			<li title="icon-windows"><i class="icon-windows"></i></li>
			<li title="icon-android"><i class="icon-android"></i></li>
			<li title="icon-linux"><i class="icon-linux"></i></li>
			<li title="icon-dribbble"><i class="icon-dribbble"></i></li>
			<li title="icon-skype"><i class="icon-skype"></i></li>
			<li title="icon-foursquare"><i class="icon-foursquare"></i></li>
			<li title="icon-trello"><i class="icon-trello"></i></li>
			<li title="icon-female"><i class="icon-female"></i></li>
			<li title="icon-male"><i class="icon-male"></i></li>
			<li title="icon-gittip"><i class="icon-gittip"></i></li>
			<li title="icon-sun"><i class="icon-sun"></i></li>
			<li title="icon-moon"><i class="icon-moon"></i></li>
			<li title="icon-archive"><i class="icon-archive"></i></li>
			<li title="icon-bug"><i class="icon-bug"></i></li>
			<li title="icon-vk"><i class="icon-vk"></i></li>
			<li title="icon-weibo"><i class="icon-weibo"></i></li>
			<li title="icon-renren"><i class="icon-renren"></i></li>
		</ul>
		
		
		<h3 class="heading"><a href="http://splashyfish.com/icons/">Splashy icons</a> <small>(363 icons)</small></h3>
		<div class="icon_copy_a sepH_c" data-iconset="splashy">Click on icon to generate code <span></span></div>
		<ul class="icon_list_a clearfix">
			<li title="splashy-add"><i class="splashy-add"></i></li>
			<li title="splashy-add_outline"><i class="splashy-add_outline"></i></li>
			<li title="splashy-add_small"><i class="splashy-add_small"></i></li>
			<li title="splashy-applications_windows"><i class="splashy-applications_windows"></i></li>
			<li title="splashy-application_windows"><i class="splashy-application_windows"></i></li>
			<li title="splashy-application_windows_add"><i class="splashy-application_windows_add"></i></li>
			<li title="splashy-application_windows_down"><i class="splashy-application_windows_down"></i></li>
			<li title="splashy-application_windows_edit"><i class="splashy-application_windows_edit"></i></li>
			<li title="splashy-application_windows_locked"><i class="splashy-application_windows_locked"></i></li>
			<li title="splashy-application_windows_new"><i class="splashy-application_windows_new"></i></li>
			<li title="splashy-application_windows_okay"><i class="splashy-application_windows_okay"></i></li>
			<li title="splashy-application_windows_remove"><i class="splashy-application_windows_remove"></i></li>
			<li title="splashy-application_windows_share"><i class="splashy-application_windows_share"></i></li>
			<li title="splashy-application_windows_up"><i class="splashy-application_windows_up"></i></li>
			<li title="splashy-application_windows_warning"><i class="splashy-application_windows_warning"></i></li>
			<li title="splashy-arrow_large_down"><i class="splashy-arrow_large_down"></i></li>
			<li title="splashy-arrow_large_down_outline"><i class="splashy-arrow_large_down_outline"></i></li>
			<li title="splashy-arrow_large_left"><i class="splashy-arrow_large_left"></i></li>
			<li title="splashy-arrow_large_left_outline"><i class="splashy-arrow_large_left_outline"></i></li>
			<li title="splashy-arrow_large_right"><i class="splashy-arrow_large_right"></i></li>
			<li title="splashy-arrow_large_right_outline"><i class="splashy-arrow_large_right_outline"></i></li>
			<li title="splashy-arrow_large_up"><i class="splashy-arrow_large_up"></i></li>
			<li title="splashy-arrow_large_up_outline"><i class="splashy-arrow_large_up_outline"></i></li>
			<li title="splashy-arrow_medium_down"><i class="splashy-arrow_medium_down"></i></li>
			<li title="splashy-arrow_medium_left"><i class="splashy-arrow_medium_left"></i></li>
			<li title="splashy-arrow_medium_lower_left"><i class="splashy-arrow_medium_lower_left"></i></li>
			<li title="splashy-arrow_medium_lower_right"><i class="splashy-arrow_medium_lower_right"></i></li>
			<li title="splashy-arrow_medium_right"><i class="splashy-arrow_medium_right"></i></li>
			<li title="splashy-arrow_medium_up"><i class="splashy-arrow_medium_up"></i></li>
			<li title="splashy-arrow_medium_upper_left"><i class="splashy-arrow_medium_upper_left"></i></li>
			<li title="splashy-arrow_medium_upper_right"><i class="splashy-arrow_medium_upper_right"></i></li>
			<li title="splashy-arrow_small_down"><i class="splashy-arrow_small_down"></i></li>
			<li title="splashy-arrow_small_left"><i class="splashy-arrow_small_left"></i></li>
			<li title="splashy-arrow_small_right"><i class="splashy-arrow_small_right"></i></li>
			<li title="splashy-arrow_small_up"><i class="splashy-arrow_small_up"></i></li>
			<li title="splashy-arrow_state_blue_collapsed"><i class="splashy-arrow_state_blue_collapsed"></i></li>
			<li title="splashy-arrow_state_blue_expanded"><i class="splashy-arrow_state_blue_expanded"></i></li>
			<li title="splashy-arrow_state_blue_left"><i class="splashy-arrow_state_blue_left"></i></li>
			<li title="splashy-arrow_state_blue_right"><i class="splashy-arrow_state_blue_right"></i></li>
			<li title="splashy-arrow_state_grey_collapsed"><i class="splashy-arrow_state_grey_collapsed"></i></li>
			<li title="splashy-arrow_state_grey_expanded"><i class="splashy-arrow_state_grey_expanded"></i></li>
			<li title="splashy-arrow_state_grey_left"><i class="splashy-arrow_state_grey_left"></i></li>
			<li title="splashy-arrow_state_grey_right"><i class="splashy-arrow_state_grey_right"></i></li>
			<li title="splashy-box"><i class="splashy-box"></i></li>
			<li title="splashy-box_add"><i class="splashy-box_add"></i></li>
			<li title="splashy-box_edit"><i class="splashy-box_edit"></i></li>
			<li title="splashy-box_locked"><i class="splashy-box_locked"></i></li>
			<li title="splashy-box_new"><i class="splashy-box_new"></i></li>
			<li title="splashy-box_okay"><i class="splashy-box_okay"></i></li>
			<li title="splashy-box_remove"><i class="splashy-box_remove"></i></li>
			<li title="splashy-box_share"><i class="splashy-box_share"></i></li>
			<li title="splashy-box_warning"><i class="splashy-box_warning"></i></li>
			<li title="splashy-breadcrumb_separator_arrow_1_dot"><i class="splashy-breadcrumb_separator_arrow_1_dot"></i></li>
			<li title="splashy-breadcrumb_separator_arrow_2_dots"><i class="splashy-breadcrumb_separator_arrow_2_dots"></i></li>
			<li title="splashy-breadcrumb_separator_arrow_full"><i class="splashy-breadcrumb_separator_arrow_full"></i></li>
			<li title="splashy-breadcrumb_separator_dark"><i class="splashy-breadcrumb_separator_dark"></i></li>
			<li title="splashy-breadcrumb_separator_light"><i class="splashy-breadcrumb_separator_light"></i></li>
			<li title="splashy-bullet_blue"><i class="splashy-bullet_blue"></i></li>
			<li title="splashy-bullet_blue_arrow"><i class="splashy-bullet_blue_arrow"></i></li>
			<li title="splashy-bullet_blue_collapse"><i class="splashy-bullet_blue_collapse"></i></li>
			<li title="splashy-bullet_blue_collapse_small"><i class="splashy-bullet_blue_collapse_small"></i></li>
			<li title="splashy-bullet_blue_expand"><i class="splashy-bullet_blue_expand"></i></li>
			<li title="splashy-bullet_blue_expand_small"><i class="splashy-bullet_blue_expand_small"></i></li>
			<li title="splashy-bullet_blue_small"><i class="splashy-bullet_blue_small"></i></li>
			<li title="splashy-calendar_day"><i class="splashy-calendar_day"></i></li>
			<li title="splashy-calendar_day_add"><i class="splashy-calendar_day_add"></i></li>
			<li title="splashy-calendar_day_down"><i class="splashy-calendar_day_down"></i></li>
			<li title="splashy-calendar_day_edit"><i class="splashy-calendar_day_edit"></i></li>
			<li title="splashy-calendar_day_event"><i class="splashy-calendar_day_event"></i></li>
			<li title="splashy-calendar_day_new"><i class="splashy-calendar_day_new"></i></li>
			<li title="splashy-calendar_day_remove"><i class="splashy-calendar_day_remove"></i></li>
			<li title="splashy-calendar_day_up"><i class="splashy-calendar_day_up"></i></li>
			<li title="splashy-calendar_month"><i class="splashy-calendar_month"></i></li>
			<li title="splashy-calendar_month_add"><i class="splashy-calendar_month_add"></i></li>
			<li title="splashy-calendar_month_down"><i class="splashy-calendar_month_down"></i></li>
			<li title="splashy-calendar_month_edit"><i class="splashy-calendar_month_edit"></i></li>
			<li title="splashy-calendar_month_new"><i class="splashy-calendar_month_new"></i></li>
			<li title="splashy-calendar_month_remove"><i class="splashy-calendar_month_remove"></i></li>
			<li title="splashy-calendar_month_up"><i class="splashy-calendar_month_up"></i></li>
			<li title="splashy-calendar_week"><i class="splashy-calendar_week"></i></li>
			<li title="splashy-calendar_week_add"><i class="splashy-calendar_week_add"></i></li>
			<li title="splashy-calendar_week_edit"><i class="splashy-calendar_week_edit"></i></li>
			<li title="splashy-calendar_week_remove"><i class="splashy-calendar_week_remove"></i></li>
			<li title="splashy-cellphone"><i class="splashy-cellphone"></i></li>
			<li title="splashy-check"><i class="splashy-check"></i></li>
			<li title="splashy-close"><i class="splashy-close"></i></li>
			<li title="splashy-comment"><i class="splashy-comment"></i></li>
			<li title="splashy-comments"><i class="splashy-comments"></i></li>
			<li title="splashy-comments_reply"><i class="splashy-comments_reply"></i></li>
			<li title="splashy-comments_small"><i class="splashy-comments_small"></i></li>
			<li title="splashy-comment_alert"><i class="splashy-comment_alert"></i></li>
			<li title="splashy-comment_new_1"><i class="splashy-comment_new_1"></i></li>
			<li title="splashy-comment_new_2"><i class="splashy-comment_new_2"></i></li>
			<li title="splashy-comment_question"><i class="splashy-comment_question"></i></li>
			<li title="splashy-comment_reply"><i class="splashy-comment_reply"></i></li>
			<li title="splashy-contact_blue"><i class="splashy-contact_blue"></i></li>
			<li title="splashy-contact_blue_add"><i class="splashy-contact_blue_add"></i></li>
			<li title="splashy-contact_blue_edit"><i class="splashy-contact_blue_edit"></i></li>
			<li title="splashy-contact_blue_new"><i class="splashy-contact_blue_new"></i></li>
			<li title="splashy-contact_blue_remove"><i class="splashy-contact_blue_remove"></i></li>
			<li title="splashy-contact_grey"><i class="splashy-contact_grey"></i></li>
			<li title="splashy-contact_grey_add"><i class="splashy-contact_grey_add"></i></li>
			<li title="splashy-contact_grey_edit"><i class="splashy-contact_grey_edit"></i></li>
			<li title="splashy-contact_grey_new"><i class="splashy-contact_grey_new"></i></li>
			<li title="splashy-contact_grey_remove"><i class="splashy-contact_grey_remove"></i></li>
			<li title="splashy-diamonds_1"><i class="splashy-diamonds_1"></i></li>
			<li title="splashy-diamonds_2"><i class="splashy-diamonds_2"></i></li>
			<li title="splashy-diamonds_3"><i class="splashy-diamonds_3"></i></li>
			<li title="splashy-diamonds_4"><i class="splashy-diamonds_4"></i></li>
			<li title="splashy-documents"><i class="splashy-documents"></i></li>
			<li title="splashy-documents_add"><i class="splashy-documents_add"></i></li>
			<li title="splashy-documents_edit"><i class="splashy-documents_edit"></i></li>
			<li title="splashy-documents_locked"><i class="splashy-documents_locked"></i></li>
			<li title="splashy-documents_new"><i class="splashy-documents_new"></i></li>
			<li title="splashy-documents_okay"><i class="splashy-documents_okay"></i></li>
			<li title="splashy-documents_remove"><i class="splashy-documents_remove"></i></li>
			<li title="splashy-documents_share"><i class="splashy-documents_share"></i></li>
			<li title="splashy-documents_warning"><i class="splashy-documents_warning"></i></li>
			<li title="splashy-document_a4"><i class="splashy-document_a4"></i></li>
			<li title="splashy-document_a4_add"><i class="splashy-document_a4_add"></i></li>
			<li title="splashy-document_a4_blank"><i class="splashy-document_a4_blank"></i></li>
			<li title="splashy-document_a4_download"><i class="splashy-document_a4_download"></i></li>
			<li title="splashy-document_a4_edit"><i class="splashy-document_a4_edit"></i></li>
			<li title="splashy-document_a4_locked"><i class="splashy-document_a4_locked"></i></li>
			<li title="splashy-document_a4_marked"><i class="splashy-document_a4_marked"></i></li>
			<li title="splashy-document_a4_new"><i class="splashy-document_a4_new"></i></li>
			<li title="splashy-document_a4_okay"><i class="splashy-document_a4_okay"></i></li>
			<li title="splashy-document_a4_remove"><i class="splashy-document_a4_remove"></i></li>
			<li title="splashy-document_a4_share"><i class="splashy-document_a4_share"></i></li>
			<li title="splashy-document_a4_upload"><i class="splashy-document_a4_upload"></i></li>
			<li title="splashy-document_a4_warning"><i class="splashy-document_a4_warning"></i></li>
			<li title="splashy-document_copy"><i class="splashy-document_copy"></i></li>
			<li title="splashy-document_letter"><i class="splashy-document_letter"></i></li>
			<li title="splashy-document_letter_add"><i class="splashy-document_letter_add"></i></li>
			<li title="splashy-document_letter_blank"><i class="splashy-document_letter_blank"></i></li>
			<li title="splashy-document_letter_download"><i class="splashy-document_letter_download"></i></li>
			<li title="splashy-document_letter_edit"><i class="splashy-document_letter_edit"></i></li>
			<li title="splashy-document_letter_locked"><i class="splashy-document_letter_locked"></i></li>
			<li title="splashy-document_letter_marked"><i class="splashy-document_letter_marked"></i></li>
			<li title="splashy-document_letter_new"><i class="splashy-document_letter_new"></i></li>
			<li title="splashy-document_letter_okay"><i class="splashy-document_letter_okay"></i></li>
			<li title="splashy-document_letter_remove"><i class="splashy-document_letter_remove"></i></li>
			<li title="splashy-document_letter_share"><i class="splashy-document_letter_share"></i></li>
			<li title="splashy-document_letter_upload"><i class="splashy-document_letter_upload"></i></li>
			<li title="splashy-document_letter_warning"><i class="splashy-document_letter_warning"></i></li>
			<li title="splashy-document_small"><i class="splashy-document_small"></i></li>
			<li title="splashy-document_small_download"><i class="splashy-document_small_download"></i></li>
			<li title="splashy-document_small_upload"><i class="splashy-document_small_upload"></i></li>
			<li title="splashy-download"><i class="splashy-download"></i></li>
			<li title="splashy-error"><i class="splashy-error"></i></li>
			<li title="splashy-error_do_not"><i class="splashy-error_do_not"></i></li>
			<li title="splashy-error_do_not_small"><i class="splashy-error_do_not_small"></i></li>
			<li title="splashy-error_small"><i class="splashy-error_small"></i></li>
			<li title="splashy-error_x"><i class="splashy-error_x"></i></li>
			<li title="splashy-fish"><i class="splashy-fish"></i></li>
			<li title="splashy-folder_classic"><i class="splashy-folder_classic"></i></li>
			<li title="splashy-folder_classic_add"><i class="splashy-folder_classic_add"></i></li>
			<li title="splashy-folder_classic_add_simple"><i class="splashy-folder_classic_add_simple"></i></li>
			<li title="splashy-folder_classic_down"><i class="splashy-folder_classic_down"></i></li>
			<li title="splashy-folder_classic_edit"><i class="splashy-folder_classic_edit"></i></li>
			<li title="splashy-folder_classic_locked"><i class="splashy-folder_classic_locked"></i></li>
			<li title="splashy-folder_classic_opened"><i class="splashy-folder_classic_opened"></i></li>
			<li title="splashy-folder_classic_opened_stuffed"><i class="splashy-folder_classic_opened_stuffed"></i></li>
			<li title="splashy-folder_classic_remove"><i class="splashy-folder_classic_remove"></i></li>
			<li title="splashy-folder_classic_remove_simple"><i class="splashy-folder_classic_remove_simple"></i></li>
			<li title="splashy-folder_classic_stuffed"><i class="splashy-folder_classic_stuffed"></i></li>
			<li title="splashy-folder_classic_stuffed_add"><i class="splashy-folder_classic_stuffed_add"></i></li>
			<li title="splashy-folder_classic_stuffed_add_simple"><i class="splashy-folder_classic_stuffed_add_simple"></i></li>
			<li title="splashy-folder_classic_stuffed_edit"><i class="splashy-folder_classic_stuffed_edit"></i></li>
			<li title="splashy-folder_classic_stuffed_locked"><i class="splashy-folder_classic_stuffed_locked"></i></li>
			<li title="splashy-folder_classic_stuffed_remove"><i class="splashy-folder_classic_stuffed_remove"></i></li>
			<li title="splashy-folder_classic_stuffed_remove_simple"><i class="splashy-folder_classic_stuffed_remove_simple"></i></li>
			<li title="splashy-folder_classic_type_document"><i class="splashy-folder_classic_type_document"></i></li>
			<li title="splashy-folder_classic_type_image"><i class="splashy-folder_classic_type_image"></i></li>
			<li title="splashy-folder_classic_type_music"><i class="splashy-folder_classic_type_music"></i></li>
			<li title="splashy-folder_classic_up"><i class="splashy-folder_classic_up"></i></li>
			<li title="splashy-folder_locked"><i class="splashy-folder_locked"></i></li>
			<li title="splashy-folder_modernist"><i class="splashy-folder_modernist"></i></li>
			<li title="splashy-folder_modernist_add"><i class="splashy-folder_modernist_add"></i></li>
			<li title="splashy-folder_modernist_add_simple"><i class="splashy-folder_modernist_add_simple"></i></li>
			<li title="splashy-folder_modernist_down"><i class="splashy-folder_modernist_down"></i></li>
			<li title="splashy-folder_modernist_edit"><i class="splashy-folder_modernist_edit"></i></li>
			<li title="splashy-folder_modernist_locked"><i class="splashy-folder_modernist_locked"></i></li>
			<li title="splashy-folder_modernist_opened"><i class="splashy-folder_modernist_opened"></i></li>
			<li title="splashy-folder_modernist_opened_stuffed"><i class="splashy-folder_modernist_opened_stuffed"></i></li>
			<li title="splashy-folder_modernist_remove"><i class="splashy-folder_modernist_remove"></i></li>
			<li title="splashy-folder_modernist_remove_simple"><i class="splashy-folder_modernist_remove_simple"></i></li>
			<li title="splashy-folder_modernist_stuffed"><i class="splashy-folder_modernist_stuffed"></i></li>
			<li title="splashy-folder_modernist_stuffed_add"><i class="splashy-folder_modernist_stuffed_add"></i></li>
			<li title="splashy-folder_modernist_stuffed_add_simple"><i class="splashy-folder_modernist_stuffed_add_simple"></i></li>
			<li title="splashy-folder_modernist_stuffed_edit"><i class="splashy-folder_modernist_stuffed_edit"></i>/li>
			<li title="splashy-folder_modernist_stuffed_locked"><i class="splashy-folder_modernist_stuffed_locked"></i></li>
			<li title="splashy-folder_modernist_stuffed_remove"><i class="splashy-folder_modernist_stuffed_remove"></i></li>
			<li title="splashy-folder_modernist_stuffed_remove_simple"><i class="splashy-folder_modernist_stuffed_remove_simple"></i></li>
			<li title="splashy-folder_modernist_type_document"><i class="splashy-folder_modernist_type_document"></i></li>
			<li title="splashy-folder_modernist_type_image"><i class="splashy-folder_modernist_type_image"></i></li>
			<li title="splashy-folder_modernist_type_movie"><i class="splashy-folder_modernist_type_movie"></i></li>
			<li title="splashy-folder_modernist_type_music"><i class="splashy-folder_modernist_type_music"></i></li>
			<li title="splashy-folder_modernist_up"><i class="splashy-folder_modernist_up"></i></li>
			<li title="splashy-folder_remove"><i class="splashy-folder_remove"></i></li>
			<li title="splashy-folder_stuffed"><i class="splashy-folder_stuffed"></i></li>
			<li title="splashy-folder_stuffed_add"><i class="splashy-folder_stuffed_add"></i></li>
			<li title="splashy-folder_stuffed_locked"><i class="splashy-folder_stuffed_locked"></i></li>
			<li title="splashy-folder_stuffed_remove"><i class="splashy-folder_stuffed_remove"></i></li>
			<li title="splashy-gem_cancel_1"><i class="splashy-gem_cancel_1"></i></li>
			<li title="splashy-gem_cancel_2"><i class="splashy-gem_cancel_2"></i></li>
			<li title="splashy-gem_okay"><i class="splashy-gem_okay"></i></li>
			<li title="splashy-gem_options"><i class="splashy-gem_options"></i></li>
			<li title="splashy-gem_remove"><i class="splashy-gem_remove"></i></li>
			<li title="splashy-group_blue"><i class="splashy-group_blue"></i></li>
			<li title="splashy-group_blue_add"><i class="splashy-group_blue_add"></i></li>
			<li title="splashy-group_blue_edit"><i class="splashy-group_blue_edit"></i></li>
			<li title="splashy-group_blue_new"><i class="splashy-group_blue_new"></i></li>
			<li title="splashy-group_blue_remove"><i class="splashy-group_blue_remove"></i></li>
			<li title="splashy-group_green"><i class="splashy-group_green"></i></li>
			<li title="splashy-group_green_add"><i class="splashy-group_green_add"></i></li>
			<li title="splashy-group_green_edit"><i class="splashy-group_green_edit"></i></li>
			<li title="splashy-group_green_new"><i class="splashy-group_green_new"></i></li>
			<li title="splashy-group_green_remove"><i class="splashy-group_green_remove"></i></li>
			<li title="splashy-group_grey"><i class="splashy-group_grey"></i></li>
			<li title="splashy-group_grey_add"><i class="splashy-group_grey_add"></i></li>
			<li title="splashy-group_grey_edit"><i class="splashy-group_grey_edit"></i></li>
			<li title="splashy-group_grey_new"><i class="splashy-group_grey_new"></i></li>
			<li title="splashy-group_grey_remove"><i class="splashy-group_grey_remove"></i></li>
			<li title="splashy-hcard"><i class="splashy-hcard"></i></li>
			<li title="splashy-hcards"><i class="splashy-hcards"></i></li>
			<li title="splashy-hcards_add"><i class="splashy-hcards_add"></i></li>
			<li title="splashy-hcards_down"><i class="splashy-hcards_down"></i></li>
			<li title="splashy-hcards_edit"><i class="splashy-hcards_edit"></i></li>
			<li title="splashy-hcards_remove"><i class="splashy-hcards_remove"></i></li>
			<li title="splashy-hcards_up"><i class="splashy-hcards_up"></i></li>
			<li title="splashy-hcard_add"><i class="splashy-hcard_add"></i></li>
			<li title="splashy-hcard_download"><i class="splashy-hcard_download"></i></li>
			<li title="splashy-hcard_edit"><i class="splashy-hcard_edit"></i></li>
			<li title="splashy-hcard_new"><i class="splashy-hcard_new"></i></li>
			<li title="splashy-hcard_remove"><i class="splashy-hcard_remove"></i></li>
			<li title="splashy-hcard_up"><i class="splashy-hcard_up"></i></li>
			<li title="splashy-heart"><i class="splashy-heart"></i></li>
			<li title="splashy-heart_add"><i class="splashy-heart_add"></i></li>
			<li title="splashy-heart_edit"><i class="splashy-heart_edit"></i></li>
			<li title="splashy-heart_outline"><i class="splashy-heart_outline"></i></li>
			<li title="splashy-heart_remove"><i class="splashy-heart_remove"></i></li>
			<li title="splashy-heart_up"><i class="splashy-heart_up"></i></li>
			<li title="splashy-help"><i class="splashy-help"></i></li>
			<li title="splashy-home_green"><i class="splashy-home_green"></i></li>
			<li title="splashy-home_grey"><i class="splashy-home_grey"></i></li>
			<li title="splashy-image_cultured"><i class="splashy-image_cultured"></i></li>
			<li title="splashy-image_modernist"><i class="splashy-image_modernist"></i></li>
			<li title="splashy-information"><i class="splashy-information"></i></li>
			<li title="splashy-lock_large_locked"><i class="splashy-lock_large_locked"></i></li>
			<li title="splashy-lock_large_unlocked"><i class="splashy-lock_large_unlocked"></i></li>
			<li title="splashy-lock_small_locked"><i class="splashy-lock_small_locked"></i></li>
			<li title="splashy-lock_small_unlocked"><i class="splashy-lock_small_unlocked"></i></li>
			<li title="splashy-mail_light"><i class="splashy-mail_light"></i></li>
			<li title="splashy-mail_light_down"><i class="splashy-mail_light_down"></i></li>
			<li title="splashy-mail_light_left"><i class="splashy-mail_light_left"></i></li>
			<li title="splashy-mail_light_new_1"><i class="splashy-mail_light_new_1"></i></li>
			<li title="splashy-mail_light_new_2"><i class="splashy-mail_light_new_2"></i></li>
			<li title="splashy-mail_light_right"><i class="splashy-mail_light_right"></i></li>
			<li title="splashy-mail_light_stuffed"><i class="splashy-mail_light_stuffed"></i></li>
			<li title="splashy-mail_light_up"><i class="splashy-mail_light_up"></i></li>
			<li title="splashy-map"><i class="splashy-map"></i></li>
			<li title="splashy-marker_rounded_add"><i class="splashy-marker_rounded_add"></i></li>
			<li title="splashy-marker_rounded_blue"><i class="splashy-marker_rounded_blue"></i></li>
			<li title="splashy-marker_rounded_edit"><i class="splashy-marker_rounded_edit"></i></li>
			<li title="splashy-marker_rounded_green"><i class="splashy-marker_rounded_green"></i></li>
			<li title="splashy-marker_rounded_grey_1"><i class="splashy-marker_rounded_grey_1"></i></li>
			<li title="splashy-marker_rounded_grey_2"><i class="splashy-marker_rounded_grey_2"></i></li>
			<li title="splashy-marker_rounded_grey_3"><i class="splashy-marker_rounded_grey_3"></i></li>
			<li title="splashy-marker_rounded_grey_4"><i class="splashy-marker_rounded_grey_4"></i></li>
			<li title="splashy-marker_rounded_grey_5"><i class="splashy-marker_rounded_grey_5"></i></li>
			<li title="splashy-marker_rounded_light_blue"><i class="splashy-marker_rounded_light_blue"></i></li>
			<li title="splashy-marker_rounded_new"><i class="splashy-marker_rounded_new"></i></li>
			<li title="splashy-marker_rounded_red"><i class="splashy-marker_rounded_red"></i></li>
			<li title="splashy-marker_rounded_remove"><i class="splashy-marker_rounded_remove"></i></li>
			<li title="splashy-marker_rounded_violet"><i class="splashy-marker_rounded_violet"></i></li>
			<li title="splashy-marker_rounded_yellow"><i class="splashy-marker_rounded_yellow"></i></li>
			<li title="splashy-marker_rounded_yellow_green"><i class="splashy-marker_rounded_yellow_green"></i></li>
			<li title="splashy-marker_rounded_yellow_orange"><i class="splashy-marker_rounded_yellow_orange"></i></li>
			<li title="splashy-media_controls_dark_first"><i class="splashy-media_controls_dark_first"></i></li>
			<li title="splashy-media_controls_dark_forward"><i class="splashy-media_controls_dark_forward"></i></li>
			<li title="splashy-media_controls_dark_last"><i class="splashy-media_controls_dark_last"></i></li>
			<li title="splashy-media_controls_dark_pause"><i class="splashy-media_controls_dark_pause"></i></li>
			<li title="splashy-media_controls_dark_play"><i class="splashy-media_controls_dark_play"></i></li>
			<li title="splashy-media_controls_dark_rewind"><i class="splashy-media_controls_dark_rewind"></i></li>
			<li title="splashy-media_controls_dark_stop"><i class="splashy-media_controls_dark_stop"></i></li>
			<li title="splashy-media_controls_first_small"><i class="splashy-media_controls_first_small"></i></li>
			<li title="splashy-media_controls_forward_small"><i class="splashy-media_controls_forward_small"></i></li>
			<li title="splashy-media_controls_last_small"><i class="splashy-media_controls_last_small"></i></li>
			<li title="splashy-media_controls_pause_small"><i class="splashy-media_controls_pause_small"></i></li>
			<li title="splashy-media_controls_play_small"><i class="splashy-media_controls_play_small"></i></li>
			<li title="splashy-media_controls_rewind_small"><i class="splashy-media_controls_rewind_small"></i></li>
			<li title="splashy-media_controls_stop_small"><i class="splashy-media_controls_stop_small"></i></li>
			<li title="splashy-menu"><i class="splashy-menu"></i></li>
			<li title="splashy-menu_dropdown"><i class="splashy-menu_dropdown"></i></li>
			<li title="splashy-movie_play"><i class="splashy-movie_play"></i></li>
			<li title="splashy-music_cd_blue_note"><i class="splashy-music_cd_blue_note"></i></li>
			<li title="splashy-music_green"><i class="splashy-music_green"></i></li>
			<li title="splashy-music_grey"><i class="splashy-music_grey"></i></li>
			<li title="splashy-new_small"><i class="splashy-new_small"></i></li>
			<li title="splashy-okay"><i class="splashy-okay"></i></li>
			<li title="splashy-okay_small"><i class="splashy-okay_small"></i></li>
			<li title="splashy-pagination_1_first"><i class="splashy-pagination_1_first"></i></li>
			<li title="splashy-pagination_1_last"><i class="splashy-pagination_1_last"></i></li>
			<li title="splashy-pagination_1_next"><i class="splashy-pagination_1_next"></i></li>
			<li title="splashy-pagination_1_previous"><i class="splashy-pagination_1_previous"></i></li>
			<li title="splashy-pencil"><i class="splashy-pencil"></i></li>
			<li title="splashy-pencil_small"><i class="splashy-pencil_small"></i></li>
			<li title="splashy-printer"><i class="splashy-printer"></i></li>
			<li title="splashy-quanitity_capsule_1"><i class="splashy-quanitity_capsule_1"></i></li>
			<li title="splashy-quantity_capsule_2"><i class="splashy-quantity_capsule_2"></i></li>
			<li title="splashy-quantity_capsule_3"><i class="splashy-quantity_capsule_3"></i></li>
			<li title="splashy-quantity_capsule_4"><i class="splashy-quantity_capsule_4"></i></li>
			<li title="splashy-quantity_capsule_5"><i class="splashy-quantity_capsule_5"></i></li>
			<li title="splashy-refresh"><i class="splashy-refresh"></i></li>
			<li title="splashy-refresh_backwards"><i class="splashy-refresh_backwards"></i></li>
			<li title="splashy-refresh_forward"><i class="splashy-refresh_forward"></i></li>
			<li title="splashy-remove"><i class="splashy-remove"></i></li>
			<li title="splashy-remove_minus_sign"><i class="splashy-remove_minus_sign"></i></li>
			<li title="splashy-remove_minus_sign_outline"><i class="splashy-remove_minus_sign_outline"></i></li>
			<li title="splashy-remove_minus_sign_small"><i class="splashy-remove_minus_sign_small"></i></li>
			<li title="splashy-remove_outline"><i class="splashy-remove_outline"></i></li>
			<li title="splashy-shield"><i class="splashy-shield"></i></li>
			<li title="splashy-shield_chevrons"><i class="splashy-shield_chevrons"></i></li>
			<li title="splashy-shield_star"><i class="splashy-shield_star"></i></li>
			<li title="splashy-slider_no_pointy_thing"><i class="splashy-slider_no_pointy_thing"></i></li>
			<li title="splashy-smiley_amused"><i class="splashy-smiley_amused"></i></li>
			<li title="splashy-smiley_happy"><i class="splashy-smiley_happy"></i></li>
			<li title="splashy-smiley_surprised"><i class="splashy-smiley_surprised"></i></li>
			<li title="splashy-sprocket_dark"><i class="splashy-sprocket_dark"></i></li>
			<li title="splashy-sprocket_light"><i class="splashy-sprocket_light"></i></li>
			<li title="splashy-star_boxed_empty"><i class="splashy-star_boxed_empty"></i></li>
			<li title="splashy-star_boxed_full"><i class="splashy-star_boxed_full"></i></li>
			<li title="splashy-star_boxed_half"><i class="splashy-star_boxed_half"></i></li>
			<li title="splashy-star_empty"><i class="splashy-star_empty"></i></li>
			<li title="splashy-star_full"><i class="splashy-star_full"></i></li>
			<li title="splashy-star_half"><i class="splashy-star_half"></i></li>
			<li title="splashy-tag"><i class="splashy-tag"></i></li>
			<li title="splashy-tag_add"><i class="splashy-tag_add"></i></li>
			<li title="splashy-tag_edit"><i class="splashy-tag_edit"></i></li>
			<li title="splashy-tag_remove"><i class="splashy-tag_remove"></i></li>
			<li title="splashy-thumb_down"><i class="splashy-thumb_down"></i></li>
			<li title="splashy-thumb_up"><i class="splashy-thumb_up"></i></li>
			<li title="splashy-ticket"><i class="splashy-ticket"></i></li>
			<li title="splashy-ticket_add"><i class="splashy-ticket_add"></i></li>
			<li title="splashy-ticket_remove"><i class="splashy-ticket_remove"></i></li>
			<li title="splashy-upload"><i class="splashy-upload"></i></li>
			<li title="splashy-view_list"><i class="splashy-view_list"></i></li>
			<li title="splashy-view_list_with_thumbnail"><i class="splashy-view_list_with_thumbnail"></i></li>
			<li title="splashy-view_outline"><i class="splashy-view_outline"></i></li>
			<li title="splashy-view_outline_detail"><i class="splashy-view_outline_detail"></i></li>
			<li title="splashy-view_table"><i class="splashy-view_table"></i></li>
			<li title="splashy-view_thumbnail"><i class="splashy-view_thumbnail"></i></li>
			<li title="splashy-volume"><i class="splashy-volume"></i></li>
			<li title="splashy-volume_loud"><i class="splashy-volume_loud"></i></li>
			<li title="splashy-volume_off"><i class="splashy-volume_off"></i></li>
			<li title="splashy-volume_quiet"><i class="splashy-volume_quiet"></i></li>
			<li title="splashy-warning"><i class="splashy-warning"></i></li>
			<li title="splashy-warning_triangle"><i class="splashy-warning_triangle"></i></li>
			<li title="splashy-warning_triangle_small"><i class="splashy-warning_triangle_small"></i></li>
			<li title="splashy-zoom"><i class="splashy-zoom"></i></li>
			<li title="splashy-zoom_in"><i class="splashy-zoom_in"></i></li>
			<li title="splashy-zoom_out"><i class="splashy-zoom_out"></i></li>
		</ul>
        <h3 class="heading"><a href="http://www.famfamfam.com/lab/icons/flags/">Flag icons</a> <small>(247 icons)</small></h3>
		<div class="icon_copy_b sepH_c" data-iconset="splashy">Click on icon to generate code <span></span></div>
		<ul class="icon_list_b clearfix">
            <li title="Andorra"><i class="flag-ad"></i></li>
            <li title="United Arab Emirates"><i class="flag-ae"></i></li>
            <li title="Afghanistan"><i class="flag-af"></i></li>
            <li title="Antigua and Barbuda"><i class="flag-ag"></i></li>
            <li title="Anguilla"><i class="flag-ai"></i></li>
            <li title="Albania"><i class="flag-al"></i></li>
            <li title="Armenia"><i class="flag-am"></i></li>
            <li title="Netherlands Antilles"><i class="flag-an"></i></li>
            <li title="Angola"><i class="flag-ao"></i></li>
            <li title="Argentina"><i class="flag-ar"></i></li>
            <li title="American Samoa"><i class="flag-as"></i></li>
            <li title="Austria"><i class="flag-at"></i></li>
            <li title="Australia"><i class="flag-au"></i></li>
            <li title="Aruba"><i class="flag-aw"></i></li>
            <li title="�land Islands"><i class="flag-ax"></i></li>
            <li title="Azerbaijan"><i class="flag-az"></i></li>
            <li title="Bosnia and Herzegovina"><i class="flag-ba"></i></li>
            <li title="Barbados"><i class="flag-bb"></i></li>
            <li title="Bangladesh"><i class="flag-bd"></i></li>
            <li title="Belgium"><i class="flag-be"></i></li>
            <li title="Burkina Faso"><i class="flag-bf"></i></li>
            <li title="Bulgaria"><i class="flag-bg"></i></li>
            <li title="Bahrain"><i class="flag-bh"></i></li>
            <li title="Burundi"><i class="flag-bi"></i></li>
            <li title="Benin"><i class="flag-bj"></i></li>
            <li title="Bermuda"><i class="flag-bm"></i></li>
            <li title="Brunei Darussalam"><i class="flag-bn"></i></li>
            <li title="Bolivia, Plurinational State of"><i class="flag-bo"></i></li>
            <li title="Brazil"><i class="flag-br"></i></li>
            <li title="Bahamas"><i class="flag-bs"></i></li>
            <li title="Bhutan"><i class="flag-bt"></i></li>
            <li title="Bouvet Island"><i class="flag-bv"></i></li>
            <li title="Botswana"><i class="flag-bw"></i></li>
            <li title="Belarus"><i class="flag-by"></i></li>
            <li title="Belize"><i class="flag-bz"></i></li>
            <li title="Canada"><i class="flag-ca"></i></li>
            <li title="Catalonia"><i class="flag-catalonia"></i></li>
            <li title="Cocos (Keeling) Islands"><i class="flag-cc"></i></li>
            <li title="Congo, the Democratic Republic of the"><i class="flag-cd"></i></li>
            <li title="Central African Republic"><i class="flag-cf"></i></li>
            <li title="Congo"><i class="flag-cg"></i></li>
            <li title="Switzerland"><i class="flag-ch"></i></li>
            <li title="C�te d'Ivoire"><i class="flag-ci"></i></li>
            <li title="Cook Islands"><i class="flag-ck"></i></li>
            <li title="Chile"><i class="flag-cl"></i></li>
            <li title="Cameroon"><i class="flag-cm"></i></li>
            <li title="China"><i class="flag-cn"></i></li>
            <li title="Colombia"><i class="flag-co"></i></li>
            <li title="Costa Rica"><i class="flag-cr"></i></li>
            <li title="Serbia and Montenegro"><i class="flag-cs"></i></li>
            <li title="Cuba"><i class="flag-cu"></i></li>
            <li title="Cape Verde"><i class="flag-cv"></i></li>
            <li title="Christmas Island"><i class="flag-cx"></i></li>
            <li title="Cyprus"><i class="flag-cy"></i></li>
            <li title="Czech Republic"><i class="flag-cz"></i></li>
            <li title="Germany"><i class="flag-de"></i></li>
            <li title="Djibouti"><i class="flag-dj"></i></li>
            <li title="Denmark"><i class="flag-dk"></i></li>
            <li title="Dominica"><i class="flag-dm"></i></li>
            <li title="Dominican Republic"><i class="flag-do"></i></li>
            <li title="Algeria"><i class="flag-dz"></i></li>
            <li title="Ecuador"><i class="flag-ec"></i></li>
            <li title="Estonia"><i class="flag-ee"></i></li>
            <li title="Egypt"><i class="flag-eg"></i></li>
            <li title="Western Sahara"><i class="flag-eh"></i></li>
            <li title="England"><i class="flag-england"></i></li>
            <li title="Eritrea"><i class="flag-er"></i></li>
            <li title="Spain"><i class="flag-es"></i></li>
            <li title="Ethiopia"><i class="flag-et"></i></li>
            <li title="European Union"><i class="flag-europeanunion"></i></li>
            <li title="famfamfam ;)"><i class="flag-fam"></i></li>
            <li title="Finland"><i class="flag-fi"></i></li>
            <li title="Fiji"><i class="flag-fj"></i></li>
            <li title="Falkland Islands (Malvinas)"><i class="flag-fk"></i></li>
            <li title="Micronesia, Federated States of"><i class="flag-fm"></i></li>
            <li title="Faroe Islands"><i class="flag-fo"></i></li>
            <li title="France"><i class="flag-fr"></i></li>
            <li title="Gabon"><i class="flag-ga"></i></li>
            <li title="United Kingdom"><i class="flag-gb"></i></li>
            <li title="Grenada"><i class="flag-gd"></i></li>
            <li title="Georgia"><i class="flag-ge"></i></li>
            <li title="French Guiana"><i class="flag-gf"></i></li>
            <li title="Ghana"><i class="flag-gh"></i></li>
            <li title="Gibraltar"><i class="flag-gi"></i></li>
            <li title="Greenland"><i class="flag-gl"></i></li>
            <li title="Gambia"><i class="flag-gm"></i></li>
            <li title="Guinea"><i class="flag-gn"></i></li>
            <li title="Guadeloupe"><i class="flag-gp"></i></li>
            <li title="Equatorial Guinea"><i class="flag-gq"></i></li>
            <li title="Greece"><i class="flag-gr"></i></li>
            <li title="South Georgia and the South Sandwich Islands"><i class="flag-gs"></i></li>
            <li title="Guatemala"><i class="flag-gt"></i></li>
            <li title="Guam"><i class="flag-gu"></i></li>
            <li title="Guinea-Bissau"><i class="flag-gw"></i></li>
            <li title="Guyana"><i class="flag-gy"></i></li>
            <li title="Hong Kong"><i class="flag-hk"></i></li>
            <li title="Heard Island and McDonald Islands"><i class="flag-hm"></i></li>
            <li title="Honduras"><i class="flag-hn"></i></li>
            <li title="Croatia"><i class="flag-hr"></i></li>
            <li title="Haiti"><i class="flag-ht"></i></li>
            <li title="Hungary"><i class="flag-hu"></i></li>
            <li title="Indonesia"><i class="flag-id"></i></li>
            <li title="Ireland"><i class="flag-ie"></i></li>
            <li title="Israel"><i class="flag-il"></i></li>
            <li title="India"><i class="flag-in"></i></li>
            <li title="British Indian Ocean Territory"><i class="flag-io"></i></li>
            <li title="Iraq"><i class="flag-iq"></i></li>
            <li title="Iran, Islamic Republic of"><i class="flag-ir"></i></li>
            <li title="Iceland"><i class="flag-is"></i></li>
            <li title="Italy"><i class="flag-it"></i></li>
            <li title="Jamaica"><i class="flag-jm"></i></li>
            <li title="Jordan"><i class="flag-jo"></i></li>
            <li title="Japan"><i class="flag-jp"></i></li>
            <li title="Kenya"><i class="flag-ke"></i></li>
            <li title="Kyrgyzstan"><i class="flag-kg"></i></li>
            <li title="Cambodia"><i class="flag-kh"></i></li>
            <li title="Kiribati"><i class="flag-ki"></i></li>
            <li title="Comoros"><i class="flag-km"></i></li>
            <li title="Saint Kitts and Nevis"><i class="flag-kn"></i></li>
            <li title="Korea, Democratic People's Republic of"><i class="flag-kp"></i></li>
            <li title="Korea, Republic of"><i class="flag-kr"></i></li>
            <li title="Kuwait"><i class="flag-kw"></i></li>
            <li title="Cayman Islands"><i class="flag-ky"></i></li>
            <li title="Kazakhstan"><i class="flag-kz"></i></li>
            <li title="Lao People's Democratic Republic"><i class="flag-la"></i></li>
            <li title="Lebanon"><i class="flag-lb"></i></li>
            <li title="Saint Lucia"><i class="flag-lc"></i></li>
            <li title="Liechtenstein"><i class="flag-li"></i></li>
            <li title="Sri Lanka"><i class="flag-lk"></i></li>
            <li title="Liberia"><i class="flag-lr"></i></li>
            <li title="Lesotho"><i class="flag-ls"></i></li>
            <li title="Lithuania"><i class="flag-lt"></i></li>
            <li title="Luxembourg"><i class="flag-lu"></i></li>
            <li title="Latvia"><i class="flag-lv"></i></li>
            <li title="Libya"><i class="flag-ly"></i></li>
            <li title="Morocco"><i class="flag-ma"></i></li>
            <li title="Monaco"><i class="flag-mc"></i></li>
            <li title="Moldova, Republic of"><i class="flag-md"></i></li>
            <li title="Montenegro"><i class="flag-me"></i></li>
            <li title="Madagascar"><i class="flag-mg"></i></li>
            <li title="Marshall Islands"><i class="flag-mh"></i></li>
            <li title="Macedonia, the former Yugoslav Republic of"><i class="flag-mk"></i></li>
            <li title="Mali"><i class="flag-ml"></i></li>
            <li title="Myanmar"><i class="flag-mm"></i></li>
            <li title="Mongolia"><i class="flag-mn"></i></li>
            <li title="Macao"><i class="flag-mo"></i></li>
            <li title="Northern Mariana Islands"><i class="flag-mp"></i></li>
            <li title="Martinique"><i class="flag-mq"></i></li>
            <li title="Mauritania"><i class="flag-mr"></i></li>
            <li title="Montserrat"><i class="flag-ms"></i></li>
            <li title="Malta"><i class="flag-mt"></i></li>
            <li title="Mauritius"><i class="flag-mu"></i></li>
            <li title="Maldives"><i class="flag-mv"></i></li>
            <li title="Malawi"><i class="flag-mw"></i></li>
            <li title="Mexico"><i class="flag-mx"></i></li>
            <li title="Malaysia"><i class="flag-my"></i></li>
            <li title="Mozambique"><i class="flag-mz"></i></li>
            <li title="Namibia"><i class="flag-na"></i></li>
            <li title="New Caledonia"><i class="flag-nc"></i></li>
            <li title="Niger"><i class="flag-ne"></i></li>
            <li title="Norfolk Island"><i class="flag-nf"></i></li>
            <li title="Nigeria"><i class="flag-ng"></i></li>
            <li title="Nicaragua"><i class="flag-ni"></i></li>
            <li title="Netherlands"><i class="flag-nl"></i></li>
            <li title="Norway"><i class="flag-no"></i></li>
            <li title="Nepal"><i class="flag-np"></i></li>
            <li title="Nauru"><i class="flag-nr"></i></li>
            <li title="Niue"><i class="flag-nu"></i></li>
            <li title="New Zealand"><i class="flag-nz"></i></li>
            <li title="Oman"><i class="flag-om"></i></li>
            <li title="Panama"><i class="flag-pa"></i></li>
            <li title="Peru"><i class="flag-pe"></i></li>
            <li title="French Polynesia"><i class="flag-pf"></i></li>
            <li title="Papua New Guinea"><i class="flag-pg"></i></li>
            <li title="Philippines"><i class="flag-ph"></i></li>
            <li title="Pakistan"><i class="flag-pk"></i></li>
            <li title="Poland"><i class="flag-pl"></i></li>
            <li title="Saint Pierre and Miquelon"><i class="flag-pm"></i></li>
            <li title="Pitcairn"><i class="flag-pn"></i></li>
            <li title="Puerto Rico"><i class="flag-pr"></i></li>
            <li title="Palestinian Territory, Occupied"><i class="flag-ps"></i></li>
            <li title="Portugal"><i class="flag-pt"></i></li>
            <li title="Palau"><i class="flag-pw"></i></li>
            <li title="Paraguay"><i class="flag-py"></i></li>
            <li title="Qatar"><i class="flag-qa"></i></li>
            <li title="R�union"><i class="flag-re"></i></li>
            <li title="Romania"><i class="flag-ro"></i></li>
            <li title="Serbia"><i class="flag-rs"></i></li>
            <li title="Russian Federation"><i class="flag-ru"></i></li>
            <li title="Rwanda"><i class="flag-rw"></i></li>
            <li title="Saudi Arabia"><i class="flag-sa"></i></li>
            <li title="Solomon Islands"><i class="flag-sb"></i></li>
            <li title="Seychelles"><i class="flag-sc"></i></li>
            <li title="Scotland"><i class="flag-scotland"></i></li>
            <li title="Sudan"><i class="flag-sd"></i></li>
            <li title="Sweden"><i class="flag-se"></i></li>
            <li title="Singapore"><i class="flag-sg"></i></li>
            <li title="Saint Helena, Ascension and Tristan da Cunha"><i class="flag-sh"></i></li>
            <li title="Slovenia"><i class="flag-si"></i></li>
            <li title="Svalbard and Jan Mayen"><i class="flag-sj"></i></li>
            <li title="Slovakia"><i class="flag-sk"></i></li>
            <li title="Sierra Leone"><i class="flag-sl"></i></li>
            <li title="San Marino"><i class="flag-sm"></i></li>
            <li title="Senegal"><i class="flag-sn"></i></li>
            <li title="Somalia"><i class="flag-so"></i></li>
            <li title="Suriname"><i class="flag-sr"></i></li>
            <li title="Sao Tome and Principe"><i class="flag-st"></i></li>
            <li title="El Salvador"><i class="flag-sv"></i></li>
            <li title="Syrian Arab Republic"><i class="flag-sy"></i></li>
            <li title="Swaziland"><i class="flag-sz"></i></li>
            <li title="Turks and Caicos Islands"><i class="flag-tc"></i></li>
            <li title="Chad"><i class="flag-td"></i></li>
            <li title="French Southern Territories"><i class="flag-tf"></i></li>
            <li title="Togo"><i class="flag-tg"></i></li>
            <li title="Thailand"><i class="flag-th"></i></li>
            <li title="Tajikistan"><i class="flag-tj"></i></li>
            <li title="Tokelau"><i class="flag-tk"></i></li>
            <li title="Timor-Leste"><i class="flag-tl"></i></li>
            <li title="Turkmenistan"><i class="flag-tm"></i></li>
            <li title="Tunisia"><i class="flag-tn"></i></li>
            <li title="Tonga"><i class="flag-to"></i></li>
            <li title="Turkey"><i class="flag-tr"></i></li>
            <li title="Trinidad and Tobago"><i class="flag-tt"></i></li>
            <li title="Tuvalu"><i class="flag-tv"></i></li>
            <li title="Taiwan, Province of China"><i class="flag-tw"></i></li>
            <li title="Tanzania, United Republic of"><i class="flag-tz"></i></li>
            <li title="Ukraine"><i class="flag-ua"></i></li>
            <li title="Uganda"><i class="flag-ug"></i></li>
            <li title="United States Minor Outlying Islands"><i class="flag-um"></i></li>
            <li title="United States"><i class="flag-us"></i></li>
            <li title="Uruguay"><i class="flag-uy"></i></li>
            <li title="Uzbekistan"><i class="flag-uz"></i></li>
            <li title="Holy See (Vatican City State)"><i class="flag-va"></i></li>
            <li title="Saint Vincent and the Grenadines"><i class="flag-vc"></i></li>
            <li title="Venezuela, Bolivarian Republic of"><i class="flag-ve"></i></li>
            <li title="Virgin Islands, British"><i class="flag-vg"></i></li>
            <li title="Virgin Islands, U.S."><i class="flag-vi"></i></li>
            <li title="Viet Nam"><i class="flag-vn"></i></li>
            <li title="Vanuatu"><i class="flag-vu"></i></li>
            <li title="Wales"><i class="flag-wales"></i></li>
            <li title="Wallis and Futuna"><i class="flag-wf"></i></li>
            <li title="Samoa"><i class="flag-ws"></i></li>
            <li title="Yemen"><i class="flag-ye"></i></li>
            <li title="Mayotte"><i class="flag-yt"></i></li>
            <li title="South Africa"><i class="flag-za"></i></li>
            <li title="Zambia"><i class="flag-zm"></i></li>
            <li title="Zimbabwe"><i class="flag-zw"></i></li>
        </ul>
        <h3 class="heading"><a href="http://www.greepit.com/open-source-icons-gcons/">gcons icons</a> <small>(100 icons)</small></h3>
		<div class="icon_copy_c sepH_c" data-iconset="splashy">Click on icon to generate code <span></span></div>
		<ul class="icon_list_c clearfix">
            <li><img src="img/gCons/add-item.png" alt="" /></li>
            <li><img src="img/gCons/addressbook.png" alt="" /></li>
            <li><img src="img/gCons/agent.png" alt="" /></li>
            <li><img src="img/gCons/apple.png" alt="" /></li>
            <li><img src="img/gCons/arrow-round.png" alt="" /></li>
            <li><img src="img/gCons/badge.png" alt="" /></li>
            <li><img src="img/gCons/bar-chart-02.png" alt="" /></li>
            <li><img src="img/gCons/bar-chart.png" alt="" /></li>
            <li><img src="img/gCons/battery-full.png" alt="" /></li>
            <li><img src="img/gCons/bird.png" alt="" /></li>
            <li><img src="img/gCons/boat.png" alt="" /></li>
            <li><img src="img/gCons/bookmark.png" alt="" /></li>
            <li><img src="img/gCons/briefcase.png" alt="" /></li>
            <li><img src="img/gCons/calculator.png" alt="" /></li>
            <li><img src="img/gCons/calendar.png" alt="" /></li>
            <li><img src="img/gCons/cassette.png" alt="" /></li>
            <li><img src="img/gCons/chain.png" alt="" /></li>
            <li><img src="img/gCons/chat-.png" alt="" /></li>
            <li><img src="img/gCons/chat-02.png" alt="" /></li>
            <li><img src="img/gCons/cloud-filled.png" alt="" /></li>
            <li><img src="img/gCons/cloud-outline.png" alt="" /></li>
            <li><img src="img/gCons/computer.png" alt="" /></li>
            <li><img src="img/gCons/configuration.png" alt="" /></li>
            <li><img src="img/gCons/configuration02.png" alt="" /></li>
            <li><img src="img/gCons/connected.png" alt="" /></li>
            <li><img src="img/gCons/connections.png" alt="" /></li>
            <li><img src="img/gCons/container.png" alt="" /></li>
            <li><img src="img/gCons/copy-item.png" alt="" /></li>
            <li><img src="img/gCons/database.png" alt="" /></li>
            <li><img src="img/gCons/delete-item.png" alt="" /></li>
            <li><img src="img/gCons/disc.png" alt="" /></li>
            <li><img src="img/gCons/dollar.png" alt="" /></li>
            <li><img src="img/gCons/download.png" alt="" /></li>
            <li><img src="img/gCons/edit.png" alt="" /></li>
            <li><img src="img/gCons/email.png" alt="" /></li>
            <li><img src="img/gCons/fan.png" alt="" /></li>
            <li><img src="img/gCons/fancy-globe.png" alt="" /></li>
            <li><img src="img/gCons/female-user.png" alt="" /></li>
            <li><img src="img/gCons/fire.png" alt="" /></li>
            <li><img src="img/gCons/first-aid.png" alt="" /></li>
            <li><img src="img/gCons/flag.png" alt="" /></li>
            <li><img src="img/gCons/flower.png" alt="" /></li>
            <li><img src="img/gCons/full-screen.png" alt="" /></li>
            <li><img src="img/gCons/glasses.png" alt="" /></li>
            <li><img src="img/gCons/globe.png" alt="" /></li>
            <li><img src="img/gCons/happy-face.png" alt="" /></li>
            <li><img src="img/gCons/headphone.png" alt="" /></li>
            <li><img src="img/gCons/heart.png" alt="" /></li>
            <li><img src="img/gCons/home.png" alt="" /></li>
            <li><img src="img/gCons/ID.png" alt="" /></li>
            <li><img src="img/gCons/ipod.png" alt="" /></li>
            <li><img src="img/gCons/lab.png" alt="" /></li>
            <li><img src="img/gCons/lady.png" alt="" /></li>
            <li><img src="img/gCons/lamp.png" alt="" /></li>
            <li><img src="img/gCons/leaves.png" alt="" /></li>
            <li><img src="img/gCons/light.png" alt="" /></li>
            <li><img src="img/gCons/line-globe.png" alt="" /></li>
            <li><img src="img/gCons/lock.png" alt="" /></li>
            <li><img src="img/gCons/lookup.png" alt="" /></li>
            <li><img src="img/gCons/male-user.png" alt="" /></li>
            <li><img src="img/gCons/microphone.png" alt="" /></li>
            <li><img src="img/gCons/mobile.png" alt="" /></li>
            <li><img src="img/gCons/mobile2.png" alt="" /></li>
            <li><img src="img/gCons/mouse.png" alt="" /></li>
            <li><img src="img/gCons/multi-agents.png" alt="" /></li>
            <li><img src="img/gCons/music-node.png" alt="" /></li>
            <li><img src="img/gCons/network-pc.png" alt="" /></li>
            <li><img src="img/gCons/network.png" alt="" /></li>
            <li><img src="img/gCons/next-item.png" alt="" /></li>
            <li><img src="img/gCons/phone.png" alt="" /></li>
            <li><img src="img/gCons/pie-chart.png" alt="" /></li>
            <li><img src="img/gCons/pin.png" alt="" /></li>
            <li><img src="img/gCons/plane.png" alt="" /></li>
            <li><img src="img/gCons/print.png" alt="" /></li>
            <li><img src="img/gCons/processing-02.png" alt="" /></li>
            <li><img src="img/gCons/processing.png" alt="" /></li>
            <li><img src="img/gCons/push-pin.png" alt="" /></li>
            <li><img src="img/gCons/recycle-empty.png" alt="" /></li>
            <li><img src="img/gCons/recycle-full.png" alt="" /></li>
            <li><img src="img/gCons/reload.png" alt="" /></li>
            <li><img src="img/gCons/rss.png" alt="" /></li>
            <li><img src="img/gCons/satellite.png" alt="" /></li>
            <li><img src="img/gCons/save.png" alt="" /></li>
            <li><img src="img/gCons/scale.png" alt="" /></li>
            <li><img src="img/gCons/Scissors.png" alt="" /></li>
            <li><img src="img/gCons/screen.png" alt="" /></li>
            <li><img src="img/gCons/search.png" alt="" /></li>
            <li><img src="img/gCons/server.png" alt="" /></li>
            <li><img src="img/gCons/shield.png" alt="" /></li>
            <li><img src="img/gCons/shut-down.png" alt="" /></li>
            <li><img src="img/gCons/star.png" alt="" /></li>
            <li><img src="img/gCons/tag.png" alt="" /></li>
            <li><img src="img/gCons/tap.png" alt="" /></li>
            <li><img src="img/gCons/tree.png" alt="" /></li>
            <li><img src="img/gCons/umbrella.png" alt="" /></li>
            <li><img src="img/gCons/unlock.png" alt="" /></li>
            <li><img src="img/gCons/usb.png" alt="" /></li>
            <li><img src="img/gCons/van.png" alt="" /></li>
            <li><img src="img/gCons/wifi.png" alt="" /></li>
            <li><img src="img/gCons/world.png" alt="" /></li>
        </ul>
        <h3 class="heading">Other icons</h3>
		<div class="icon_copy_d sepH_d" data-iconset="splashy">Click on icon to generate code <span></span></div>
		<ul class="icon_list_d clearfix">
            <li title="icon-adt_trash"><i class="icon-adt_trash"></i></li>
            <li title="icon-adt_atach"><i class="icon-adt_atach"></i></li>
            <li title="icon-adt_enter"><i class="icon-adt_enter"></i></li>
        </ul>
          
		<h3 class="heading"><a href="http://glyphicons.com/">Glyphicons</a> <small>(120 icons)</small></h3>
		<a href="http://getbootstrap.com/components/#glyphicons">Here</a> you can find Glyphicons preview and instruction how to use them.
        
    </div>
</div>
                </div>
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

	<!-- icons functions -->
    <script src="js/gebo_icons.js"></script>

	
	
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
