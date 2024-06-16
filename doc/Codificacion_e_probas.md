# FASE DE CODIFICACIÓN E PROBAS

- [FASE DE CODIFICACIÓN E PROBAS](#fase-de-codificación-e-probas)
  - [1- Codificación](#1--codificación)
  - [2- Prototipos](#2--prototipos)
  - [3- Innovación](#3--innovación)
    - [Swiper.js](#swiperjs)
    - [Chart.js](#chartjs)
  - [4- Probas](#4--probas)

## 1- Codificación

A carpeta chámase codigo.

## 2- Prototipos

Prototipos feitos da vista das citas da interfaz do nutricionista e dos axustes de perfil e de conta.
(Figma pestana chamada PROTOTIPOS)

## 3- Innovación

### Swiper.js

Empregado nas prácticas no momento de deseñar os banners das páxinas webs continuas ou con kits dixitais.
Trátase dun slider que empregan moitas empresas coñecidas nos seus sitios web.
Non ten mais complicación que copiar e pegar na web o script que teñen na pestana de inicio da súa páxina, e a estructura html que ten que seguir. 
Tamén ten plugins e outras demos para personalizar o slider.

### Chart.js 

É unha librería de JavaScript que converte datos numéricos a gráficos.
Escollina porque é a máis coñecida, ten moitas opcións para customizar as gráficas a parte de diversos plugins.
Foi moi fácil de implementar, seguín un vídeo tutorial e non houbo problemas á hora de implementalo.
O vídeo é este:
https://www.youtube.com/watch?v=_vRS87AT1Yk&ab_channel=ProgramadorNovato

Para recoller os datos dos pesos que se rexistraban na base de datos foi máis farragoso, xa que sempre se iba a necesitar o id de cada paciente, e ademáis o que se quería era que aínda que non se insertase un peso por mes, o ideal sería que se viran todos os meses. Acabouse logrando o resultado facendo unha función asíncrona e coa definición dun obxecto "months" que mapea os doce meses do ano abreviados a números do 1 ao 12.
Xa que necesitamos o id do usuario mandámolo no body da solicitude.
O chart_data crea un array de doce elementos con valores de null e itérase sobre a data os pares de valores que devolve (peso e mes), como son representacións de números necesítase parsealos.
Por último colócanse os pesos no índice correspondente do array, como os arrays empezan en 0 ponse "mes-1".
O resultado final é un obxecto con unha lista de nomes dos meses e o array cos datos que deben ser representados na gráfica.


## 4- Probas

Deben describirse as probas realizadas e conclusión obtidas. Describir os problemas atopados e como foron solucionados.

O menú hamburguesa daba problemas en varios tamaños, xa que ao facer scroll salía unha parte cortada, solucionouse coa propiedade overflow-y:hidden; e cambiando propiedades que estaban no .nav-menu.active directamente a .nav-menu.

O formulario de alta de pacientes non funcionaba, non se recollían os valores dos inputs e sempre viñan vacíos. A solución que encontrei e que me funcionou foi a de recoller cada valor dos inputs por separado e enviando eses valores nun JSON para logo procesalas con php.
Facendo probas de datos co formulario atopouse que a validación do nome non aceptaba tildes e diéresis, así que correxiuse esa expresión regular.

A subida de ficheiros na ficha de cada paciente complicouse, xa que na URL se inclúe o id de cada paciente para que se mostren os datos correspondentes. Para que a subida funcionase correctamente, había que recoller o correspondente id recollendo por ende a URL enteira (Xa que a URL recolle o id de cada paciente para mostrar os datos correspondentes da base de datos).

Para que o envío de mensaxes funcionase correctamente, hai que pasarlle ao body da petición o id do paciente.

Na proba de borrado de pacientes descubreuse que se non se borraban os ficheiros, as mensaxes e os pesos que estaban relacionados con cada paciente, daba un erro. Entón primeiro fanse as consultas para borrar os ficheiros, as mensaxes os pesos e por último os pacientes.

A lóxica de rexistrar os peso dos pacientes fíxose de primeiras creando dous formularios, un para cando inda non había un primer peso rexistrado, e outro para cando xa había pesos existentes na base de datos dese paciente. A idea do rexistro é que só se rexistre un peso ao mes para logo mostrar na gráfica un dato por mes.
Entonces cando se rexistra un peso, tamén se rexistra a data e o seu identificador. Cando non hai un peso rexistrado o que se fai e insertar o novo dato na base de datos, pola contra se xa existe algún dato o que se fai e comparar as datas, se o ano e o mes son as mesmas, o que se fai e un update do rexistro existente cambiando o peso e a data, se o mes é distinto o que se fai e insertar ese novo dato.
Como quería mostrar un erro se o usuario insertaba un dato erróneo ou vacío, o que se acabou facendo foi unha petición ao arquivo de validación, e como se pasaban os datos na petición, eliminouse un dos formularios, e simplemente os datos que iban ocultos inicialízanse a -1, así se hai datos previos gárdanse nesas variables, e se pola contra non hai datos previos o valor é -1, así pódese manexar no arquivo de validación php.


