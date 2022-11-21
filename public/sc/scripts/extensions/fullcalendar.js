/*=========================================================================================
    File Name: fullcalendar.js
    Description: Fullcalendar
    --------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Template
    Version: 2.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


$(document).ready(function(){



		$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#fc-event-colors').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/'
				}
			]
		});
		
	});



	/* initialize the external events
	-----------------------------------------------------------------*/

	$('#external-events .fc-event').each(function() {

		// Different colors for events
        $(this).css({'backgroundColor': $(this).data('color'), 'borderColor': $(this).data('color')});

		// store data so the calendar knows to render an event upon drop
		$(this).data('event', {
			title: $.trim($(this).text()), // use the element's text as the event title
			color: $(this).data('color'),
			stick: true // maintain when user navigates (see docs on the renderEvent method)
		});

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});

	});




	// build the language selector's options
	// build the locale selector's options
    $.each($.fullCalendar.locales, function(localeCode) {
      $('#lang-selector').append(
        $('<option/>')
          .attr('value', localeCode)
          .prop('selected', localeCode == initialLocaleCode)
          .text(localeCode)
      );
    });

    // when the selected option changes, dynamically change the calendar option
    $('#lang-selector').on('change', function() {
      if (this.value) {
        $('#fc-languages').fullCalendar('option', 'locale', this.value);
      }
    });


	/****************************************
	*				Time Zones				*
	****************************************/
	$('#fc-timezones').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		defaultDate: '2016-06-12',
		editable: true,
		selectable: true,
		eventLimit: true, // allow "more" link when too many events
		events: {
			url: '../../../app-assets/data/fullcalendar/php/get-events.php',
			error: function() {
				$('#script-warning').show();
			}
		},
		loading: function(bool) {
			$('#loading').toggle(bool);
		},
		eventRender: function(event, el) {
			// render the timezone offset below the event title
			if (event.start.hasZone()) {
				el.find('.fc-title').after(
					$('<div class="tzo"/>').text(event.start.format('Z'))
				);
			}
		},
		dayClick: function(date) {
			console.log('dayClick', date.format());
		},
		select: function(startDate, endDate) {
			console.log('select', startDate.format(), endDate.format());
		}
	});

	// load the list of available timezones, build the <select> options
	$.getJSON('../../../app-assets/data/fullcalendar/php/get-timezones.php', function(timezones) {
		$.each(timezones, function(i, timezone) {
			if (timezone != 'UTC') { // UTC is already in the list
				$('#timezone-selector').append(
					$("<option/>").text(timezone).attr('value', timezone)
				);
			}
		});
	});

	// when the timezone selector changes, dynamically change the calendar option
	$('#timezone-selector').on('change', function() {
		$('#fc-timezones').fullCalendar('option', 'timezone', this.value || false);
	});
});