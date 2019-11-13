<table class="table table-bordered table-striped table-condense">
        <tbody>
        @if($whois == 'inciso')
        @foreach($documentos_inciso as $date => $incisos )
                <tr>
                    <th colspan="3" style="background-color: #F7F7F7">{{ $date }} ({{ $incisos->count()}})</th>
                </tr>
            @foreach($incisos as $doc)
            <tr>
                <td> {{
                    date('d', strtotime($doc->FechaDocumento)). ' de '. $Meses[date('m', strtotime($doc->FechaDocumento))]
                }} </td>
                <!-- <td> {{ date('M', strtotime($doc->FechaDocumento)) }} </td>-->
                <td>
                    @if($doc->Archivo)
                    <a href="transparencia/{{ $doc->Archivo }}">{{ $doc->NombreDocumento}}</a>
                    @else
                    <a href="{{ $doc->Link }}">{{ $doc->NombreDocumento}}</a>
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
