<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Carta descriptiva</title>
        <style>
            *{
                font-family: Arial, Helvetica, sans-serif;
            }
            span{
                font-weight: bold;
            }
            h3{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h3>SECRETARÍA DE SALUD DE MICHOACÁN</h3>
        <h3>DIRECCIÓN DE SERVICIOS DE SALUD</h3>
        <h3>DEPARTAMENTO DE ENSEÑANZA</h3>
        <h3>CARTA DESCRIPTIVA PARA ACTIVIDADES DE CAPACITACIÓN</h3>
        <p><span>Nombre de la capacitación: </span>{{ $curso->nombre }}</p>
        <p><span>Número consecutivo: </span>{{ $curso->numero_consecutivo }}</p>
        <p><span>Modalidad a realizar: </span>{{ $curso->modalidad }}</p>
        <p><span>Tipo de capacitación: </span>{{ $curso->tipo }}</p>
        <p><span>Responsable del evento: </span>{{ $curso->nombre_del_responsable }}</p>
        <p><span>Coordinación o área: </span>{{ $curso->coordinacion }}</p>
        <p><span>Personal al que va dirigido: </span>{{ $curso->dirigido }}</p>
        <p><span>N° de asistentes esperados: </span>{{ $curso->numero_de_asistentes }}</p>
        <p><span>Horas teóricas: </span>{{ $curso->horas_teoricas }}</p>
        <p><span>Horas prácticas: </span>{{ $curso->horas_practicas }}</p>
        <p><span>Categoría: </span>{{ $curso->categoria }}</p>
        <p><span>Lugar: </span>{{ $curso->auditorio }}</p>
        <p><span>Fecha de inicio: </span>{{ $curso->fecha_de_inicio }}</p>
        <p><span>Fecha de término: </span>{{ $curso->fecha_de_terminacion }}</p>
        <p><span>Objetivo general del evento: </span>{{ $curso->objetivo_general }}</p>
        <p><span>Forma de evaluación: </span>{{ $curso->forma_de_evaluacion }}</p>
        <p><span>Porcentaje de asistencia requerido para acreditar el curso: </span>{{ $curso->porcentaje_asistencia }}</p>
        <p><span>Calificación requerida para acreditar el curso: </span>{{ $curso->calificacion_requerida }}</p>
        <p><span>Requiere evaluación de la capacitación adquidida (antes de los 30 días hábiles): </span>{{ $curso->evaluacion_adquirida }}</p>
        @foreach($temas as $tema)
        <div>
            <h3>Tema: {{ $tema->numero }}</h3>
            <p><span>Fecha y hora: </span>{{ $tema->fechayhora }}</p>
            <p><span>Contenido temático: </span>{{ $tema->contenido_tematico }}</p>
            <p><span>Objetivos: </span>{{ $tema->objetivos }}</p>
            <p><span>Técnica: </span>{{ $tema->tecnica }}</p>
            <p><span>Responsable: </span>{{ $tema->responsable }}</p>
            <p><span>Horas teóricas: </span>{{ $tema->horas_teoricas }}</p>
            <p><span>Horas prácticas: </span>{{ $tema->horas_practicas }}</p>
            <p><span>Referencia: </span>{{ $tema->referencia }}</p>
            <!-- ... other tema fields ... -->
        </div>
        @endforeach

    </body>
</html>
