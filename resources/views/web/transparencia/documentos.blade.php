<table class="table table-bordered table-striped table-condense">
        <tbody>
@if($whois == 'inciso')
        @foreach($documentos_inciso as $date => $incisos )
                <tr>
                    <th colspan="4" style="background-color: #F7F7F7">{{ $date }} ({{ $incisos->count()}})</th>
                </tr>
            @foreach($incisos as $doc)
            <tr class="item-doc">
                <td>
                    @if($doc->FechaAutoDoc == 1)
                    {{ $Meses[date('m', strtotime($fecha_corresponde))] }}
                    @else
                    {{
                    $Meses[date('m', strtotime($doc->FechaCorresponde))]
                    }}
                    @endif
                </td>
                <td>
                    @if($doc->Archivo)
                    <div class="name-doc">
                        {{ $doc->NombreDocumento}}

                    </div>
                    <div class="icon-doc">
                        <a title="Descargar archivo" href="archivos-transparencia/{{ $doc->Archivo }}" download><i class="fas fa-file-download"></i></a>
                        @if(substr($doc->Archivo, -3) == "pdf")
                        <a title="Ver PDF" class="viewPDF" data-file="{{$doc->Archivo}}"><i class="fas fa-file-pdf" style="color:red"></i></a>
                        @endif
                    </div>
                    @else
                    <div class="name-doc">
                        {{ $doc->NombreDocumento}}
                    </div>
                    <div class="icon-doc">
                        <a title="Ir al enlace" href="{{ $doc->Link }}" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                    </div>
                    @endif
                </td>
                <td>
                    @if($doc->FechaAutoDoc == 1)
                    {{ date('d', strtotime($fecha_act)). ' de '. $Meses[date('m', strtotime($fecha_act))] }}
                    @else
                    {{
                    date('d', strtotime($doc->FechaDocumento)). ' de '. $Meses[date('m', strtotime($doc->FechaDocumento))]
                    }}
                    @endif
                </td>
            </tr>
            @endforeach
        @endforeach
    @endif

    @if($whois == 'parrafo')
        @foreach($documentos_parrafo as $date => $parrafos )
                <tr>
                    <th colspan="3" style="background-color: #F7F7F7">{{ $date }} ({{ $parrafos->count()}})</th>
                </tr>
            @foreach($parrafos as $doc)
            <tr>
                <td> {{
                    date('d', strtotime($doc->FechaDocumento)). ' de '. $Meses[date('m', strtotime($doc->FechaDocumento))]
                }} </td>
                <!-- <td> {{ date('M', strtotime($doc->FechaDocumento)) }} </td>-->
                <td>
                @if($doc->Link != 'NULL')
                <a href="{{ $doc->Link }}">{{ $doc->link }}Link</a>
                @else
                <a href="transparencia/{{ $doc->Archivo }}">{{ $doc->NombreDocumento}}</a>
                @endif
                </td>

            </tr>
            @endforeach
        @endforeach
    @endif
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
