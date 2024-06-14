# FASE DE CODIFICACIÓN E PROBAS

- [FASE DE CODIFICACIÓN E PROBAS](#fase-de-codificación-e-probas)
  - [1- Codificación](#1--codificación)
  - [2- Prototipos](#2--prototipos)
  - [3- Innovación](#3--innovación)
    - [Swiper.js](#swiperjs)
    - [Chart.js](#chartjs)
  - [4- Probas](#4--probas)

> Este documento explica como se debe realizar a fase de codificación e probas.

## 1- Codificación

A carpeta chámase codigo.

## 2- Prototipos

Prototipos feitos da vista das citas da interface do nutricionista e dos axustes de perfil e de conta.
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



## 4- Probas

Deben describirse as probas realizadas e conclusión obtidas. Describir os problemas atopados e como foron solucionados.

O menú hamburguesa daba problemas en varios tamaños, xa que ao facer scroll salía unha parte cortada, solucionouse coa propiedade overflow-y:hidden; e cambiando propiedades que estaban no .nav-menu.active directamente a .nav-menu.

O formulario de alta de pacientes non funcionaba, non se recollían os valores dos inputs e sempre viñan vacíos. A solución que encontrei e que me funcionou foi a de recoller cada valor dos inputs por separado e enviando eses valores nun JSON para logo procesalas con php.

A subida de ficheiros na ficha de cada paciente complicouse, xa que na URL se inclúe o id de cada paciente para que se mostren os datos correspondentes. Para que a subida funcionase correctamente, había que recoller o correspondente id recollendo por ende a URL enteira.

Para que o envío de mensaxes funcionase correctamente, había que pasarlle ao JSON do fetch o id do paciente.

Na proba de borrado de pacientes descubreuse que se non se borraban os ficheiros mais as mensaxes que estaban relacionados con cada paciente, daba un error. Entón primeiro fanse as consultas para borrar os ficheiros, as mensaxes e por último os pacientes.

Para o rexistro de pesos...

Non se puideron implementar na gráfica os datos reais dos rexistros de pesos de cada un dos pacientes. A idea era que se rexistrase o último peso de cada mes para ter un dato por mes, esa funcionalidade está implementada para que aparezca ben na base de datos: 
Se o ano e o mes coinciden co peso introducido anteriormente, o que se fai é actualizar o rexistro do último peso. Pola contra se o ano e o mes non coinciden insértase un rexistro novo, quedando así un rexistro por mes.
O que non se foi capaz foi de implementar a lóxica para relacionar os datos que se deben recoller da base de datos e colocalos no arquivo .js que traduce eses datos na gráfica.

