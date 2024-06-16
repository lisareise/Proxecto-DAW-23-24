# FASE DE IMPLANTACIÓN

- [FASE DE IMPLANTACIÓN](#fase-de-implantación)
  - [1- Manual técnico](#1--manual-técnico)
    - [1.1- Instalación](#11--instalación)
    - [1.2- Administración do sistema](#12--administración-do-sistema)
  - [2- Manual de usuario](#2--manual-de-usuario)
  - [3- Melloras futuras](#3--melloras-futuras)

## 1- Manual técnico

### 1.1- Instalación

Os requerimentos hardware para continuar co desenvolvemento da plataforma son:
- Ter un disco duro con un espacio libre de mínimo 85MB.
- Unha memoria RAM de 256MB ou superior.
- Un procesador Pentium ou Superior.
- Un Sistema Operativo: Linux, Windows (versión mínima de Windows 8), OS X (mínimo Mac OS X 10.6). 

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
  
Os usuarios cos que conta a web son nutricionistas e pacientes (represéntanse en dúas táboas na base de datos, chamadas nutricionista e paciente).
Os nutricionistas son rexistrados por un administrador, e o nutricionista é o que da de alta os seus pacientes.

### 1.2- Administración do sistema

É preciso facer copias de seguridade sobre todo da base de datos, estas copias deberánse facer regularmente, xa que se tratan con datos médicos moi sensibles.
Tamén implementar xestións para previr ataques cibernéticos que poidan roubar eses datos sensibles.

## 2- Manual de usuario

Non é preciso formar aos usuarios para que utilicen a plataforma, xa que é moi intuitiva.
Conta cun inicio de sesión, e dentro de cada interfaz, as funcionalidades que se poden realizar son moi intuitivas e no caso de introducir datos erróneos ou que non corresponden, o sistema avisa ao usuario de que datos son os correctos para introducilos correctamente.

No caso de dúbidas existe un formulario de contacto no que se poderá preguntar por calquera dúbida que surxa, e nun futuro se planea implementar un chatbox que poida responder a preguntas frecuentes.

## 3- Melloras futuras

Como ben se indicaba no principio deste proxecto, unha idea de mellora xeral e ampliar a plataforma web implementando funcionalidades doutras áreas da saúde para abarcar un maior número de clientes e usuarios para a aplicación.

As melloras que se poderían ir aplicando a medio plazo son as seguintes:
- Momentáneamente o nutricionista só pode mandar avisos, o máis práctixo sería crear un chat entre o paciente e o nutricionista para entablar pequenas conversacións se surxen dudas, para unha mellor comunicación.
  
- De momento o que crea o nome de usuario e a contrasinal do paciente é o nutricionista, o idóneo sería que lle chegasen as credenciais para iniciar sesión por e-mail ao paciente e o nutricionista non tivera que facer ese procedemento. Así a primeira vez que iniciase sesión o paciente, xa podería cambiar esas credenciais.
  
- Na ficha de cada paciente sería unha ferramenta útil para o nutricionista implementar a funcionalidade de ir escribindo informes ou observacións que ten do paciente en concreto ben sexa nas consultas presenciais ou a medida que vai recollendo información sobre o progreso do paciente.

- Preténdese tamén que nun futuro que o nutricionista sexa capaz de utilizar a plataforma para xestionar as súas citas e telas ben visualizadas, para non ter que utilizar outra aplicación ou web externa. (Hai un prototipo feito en figma de como sería)

- Unha idea a maiores é que na pestana que pon noticias, se puidese crear unha comunidade ou un foro no que os usuarios puidesen compartir noticias de interese e intercambiar ideas.
  
- Na páxina principal hai un formulario de contacto para todos aqueles que necesiten obter máis información (non está implementado), o que se podería implementar sería un chatbot que fose capaz de responder ás preguntas máis frecuentes para que chegase a información máis rápido e non ter que mandar un correo.
  