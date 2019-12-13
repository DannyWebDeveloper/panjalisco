@extends('layouts.header')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <div class="container main">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-sm-12">
      <h1>Transparencia </h1>

      <p>
      <h4>UN PARTIDO TRANSPARENTE, COMPROMISO DE ACCIÓN NACIONAL.</h4>
        <p>
        El Partido Acción Nacional, como institución de interés público, formada como instrumento de participación ciudadana en la toma de decisiones públicas, refrenda su compromiso de que estas sean tomadas además con transparencia y bajo el escrutinio de los mexicanos y en particular en el Estado por los Jaliscienses. En este sentido aquí encontraras diversa información sobre nuestra Unidad de Transparencia, el Comité de Clasificación y los lineamientos internos en la materia; así como la normatividad, documentos básicos, organigrama, ingresos y gastos del PAN Jalisco, registro de miembros, convocatorias, resultados de procesos internos, etc.
        </p>
        <p>
        Si requieres alguna información que no este en este sitio, puedes solicitarlo por escrito (en duplicado), ante la Unidad de Transparencia, ubicada en la sede del Comité Directivo Estatal, (calle vidrio 1604, Col. Americana, en Guadalajara, Jalisco) en un horario de 10:00 a 14:00 horas.
        </p>

        <p>El escrito en cuestión, deberá contener como mínimo:
        <ul>
        <li>I. El nombre del solicitante;</li>
        <li>II. Domicilio para recibir notificaciones;</li>
        <li>III. De ser posible, correo electrónico del peticionario; y </li>
        <li>IV. Los elementos necesarios para identificar la información de que se trata; así como la forma de reproducción solicitada.</li>
        </ul>
        </p>
        Tu solicitud deberá ser atendida y emitirse la respuesta debida, Tu solicitud deberá ser atendida y emitirse la respuesta debida, en el término que señala la LEY DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA DEL ESTADO DE JALISCO Y SUS MUNICIPIOS, por la Unidad de Transparencia del PAN Jalisco..
        <p>
        UNIDAD DE TRANSPARENCIA Domicilio: Toda solicitud de información puede ser presentada en la sede del Comité Directivo Estatal, ubicado en la calle Vidrio # 1604, Col. Americana, Guadalajara, Jalisco. Teléfonos: 01 (33) 39-15-80-00 y 39-15-80-55 Horario: 10:00 a 14:00 horas.
        </p>
        <p>
        NOTA: Para mayor Información sobre requisitos y trámites a las que se encuentran sujetas las solicitudes de información pública recibidas por este instituto político, pueden ser verificadas las disposiciones de los lineamientos de transparencia y acceso a la información pública del Partido Acción Nacional en Jalisco, localizados dichos lineamientos en esta misma pagina de internet.
        </p>

        <h4>AVISO AL PÚBLICO EN GENERAL</h4>
        <p>
        Se informa que debido a la publicación del decreto 25653/LX/15 en el periódico oficial “El Estado de Jalisco”, el 10 de noviembre del 2015, mediante el cual se resolvieron las observaciones del Gobernador Constitucional del Estado de Jalisco a la minuta del decreto número 25456/LX/15, mediante el cual se reforman, adicionan y derogan diversos artículos de la Ley de Transparencia y Acceso a la Información Pública del Estado de Jalisco y sus Municipios, mismo que entró en vigor de conformidad con el artículo primero transitorio, a partir de la vigencia del decreto número 25437/LX/15, por medio del cual se reforman los artículos 4, 9, 15, 35, 37, 100 y 111, de la Constitución Política del Estado de Jalisco en materia de transparencia, publicado en dicho periódico el 19 de diciembre del 2015, cuya vigencia inició el 20 del mismo mes y año, el Portal web de este Partido Político, específicamente el apartado de transparencia visible en la dirección electrónica: http://www.panjal.org.mx/transparencia, el cual se encarga de la publicación y actualización de la información fundamental prevista por los artículos 8 y 16 de la Ley en la materia, se encuentra en proceso de reestructuración y actualización para cumplir con las nuevas disposiciones de la Ley mencionada.
        </p>
    </div>
</div><!-- /.row -->


    <div class="row justify-content-md-center">
        <div class="col-sm-12">
            <div class="link-status">
                <div id="art"></div>
                <div id="parr"></div>
                <div id="inc"></div>
            </div>
        </div>
        @foreach($articulos as $articulo)
        <div class="col-md-4 my-auto articulo-item {{ $articulo->id}}"  onclick="showArticulo({{$articulo->id}})">
            <a class="item-art">
                <img src="img/{{ $articulo->img }}">
                <h4>Artículo {{$articulo->Numero}}</h4>
            <br>
            </a>
        </div>

        @endforeach
    </div>
     <div class="row">
                 @foreach($articulos as $art)
                    <div class="col-sm-12 parrafo" id="{{$art->id}}">
                    @foreach($parrafos as $pa)
                        @if($pa->Id_Articulo == $art->id)
                            <div class="item-parraf">
                                <div class="num">
                                    <b>{{ $pa->Numero_Parrafo }}</b>
                                </div>
                                <div class="title" >
                                    {{ $pa->Titulo }}
                                    <br>
                                    @if($pa->Texto)
                                    ({{ $pa->Texto }})
                                    @endif
                                </div>
                                <div class="fecha">
                                    @if($pa->FechaAuto == 1)
                                    {{ $fecha_act }}
                                    @else
                                    {{ $pa->Fecha }}
                                    @endif
                                </div>
                                <div class="show">
                                    <i class="fas fa-arrow-alt-circle-down icon-show"></i>
                                </div>



                            </div>

                            <ul class="lista-incisos">
                            <span class="text-parrafo">{{ $pa->Texto }}</span>
                            @foreach($incisos as $in)
                                @if($in->Id_Parrafo == $pa->id)
                                <li class="inciso" data-url="{{ route('transparencia.documento.inciso', ['id_inciso' => $in->id]) }}">
                                    <div class="item">
                                        <div class="num">
                                            {{ $in->Numero_Letra_Inciso }})
                                        </div>
                                        <div class="title">
                                            {{$in->Titulo}}
                                        </div>
                                        <div class="fecha">
                                        @if($in->FechaAuto == 1)
                                        {{ $fecha_act }}
                                        @else
                                        {{ $in->Fecha }}
                                        @endif
                                        </div>
                                    </div>
                                    <div class="documentos">
                                        <span class="text-inciso"> {{ $in->Texto }} </span>
                                        <div class="docss">

                                        </div>
                                    </div>
                                </li>

                                @endif
                            @endforeach
                            @foreach($documentos_parrafos as $dp)
                                    @if($dp->id == $pa->id)
                                   <!--     <a data-url="{{ route('transparencia.documento.parrafo', ['id_parrafo' => $pa->id]) }}" class="showDocsParraf">Ver Documento</a>-->
                                   <li>
                            <ul class="list-docs-parrafs">
                                <li><b style="color:#003865;">Documentos</b><li>
                                @foreach($documentos_parrafo as $docpa)
                                    @if($docpa->id == $pa->id)
                                        @if($docpa->NombreDocumento != 'NULL')
                                           <li class="itemDoc">
                                            <div class="dateCorrespnde">
                                                @if($docpa->FechaAutoDoc == 1)
                                                    {{ $fecha_corresponde }}
                                                @else
                                                {{ date('M Y', strtotime($docpa->FechaCorresponde)) }}

                                                @endif
                                            </div>

                                           <div class="nameDoc">
                                           <span>{{ $docpa->NombreDocumento }}</span>
                                           <div class="icon-doc">
                                                <a title="Descargar archivo" href="archivos-transparencia/{{ $docpa->Archivo }}" download><i class="fas fa-file-download"></i></a>
                                                @if(substr($docpa->Archivo, -3) == "pdf")
                                                <a title="Ver PDF" class="viewPDF" data-file="{{$docpa->Archivo}}"><i class="fas fa-file-pdf" style="color:red"></i></a>
                                                @endif
                                            </div>
                                            </div>
                                            <div class="dateDoc">{{  $docpa->FechaDocumento }}</div>
                                           </li>
                                        @else
                                            <li class="itemDoc">
                                              <div class="linkDoc"><a href="{{ $docpa->Link }}" target="_blank">Enlace</a></div>
                                              <div class="dateDoc">{{  $docpa->FechaDocumento }}</div>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                            </li>
                                    @endif
                                @endforeach

                            </ul>


                        @endif
                    @endforeach
                    </div>

                 @endforeach
                </div>

</div>

    <script>
        function showArticulo(id){
            $(".parrafo").hide();
            $("#"+id).show();
        }

        $('.inciso').on('click', function(){
            $(this).addClass("active"); //set active item
            $(".documentos").hide();
            //$(".documentos").show();
            $(this).find(".documentos").show();
            var token = $('meta[name="csrf-token"]').attr('content'),
            $this = $(this),
            url = $this.data('url');
            $.get(url,
            {
                _token: token,
            },
            function(data, status){
                $(".docss").empty().html(data);
                //$(".articulo-item").hide();
            });
        });

        $('.item-parraf').on('click', function(){
            $(this).addClass("active"); //set active item
            $(".documentos-parrafo").show();
            var token = $('meta[name="csrf-token"]').attr('content'),
            $this = $(this),
            url = $this.data('url');
            $.get(url,
            {
                _token: token,
            },
            function(data, status){
                $(".docss-parraf").empty().html(data);
                //$(".articulo-item").hide();
            });
        });


        $('.item-parraf').on('click', function(){
            $(this).next('.list-docs-parrafs').slideToggle( "slow" );

            if($(this).next('.lista-incisos').is(":visible")){
                $(this).find( ".fas" ).addClass( "fa-arrow-alt-circle-down icon-show"   );
                $(this).find( ".fas" ).removeClass( "fa-arrow-alt-circle-up" );
                $(this).next('.lista-incisos').slideToggle( "slow" );


            }else{
                $(this).find( ".fas" ).removeClass( "fa-arrow-alt-circle-down icon-show" );
                $(this).find( ".fas" ).addClass( "fa-arrow-alt-circle-up icon-show" );
                $(this).next('.lista-incisos').slideToggle( "slow" );

            }
            $(this).next(".list-docs-parrafs").css("display","block");
        });
        /*
    $('.item-art').on('click', function(){
            $( ".item-art" ).removeClass( "active" )
            $(this).addClass("active"); //set active item

            var token = $('meta[name="csrf-token"]').attr('content'),
            $this = $(this),
            url = $this.data('url');
            $.post(url,
        {
            _token: token,
        },
        function(data, status){
            $("#list-parrafos").empty().html(data);
            //$(".articulo-item").hide();

        });
    });

    $('#art').on('click', '#link-art', function(){
            $("#list-parrafos").empty();
            var token = $('meta[name="csrf-token"]').attr('content'),
            $this = $(this),
            url = $this.data('url');
            $.post(url,
        {
            _token: token,
        },
        function(data, status){
            $("#list-incisos").hide();
            $("#list-documentos").hide();
            $("#listpa").html(data);

        });
    });


    */
    </script>

<div class="mymodal" id="visor">
<div class="myhead">
<i class="fas fa-times" id="close_visor" style="color:red"></i>
</div>
<iframe id="pdfview" src="">
</iframe>
</div>

    <div class="row">
        <div class="col-sm-12" id="list-parrafos">


        </div>
        <div class="col-sm-12" id="list-incisos">


        </div>

        <div class="col-sm-12" id="list-documentos">

        </div>


        <div class="col-sm-12" id="listpa">

        </div>
    </div>

    <script>
    $(".viewPDF").click(function(){
     $('#visor').css('display', 'block');
     $("#pdfview").attr('src',$(this).data('file'));
   });
   $("#close_visor").click(function(){
    $('#visor').css('display', 'none');
   });



    </script>

  </div><!-- /.container -->


  @extends('layouts.footer')
