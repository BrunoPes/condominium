<head>
    <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/fullcalendar/fullcalendar.css' />
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>
    <link src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css">
    <link src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.print.css">
    <script src='<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/fullcalendar/fullcalendar.js'></script>
    <script src='<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/fullcalendar/locale/pt-br.js'></script>


    <script type="text/javascript">
    	var reservando = [];
    	var currentSpace = "";

    	$("#saveEvents").on('click', function(a, b) {
    		console.log("asd");
    		$.ajax({
				method: "POST",
				url: "reserva/create",
				data: { 'reservas': reservando }
			}).done(function( msg ) {
				alert("Data Saved");
			});
    	});

    	spaceName = name => {
    		html  = '<div name="'+name+'" onDragStart={clickedSpace(event)} style="width:130px;" class="draggable fc-event-container">';
    		html += '<a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end"><div class="fc-content"> <span class="fc-title">';
    		html += name + '</span></div></a></div>';

    		$("#namesCol").append(html);
    	}

    	clickedSpace = (e) => {    		
    		currentSpace = $(e.currentTarget).attr('name');    		
    	}

    	filterSpaceDay = (currentDate, arrayReserves) => {
    		let date = currentDate.format("YYYY-MM-DD");
    		let spacesOnDate = [];
    		let existSpace = false;
    		$(arrayReserves).filter((i, ele) => ele['start'].format('YYYY-MM-DD') == date).each((i, ele) => {    			
    			if(ele.title.trim() == currentSpace)
    				existSpace = true;
    		});

    		return existSpace;
    	}

        $(document).ready(function() {
        	let espacos  = <?= json_encode($espacos)?>;
        	let reservas = <?= json_encode($reservas)?>;
        	let arrayReservas = [];        	

        	$(reservas).each( (i,ele) => {
        		arrayReservas.push({"title": ele.nomeEspaco, "start": ele.dataInicio});
        	});

            $('#calendar').fullCalendar({
                defaultDate: new Date(),
                height: 800,
                locale: "pt-br",
                titleFormat: 'MMMM',
                droppable: true,
                events: arrayReservas,
                buttonText: {
                    today:    'Hoje',
                    month:    'Mês',
                    week:     'Semana',
                    day:      'Dia',
                    list:     'list'
                },
                buttonIcons: {
                    prev: 'left-single-arrow',
                    next: 'right-single-arrow',
                    prevYear: 'left-double-arrow',
                    nextYear: 'right-double-arrow'
                },
                header: {
                    left:   'prev,next, today',
                    center: 'title',
                    right:  'month,basicWeek,basicDay',
                },
                drop: (date, event) => {
                	events = $("#calendar").fullCalendar('clientEvents');
                	if(!filterSpaceDay(date, events)) {
	                	var newEv = {
							title: currentSpace,
							start: date.format("YYYY-MM-DD"),
							color: "rgb(220,200, 55)",
						};
						$("#calendar").fullCalendar('renderEvent', newEv);
						reservando.push({'nomeEspaco': newEv.title, 'dataInicio': newEv.start});
                	}
                },                
            });

            $(espacos).each((i,ele) => spaceName(ele.nomeEspaco));

            $(".draggable").draggable({
                revert: true,
                revertDuration: 0
            });
        });
    </script>
</head>

<div class="row" style="text-align: center; margin-top: -20px">
	<div>
    	<h1>Reservas</h1>
    	<button id="saveEvents" style="float: right; margin-right: 15px;" type="button" class="btn btn-succes">Save</button>
    </div>
    <div id="namesCol" class="col-md-2" style="font-size: 15px;">
    	
    </div>
    <div class="col-md-10" style="">
        <div id='calendar'></div>
    </div>
</div>