
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" >
    <link href="assets/css/custom.css" rel="stylesheet" >
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
    <script src="assets/js/jquery-1.10.2.js" ></script>
    <script src="assets/js/bootstrap.js" ></script>
    <script src="assets/js/jquery.js" ></script>
    <script type="text/javascript" src="assets/js/jquery-1.9.0.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.0.min.js"><\/script>')</script>
    <!-- custom scrollbar plugin -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script>
      (function($){
        $(window).load(function(){
          
          $("#horizontal-scroll").mCustomScrollbar({
            axis:"x",
            theme:"dark-thin",
            advanced:{autoExpandHorizontalScroll:true},
             scrollbarPosition:"inside"
          });  
        });
      })(jQuery);
    </script>

    <script>
<<<<<<< HEAD
		$(document).ready(function(){
			$("#name_overimage").hide();
			$(".header_block").animate({height:'30px'},10);
		  $("#header").mouseenter(function(){
				$("#header").animate({height:'200px'});
				$("#header_img").animate({height:'190px',width:'190px'});
				$("#header_name").hide(200);
				$("#name_overimage").show(200);
				$(".header_block").animate({height:'180px'});
		  });
		  $("#header").mouseleave(function(){
				$("#header").animate({height:'50px'});
				$("#header_img").animate({height:'40px',width:'40px'});
				$("#header_name").show(500);
				$("#name_overimage").hide(100);
				$(".header_block").animate({height:'30px'});
		  });
		});
=======
    $(document).ready(function(){
      $("#name_overimage").hide();
      $(".header_block").animate({height:'30px'},10);
      $("#header").mouseenter(function(){
        $("#header").animate({height:'200px'});
        $("#header_img").animate({height:'190px',width:'190px'});
        $("#header_name").hide();
        $("#name_overimage").show(200);
        $(".header_block").animate({height:'180px'});
      });
      $("#header").mouseleave(function(){
        $("#header").animate({height:'50px'});
        $("#header_img").animate({height:'40px',width:'40px'});
        $("#header_name").show();
        $("#name_overimage").hide(100);
        $(".header_block").animate({height:'30px'});
      });
    });
>>>>>>> 221fdda85328691a2b8040f96df8bf9f17b98ca8
</script>
    <!-- Add custom CSS here -->
    


</head>

<body style="font-family:'Comic Sans MS', cursive">
  <div style="height:50px;background-color:#72175a;overflow:hidden" id="header">
      <div style="width:1000px;margin-left:auto;margin-right:auto">
                <div class="pull-left header_block">
<<<<<<< HEAD
                	<img src="images/me.png" width="40" height="40" alt="profile_pic" style="margin-top:5px;" id="header_img">
=======
                  <img src="images/me.png" width="40" height="40" alt="profile_pic" style="margin-top:5px;" id="header_img">
>>>>>>> 221fdda85328691a2b8040f96df8bf9f17b98ca8
                    <div style="background-color:#181818;opacity:0.7;color:#FFF;margin-top:-30px;text-align:center;height:30px;padding-top:5px;" id="name_overimage">Harshit Gupta</div>
                  
                </div>
                <div class="pull-left white font14 text-center header_block" style="margin:10px 0 0;padding:5px;" id="header_name">Harshit Gupta</div>
                <div class="pull-right white font14  header_block" style="border-left:solid 1px #828282;margin:10px 0 0;padding:5px;width:150px;">
                  <span style="margin-left:25px">Settings</span><br><br>
                  <span class="font12 pull-left" style="color:#D5D5D5;text-indent:25px">Account Settings</span><br>
                  <span class="font12 pull-left" style="color:#D5D5D5;text-indent:25px">Help Center</span><br>
                  <span class="font12 pull-left" style="color:#D5D5D5;text-indent:25px">Activity Logs</span><br>
                  <span class="font12 pull-left" style="color:#D5D5D5;text-indent:25px">Privacy Settings</span><br>
                  <span class="font12 pull-left" style="color:#D5D5D5;text-indent:25px">Logout</span><br>
                </div>
                
                <div class="pull-right white font14 text-center header_block" style="border-left:solid 1px #828282;margin:10px 0 0;padding:5px;width:150px;">
                  <span>Following &nbsp;&nbsp;<span class="font10 " style="color:#ABABAB"><strong>43</strong></span></span>
                  <div class="content mCustomScrollbar light _mCS_2 mCS-autoHide" data-mcs-theme="mCSB_dragger" style="height:124px;margin-top:20px;overflow:auto;">
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:12px">Nimish Agarwal</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:12px">Sumit Awasthi</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:12px">Navendu Saxena</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:12px">Rohit Kumar</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:12px">Sahil Mukteja</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:12px">Nimish Agarwal</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:12px">Sumit Awasthi</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:12px">Navendu Saxena</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:12px">Rohit Kumar</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:12px">Sahil Mukteja</span><br>
                    </div>
                </div>
                
                <div class="pull-right white font14 text-center header_block" style="margin:10px 0 0 10px;padding:5px;width:150px;">
                  <span>Followers &nbsp;&nbsp;<span class="font10" style="color:#ABABAB"><strong>43</strong></span></span>
                   <div class="content mCustomScrollbar light _mCS_2 mCS-autoHide" data-mcs-theme="mCSB_dragger" style="height:124px;margin-top:20px;">
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:13px">Nimish Agarwal</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:13px">Sumit Awasthi</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:13px">Navendu Saxena</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:13px">Rohit Kumar</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:13px">Sahil Mukteja</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:13px">Nimish Agarwal</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:13px">Sumit Awasthi</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:13px">Navendu Saxena</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:13px">Rohit Kumar</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5;text-indent:13px">Sahil Mukteja</span><br>
                      </div>
                </div>
<<<<<<< HEAD
                <div class="pull-left white font14 text-center header_block" style="margin:10px;padding:5px;margin-right:0px;margin-left:0px;" id="header_name">Harshit Gupta</div>
                <div class="pull-right white font14 text-center header_block" style="border-left:solid 1px #828282;margin:10px;padding:5px;margin-left:0px;margin-right:0px;width:150px;">
                	<span>Settings</span><br><br>
					<span class="font12 pull-left" style="color:#D5D5D5">Account Settings</span><br>

                    <span class="font12 pull-left" style="color:#D5D5D5">Help Center</span><br>

                    <span class="font12 pull-left" style="color:#D5D5D5">Activity Logs</span><br>

                    <span class="font12 pull-left" style="color:#D5D5D5">Privacy Settings</span><br>

                    <span class="font12 pull-left" style="color:#D5D5D5">Logout</span><br>

                    
                
                </div>
                <div class="pull-right white font14 text-center header_block" style="border-left:solid 1px #828282;margin:10px;padding:5px;margin-left:0px;margin-right:0px;width:150px;">
                	<span>Following &nbsp;&nbsp;<span class="font10 " style="color:#ABABAB"><strong>43</strong></span></span>
                	<div style="height:135px;margin-top:20px;">
                    	<span class="font12 pull-left" style="color:#D5D5D5">Nimish Agarwal</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5">Sumit Awasthi</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5">Navendu Saxena</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5">Rohit Kumar</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5">Sahil Mukteja</span><br>
                    </div>
                </div>
                <div class="pull-right white font14 text-center header_block" style="margin:10px;padding:5px;margin-left:0px;margin-right:0px;width:150px;">
                	<span>Followers &nbsp;&nbsp;<span class="font10" style="color:#ABABAB"><strong>43</strong></span></span>
					<div style="height:135px;margin-top:20px;">
                    	<span class="font12 pull-left" style="color:#D5D5D5">Nimish Agarwal</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5">Sumit Awasthi</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5">Navendu Saxena</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5">Rohit Kumar</span><br>
                        <span class="font12 pull-left" style="color:#D5D5D5">Sahil Mukteja</span><br>
                    </div>
                </div>
                <div class="pull-right header_block">
                	<input type="text" style="width:300px;margin-top:10px;border:solid 1px #FFF;height:30px;" placeholder="Search"/><br/>
=======
                
                <div class="pull-right header_block">
                  <input type="text" style="width:300px;margin-top:10px;border:solid 1px #FFF;height:30px;" placeholder="Search"/><br/>
>>>>>>> 221fdda85328691a2b8040f96df8bf9f17b98ca8
                    <input type="text" style="width:300px;margin-top:10px;border:solid 1px #FFF;height:30px;" placeholder="City"/><br>

                    <input type="text" style="width:300px;margin-top:10px;border:solid 1px #FFF;height:30px;" placeholder="Profession"/><br><br>
          <input type="button" class="btn btn-default btn-sm" value="Search"/>

                </div> 
                <div class="pull-right header_block"><i class="fa fa-calendar white font24" style="margin:12px;"></i> </div>
                
        </div>
     </div>

    <div id="horizontal-scroll" class="mCS-autoHide" style="width:1250px;margin-top:20px;margin-left:auto;margin-right:auto;oveflow-x:auto;overflow-y:hidden">
     <table style=" border-collapse: separate; border-spacing: 24px 0; ">
      <tbody>
        <tr>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
          <td>
            <div style="height:150px;width:150px;border:solid 1px #72175a;">
           <div class="font14 text-center purple"><strong>Event 1</strong></div>
           <div class="font12 text-center purple">2-JUL-2014</div>
           <div class="font12 text-center purple">11:00 PM</div>
           <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
           </div>
          </td>
        </tr>
      </tbody> 
     </table>
     </div>
     
   <div style="margin-top:25px;"> 

      <div class="col-md-3" style="height:600px; border-right:solid 1px #ABABAB">
          
              <div class="content mCustomScrollbar light" data-mcs-theme="minimal-dark" style="height:200px;width:250px;border:solid 1px #72175a;margin-top:20px;margin-left:25px;overflow:auto">
              <table class="table table-striped">
              <thead>
              <tr>
            <th colspan="2" class="text-center" style="padding:12px">Followers</th> 
            </tr>
            </thead>
            <tbody>
            <tr>
            <td><img src="images/default-user.jpg" width="30px"></td>
            <td>Nimish Agarwal</td>
            </tr>
            <tr>
            <td><img src="images/default-user.jpg" width="30px"></td>
            <td>Harshit Gupta</td>
            </tr>
            <tr>
            <td><img src="images/default-user.jpg" width="30px"></td>
            <td>Sahil Mukteja</td>
            </tr>
            <tr>
            <td><img src="images/default-user.jpg" width="30px"></td>
            <td>Sumit Awasthi</td>
            </tr>
            <tr>
            <td><img src="images/default-user.jpg" width="30px"></td>
            <td>Navendu Saxena</td>
            </tr>
            <tr>
            <td><img src="images/default-user.jpg" width="30px"></td>
            <td>Rohit Kumar</td>
            </tr>
            </tbody>
          </table>
          </div>
          
          <div style="height:200px;width:250px;border:solid 1px #72175a;margin-top:50px;margin-left:25px">
            <div class="font16 text-center" style="border-bottom:solid 1px #72175a;padding:10px">Suggestions</div>
            <div class="font14 text-center purple" style="margin-top:15px"><strong>Event 1</strong></div>
            <div class="font12 text-center purple">2-JUL-2014</div>
            <div class="font12 text-center purple">11:00 PM</div>
            <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
          </div>
        
        </div>
        
      <div class="col-md-6">
        <div class="col-md-11">
        <div class="panel panel-default" style="margin-left:60px;margin-top:20px">
        <div class="panel-body">
         <textarea name="message" cols="40" rows="10" id="status_message" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="What's on your mind ?"></textarea> 
        </div>
        <div class="panel-footer">
            <div class="form-group">
                        <button type="button" class="btn btn-default" style="background-color: #f5f5f5;border:none;" title="Set Time">
                        <span class="glyphicon glyphicon-time"></span></button>                                     
                        <button type="button" class="btn btn-default" style="background-color: #f5f5f5;border:none;" title="Invite">
                        <span class="glyphicon glyphicon-user"></span>  </button>
                        <button type="button" class="btn btn-default" style="background-color: #f5f5f5;border:none;" title="Photo">
                        <span class="glyphicon glyphicon-picture"></span></button>
                        <button type="button" class="btn btn-default" style="background-color: #f5f5f5;border:none;" title="Video">
                        <span class="glyphicon glyphicon-facetime-video"></span></button>
                        <button type="button" class="btn btn-default" style="background-color: #f5f5f5;border:none;" title="How To Reach">
                        <span class="glyphicon glyphicon-map-marker"></span></button>                              
                         <input type="submit" name="submit" value="Publish" class="btn btn-primary" style="margin-left:180px">          
                    </div>

        </div>
      </div>
      </div>
        <div style="height:150px;width:290px;border:solid 1px #72175a;margin:15px;" class="pull-left">

            <div class="font14 text-center purple"><strong>Other Events</strong></div>
        <div class="font12 text-center purple">2-JUL-2014</div>
              <div class="font12 text-center purple">11:00 PM</div>
              <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
          </div>
          
          <div style="height:150px;width:290px;border:solid 1px #72175a;margin:15px;" class="pull-left"></div>
          <div style="height:150px;width:290px;border:solid 1px #72175a;margin:15px;" class="pull-left"></div>
          <div style="height:150px;width:290px;border:solid 1px #72175a;margin:15px;" class="pull-left"></div>
     </div>
     
     <div class="col-md-3" style="height:600px;border-left:solid 1px #ABABAB">
          <div style="height:200px;width:250px;border:solid 1px #72175a;margin-left:25px;margin-top:20px">
        <div class="font16 text-center" style="border-bottom:solid 1px #72175a;padding:10px">Upcoming Event</div>
        <div class="font14 text-center purple" style="margin-top:15px"><strong>Event 1</strong></div>
        <div class="font12 text-center purple">2-JUL-2014</div>
              <div class="font12 text-center purple">11:00 PM</div>
              <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
      </div>

      <div style="height:200px;width:250px;border:solid 1px #72175a;margin-left:25px;margin-top:50px">
        <div class="font16 text-center" style="border-bottom:solid 1px #72175a;padding:10px">Intrested In&nbsp??</div>
        <div class="font14 text-center purple" style="margin-top:15px"><strong>Event 1</strong></div>
        <div class="font12 text-center purple">2-JUL-2014</div>
              <div class="font12 text-center purple">11:00 PM</div>
              <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
      </div>
        </div>     
      
    </div>
    
    <div style="width:1200px;margin-left:auto;margin-right:auto;height:200px">
    	<div style="height:150px;width:150px;border:solid 1px #72175a;margin:10px;" class="pull-left">
        	<div class="font14 text-center purple"><strong>Event 1</strong></div>
			<div class="font12 text-center purple">2-JUL-2014</div>
            <div class="font12 text-center purple">11:00 PM</div>
            <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
            
        </div>
        <div style="height:150px;width:150px;border:solid 1px #72175a;margin:10px;" class="pull-left"></div>
        <div style="height:150px;width:150px;border:solid 1px #72175a;margin:10px;" class="pull-left"></div>
        <div style="height:150px;width:150px;border:solid 1px #72175a;margin:10px;" class="pull-left"></div>
        <div style="height:150px;width:150px;border:solid 1px #72175a;margin:10px;" class="pull-left"></div>
        <div style="height:150px;width:150px;border:solid 1px #72175a;margin:10px;" class="pull-left"></div>
        <div style="height:150px;width:150px;border:solid 1px #72175a;margin:10px;" class="pull-left"></div>
    	
    </div>
    
    <div style="width:1200px;margin-left:auto;margin-right:auto;height:200px">
    
    	<div style="width:250px;height:600px;border-right:solid 1px #ABABAB" class="pull-left text-center">
        	<span>Other tiles</span>
        </div>
        <div style="width:250px;height:600px;border-left:solid 1px #ABABAB" class="pull-right text-center">
        	<span>Other tiles</span>
        </div>
    	<div style="height:150px;width:300px;border:solid 1px #72175a;margin:25px;" class="pull-left">
        	<div class="font14 text-center purple"><strong>Other Events</strong></div>
			<div class="font12 text-center purple">2-JUL-2014</div>
            <div class="font12 text-center purple">11:00 PM</div>
            <div class="font12 text-center purple">@ Sahara Mall,Delhi</div>
            Background is according to event theme.
        </div>
        <div style="height:150px;width:300px;border:solid 1px #72175a;margin:25px;" class="pull-left"></div>
        <div style="height:150px;width:300px;border:solid 1px #72175a;margin:25px;" class="pull-left"></div>
        <div style="height:150px;width:300px;border:solid 1px #72175a;margin:25px;" class="pull-left"></div>
        
    	
    </div>
    
</body>
</html>

