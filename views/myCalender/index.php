<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Events Listing</h3>
            	
            </div>
            <div class="box-body">
              

  <script>

    $(document).ready(function () {
		var person_id = '<?php echo"$p_id"; ?>';
		var location_id = '<?php echo"$location"; ?>';
	//alert(location_id);
      function fmt(date) {
        return date.format("YYYY-MM-DD HH:mm");

      }

      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();

      var calendar = $('#calendar1').fullCalendar({
        editable: true,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },

        // events: "http://localhost/Canteen/index.php/MyCalender/events",
		events: function(start, end, timezone, callback) {
        $.ajax({
            url: 'http://localhost/Canteen/index.php/MyCalender/events',
            dataType: 'json',
			crossDomain: true,
             type: "POST",
            success: function(doc) {
                var events = [];
				events = doc;
                callback(events);
            }
        });
    },

        // Convert the allDay from string to boolean
        eventRender: function (event, element, view) {
          if (event.allDay === 'true') {
            event.allDay = true;
          } else {
            event.allDay = false;
          }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
          var title = prompt('Event Description:');
          if (title) {
            var start = fmt(start);
            var end = fmt(end);
            $.ajax({
              url: 'http://localhost/Canteen/index.php/MyCalender/add_events',
              data: 'title=' + title + '&start=' + start + '&end=' + end+'&p_id='+person_id+'&loc_id='+location_id,
              type: "POST",
              success: function (json) {
                alert('Added Successfully');
              },
			  error:function (json) {
              alert("You don't have permissions to perform this task !!!");
			  location.reload();
			  return false;
            }
            });
            calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
            );
          }
          calendar.fullCalendar('unselect');
        },

        editable: true,
        eventDrop: function (event, delta) {
          var start = fmt(event.start);
          var end = fmt(event.end);
          $.ajax({
            url: 'http://localhost/Canteen/index.php/MyCalender/update_events',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
              alert("Updated Successfully");
            }
          });
        },
        eventClick: function (event) {
          var decision = confirm("Do you want to remove event?");
          if (decision) {
			//alert(event.id);
            $.ajax({
              url: 'http://localhost/Canteen/index.php/MyCalender/delete_events',
              data: 'id=' + event.id+'&p_id='+person_id,
			  type: "POST",
              success: function (json) {
                $('#calendar1').fullCalendar('removeEvents', event.id);
                alert("Removed Successfully");
				 
              },
			  error:function (json) {
              alert("You don't have permissions to perform this task !!!");
            }
            });
			
          }

        },
        eventResize: function (event) {
          var start = fmt(event.start);
          var end = fmt(event.end);
          $.ajax({
            url: 'http://localhost/fullcalendar/update_events.php',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
              alert("Updated Successfully");
            }
          });

        }

      });

    });

  </script>
  <style>

   /* body {
      margin-top: 40px;
      font-size: 14px;
      font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;

    }*/

    #calendar1 {
      width: 600px;
      margin: 0 auto;
    }

  </style>

<div id='calendar1'></div>
                                
            </div>
        </div>
    </div>
</div>
