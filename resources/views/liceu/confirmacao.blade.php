<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <title>Inscrição - Liceu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <style>

    #botao-enviar{
        float: right;
        background-color: rgb(61, 96, 163);
        font-family: 'Montserrat', sans-serif;
        color: rgb(170, 197, 255);
        font-size: 17px;
    }

    #botao-enviar:hover{
        float: right;
        border-style: solid;
        border-color: rgb(61, 96, 163);
        border-width: 1px;
        color:  rgb(61, 96, 163); 
        background-color: white;
    }

    .titulo-pagina{
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        color: rgb(66, 97, 138);
        font-size: 30px;
        text-align: center;
       margin-right: 6%;
        margin-left: 6%;
        
    }

    .card-form{
       padding: 5%;
        background-color: white;
        border-radius: 20px;
        box-shadow: 4px 4px 7px 4px rgba(0, 0, 0, 0.2);
        max-width: 900px;
        margin: auto;
    }

   body{
    background: #3a814a;
    font-family: 'Montserrat', sans-serif;
   }


    </style>
</head>

<body >

<div class="ui container" style="padding-top: 5rem ;">

<div class="card-form">


    <div style="text-align: center;">
      
        <img src="http://cultura.am.gov.br/portal/wp-content/uploads/2022/03/sucesso.png" width="55px" style="">  
        <h1 class="titulo-pagina" > 
          {{$inscricao->Nomesocial ?? $inscricao->nome }} sua Inscrição foi realizada com sucesso
        </h1>
        <div style="text-align: left;">
        <h2>Informações</h2>
        <p style="font-size: 18px;font-weight: 600;"> Tipo de Vaga: {{$inscricao->tipoVga}}</p>
       <p style="font-size: 18px;font-weight: 600;">Curso: {{$cursos->curso}} </p>
       <p style="font-size: 18px;font-weight: 600;">Unidade: {{$cursos->unidade}}</p>
       <p style="font-size: 18px;font-weight: 600;">Núcleo: {{$cursos->nucleo}}</p> 
       <p style="font-size: 18px;font-weight: 600;">Horário: {{$cursos->horario_inicial}}</p>
        <p style="font-size: 18px;font-weight: 600;">Início Previsto: {{$cursos->periodo_inicio}}</p>  
        <p style="font-size: 18px;font-weight: 600;">Pré-requisito : {{$cursos->prerequisito}}</p>  
        <br>    
        </div>
        <p style="font-size: 18px; padding-left: 15px; padding-right: 15px;">Acesse ao grupo de Whatsapp através do QRCODE ou link abaixo .</p>

        <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$cursos->link}}">
        <div style="text-align: center; margin: auto; margin-top: 20px;">
                        <a class="massive ui teal button" href='{{$cursos->link}}'>
                            Grupo de whatsapp
                        </a>

                    </div>
         
        <p style="font-size: 18px; padding-left: 15px; padding-right: 15px;">Aguarde a análise de sua documentação para o resultado final, e, se possível, faça uma captura de tela (print-screen) desta confirmação.</p>
        <button class="medium ui button" onClick="window.print()">
           Imprimir 
          </button>
        
    </div>

   
    <br><br>
    <br><br>
    </form>
</div>
<br><br>
    <br><br>
</div>

 


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</body>

</html>