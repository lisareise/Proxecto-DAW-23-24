# INCIDENCIAS E TAREFAS
- [INCIDENCIAS E TAREFAS](#incidencias-e-tarefas)
  - [1- Incidencias](#1--incidencias)
  - [2- Tarefas](#2--tarefas)

## 1- Incidencias

Unha das principais incidencias, e a que levou máis tempo, foi a de mostrar os erros en cada un dos formularios usando validacións con php. Xa que quería que se visen os erros encima de cada input, o máis sinxelo houbese sido facer as validacións con JavaScript, pero como xa tiña feitas todas as validacións busquei e encontrei a forma de facer peticións con Javascript ao arquivo de validacións e insertar os erros en cada un dos inputs que estivesen mal insertados.

A outra gran incidencia foi poder recoller os pesos dos pacientes e traducilos na gráfica.
Para recoller os datos dos pesos que se rexistraban na base de datos sempre se iba a necesitar o id de cada paciente, e ademáis o que se quería era que aínda que non se insertase un peso por mes, o ideal sería que se viran todos os meses. Acabouse logrando o resultado facendo unha función asíncrona e coa definición dun obxecto "months" que mapea os doce meses do ano abreviados a números do 1 ao 12.
Xa que necesitamos o id do usuario mandámolo no body da solicitude.
O chart_data crea un array de doce elementos con valores de null e itérase sobre a data os pares de valores que devolve (peso e mes), como son representacións de números necesítase parsealos.
Por último colócanse os pesos no índice correspondente do array, como os arrays empezan en 0 ponse "mes-1".
O resultado final é un obxecto con unha lista de nomes dos meses e o array cos datos que deben ser representados na gráfica.

## 2- Tarefas
