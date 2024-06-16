# Proxecto fin de ciclo

- [Proxecto fin de ciclo](#proxecto-fin-de-ciclo)
  - [Taboleiro do proyecto](#taboleiro-do-proyecto)
  - [Descrición](#descrición)
  - [Instalación / Posta en marcha](#instalación--posta-en-marcha)
  - [Uso](#uso)
  - [Sobre o autor](#sobre-o-autor)
  - [Licenza](#licenza)
  - [Índice](#índice)
  - [Guía de contribución](#guía-de-contribución)


## Taboleiro do proyecto

Finalizada a primeira versión da plataforma.
 
## Descrición

O proxecto trata de desenvolver unha plataforma médica inicialmente para que a poidan utilizar nutricionistas ou dietistas e utilizar as ferramentas das que goza esta plataforma, para unha mellor organización e modernización do seu traballo profesional.
Algunhas delas son: organizar os seus pacientes, proporcionar unha ficha con todos os datos de cada un dos seus pacientes, compartir ficheiros con eles e mandar avisos se o ven necesario.

Pola outra banda, os pacientes poden ver os ficheiros compartidos polo seu nutricionista, manter actualizados os seus datos de contacto e tamén poden rexistrar regularmente o seu peso, que se verá traducido nunha gráfica, que pode ser visualizada tamén polo nutricionista. 

En resumo, a plataforma ten como obxectivo modernizar e mellorar o modo de traballo dos profesionais sanitarios proporcionando as ferramentas necesarias, a parte de mellorar tamén a comunicación do médico co seu paciente, que coa aplicación pode facer un mellor seguemento e se reducen as visitas presenciais, sen cortar esa comunicación. 

Uso das linguaxes: HTML, CSS, JavaScript e PHP.
Prototipo realizado con Figma.
Comunicación asíncrona con AJAX.
Uso de bases de datos MySQL - phpMyAdmin.

## Instalación / Posta en marcha

O servidor que se emprega para a súa programación e XAMPP (versión 8.0.30) con unha versión de PHP 8.0.30.

Deberase importar un arquivo en PhpMyAdmin, chamado creacionBD.sql, que se encontra na ruta codigo/php/creacionBD.sql.
Para importalo vaise á pestana de importar e no apartado "Seleccionar archivo" buscamos o arquivo mencionado anteriormente.
Nese archivo insértase automáticamente un nutricionista, o que dispón dun nome de usuario e unha contrasinal coa que se poderá iniciar sesión e comezar coa proba do funcionamento da plataforma.

Para importar o código no servidor XAMPP as indicacións son as seguintes:

1. Cando se descarga o XAMPP, créase no sistema unha carpeta chamada xampp, dentro desta hai numerosas carpetas, a que nos interesa é unha chamada "htdocs".
2. Dentro da carpeta de "htdocs" creamos unha nova carpeta.
3. Copiamos a carpeta chamada "codigo" do proxecto e pegámola dentro da carpeta que creamos anteriormente.

Para probar o código:
1. Abrimos o panel de control de XAMPP e iniciamos os servizos Apache e MySQL.
2. No noso navegador escribimos: localhost/"nome da carpeta que creamos"/codigo  
3. Debería aparecer o que sería a landing da plataforma, que é a páxina de inicio no que está toda a explicación do que é a web.

## Uso

A web conta con dúas interfaces, a do paciente e a do nutricionista. 
O nutricionista poderá administrar os seus pacientes (engadir ou eliminar pacientes), compartir ficheiros con eles e mandar avisos, a parte de ver a evolución de peso de cada un deles.
O paciente poderá actualizar os datos de contacto sempre que queira, acceder aos ficheiros e ás notificacións mandadas polo nutricionista e ademáis levar un rexistro do progreso do seu peso.

## Sobre o autor

Son estudante de desenvolvemento de aplicacións web, as linguaxes que mellor manexo son HTML, CSS, PHP e JavaScript. O meu punto forte e o que máis disfruto é crear os deseños da web e maquetalas.

Este proxecto nace dun problema persoal e de buscar a maneira de como resolvelo, xa que no último ano tiven moitas citas presenciais con médicos e polo tanto as miñas asistencias a clase aumentaron considerablemente, o que me fixo pensar que sería unha boa oportunidade poder crear unha plataforma sanitaria que conectase aos pacientes cos seus profesionais médicos sen perder asistencia ás súas obligacións, pero que ese contacto fose inda así de calidade.

Unha forma de contactar conmigo é escribindome ao meu correo personal: lisa.reise14@gmail.com


## Licenza

[GNU GENERAL PUBLIC LICENSE Version 3](LICENSE)

## Índice

1. [Anteproyecto](doc/Anteproxecto.md)
2. [Análise](doc/Analise.md)
3. [Deseño](doc/Deseño.md)
4. [Codificación e probas](doc/Codificacion_e_probas.md)
5. [Implantación](doc/Implantación.md)
6. [Referencias](doc/Referencias.md)
7. [Incidencias](doc/Incidencias.md)

## Guía de contribución

Calquera persoa que traballe no sector da saúde saberá á perfección cales son as ferramentas das que precisa para facilitar máis o seu traballo, e como se podería mellorar a web implementando funcionalidades máis concisas ou mellorar as que xa están implementadas.
Na parte da programación, calqueira que saiba de código e teña experiencia pode contribuir cos seus coñecementos, tanto en optimización de código como no desenvolvemento deste e a realización de test para probalo.
