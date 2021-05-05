
!function($) {
    "use strict";
    var CalendarApp = function() {
        //this.$body = $("body"),
        this.$modal = $('#appointment-modal'),
        this.$event = ('#external-events div.external-event'),
        this.$calendar = $('#all_doc_booking'),
        //this.$doc_id = $('#calendar').attr('doc-id'),
        this.$extEvents = $('#external-events'),
        this.$calendarObj = null
    };
    

    CalendarApp.prototype.onSelect = function (date) {
        if($('#calendar').attr('user-id') != 0) {
            $.ajax({  
                url:'pages/book_appointment_home',  
                type: 'post',
                data:{doc_id:$('#calendar').attr('doc-id'),date:new Date(date)},  
                success:function(data){ 
                    $('.home-appointment_modal_body').html(data);
                    $('#home-appointment-modal').modal({
                        backdrop: 'static'
                    });
                }  
            }); 
        } else {            
            $('#loginModal').modal({
                backdrop: 'static'
            });
        }
    }
    /* Initializing */
    CalendarApp.prototype.init = function() {
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar( {
            slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
            minTime: '08:00:00',
            maxTime: '19:00:00',  
            defaultView: 'month',  
            handleWindowResize: true,   
            height: $(window).height() - 200,   
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },            
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            select: function (date) { $this.onSelect(date); }

        });
    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
    
}(window.jQuery),


//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);