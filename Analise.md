# Requerimientos do sistema

- [Requerimientos do sistema](#requerimientos-do-sistema)
  - [1- Descrición Xeral](#1--descrición-xeral)
  - [2- Funcionalidades](#2--funcionalidades)
  - [3- Tipos de usuarios](#3--tipos-de-usuarios)
  - [4- Contorno operacional](#4--contorno-operacional)
  - [5- Normativa](#5--normativa)
      - [Ley orgánica de Protección de datos Personales y garantía de derechos digitales](#ley-orgánica-de-protección-de-datos-personales-y-garantía-de-derechos-digitales)
      - [Ley de servicios de la sociedad de la información y el comercio electrónico](#ley-de-servicios-de-la-sociedad-de-la-información-y-el-comercio-electrónico)
      - [Ley de colegiaciones profesionales](#ley-de-colegiaciones-profesionales)
      - [Ley de propiedad intelectual](#ley-de-propiedad-intelectual)
      - [Ley de competencia desleal](#ley-de-competencia-desleal)
  - [6- Melloras futuras](#6--melloras-futuras)

## 1- Descrición Xeral

>O proxecto centrarase en crear unha plataforma web para un nutricionista/dietista e os seus pacientes.
>A interfaz do dietista permitirá ao profesional obter unha visual de todos os seus pacientes e poderá xestionalos como él o precise:
>- Poderá engadir novos pacientes á súa lista ou eliminalos. 
>- Cada paciente contará cunha ficha, na que se indican os seus datos persoais e un calendario de dietas que o nutricionista pode modificar en calquera momento. Ademáis contará cun apartado para escribir notas ou observacións se o necesita.
>- Pode enviar avisos ou novas indicacións aos seus pacientes.
>A interfaz do paciente ten como obxectivo unha mellor visualización das indicacións do seu especialista:
>- Visualizará un calendario de dietas que o nutricionista lle vai especificando.
>- Poderá levar un rexitro de calorías diarias introducindo os alimentos que consume no seu día a día.
>- Poderá visualizar os avisos ou as novas indicacións que lle manda o seu médico.

>O que se pretende coa idea deste proxecto e mellorar a comunicación e a xestión do profesional sanitario co seu paciente, sendo capaces de actualizar os datos con regularidade reducindo as consultas presenciais que podería haber de por medio. Ademáis tamén se pretende mellorar o método de traballo do profesional sanitario.
>Preténdese chegar ao ámbito sanitario galego, pudendo ofrecer un novo medio de comunicación e de traballo que non se está aproveitando na actualidade e que podería facilitar moitos trámites.

## 2- Funcionalidades

| Acción   |  Descrición        |
|----------|--------------------|
| Inicio da sesión | Tanto o dietista como o paciente terán que iniciar sesión (función de ambos usuarios)|
| Peche da sesión | Tanto o dietista como o paciente terán que pechar a sesión (función de ambos usuarios)|
| Alta de clientes  | Dar de alta os pacientes na base de datos mediante unha función de rexistrar pacientes (función do profesional)|
| Baixa de clientes  | Dar de baixa os pacientes na base de datos (función do profesional)|
| Modificación de datos personais do paciente  | Ao rexistrar un usuario, o profesional deberá introducir datos persoais do paciente que máis adiante poderá modificar se fose necesario (función do profesional) |
| Posibilidade de rexistrar observacións | En cada ficha de usuario, poderánse rexistrar notas ou observacións que teñan que ver co progreso do paciente. (función do profesional) |
| Método de mensaxes  | O nutricionista poderá mandar mensaxes a cada paciente por medio dun sistema de mensaxería unidireccional. O paciente non ten modo de responder (función do profesional)|
| Introducir dietas nun calendario que dispón cada un dos pacientes | Introducir as dietas e gardalas nunha base de datos (función do profesional)|
| Modificar esas dietas  | Modificar as dietas no calendario de cada paciente, os cambios se gardan na base de datos (función do profesional) |
| Facer visibles esas dietas  | As dietas son visibles para cada paciente (estes non a poden modificar), encontraránse nun calendario no que estará visualizada a dieta de cada un. Empregarase comunicación asíncrona (visual para o paciente e o profesional) |
| Introducción de datos nutricionais diariamente  | O paciente poderá levar a cabo un rexistro da cantidade de calorías inxeridas ao día, facilitarase unha base de datos nutricional / API para unha introducción de datos máis cómoda. (función do paciente) |


## 3- Tipos de usuarios

>Haberá tres tipos de usuarios:
>- Usuario xenérico: Terá únicamente acceso á páxina principal que é a que presenta á empresa, onde poderá leer e entender de qué se trata e informarse.
>- Usuario profesional: O dietista/nutricionista, accederá ao seu espazo iniciando sesión. Administrará aos seus pacientes dándoos de alta, modificando os seus datos, e tamén poderá dalos de baixa. 
>Pode entrar nas fichas dos seus pacientes para escribir observacións e introducir ou modificar as dietas no calendario dos pacientes.
>Se o necesita, pode enviar recordatorios aos seus pacientes.
>- Usuario paciente: O paciente do nutricionista, accederá ao seu espacio iniciando sesión.
>Pode ver os seus datos persoais (os que tamén dispón o médico) e terá acceso a un calendario onde estarán postas as dietas que debe respetar día a día.
>Pode levar un rexistro das calorías diarias introducindo os alimentos que inxire a diario.


## 4- Contorno operacional

>Para interactuar coa plataforma web necesitarase un dispositivo electrónico (tablet, móbil ou ordenador persoal) e internet.

## 5- Normativa

>A continuación explicaránse as normativas e leis que deberá cumplir a plataforma web:
#### Ley orgánica de Protección de datos Personales y garantía de derechos digitales
- A plataforma web deberá cumplir cos principios de tratamento de datos persoais establecidos na lei, como a lealtad, transparencia, limitación do propósito, minimización de datos, exactitud conservación e seguridade.
- Deberase obter o consentimento expreso dos pacientes para a obtención e tratamento dos seus datos persoais. Polo tanto tamén se deberá implementar un sistema de seguridade axeitado para protexer tales datos.
- Os pacientes terán dereito a ter acceso, rectificar, suprimir, limitar o tratamento e opoñerse ao tratamento dos seus datos.

#### Ley de servicios de la sociedad de la información y el comercio electrónico 
- Deberánse cumplir cos requisitos da información e da trasparencia establecidos na lei, como a identificación do responsable do tratamento, os datos de contacto, a finalidade do tratamento e os dereitos dos usuarios.
- Deberánse empregar cookies de forma transparente, informando aos usuarios sobre o seu uso e obtendo o seu consentimento previo.

#### Ley de colegiaciones profesionales
- O nutricionista/dietista deberán estar colexiados para poder ofrecer os seus servicios a través da plataforma.
- A web deberá cumplir coas normas deontolóxicas do Colegio Profesional de Nutricionistas/Dietistas. Son un conxunto de principios que regulan a conducta profesional destes profesionais, e teñen como obxectivo garantir que os nutricionistas/dietistas presten os seus serviciosde forma ética, responsable e competente, e que protexan os intereses dos seus pacientes.

#### Ley de propiedad intelectual
A web é unha obra orixinal susceptible de protección por dereitos de autor. O autor da web ten o dereito exclusivo a realizar determinados actos sobre a mesma, como reproducila, distribuila e transformala.

#### Ley de competencia desleal
Se se realizase publicidade falsa sobre os servicios, prácticas ilícitas para captar clientela dos competidores, utilizar información confidencial dos seus competidores, imitar outros deseños, utilizar unha imaxen de marca dos seus competidores, aproveitarse da reputación dos seus competidores para promocionar os seus servizos, estaríase incurrindo nun acto de competencia desleal.


## 6- Melloras futuras

>Nun principio a web pensouse para centrarse no campo da nutrición, onde o especialista sanitario tivese as ferramentas necesarias para una mellor xestión e visualización dos seus pacientes, ademáis de poder dar avisos ou novas indicacións sen ter que chamar ou concertar unha cita. Tamén pode xestionar as dietas dos pacientes de forma remota, accedendo ao calendario individual de cada un e facendo os cambios que se precisen.
>Unha mellora futura sería implementar a maiores unha funcionalidade para xestionar as citas de todos os seus pacientes, visualizándoas todas nun calendario e indicando a hora de cada unha. Ante calquera imprevisto, o profesional podería anulalas e avisaría ao seu cliente.
>Outra mellora bastante necesaria sería a de mellorar o sistema de mensaxes, e que puidese pasar a ser un chat bidireccional entre o paciente e o especialista.

>En canto á experiencia do paciente, engadiríase a posibilidade de vincular a plataforma con outras aplicacións da saúde, como por exemplo rexistrar os pasos diarios que rexistra o móbil, ou os distintos tipos de actividade que se poden rexistrar en reloxes dixitáis e as respectivas calorías que se queiman, xa que poderían ser datos de importacia para o especialista sanitario.

>Unha mellora a considerar tamén sería a de adaptar a web a profesionais doutras ramas da saúde, para abarcar un maior número de usuarios e poder satisfacer máis necesidades.
