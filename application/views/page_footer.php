
    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">                
                    <marquee behavior="scroll" direction="left">
                        Dynamic footer for every page
                    </marquee>
                </div>
                <div class="col-sm-6 text-center">     
                    <h5><span id="time" class="text-primary"></h5>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#time').html(moment().format('MMMM Do YYYY, h:mm:ss a'));                  
        setInterval(function(){ 
            jQuery('#time').html(moment().format('MMMM Do YYYY, h:mm:ss a'));                
        }, 1000);

    });
    $('.reply').on('click',function(){  
        var review_id=$(".r_id").val();
        var reply=$(".checking").val();
        $.ajax({  
        url:'Reply/add_reply_modal',  
        type: 'post',
        data:{'review_id':review_id,
                'reply':reply},
        
        success:function(data){  
            // $('.Bmedium-modal-title').text("Add Reply");  
            // $('#mediumModal_body').html(data);  
            // $('#mediumModal').modal("show");  
            console.log(data)
        }  
    });  

    });



    </script>
