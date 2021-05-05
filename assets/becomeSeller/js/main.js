jQuery( document ).ready(function( $ ){
	$("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 300,
        labels: {
            next: "Continue",
            previous: "Back",
            finish: "Submit to register"
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            if ( newIndex >= 1 ) {
                $('.steps ul li:first-child a img').attr('src','../assets/becomeSeller/images/step-1.png');
            } else {
                $('.steps ul li:first-child a img').attr('src','../assets/becomeSeller/images/step-1-active.png');
            }

            if ( newIndex === 1 ) {
                $('.steps ul li:nth-child(2) a img').attr('src','../assets/becomeSeller/images/step-2-active.png');
            } else {
                $('.steps ul li:nth-child(2) a img').attr('src','../assets/becomeSeller/images/step-2.png');
            }

            if ( newIndex === 2 ) {
                $('.steps ul li:nth-child(3) a img').attr('src','../assets/becomeSeller/images/step-3-active.png');
            } else {
                $('.steps ul li:nth-child(3) a img').attr('src','../assets/becomeSeller/images/step-3.png');
            }

            if ( newIndex === 3 ) {
                $('.steps ul li:nth-child(4) a img').attr('src','../assets/becomeSeller/images/step-4-active.png');
                $('.actions ul').addClass('step-4');
            } else {
                $('.steps ul li:nth-child(4) a img').attr('src','../assets/becomeSeller/images/step-4.png');
                $('.actions ul').removeClass('step-4');
            }

            return true; 
        },
        onFinishing: function (event, currentIndex)
        {
            document.getElementById("wizard").submit(); 
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function(){      
    	$("#wizard").steps('next');
    })
    $('.backward').click(function(){
        $("#wizard").steps('previous');
    });
    // Create Steps Image
    $('.steps ul li:first-child').append('<img src="../assets/becomeSeller/images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../assets/becomeSeller/images/step-1-active.png" alt=""> ').append('<span class="step-order">Business Info</span>');
    $('.steps ul li:nth-child(2').append('<img src="../assets/becomeSeller/images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../assets/becomeSeller/images/step-2.png" alt="">').append('<span class="step-order">Location</span>');
    $('.steps ul li:nth-child(3)').append('<img src="../assets/becomeSeller/images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../assets/becomeSeller/images/step-3.png" alt="">').append('<span class="step-order">Links</span>');
    $('.steps ul li:last-child a').append('<img src="../assets/becomeSeller/images/step-4.png" alt="">').append('<span class="step-order">Category</span>');
    // Count input 
    $(".quantity span").on("click", function() {

        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.hasClass('plus')) {
          var newVal = parseFloat(oldValue) + 1;
        } else {
          if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
            } else {
            newVal = 0;
          }
        }
        
        $button.parent().find("input").val(newVal);
    });
    //contact prson select
    $('input:radio[name="contactperson"]').on("click", function() {
        var inputValue = $(this).attr("value");
        if(inputValue == 'other'){
            $("#contact_show123").css("display","block");
        } else {
            $("#contact_show123").css("display","none");
        }
    });

});
