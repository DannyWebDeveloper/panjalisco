@extends('layouts.header')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <div class="container main">

    <div class="row">
        <div class="col-sm-12">
<h1>
Estrados
</h1>

    <div class="estrados">
    <ul class="categorias">
    @foreach($categorias as $cat)
            <li>
            <div class="item-categoria item-estrado" data-url="{{ route('estrados.documento', ['id' => $cat->id, 'nivel' => 1]) }}">
                <div class="name">{{ $cat->nombre }}</div>
                <div class="show">
                    <i class="fas fa-arrow-alt-circle-down icon-show"></i>
                </div>
            </div>

                <ul class="subcategorias">
                @foreach($subcategorias as $sub)
                    @if($sub->id_categoria == $cat->id)
                    <li>
                        <div class="item-subcategoria item-estrado" data-url="{{ route('estrados.documento', ['id' => $sub->id, 'nivel' => 2]) }}">
                            <div class="name">{{ $sub->nombre }}</div>
                            <div class="show">
                                <i class="fas fa-arrow-alt-circle-down icon-show"></i>
                            </div>
                        </div>
                        <ul class="grupos">
                            @foreach($grupos as $g)
                                @if($g->id_subcategoria == $sub->id)
                                    <li>
                                    <div class="item-grupo item-estrado" data-url="{{ route('estrados.documento', ['id' => $g->id, 'nivel' => 3]) }}">
                                        <div class="name">{{ $g->nombre }}</div>
                                        <div class="show">
                                            <i class="fas fa-arrow-alt-circle-down icon-show"></i>
                                        </div>
                                    </div>
                                        <ul class="docs-grupo">
                                            @foreach($documentos as $doc)
                                                @if($doc->id_grupo == $g->id && $doc->nivel == 3)
                                                    <li>
                                                    <div class="item-doc">
                                                        <div class="doc-name"><b><a href="{{$doc->documento}}" target="_blank" >{{ $doc->nombre }}</a></b></div>
                                                        <div class="doc-date">{{   date('d', strtotime($doc->fechaDocumento)). ' de '. $Meses[date('m', strtotime($doc->fechaDocumento))].' de '.date('Y', strtotime($doc->fechaDocumento)) }}</div>
                                                    </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>

                                    </li>


                                @endif
                            @endforeach
                            <li>
                                <ul>
                                    @foreach($documentos as $doc)
                                        @if($doc->id_subcategoria == $sub->id && $doc->nivel == 2)
                                            <li>
                                            <div class="item-doc">
                                                <div class="doc-name"><b><a href="{{$doc->documento}}" target="_blank" >{{ $doc->nombre }}</a></b></div>
                                                <div class="doc-date">{{   date('d', strtotime($doc->fechaDocumento)). ' de '. $Meses[date('m', strtotime($doc->fechaDocumento))].' de '.date('Y', strtotime($doc->fechaDocumento)) }}</div>
                                            </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>

                        </ul>
                    </li>
                    @endif
                @endforeach
                <li>
                    <ul>
                        @foreach($documentos as $doc)
                            @if($doc->id_categoria == $cat->id && $doc->nivel == 1)
                                <li>
                                    <div class="item-doc">
                                        <div class="doc-name"><b><a href="{{$doc->documento}}" target="_blank" >{{ $doc->nombre }}</a></b></div>
                                        <div class="doc-date">{{   date('d', strtotime($doc->fechaDocumento)). ' de '. $Meses[date('m', strtotime($doc->fechaDocumento))].' de '.date('Y', strtotime($doc->fechaDocumento)) }}</div>
                                    </div>
                                </li>

                            @endif
                        @endforeach
                    </ul>
                </li>
                </ul>
            </li>
    @endforeach
    </ul>
    </div>



        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <div class="docs-grupo">
        </div>
        </div>
    </div>
</div>
    <script>
        /*
        $('.item-categoria').on('click', function(){
            $(".docs-categoria").empty();
            $(this).addClass("active"); //set active item


            var token = $('meta[name="csrf-token"]').attr('content'),
            $this = $(this),
            url = $this.data('url');
            $.get(url,
            {
                _token: token,
            },
            function(data, status){
                $(".docs-categoria").empty().html(data);
                //$(".articulo-item").hide();
            });
        });

        $('.item-subcategoria').on('click', function(){

            $(".docs-subcategoria").empty();
            $(this).addClass("active"); //set active item
            $(".documents").hide();
            //$(".documentos").show();
            $(this).find(".documents").show();

            var token = $('meta[name="csrf-token"]').attr('content'),
            $this = $(this),
            url = $this.data('url');
            $.get(url,
            {
                _token: token,
            },
            function(data, status){
                $(".docs-subcategoria").empty().html(data);
                //$(".articulo-item").hide();
            });
        });
        $('.item-grupo').on('click', function(){
            $(".docs-grupo").empty();

            $(this).addClass("active"); //set active item
            //$(".documents").hide();
            //$(".documentos").show();
            $(this).find(".documents").show();

            var token = $('meta[name="csrf-token"]').attr('content'),
            $this = $(this),
            url = $this.data('url');
            $.get(url,
            {
                _token: token,
            },
            function(data, status){
                $(".docs-grupo").empty().html(data);
                //$(".articulo-item").hide();
            });
        });

        */
        $('.item-categoria').on('click', function(){
            //$(this).next('.documentos-cat').slideToggle( "slow" );
            $(".subcategorias").not(".active").hide();
            if($(this).next('.subcategorias').is(":visible")){
                $(this).find( ".fas" ).addClass( "fa-arrow-alt-circle-down icon-show"   );
                $(this).find( ".fas" ).removeClass( "fa-arrow-alt-circle-up" );
                $(this).next('.subcategorias').slideToggle( "slow" );
                $(this).next('.subcategorias').removeClass("active");
            }else{
                $(this).next('.subcategorias').addClass("active");
                $(this).find( ".fas" ).removeClass( "fa-arrow-alt-circle-down icon-show" );
                $(this).find( ".fas" ).addClass( "fa-arrow-alt-circle-up icon-show" );
                $(this).next('.subcategorias').slideToggle( "slow" );
            }
        });

        $('.item-subcategoria').on('click', function(){
            //$(this).next('.list-docs-parrafs').slideToggle( "slow" );
            $(".grupos").not(".active").hide();
            if($(this).next('.grupos').is(":visible")){
                $(this).find( ".fas" ).addClass( "fa-arrow-alt-circle-down icon-show"   );
                $(this).find( ".fas" ).removeClass( "fa-arrow-alt-circle-up" );
                $(this).next('.grupos').slideToggle( "slow" );
                $(this).next('.grupos').removeClass("active");
            }else{
                $(this).find( ".fas" ).removeClass( "fa-arrow-alt-circle-down icon-show" );
                $(this).find( ".fas" ).addClass( "fa-arrow-alt-circle-up icon-show" );
                $(this).next('.grupos').slideToggle( "slow" );
                $(this).next('.grupos').addClass("active");
            }
            //$(this).next(".list-docs-parrafs").css("display","block");
        });

        $('.item-grupo').on('click', function(){
            $(".docs-grupo").hide();
            //$(this).next('.list-docs-parrafs').slideToggle( "slow" );
            if($(this).next('.docs-grupo').is(":visible")){
                $(this).find( ".fas" ).addClass( "fa-arrow-alt-circle-down icon-show"   );
                $(this).find( ".fas" ).removeClass( "fa-arrow-alt-circle-up" );
                $(this).next('.docs-grupo').slideToggle( "slow" );
            }else{
                $(this).find( ".fas" ).removeClass( "fa-arrow-alt-circle-down icon-show" );
                $(this).find( ".fas" ).addClass( "fa-arrow-alt-circle-up icon-show" );
                $(this).next('.docs-grupo').slideToggle( "slow" );
            }
            //$(this).next(".list-docs-parrafs").css("display","block");
        });

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
@extends('layouts.footer')
