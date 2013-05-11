
$(function(){
	$('#pcalendar').fullCalendar({
		header:{
			right:  'month,agendaWeek,agendaDay',
		    center: 'title',
		    left:  'today prev,next'
		},
		weekMode:'variable',
		dayClick: function(a) {
	        alert('a day has been clicked!'+a);
	    },
	    selectable:true,
	    selectHelper:true
    });
});