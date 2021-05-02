<?php
    //verifica que exista un código para traducir y un específicador para traduccion de Morse a Español o visceversa.
    $tradu = (isset ($_POST["traduccion"]) && $_POST["traduccion"] !="") ?$_POST["traduccion"]: "No especificó"." ";
    $codigo = (isset ($_POST["codigo"]) && $_POST["codigo"] !="") ?$_POST["codigo"]: "No especificó"." ";
    //Las siguientes dos son cadenas que contienen los carácteres de cada código, normal y morse. 
    $verifica = ["A",    "B",   "C",  "D", "E",  "F",  "G",  "H",  "I",   "J",  "K",  "L",  "M", "N",  "O",   "P",  "Q",   "R", "S",  "T", "U",  "V",  "W",    "X",   "Y",  "Z",    "1",     "2",   "3",    "4",    "5",     "6",    "7",   "8",   "9",    "0",     ",",     "?",    "!",    "\""];
    //no incluyo la e porque si no no detectaría el punto, ya que la E es un punto
    $veriMorse = [".-","-...","-.-.","-.."   ,"..-.","--.","....","..",".---","-.-",".-..","--","-.","---",".--.","--.-",".-.","...","-","..-","...-",".--","-..-","-.--","--..",".----","..---","...--","....-",".....","-....","--...","---..","----.","-----","-.-.--","..--..","--..--","--..--",".-.-.-"];//Última punto
    
    $cuenta=0;
    //Convierte todo el texto que le hayan pasado a mayúsculas
    $mayus= strtoupper($codigo);
    //Convierte en arreglo cada elemento de la cadena
    $elementos = str_split($mayus);

    if($tradu=="aespañol")
    {
        //verifica que el texto no esté ya en español/normal
        foreach ($elementos as $llave => $valor)
        {
            //compara la cadena de texto introducido con la que declara los carácteres español para checar que no haya coincidencias
            for($i=0; $i<40; $i++)
            {
                if($valor == $verifica[$i])
                    $cuenta++; //si hay coincidencias incrementa el contador
                
            }
        }
    }
    if($tradu=="amorse") //mismo algoritmo que el anterior solo que aquí considera la traducción de normal a morse
    {
        foreach ($elementos as $llave => $valor)
        {
            //compara la cadena de texto introducido con la que declara los carácteres morse para verificar que no hay coincidencias
            for($i=0; $i<40; $i++)
            {
                if($valor == $veriMorse[$i])
                    $cuenta++;//si hay coincidencias incrementa el contador
            }
        }
    }
    
    if($cuenta==0)//Si no hay anomalía en el texto introducido, la variable cuenta se queda en cero y prosigue con la traducción
    {
        //Traduce de normal a morse
        if($tradu=="amorse")
        {
            echo "<h4>De Español a Morse</h4>";
            
            echo "<h1>Su texto a traducir es: </h1>";
            //muestra texto a traducir del arreglo creado a partir d ela cadrna introducida
            foreach($elementos as $llave => $valor)
                echo $valor;
            echo "<h1>Su traducción es: </h1>";
            foreach($elementos as $llave => $valor)
            {
                //Itera por la cadena que ingreso el usuario
                switch ($valor)
                {
                    //para cada valor coincidente con un carácter del normal, imprime su correspondiente en morse y un espacio que indica la separación entre una letra y otra
                    case ($valor=="A"):
                        echo ".-"." ";
                        break;
                    case ($valor=="B"):
                        echo "-..."." ";
                        break;
                    case ($valor=="C"):
                        echo "-.-."." ";
                        break;
                    case ($valor=="D"):
                        echo "-.."." ";
                        break;
                    case ($valor=="E"):
                        echo "."." ";
                        break;
                    case ($valor=="F"):
                        echo "..-."." ";
                        break;
                    case ($valor=="G"):
                        echo "--."." ";
                        break;
                    case ($valor=="H"):
                        echo "...."." ";
                        break;
                    case ($valor=="I"):
                        echo ".."." ";
                        break;
                    case ($valor=="J"):
                        echo ".---"." ";
                        break;
                    case ($valor=="K"):
                        echo "-.-"." ";
                        break;
                    case ($valor=="L"):
                        echo ".-.."." ";
                        break;
                    case ($valor=="M"):
                        echo "--"." ";
                        break;
                    case ($valor=="N"):
                        echo "-."." ";
                        break;
                    case ($valor=="O"):
                        echo "---"." ";
                        break;
                    case ($valor=="P"):
                        echo ".--."." ";
                        break;
                    case ($valor=="Q"):
                        echo "--.-"." ";
                        break;
                    case ($valor=="R"):
                        echo ".-."." ";
                        break;
                    case ($valor=="S"):
                        echo "..."." ";
                        break;
                    case ($valor=="T"):
                        echo "-"." ";
                        break;
                    case ($valor=="U"):
                        echo "..-"." ";
                        break;
                    case ($valor=="V"):
                        echo "...-"." ";
                        break;
                    case ($valor=="W"):
                        echo ".--"." ";
                        break;
                    case ($valor=="X"):
                        echo "-..-"." ";
                        break;
                    case ($valor=="Y"):
                        echo "-.--"." ";
                        break;
                    case ($valor=="Z"):
                        echo "--.."." ";
                        break;
                    case ($valor=="1"):
                        echo ".----"." ";
                        break;
                    case ($valor=="2"):
                        echo "..---"." ";
                        break;
                    case ($valor=="3"):
                        echo "...--"." ";
                        break;
                    case ($valor=="4"):
                        echo "....-"." ";
                        break;
                    case ($valor=="5"):
                        echo "....."." ";
                        break;
                    case ($valor=="6"):
                        echo "-...."." ";
                        break;
                    case ($valor=="7"):
                        echo "--..."." ";
                        break;
                    case ($valor=="8"):
                        echo "---.."." ";
                        break;
                    case ($valor=="9"):
                        echo "----."." ";
                        break;
                    case ($valor=="0"):
                        echo "-----"." ";
                        break;
                    case ($valor=="."):
                        echo ".-.-.-"." ";
                        break;
                    case ($valor==","):
                        echo "-.-.--"." ";
                        break;
                    case ($valor=="?"):
                        echo "..--.."." ";
                        break;
                    case ($valor=="!"):
                        echo "--..--"." ";
                        break;
                    case ($valor=="\""):
                        echo "--..--";
                        break;
                    //Para el caso del espacio, imprime el correspondiente espacio dejado por la letra anterior al espacio y dos espacios más para formar lo 3 espacios solicitados
                    case ($valor==" "):
                        echo "&nbsp;&nbsp;";
                        break;
                    //En caso de insertar un carácter no programado (por ejemplo, salto de línea)
                    default :
                        echo "Traducción no encontrada";
                    
                }
            
            }

        }
        //variable de control del espacio.
        $espacio=0;//variable control espacio
        //mismo algoritmo que el anterior pero ahora para traducir del morse al español
        if($tradu=="aespañol")
        {
            echo "<h4>De Morse a Español</h4>";
            //vuelve el codigo a morse a cadena
            $morse = explode(" ", $codigo);
            echo "<h1>El texto a traducir es: </h1>";
            foreach ($morse as $llave => $valor) //muestra valor morse
                echo $valor. "&nbsp";
            echo "<h1>Su traducción es: </h1>";
            foreach ($morse as $llave => $valor)
            {
                switch ($valor)
                {//para cada valor coincidente con un carácter del codigo morse, imprime su correspondiente en normal.
                    case  ($valor ===" ")://ESPACIO ente una palabra y otra
                        $espacio++;//aumenta cada que hay un espacio(en morse hay 3 espacios entre palabra)
                        if($espacio%2==0)//para solo tomar en cuenta un espacio entre palabras (se genarn 2)
                            echo"&nbsp&nbsp&nbsp";//imprime de una vez los 3 espacios.
                        break;
                    case ($valor == "-...")://B
                        echo "B";
                        break;
                    case ($valor == "-.-.")://C
                        echo "C";
                        break;
                    case ($valor == "-..")://D
                        echo "D";
                        break;
                    case ($valor == ".")://E
                        echo "E";
                        break;
                    case ($valor == "..-.")://F
                        echo "F";
                        break;
                    case ($valor == "--.")://G
                        echo "G";
                        break;
                    case ($valor == "....")://H
                        echo "H";
                        break;
                    case ($valor == ".."); //I
                        echo "I";
                        break;
                    case ($valor == ".---")://J
                        echo "J";
                        break;
                    case ($valor == "-.-")://K
                        echo "K";
                        break;
                    case ($valor == ".-.."); //L
                        echo "L";
                        break;
                    case ($valor == "--"); //M
                        echo "M";
                        break;
                    case ($valor == "-.")://N
                        echo "N";
                        break;
                    case ($valor == "---")://O
                        echo "O";
                        break;
                    case ($valor == ".--.")://P
                        echo "P";
                        break;
                    case ($valor == "--.-")://Q
                        echo "Q";
                        break;
                    case ($valor == ".-.")://R
                        echo "R";
                        break;
                    case ($valor == "...")://S
                        echo "S";
                        break;
                    case ($valor == "-")://T
                        echo "T";
                        break;
                    case ($valor == "..-")://U
                        echo "U";
                        break;
                    case ($valor == "...-")://V
                        echo "V";
                        break;
                    case ($valor == ".--")://W
                        echo "W";
                        break;
                    case ($valor == "-..-")://X
                        echo "X";
                        break;
                    case ($valor == "-.--")://Y
                        echo "Y";
                        break;
                    case ($valor == "--..")://Z
                        echo "Z";
                        break;
                    case ($valor == ".----")://1
                        echo "1";
                        break;
                    case ($valor == "..---")://2
                        echo "2";
                        break;
                    case ($valor == "...--")://3
                        echo "3";
                        break;
                    case ($valor == "....-")://4
                        echo "4";
                        break;
                    case ($valor == ".....")://5
                        echo "5";
                        break;
                    case ($valor == "-....")://6
                        echo "6";
                        break;
                    case ($valor == "--...")://7
                        echo "7";
                        break;
                    case ($valor == "---..")://8
                        echo "8";
                        break;
                    case ($valor == "----.")://9
                        echo "9";
                        break;
                    case ($valor == "-----")://0
                        echo "10";
                        break;
                    case ($valor == ".-.-.-")://.
                        echo ".";
                        break;
                    case ($valor == "-.-.--")://,
                        echo ",";
                        break;
                    case ($valor == "..--..")://?
                        echo "?";
                        break;
                    case ($valor == "--..--")://!
                        echo "!";
                        break;
                    case ($valor == "--..--")://"
                        echo "\"";
                        break;
                    case ($valor== ".-")://A (La puse hasta acá porque no se porque al principio me la detectaba como otro caracter)
                        echo "A";
                        break;
                    default : //por si se inserta algono específicado (ejem:salto de línea)
                        echo "Traducción no encontrada";
                }

            }
            
        }
    }
    else // en caso de que se encuentren anomalías con el texto a traducir (morse a morse o normal a normal) la variable se incrementa
    {
        if($tradu=="aespañol")//el texto introducido no es del codigo morse
        {
            echo "<h1>:( </h1>";
            echo "<h2>Ha escrito de forma incorrecta su texto en Morse o ha incluido un carácter no correspondiente a este <i>(\".\" , \"-\").</i> </h2>";
            echo "<h2><u>Por favor, corrija su texto e intente de nuevo :)</u></h2>";
        }
        if($tradu=="amorse")//el texto introducido es morse o contiene letras de él
        {
            echo "<h1>:( </h1>";
            echo "<h2>Ha incluido código Morse en su texto normal.</h2>";
            echo "<h2><u>Por favor, corrija su texto introduciendo texto normal e intente de nuevo :)</u></h2>";
        }
    }
    echo "<br><br><a href=\"http://localhost/CURSOWEB/CodMorse/IngresoCodigo.html\"><button>Regresar</button></a>"; //botón regresar
    
    //JAZMÍN RAMÍREZ
?>