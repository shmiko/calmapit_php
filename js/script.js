var year=2016;
var month=3;
var day=10;
$(document).ready(function() {

    $('#maximage').maximage({
        cycleOptions: {
            fx: 'fade',
			
            speed: 2000, 
            timeout: 4000
        },
        onFirstImageLoaded: function(){
            jQuery('#cycle-loader').hide();
            jQuery('#maximage').fadeIn('fast');
                        
        },
		
        cssBackgroundSize: true 
    });
    
    
  
        
    $('#counter').countdown({
        until:new Date("2016-Mar-1")
        });
	
    $("#side-button-about").pageslide({
        direction: "right", 
        modal: true
    });
    $("#side-button-new").pageslide({
        direction: "left", 
        modal: true
    });
          
    $('#clouds').pan({
        fps: 30, 
        speed: 0.5, 
        dir: 'right', 
        depth: 70
    });
	
	$('#plane').pan({
        fps: 10, 
        speed: 0.5, 
        dir: 'right', 
        depth: 70
    });
     
     
    $('[placeholder]').focus(function() {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
            input.val('');
        //  input.removeClass('placeholder');
        }
    }).blur(function() {
        var input = $(this);
        if (input.val() == '' || input.val() == input.attr('placeholder')) {
            input.addClass('placeholder');
            input.val(input.attr('placeholder'));
        }
    }).blur();
    $('[placeholder]').parents('form').submit(function() {
        $(this).find('[placeholder]').each(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
            }
        })
    });
      
      
      
    //  triggers contact form validation
    var formStatus=$(".email-holder form").validate();

    //sending contact form
    $(".email-holder form").submit(function(e){
   
        e.preventDefault();
     
        if(formStatus.errorList.length==0 )
        { 
            $('.email-field').fadeOut(function(){
                $('#loading').css('visibility','visible');
                $.post('submit.php',$(".email-holder form").serialize(),
				
                    function(data){
					
                        $(".email-field input,.email-field textarea").not('.submit').val('');
                                 
                        $('.message-box').html(data);
						
						
                        $('#loading').css('visibility','hidden');
                        $(".email-field").fadeIn();
                    }
				
                    ); 
         
      
            });
        }
      
			
			
			
    })
 
});


