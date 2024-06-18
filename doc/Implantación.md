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
2. Dentro da carpeta de "htdocs" creamos unha nova carpeta chamada "TFC".
3. Copiamos a carpeta chamada "codigo" do proxecto e pegámola dentro da carpeta que creamos anteriormente.

Para probar o código:
1. Abrimos o panel de control de XAMPP e iniciamos os servizos Apache e MySQL.
2. No noso navegador escribimos: localhost/TFC/codigo  
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

Para utilizala:
- Para iniciar sesión, os nutricionistas e os pacientes inician sesión na misma pestana (login.php).
  
Como nutricionista:
- O nutricionista inicial que se inserta coa importación da base de datos ten as seguintes credenciais:
  - nome de usuario: carmen_fraga
  - contrasinal: abc123.
- O primeiro que ve será o seu dashboard no que terá un calendario, unha preview dos seus pacientes, e as consultas que tería hoxe. (o último non está implementado, o mesmo pasa co calendario)
- Se vai á pestana que pon "pacientes" terá unha lista con todos os pacientes aos que deu de alta. (Nun futuro poderá buscalos no buscador, de momento non está implementado) 
  Ten dous botóns, un para añadir novos pacientes (aparecerá unha ventana modal cun formulario), e o de borrar pacientes (Aparecerán caixas para seleccionar todos os pacientes que desexe eliminar).
- Ao pulsar sobre o nome dun dos pacientes desa lista na pestana de pacientes, mostrarase unha ficha no que aparecen os datos do paciente e no caso de que teña pesos rexistrados aparecerá unha gráfica con eses rexistros. Tamén ten a opción de mandar unha mensaxe ou de compartirlle un ficheiro.

Como paciente:

- Inicia sesión coas credenciais dadas polo seu nutricionista.
- O primeiro que verá será un dashboard cos seus datos persoais, que poderá modificar en calqueira momento se preme no botón "editar datos", se o fai aparecerá unha ventana modal cos datos que pode modificar. e tamén ten o que sería unha preview dos ficheiros que lle foron compartidos polo seu nutricionista.
- Na pestana "ficheros" terá unha lista deses ficheiros mencionados e nun futuro, se ten moitos compartidos poderá buscalos polo nome, de momento pode descargalos se preme no nome de cada ficheiro e así visualizalos.
- Na pestana de pesos terá un pequeno formulario inicialmente, cando rexistre o seu primeiro peso mostrarase unha frase coa data da última inserción e o dato en cuestión. Cando faga ese rexistro poderá observar no seu dashboard unha gráfica no que se verán reflexados a partir de agora todos os datos (só verá un dato por mes).
- Na pestana "notificaciones" poderá ver todos os avisos que lle manda o seu nutricionista, de máis a menos actual.

## 3- Melloras futuras

Como ben se indicaba no principio deste proxecto, unha idea de mellora xeral e ampliar a plataforma web implementando funcionalidades doutras áreas da saúde para abarcar un maior número de clientes e usuarios para a aplicación.

As melloras que se poderían ir aplicando a medio plazo son as seguintes:
- Momentáneamente o nutricionista só pode mandar avisos, o máis práctixo sería crear un chat entre o paciente e o nutricionista para entablar pequenas conversacións se surxen dudas, para unha mellor comunicación.
  
- De momento o que crea o nome de usuario e a contrasinal do paciente é o nutricionista, o idóneo sería que lle chegasen as credenciais para iniciar sesión por e-mail ao paciente e o nutricionista non tivera que facer ese procedemento. Así a primeira vez que iniciase sesión o paciente, xa podería cambiar esas credenciais.
  
- Na ficha de cada paciente sería unha ferramenta útil para o nutricionista implementar a funcionalidade de ir escribindo informes ou observacións que ten do paciente en concreto ben sexa nas consultas presenciais ou a medida que vai recollendo información sobre o progreso do paciente.

- Preténdese tamén que nun futuro que o nutricionista sexa capaz de utilizar a plataforma para xestionar as súas citas e telas ben visualizadas, para non ter que utilizar outra aplicación ou web externa. (Hai un prototipo feito en figma de como sería)

- Unha idea a maiores é que na pestana que pon noticias, se puidese crear unha comunidade ou un foro no que os usuarios puidesen compartir noticias de interese e intercambiar ideas.
  
- Na páxina principal hai un formulario de contacto para todos aqueles que necesiten obter máis información (non está implementado), o que se podería implementar sería un chatbot que fose capaz de responder ás preguntas máis frecuentes para que chegase a información máis rápido e non ter que mandar un correo.
  