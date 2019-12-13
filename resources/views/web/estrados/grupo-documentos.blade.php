@if(count($documentos) > 0)
<div class="docs">
<h5>Documentos de {{ $nameGrupo[0]->nombre }}</h5>
<table class="table table-bordered table-striped table-condense">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Documento</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documentos as $date => $docs )
            @foreach($docs as $doc)
            <tr class="item-doc">
            <td style="width: 20%;">
                    {{
                    date('d', strtotime($doc->fechaDocumento)). ' de '. $Meses[date('m', strtotime($doc->fechaDocumento))].' de '.date('Y', strtotime($doc->fechaDocumento))
                    }}
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

            </tr>
            @endforeach
        @endforeach

    </tbody>
</table>

</div>
@endif
<!--
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
