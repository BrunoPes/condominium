<style type="text/css">
    #namesCol{
        font-size: 15px;
        padding: 0;
        padding-bottom: 13px;
        margin-top: 5px;
    }

    .noSelect {        
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>

<head>
    <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/fullcalendar/fullcalendar.css' />
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>
    <link src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css">
    <link src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.print.css">
    <script src='<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/fullcalendar/fullcalendar.js'></script>
    <script src='<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/fullcalendar/locale/pt-br.js'></script>


    <script type="text/javascript">
        var zindex = 100;        
    	var espacos = <?= json_encode($espacos)?>;
    	var reservando = [];
    	var currentSpace = "";

    	spaceName = (name,id) => {
    		html  = '<div name="'+name+'" id="'+id+'" class="draggable fc-event-container spaces" style="z-index:'+(zindex--)+';cursor:-webkit-grab">';
    		html += '<a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end"><div class="fc-content"><span class="fc-title">';
    		html += name + '</span></div></a></div>';

    		$("#namesCol").append(html);
    	}

    	clickedSpace = event => {
            let space = $(event.currentTarget);
            // space.find(".fc-content").css({"cursor": "-webkit-grab"});
    		currentSpace = space.attr('name');
            console.log(currentSpace);
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
            let userId   = "<?= $userId ?>";
        	let reservas = <?= json_encode($reservas)?>;
        	let idCounter = 0;
        	let arrayReservas = [];            

        	$(espacos).each((i,ele) => spaceName(ele.nomeEspaco, ele.id));
        	$(reservas).each( (i,ele) => {
        		arrayReservas.push({"title": ele.nomeEspaco, "start": ele.dataInicio, 
                                    "color": ele.usuarioId.trim()==userId ?  "#5cb85c" : ""});
        	});

            $(".spaces").on("dragstart", event => clickedSpace(event));
            // $(".spaces").on("click", e => $(e.target).find(".fc-content").css({"cursor": "-webkit-grab"}));

            $('#calendar').fullCalendar({
                defaultDate: new Date(),
                height: 700,
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
							id: idCounter,
							title: currentSpace,
							start: date.format("YYYY-MM-DD"),
							color: "rgb(220,200, 55)",
							editable: true,
							dragStart: _ => {
								console.log("HU3 BR TEST!!!!");
							},
						};
						spaceTitle = newEv.title.toLowerCase();
						spaceId = $("#namesCol").children().filter((i, ele) => $(ele).attr('name').toLowerCase() == spaceTitle).attr('id');
						reservando.push({espacoId: parseInt(spaceId), dataInicio: newEv.start, id: idCounter++});

						$("#calendar").fullCalendar('renderEvent', newEv);
                	}
                },
            });

            $("#saveEvents").on('click', _ => {
	    		console.log("Save");
	    		$.ajax({
					method: "POST",
					url: "create",
					data: { 'reservas': reservando }
				}).done(function( msg ) {
					location.reload();
				});
	    	});

	    	$("#removeEvents").on('dragStart', _ => {

	    	});

            $(".draggable").draggable({
                revert: true,
                revertDuration: 0
            });
        });
    </script>
</head>

<div class="row .noSelect" style="text-align: center; margin-top: -20px">
	<div class="col-md-12" style="border-bottom: 2px solid #EDD; margin-top: -8px;">
		<div class="col-md-10">
    		<h1>Reservas</h1>
    	</div>
    	<div class="col-md-2">
    		<div style="padding-top: 25px;">
				<button id="saveEvents" style="width: 147px" type="button" class="btn btn-success">Salvar</button>
			</div>
    	</div>
    </div>
    <div class="col-md-12" style="margin-top: 10px">
	    <div class="col-md-2" style="background-color: #eee;border-radius: 9px; border: solid #ccc 1px; margin-top: 45px">
	    	<h3>Espaços</h3>
	    	<div id="namesCol">
	    	</div>
		</div>
	    <div class="col-md-10" style="">
	        <div id='calendar'></div>
	    </div>
	</div>
</div>