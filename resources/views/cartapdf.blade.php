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
                margin-top: 0.2em;
                margin-bottom: 0.2em; 
            }
             table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
                font-size: 9px; /* Adjust the font size as needed */
            }

              .grid-container {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 10px;
                justify-items: center; /* Change to center instead of start */
            }

            .grid-item {
                margin-bottom: 10px;
                text-align: left; /* Align text to the left */
            }

            .grid-item span {
                font-weight: bold;
            }
                </style>
            </head>
            <body>
                <h3>SECRETARÍA DE SALUD DE MICHOACÁN</h3>
                <h3>DIRECCIÓN DE SERVICIOS DE SALUD</h3>
                <h3>DEPARTAMENTO DE ENSEÑANZA</h3>
                <h3>CARTA DESCRIPTIVA PARA ACTIVIDADES DE CAPACITACIÓN</h3>
                
                <div style="text-align: center;">

                <div class="grid-container">
                    <table style="width: 100%; margin-bottom: 8px;">
                    <tr style="">            
                        <td>
                            <div class="grid-item">
                                <span>Nombre de la capacitación:</span> {{ $curso->nombre }}
                            </div>
                        </td>
                        <td>
                            <div class="grid-item">
                                <span>Número consecutivo:</span> {{ $curso->numero_consecutivo }}
                            </div>
                        </td>
                    </tr>   
                    <tr>
                        <td>         
                            <div class="grid-item">
                                <span>Modalidad a realizar:</span> {{ $curso->modalidad }}
                            </div>
                        </td>
                        <td>
                            <div class="grid-item">
                                <span>Tipo de capacitación:</span> {{ $curso->tipo }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="grid-item">
                                <span>Responsable del evento:</span> {{ $curso->nombre_del_responsable }}
                            </div>
                        </td>
                        <td>
                            <div class="grid-item">
                                <span>Coordinación o área:</span> {{ $curso->coordinacion }}
                            </div>
                        </td>
                    </tr>            
                    <tr>    
                        <td>
                            <div class="grid-item">
                                <span>Personal al que va dirigido:</span> {{ $curso->dirigido }}
                            </div>
                        </td>
                        <td>
                            <div class="grid-item">
                                <span>N° de asistentes esperados:</span> {{ $curso->numero_de_asistentes }}
                            </div>
                        </td>
                    </tr>    
                    <tr>
                        <td>
                            <div class="grid-item">
                                <span>Horas teóricas:</span> {{ $curso->horas_teoricas }}
                            </div>
                        </td>
                        <td>
                            <div class="grid-item">
                                <span>Horas prácticas:</span> {{ $curso->horas_practicas }}
                            </div>
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <div class="grid-item">
                                <span>Categoría:</span> {{ $curso->categoria }}
                            </div>
                        </td>
                        <td>
                            <div class="grid-item">
                                <span>Lugar:</span> {{ $curso->auditorio }}
                            </div>
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <div class="grid-item">
                                <span>Fecha de inicio:</span> {{ date('Y-m-d h:i A', strtotime($curso->fecha_de_inicio)) }}
                            </div>
                        </td>
                        <td>
                            <div class="grid-item">
                                <span>Fecha de término:</span> {{ date('Y-m-d h:i A', strtotime($curso->fecha_de_terminacion)) }}
                            </div>
                        </td>
                    </tr>        
                    <tr>    
                        <td>
                            <div class="grid-item">
                                <span>Objetivo general del evento:</span> {{ $curso->objetivo_general }}
                            </div>
                        </td>
                        <td>
                            <div class="grid-item">
                                <span>Forma de evaluación:</span> {{ $curso->forma_de_evaluacion }}
                            </div>
                        </td>
                    </tr>        
                    <tr>
                        <td>
                            <div class="grid-item">
                                <span>Porcentaje de asistencia requerido para acreditar el curso:</span> {{ $curso->porcentaje_asistencia }}
                            </div>
                        </td>
                        <td>
                            <div class="grid-item">
                                <span>Calificación requerida para acreditar el curso:</span> {{ $curso->calificacion_requerida }}
                            </div>
                        </td>
                    </tr>
                    <tr>    
                        <td colspan="2">
                            <div class="grid-item">
                                <span>Requiere evaluación de la capacitación adquirida (antes de los 30 días hábiles):</span> {{ $curso->evaluacion_adquirida }}
                            </div>
                        </td>
                    </tr>
                </div>
                </table>
                </div>

                    <table>
                <thead>
                    <tr>
                        <th>Tema</th>
                        <th>Fecha y hora</th>
                        <th>Contenido temático</th>
                        <th>Objetivos</th>
                        <th>Técnica</th>
                        <th>Responsable</th>
                        <th>Horas teóricas</th>
                        <th>Horas prácticas</th>
                        <th>Referencia</th>
                        <!-- Add other headers as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($temas as $tema)
                    <tr>
                        <td>{{ $tema->numero }}</td>
                        <td>{{ date('Y-m-d h:i A', strtotime($tema->fechayhora)) }}</td>
                        <td>{{ $tema->contenido_tematico }}</td>
                        <td>{{ $tema->objetivos }}</td>
                        <td>{{ $tema->tecnica }}</td>
                        <td>{{ $tema->responsable }}</td>
                        <td>{{ $tema->horas_teoricas }}</td>
                        <td>{{ $tema->horas_practicas }}</td>
                        <td>{{ $tema->referencia }}</td>
                        <!-- Add other data cells as needed -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </body>
</html>
