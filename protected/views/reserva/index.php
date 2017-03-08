<?php
/* @var $this ReservaController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
// 	'Reservas',
// );

// $this->menu=array(
// 	array('label'=>'Criar reserva', 'url'=>array('create')),
// 	array('label'=>'Manage Reserva', 'url'=>array('admin')),
// );
?>

<head>
    <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/fullcalendar/fullcalendar.css' />
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>
    <link src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css">
    <link src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.print.css">
    <script src='<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/fullcalendar/fullcalendar.js'></script>
    <script src='<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/fullcalendar/locale/pt-br.js'></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $(".draggable").draggable({
                revert: true,      // immediately snap back to original position
                revertDuration: 0  //
            });

            $('#calendar').fullCalendar({
                defaultDate: new Date(),
                height: 800,
                locale: "pt-br",
                titleFormat: 'MMMM',
                droppable: true,
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
                drop: date => {
                    alert("Dropped on " + date.format());
                },
            });

        });
    </script>
</head>

<div class="row" style="text-align: center; margin-top: -20px">
    <h1>Reservas</h1>
    <div class="draggable col-md-2" data-duration="03:00" style="background-color: blue; color:white;"/>Hu3hu3byrs</div>
    <div class="col-md-10" style="margin-left: 8%;">
        <div id='calendar'></div>
    </div>
</div>

