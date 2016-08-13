
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

        <!-- upload -->
            <link rel="stylesheet" href="lib/plupload/js/jquery.plupload.queue/css/plupload-gebo.css" />
		<!-- tag handler -->
            <link rel="stylesheet" href="lib/tag_handler/css/jquery.taghandler.css" />

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
										<li><a href="javascript:void(0)"><i class="flag-fr"></i> Français</a></li>
										<li><a href="javascript:void(0)"><i class="flag-es"></i> Español</a></li>
										<li><a href="javascript:void(0)"><i class="flag-ru">/i> Pусский</a></li>
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
											<td><a href="javascript:void(0)">Admin should not break if URL…</a></td>
											<td>23/05/2012</td>
											<td><span class="label label-danger">High</span></td>
											<td>Open</td>
										</tr>
										<tr>
											<td>P-18</td>
											<td><a href="javascript:void(0)">Displaying submenus in custom…</a></td>
											<td>22/05/2012</td>
											<td><span class="label label-warning">Medium</span></td>
											<td>Reopen</td>
										</tr>
										<tr>
											<td>P-25</td>
											<td><a href="javascript:void(0)">Featured image on post types…</a></td>
											<td>22/05/2012</td>
											<td><span class="label label-success">Low</span></td>
											<td>Updated</td>
										</tr>
										<tr>
											<td>P-10</td>
											<td><a href="javascript:void(0)">Multiple feed fixes and…</a></td>
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
		<div class="mbox">
			<div class="tabbable">
				<div class="heading">
					<ul class="nav nav-tabs">
						<li><a href="#mbox_new" data-toggle="tab"><i class="splashy-document_letter_edit"></i> New message</a></li>
						<li class="active"><a href="#mbox_inbox" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Inbox</a></li>
						<li><a href="#mbox_outbox" data-toggle="tab"><i class="splashy-mail_light_up"></i> Outbox</a></li>
						<li><a href="#mbox_trash" data-toggle="tab"><i class="icon-adt_trash"></i> Trash</a></li>
											</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane" id="mbox_new">
						<form id="new_message_form" class="form-horizontal">
                            <div class="form-group">
								<label for="mail_sender" class="col-lg-2 control-label">Sender</label>
								<div class="col-lg-4">
									<select id="mail_sender" name="mail_sender" class="form-control">
										<option>no-replay@example.com</option>
										<option>johnySmith@example.com</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Recipient</label>
								<div class="col-lg-6">
									<ul id="mail_recipients"></ul>
								</div>
							</div>
							<div class="form-group">
								<label for="mail_subject" class="col-lg-2 control-label">Subject</label>
								<div class="col-lg-8">
									<input type="text" name="mail_subject" id="mail_subject" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="mail_attachments" class="col-lg-2 control-label">Attachments</label>
								<div class="col-lg-8">
									<a href="#" class="add_files">Add files</a>
									<div class="mail_uploader">
										<div id="mail_attachments" class="gebo-upload">
											<p>You browser doesn't have Flash, Silverlight or HTML5 support.</p>
										</div>
										<span class="help-block">This files will be uploaded on form submit.</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="mail_message" class="col-lg-2 control-label">Message</label>
								<div class="col-lg-8">
									<textarea name="mail_message" id="mail_message" cols="10" rows="12" class="form-control auto_expand"></textarea>
								</div>
							</div>
                            <div class="col-lg-8 col-lg-offset-2">
                                <button type="submit" class="btn btn-default">Send message</button>
                            </div>
                        </form>
					</div>
					<div class="tab-pane active" id="mbox_inbox">
						<table id="dt_inbox" class="table table_vam mbox_table dTableR" data-msg_rowlink="a">
							<thead>
								<tr>
									<th class="table_checkbox"><input type="checkbox" name="select_msgs" class="select_msgs" data-tableid="dt_inbox"></th>
									<th><i class="splashy-star_empty"></i></th>
									<th><i class="splashy-mail_light"></i></th>
									<th>Subject</th>
									<th>Sender</th>
									<th>Date</th>
									<th>Size</th>
									<th><i class="icon-adt_atach"></i></th>
								</tr>
							</thead>
							<tbody>
																	<tr class="unread">
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
										<td>email_9@example.com</td>
										<td>28/06/2012</td>
										<td>43 KB</td>
										<td></td>
									</tr>
																	<tr class="unread">
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
										<td>email_7@example.com</td>
										<td>28/06/2012</td>
										<td>40 KB</td>
										<td></td>
									</tr>
																	<tr class="unread">
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consec…</a></td>
										<td>email_8@example.com</td>
										<td>29/06/2012</td>
										<td>10 KB</td>
										<td></td>
									</tr>
																									<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consect…</a></td>
										<td>email_23@example.com</td>
										<td>9/05/2012</td>
										<td>1487 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
										<td>email_26@example.com</td>
										<td>26/04/2012</td>
										<td>1179 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_full mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet con…</a></td>
										<td>email_13@example.com</td>
										<td>16/06/2012</td>
										<td>754 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet co…</a></td>
										<td>email_25@example.com</td>
										<td>9/06/2012</td>
										<td>804 KB</td>
										<td><i class="icon-adt_atach"></i></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
										<td>email_17@example.com</td>
										<td>9/03/2012</td>
										<td>1205 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_full mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
										<td>email_1@example.com</td>
										<td>15/04/2012</td>
										<td>1390 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
										<td>email_4@example.com</td>
										<td>18/06/2012</td>
										<td>1165 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
										<td>email_19@example.com</td>
										<td>16/05/2012</td>
										<td>127 KB</td>
										<td><i class="icon-adt_atach"></i></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet co…</a></td>
										<td>email_4@example.com</td>
										<td>11/06/2012</td>
										<td>1366 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consect…</a></td>
										<td>email_13@example.com</td>
										<td>19/03/2012</td>
										<td>474 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet …</a></td>
										<td>email_24@example.com</td>
										<td>22/05/2012</td>
										<td>156 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
										<td>email_18@example.com</td>
										<td>1/03/2012</td>
										<td>1302 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consecte…</a></td>
										<td>email_26@example.com</td>
										<td>26/05/2012</td>
										<td>1276 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
										<td>email_9@example.com</td>
										<td>12/04/2012</td>
										<td>1399 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet co…</a></td>
										<td>email_22@example.com</td>
										<td>2/06/2012</td>
										<td>1085 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consecte…</a></td>
										<td>email_22@example.com</td>
										<td>3/05/2012</td>
										<td>1398 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet c…</a></td>
										<td>email_27@example.com</td>
										<td>19/03/2012</td>
										<td>730 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consec…</a></td>
										<td>email_24@example.com</td>
										<td>1/06/2012</td>
										<td>1436 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consect…</a></td>
										<td>email_22@example.com</td>
										<td>21/06/2012</td>
										<td>599 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
										<td>email_17@example.com</td>
										<td>17/03/2012</td>
										<td>1360 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
										<td>email_16@example.com</td>
										<td>16/05/2012</td>
										<td>651 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet c…</a></td>
										<td>email_18@example.com</td>
										<td>3/04/2012</td>
										<td>463 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
										<td>email_24@example.com</td>
										<td>4/06/2012</td>
										<td>1424 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
										<td>email_15@example.com</td>
										<td>19/05/2012</td>
										<td>479 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
										<td>email_14@example.com</td>
										<td>26/04/2012</td>
										<td>539 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet c…</a></td>
										<td>email_4@example.com</td>
										<td>23/06/2012</td>
										<td>399 KB</td>
										<td></td>
									</tr>
															</tbody>
						</table>	
					</div>
			
					<div class="tab-pane" id="mbox_outbox">
						<table id="dt_outbox" class="table table_vam mbox_table dTableR" data-msg_rowlink="a">
							<thead>
								<tr>
									<th class="table_checkbox"><input type="checkbox" name="select_msgs" class="select_msgs" data-tableid="dt_outbox"></th>
									<th><i class="splashy-star_empty"></i></th>
									<th><i class="splashy-mail_light"></i></th>
									<th>Subject</th>
									<th>Sender</th>
									<th>Date</th>
									<th>Size</th>
									<th><i class="icon-adt_atach"></i></th>
								</tr>
							</thead>
							<tbody>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consec…</a></td>
										<td>email_17@example.com</td>
										<td>19/04/2012</td>
										<td>338 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_full mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet…</a></td>
										<td>email_21@example.com</td>
										<td>20/03/2012</td>
										<td>251 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consecte…</a></td>
										<td>email_9@example.com</td>
										<td>23/03/2012</td>
										<td>149 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consec…</a></td>
										<td>email_21@example.com</td>
										<td>14/05/2012</td>
										<td>521 KB</td>
										<td><i class="icon-adt_atach"></i></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_full mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consec…</a></td>
										<td>email_7@example.com</td>
										<td>20/06/2012</td>
										<td>1082 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
										<td>email_3@example.com</td>
										<td>22/06/2012</td>
										<td>187 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
										<td>email_21@example.com</td>
										<td>16/06/2012</td>
										<td>212 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consec…</a></td>
										<td>email_26@example.com</td>
										<td>20/04/2012</td>
										<td>246 KB</td>
										<td><i class="icon-adt_atach"></i></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consect…</a></td>
										<td>email_14@example.com</td>
										<td>10/05/2012</td>
										<td>921 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet co…</a></td>
										<td>email_16@example.com</td>
										<td>8/06/2012</td>
										<td>194 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
										<td>email_21@example.com</td>
										<td>7/04/2012</td>
										<td>700 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consecte…</a></td>
										<td>email_12@example.com</td>
										<td>14/06/2012</td>
										<td>547 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_right"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet cons…</a></td>
										<td>email_25@example.com</td>
										<td>1/03/2012</td>
										<td>888 KB</td>
										<td></td>
									</tr>
															</tbody>
						</table>
					</div>
					<div class="tab-pane" id="msg_view">
						<div class="doc_view">
                            <div class="doc_view_header">
								<dl class="dl-horizontal">
									<dt>Subject</dt>
										<dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</dd>
									<dt>Sender</dt>
										<dd>email1@example.com</dd>
									<dt>Recipient</dt>
										<dd>johnsmith@example.com</dd>
									<dt>Date</dt>
										<dd>19 October 2014 00:17:31</dd>
									<dt><i class="icon-adt_atach"></i></dt>
										<dd><a href="javascript:void(0)">image01.jpg</a>, <a href="javascript:void(0)">image02.jpg</a>, <a href="javascript:void(0)">document.pdf</a></dd>
								</dl>
							</div>
							<div class="doc_view_content">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse iaculis consectetur feugiat. Cras lacinia ullamcorper mauris, a tincidunt lacus malesuada non. Mauris ut mi ut augue vehicula suscipit. Suspendisse lobortis tempor urna, ut feugiat mauris pretium sed. Aliquam eget dolor eget dolor euismod feugiat eu et augue. Sed metus metus, condimentum quis vulputate et, pretium eu tortor. Maecenas felis felis, dignissim at pretium sit amet, condimentum a libero. Nam laoreet semper tortor sed fermentum. Duis eleifend tortor sed justo venenatis aliquam.
								Curabitur augue elit, mattis eu ornare eget, varius sed metus. Cras fringilla fermentum malesuada. Nulla consectetur sollicitudin nibh, iaculis sagittis diam placerat ac. Aenean molestie vestibulum mattis. Suspendisse elementum, tellus quis mattis adipiscing, dui mauris pulvinar mauris, et rhoncus nisi turpis sit amet turpis. Duis nunc nisl, ullamcorper quis ultricies quis, suscipit non dui. Etiam id urna massa, at pharetra velit. Ut tortor mi, vestibulum id imperdiet a, consectetur vel lorem.
								Maecenas eget velit pharetra tellus placerat condimentum at vel sapien. Suspendisse ac urna turpis, eget lobortis purus. Ut id arcu et nulla accumsan semper. In lacinia vestibulum nulla ac pellentesque. Nullam mattis ante ornare est tincidunt placerat. Donec non feugiat felis. Sed felis lacus, molestie in luctus vel, tempor a dui. Aliquam erat volutpat. Morbi laoreet gravida sagittis. Nulla tempor ipsum vitae tortor suscipit facilisis et at ligula. Ut lobortis, mauris vel faucibus condimentum, metus nulla varius odio, sed accumsan lorem elit sed mi. Nunc venenatis orci vel erat tincidunt quis tincidunt erat tempus. Cras vel sapien sed enim viverra egestas nec id orci. Nulla nec ornare ante. Donec tristique iaculis nunc in fringilla.
							</div>
							<div class="doc_view_footer clearfix">
								<div class="btn-group pull-left">
									<a href="javascript:void(0)" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i> Answer</a>
									<a href="javascript:void(0)" class="btn btn-default"><i class="glyphicon glyphicon-share-alt"></i> Forward</a>
									<a href="#" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i> Delete</a>
								</div>
								<div class="pull-right">
									Size: 240 KB
								</div>
							</div>
                        </div>
						<ul class="pager">
							<li class="previous">
								<a href="#"><i class="glyphicon glyphicon-chevron-left"></i> Previous</a>
							</li>
							<li class="next">
								<a href="#">Next <i class="glyphicon glyphicon-chevron-right"></i></a>
							</li>
						</ul>
					</div>
					<div class="tab-pane" id="mbox_trash">
						<table id="dt_trash" class="table table_vam mbox_table dTableR" data-msg_rowlink="a">
							<thead>
								<tr>
									<th class="table_checkbox"><input type="checkbox" name="select_msgs" class="select_msgs" data-tableid="dt_trash"></th>
									<th><i class="splashy-star_empty"></i></th>
									<th><i class="splashy-mail_light"></i></th>
									<th>Subject</th>
									<th>Sender</th>
									<th>Date</th>
									<th>Size</th>
									<th><i class="icon-adt_atach"></i></th>
								</tr>
							</thead>
							<tbody>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
										<td>email_27@example.com</td>
										<td>11/06/2012</td>
										<td>613 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_full mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet con…</a></td>
										<td>email_21@example.com</td>
										<td>22/06/2012</td>
										<td>644 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet co…</a></td>
										<td>email_8@example.com</td>
										<td>24/05/2012</td>
										<td>326 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet consecte…</a></td>
										<td>email_8@example.com</td>
										<td>22/03/2012</td>
										<td>905 KB</td>
										<td><i class="icon-adt_atach"></i></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_full mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet …</a></td>
										<td>email_6@example.com</td>
										<td>25/05/2012</td>
										<td>1464 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet …</a></td>
										<td>email_9@example.com</td>
										<td>21/04/2012</td>
										<td>702 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet c…</a></td>
										<td>email_10@example.com</td>
										<td>8/06/2012</td>
										<td>331 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet conse…</a></td>
										<td>email_9@example.com</td>
										<td>22/04/2012</td>
										<td>315 KB</td>
										<td><i class="icon-adt_atach"></i></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet …</a></td>
										<td>email_27@example.com</td>
										<td>11/03/2012</td>
										<td>884 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet con…</a></td>
										<td>email_2@example.com</td>
										<td>21/04/2012</td>
										<td>503 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet co…</a></td>
										<td>email_18@example.com</td>
										<td>13/04/2012</td>
										<td>586 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit amet co…</a></td>
										<td>email_18@example.com</td>
										<td>17/03/2012</td>
										<td>1288 KB</td>
										<td></td>
									</tr>
																	<tr>
										<td class="nohref"><input type="checkbox" name="msg_sel" class="select_msg"></td>
										<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
										<td><i class="splashy-mail_light_stuffed"></i></td>
										<td><a href="#msg_view">Lorem ipsum dolor sit ame…</a></td>
										<td>email_17@example.com</td>
										<td>5/04/2012</td>
										<td>554 KB</td>
										<td></td>
									</tr>
															</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- hide elements-->
<div class="hide">
    
    <!-- actions for inbox -->
    <div class="dt_inbox_actions">
		<div class="btn-group">
			<a href="javascript:void(0)" class="btn btn-default btn-sm" title="Answer"><i class="glyphicon glyphicon-pencil"></i></a>
			<a href="javascript:void(0)" class="btn btn-default btn-sm" title="Forward"><i class="glyphicon glyphicon-share-alt"></i></a>
			<a href="#" class="delete_msg btn btn-default btn-sm" title="Delete" data-tableid="dt_inbox"><i class="glyphicon glyphicon-trash"></i></a>
		</div>
    </div>
	<!-- actions for outbox -->
    <div class="dt_outbox_actions">
		<div class="btn-group">
			<a href="javascript:void(0)" class="btn btn-default btn-sm" title="Resend"><i class="glyphicon glyphicon-share-alt"></i></a>
			<a href="#" class="delete_msg btn btn-default btn-sm" title="Delete" data-tableid="dt_outbox"><i class="glyphicon glyphicon-trash"></i></a>
		</div>
    </div>
    <!-- actions for trash -->
    <div class="dt_trash_actions">
		<div class="btn-group">
			<a href="#" class="delete_msg btn btn-default btn-sm" title="Delete permamently" data-tableid="dt_trash"><i class="glyphicon glyphicon-trash"></i></a>
		</div>
    </div>
    
    <!-- confirmation box -->
    <div id="confirm_dialog" class="cbox_content">
        <div class="sepH_c tac"><strong>Are you sure you want to delete this message(s)?</strong></div>
        <div class="tac">
            <a href="#" class="btn confirm_yes btn-sm btn-default">Yes</a>
            <a href="#" class="btn confirm_no btn-sm btn-link">No</a>
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
								<li><a href="javascript:void(0)">Members groups</a>/li>
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

	<!-- datatable (inbox,outbox) -->
	<script src="lib/datatables/jquery.dataTables.min.js"></script>
    <!-- additional sorting for datatables -->
    <script src="lib/datatables/jquery.dataTables.sorting.js"></script>
    <!-- datatables bootstrap integration -->
    <script src="lib/datatables/jquery.dataTables.bootstrap.min.js"></script>
    <!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
    <script type="text/javascript" src="lib/plupload/js/plupload.full.js"></script>
    <script type="text/javascript" src="lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
    <!-- autosize textareas (new message) -->
	<script src="js/forms/jquery.autosize.min.js"></script>
    <!-- tag handler (recipients) -->
	<script src="lib/tag_handler/jquery.taghandler.min.js"></script>
    <!-- mailbox functions -->
    <script src="js/gebo_mailbox.js"></script>
    
	
	
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
	
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-54288087-1']);
		_gaq.push(['_trackPageview']);
	  
		(function() {
		  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	  
	  </script>
	  
</div>					</body>
				</html>
