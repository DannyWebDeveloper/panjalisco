@if(count($documentos) > 0)
<div class="docs">
@if($nivel == 1)
<h5>Documentos de la categoria</h5>
@elseif($nivel == 2)
<h5>Documentos de la subcategoria</h5>
@elseif($nivel == 3)
@endif
<ul class="documentos-estrado">
@foreach($documentos as $date => $docs )
        @foreach($docs as $doc)
            <li class="item-doc">
                    @if($doc->documento)
                    <div class="name-doc">
                        {{ $doc->nombre}}
                    </div>
                    <div class="icon-doc">
                        <a title="Descargar archivo" href="archivos-extrados/{{ $doc->documento }}" download><i class="fas fa-file-download"></i></a>
                        @if(substr($doc->documento, -3) == "pdf")
                        <a title="Ver PDF" class="viewPDF" data-file="{{$doc->documento}}"><i class="fas fa-file-pdf" style="color:red"></i></a>
                        @endif
                    </div>
                    @endif
                    <div>
                    {{
                    date('d', strtotime($doc->fechaDocumento)). ' de '. $Meses[date('m', strtotime($doc->fechaDocumento))]
                    }}
                    </div>
            </li>
        @endforeach
@endforeach
</ul>
</div>
@endif
<!--

<table class="table table-bordered table-striped table-condense">
    <tbody>
        @foreach($documentos as $date => $docs )

                <tr>
                    <th colspan="4" style="background-color: #F7F7F7">{{ $date }} ({{ $docs->count()}})</th>
                </tr>
        -->
    <!--
            @foreach($docs as $doc)
            <tr class="item-doc">
                <td>
                    {{ $Meses[date('m', strtotime($doc->fechaDocumento))] }}
                </td>
                <td>
                    @if($doc->documento)
                    <div class="name-doc">
                        {{ $doc->nombre}}

                    </div>
                    <div class="icon-doc">
                        <a title="Descargar archivo" href="archivos-extrados/{{ $doc->documento }}" download><i class="fas fa-file-download"></i></a>
                        @if(substr($doc->documento, -3) == "pdf")
                        <a title="Ver PDF" class="viewPDF" data-file="{{$doc->documento}}"><i class="fas fa-file-pdf" style="color:red"></i></a>
                        @endif
                    </div>
                    @endif
                </td>
                <td>
                    {{
                    date('d', strtotime($doc->fechaDocumento)). ' de '. $Meses[date('m', strtotime($doc->fechaDocumento))]
                    }}

                </td>
            </tr>
            @endforeach
        @endforeach

    </tbody>
</table>

<script>
 $(document).ready(function(){
   $(".viewPDF").click(function(){
     $('#visor').css('display', 'block');
     $("#pdfview").attr('src',$(this).data('file'));
   });
   /*
   $("#close_visor").click(function(){
    $('#visor').css('display', 'none');
   });
   */

});
</script>
-->
