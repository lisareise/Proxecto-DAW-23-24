# Requerimientos do sistema

- [Requerimientos do sistema](#requerimientos-do-sistema)
  - [1- Descrición Xeral](#1--descrición-xeral)
  - [2- Funcionalidades](#2--funcionalidades)
  - [3- Tipos de usuarios](#3--tipos-de-usuarios)
  - [4- Contorno operacional](#4--contorno-operacional)
  - [5- Normativa](#5--normativa)
  - [6- Melloras futuras](#6--melloras-futuras)

> *EXPLICACION*: Este documento describe os requirimentos para "nome do proxecto" especificando que funcionalidade ofrecerá e de que xeito.

## 1- Descrición Xeral

>*EXPLICACION*: Descrición Xeral do proxecto

## 2- Funcionalidades

>*EXPLICACION* Describir que servizos ou operacións se van poder realizar por medio do noso proxecto, indicando que actores interveñen en cada caso.
>
> Enumeradas, de maneira que na fase de deseño poidamos definir o diagrama ou configuración correspondente a cada funcionalidade.
> Cada función ten uns datos de entrada e uns datos de saída. Entre os datos de entrada e de saída, realízase un proceso, que debe ser explicado.


| Acción   |  Descrición        |
|----------|--------------------|
| Inicio de sesión | Tanto o dietista como o paciente terán que iniciar sesión (función de ambos usuarios)|
| Alta de clientes  | Dar de alta os pacientes na base de datos mediante unha función de rexistrar pacientes (función do profesional)|
| Baixa de clientes  | Dar de baixa os pacientes na base de datos (función do profesional)|
| Modificación de datos personais do paciente  | Ao rexistrar un usuario, o profesional deberá introducir datos persoais do paciente que máis adiante poderá modificar se fose necesario (función do profesional) |
| Posibilidade de rexistrar observacións | En cada ficha de usuario, poderánse rexistrar notas ou observacións que teñan que ver co progreso do paciente. (función do profesional) |
| Método de mensaxes  | O nutricionista poderá mandar mensaxes a cada paciente por medio dun sistema de mensaxería unidireccional. O paciente non ten modo de responder (función do profesional)|
| Introducir dietas nun calendario que dispón cada un dos pacientes | Introducir as dietas e gardalas nunha base de datos (función do profesional)|
| Modificar esas dietas  | Modificar as dietas no calendario de cada paciente, os cambios se gardan na base de datos (función do profesional) |
| Facer visibles esas dietas  | As dietas son visibles para cada paciente (estes non a poden modificar), encontraránse nun calendario no que estará visualizada a dieta de cada un. Empregarase comunicación asíncrona (visual para o paciente e o profesional) |
| Introducción de datos nutricionais diaria  | O paciente poderá levar a cabo un rexistro da cantidade de calorías inxerida ao día, facilitarase unha base de datos nutricional / API para unha introducción de datos máis cómoda. (función do paciente) |


## 3- Tipos de usuarios

> *EXPLICACION* Describir os tipos de usuario que poderán acceder ao noso sistema. Habitualmente os tipos de usuario veñen definidos polas funcionalidades ás cales teñen acceso. En termos xerais existen moitos grupos de usuarios: anónimos, novos, rexistrados, bloqueados, confirmados, verificados, administradores, etc.
>
>Haberá tres tipos de usuarios:
>- Usuario xenérico: Terá únicamente acceso á páxina principal que é a que presenta á empresa, onde poderá leer e entender de qué se trata e informarse.
>- Usuario profesional: O dietista/nutricionista, accederá ao seu espazo iniciando sesión. Administrará aos seus pacientes dándoos de alta, modificando os seus datos, e tamén poderá dalos de baixa. 
>Pode entrar nas fichas dos seus pacientes para escribir observacións e introducir ou modificar as dietas no calendario dos pacientes.
>Se o necesita, pode enviar recordatorios aos seus pacientes.
>- Usuario paciente: O paciente do nutricionista, accederá ao seu espacio iniciando sesión.
>Pode ver os seus datos persoais (os que tamén dispón o médico) e terá acceso a un calendario onde estarán postas as dietas que debe respetar día a día.
>Pode levar un rexistro das calorías diarias introducindo os alimentos que inxire a diario.


## 4- Contorno operacional

> *EXPLICACION* Neste apartado deben describirse os recursos necesarios, dende o punto de vista do usuario, para poder operar coa aplicación web. Habitualmente consiste nun navegador web actualizado e unha conexión a internet.
Se é necesario algún hardware ou software adicional, deberá indicarse.

>Para interactuar coa plataforma web necesitarase un dispositivo electrónico (tablet, móbil ou ordenador persoal), in

## 5- Normativa

> *EXPLICACION* Investigarase que normativa vixente afecta ao desenvolvemento do proxecto e de que maneira. O proxecto debe adaptarse ás esixencias legais dos territorios onde vai operar.
> 
> Pola natureza dos sistema de información, unha lei que se vai a ter que mencionar de forma obrigatoria é la [Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales (LOPDPGDD)](https://www.boe.es/buscar/act.php?id=BOE-A-2018-16673). O ámbito da LOPDPGDD é nacional. Se a aplicación está pensada para operar a nivel europeo, tamén se debe facer referencia á [General Data Protection Regulation (GDPR)](https://eur-lex.europa.eu/eli/reg/2016/679/oj). Na documentación debe afirmarse que o proxecto cumpre coa normativa vixente.
>
> Para cumplir a LOPDPGDD e/ou GDPR debe ter un apartado na web onde se indique quen é a persoa responsable do tratamento dos datos e para que fins se van utilizar. Habitualmente esta información estructúrase nos seguintes apartados:
>
> - Aviso legal.
> - Política de privacidade.
> - Política de cookies.
>
> É acosenllable ver [exemplos de webs](https://www.spotify.com/es/legal/privacy-policy/) que conteñan textos legais referenciando a LOPDPGDD ou GDPR.

## 6- Melloras futuras

> *EXPLICACION* É posible que o noso proxecto se centre en resolver un problema concreto que se poderá ampliar no futuro con novas funcionalidades, novas interfaces, etc.