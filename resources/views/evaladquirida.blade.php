<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>
<style>
    * {
        margin: 0.1%;
    }

    .validado {
        color: green;
        font-size: 22px;
    }

    /* Styles for the container */
    .border {
        border: 1px solid #e2e8f0;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .shadow {
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .p-4 {}

    /* Styles for text */
    .text-center {
        text-align: center;
    }

    .font-semibold {
        font-weight: 600;
    }

    .text-xl {
        font-size: 1.25rem;
    }

    .m-4 {}

    /* Styles for data container */
    .data-container {}

    .data-label {
        font-weight: 600;
    }

    .data-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        border: 1px solid #e2e8f0;
    }

    .data-field {
        border: 1px solid #e2e8f0;
    }

    .field-label {
        font-weight: 600;
    }

    .flex {
        display: flex;
    }

    /* Add more styles for other sections as needed */
</style>

<body>
    <div class="border rounded-lg shadow " style="padding: 4%;">
        <div class="text-center border">
            <h1 class="font-semibold text-xl border ">
                SECRETARÍA DE SALUD DE MICHOACÁN <br />
                LABORATORIO ESTATAL DE SALUD PÚBLICA <br />
                F EZ 005-1 EVALUACIÓN DE LA CAPACITACIÓN ADQUIRIDA
            </h1>
            <div class="border">
                <p class="data-label">Datos del Evaluado</p>

                <div class="data-grid">
                    <div class="data-field">
                        <p>
                            <span class="field-label">Nombre completo: </span>{{ $evalid->nombre_evaluado }}
                        </p>
                    </div>
                    <div class="data-field">
                        <p>
                            <span class="field-label">Puesto del evaluado: </span>{{ $evalid->puesto_evaluado }}
                        </p>
                    </div>
                    <div class="data-field">
                        <p>
                            <span class="font-semibold">Área a la que pertenece:
                            </span>{{ $evalid->area_evaluado }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center shadow border rounded-lg m-2 text-center">
                <p class="p-2 font-semibold text-lg">Datos del Evaluador</p>
                <div class="data-grid">
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p>
                            <span class="font-semibold">Nombre completo: </span>{{ $evalid->nombre_completo_evaluador }}
                        </p>
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p>
                            <span class="font-semibold">Puesto del evaluador: </span>{{ $evalid->puesto_evaluador }}
                        </p>
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p>
                            <span class="font-semibold">Firma del evaluador:
                            </span>
                            <span class="validado">
                                VALIDADO</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col">
                <p class="font-semibold">
                    Nombre de la capacitación a evaluar:
                </p>
                <p>{{ $evalid->nombre_capacitacion }}</p>
            </div>

            <div class="border shadow">
                <h1 class="font-semibold text-xl">RESULTADOS</h1>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <p for="evaluacion1">Mayor destreza en el desarrollo de sus actividades:
                            {{ $evalid->evaluacion1 }}</p>
                    </div>

                </div>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <p for="evaluacion2">Nivel de conocimientos adquiridos: {{ $evalid->evaluacion2 }}</p>
                    </div>

                </div>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <p for="evaluacion3">Mejora en la forma en que desempeña sus
                            actividades: {{ $evalid->evaluacion3 }}</p>
                    </div>

                </div>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <p for="evaluacion4">Utilidad de la capacitación adquirida para la
                            realización de su trabajo: {{ $evalid->evaluacion4 }}</p>
                    </div>

                </div>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <p for="evaluacion5">Demuestra una aplicación de los conocimientos
                            adquiridos: {{ $evalid->evaluacion5 }}</p>
                    </div>

                </div>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <p for="evaluacion6">Difunde el conocimiento adquirido: {{ $evalid->evaluacion6 }}</p>
                    </div>

                </div>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <p for="evaluacion7">Muestra un dominio sobre el conocimiento adquirido:
                            {{ $evalid->evaluacion7 }}</p>
                    </div>

                </div>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <p for="evaluacion8">Aceptación de la capacitación para mejorar sus
                            actividades: {{ $evalid->evaluacion8 }}</p>
                    </div>

                </div>
                <div class="flex gap-4 justify-center items-center">
                    <p for="resultado" class="font-semibold">Resultado:
                    </p>
                    <p>
                        {{ $evalid->resultado }} - {{ $evalid->interpretacion_resultado }}
                    </p>
                </div>
                <div class="text-center">
                    <p>
                        <span class="font-semibold">Malo</span> de 1 a 8,
                        <span class="font-semibold">Deficiente</span> de 9 a
                        16, <span class="font-semibold">Regular</span> de 17
                        a 24, <span class="font-semibold">Bueno</span> de 25
                        a 32,
                        <span class="font-semibold">Muy bueno</span> de 33 a
                        40
                    </p>
                </div>
            </div>

            <div
                class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col justify-center gap-4 items-center">
                <div class="flex justify-center items-center gap-4">
                    <label for="necesidad_capacitacion">¿Usted ha detectado en el personal evaluado alguna
                        necesidad de capacitación?: {{ $evalid->necesidad_capacitacion }}</label>
                </div>
                <label for="descripcion_necesidad">De responder si en la pregunta anterior describa cual
                    es la necesidad:</label>
                <p>{{ $evalid->descripcion_necesidad }}</p>
                <div class="flex justify-center items-center gap-4">
                    <label for="calificacion">Calificación obtenida en la evaluación /examen del
                        curso (cuando aplique):</label>
                    <p>{{ $evalid->calificacion }}</p>
                </div>
            </div>

            <div
                class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col justify-center gap-4 items-center">
                <p>Validación por coordinación de enseñanza:</p>
                <p class="validado">VALIDADO</p>

            </div>
        </div>
    </div>
</body>

</html>
