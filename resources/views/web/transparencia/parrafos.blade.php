<table class="table table-bordered table-striped table-condense">
    <thead>
        <tr>
        <th>No.</th>
        <th colspan="2">Título</th>
        </tr>
    </thead>
        <tbody>
@foreach($parrafos as $parrafo)

    <tr class="item-parrafo" data-url="{{ route('transparencia.inciso', ['id_parrafo' => $parrafo->id]) }}" onclick="$('#parr').append('<a>-> Parrafo {{$parrafo->Numero_Parrafo}}</a>')">
        <td> {{ $parrafo->Numero_Parrafo}} </td>
        <td> {{ $parrafo->Titulo}} </td>
        <td>
           @foreach($doc_parrafos as $doc)

                @if($doc->id_parrafo == $parrafo->id && $doc->Archivo != 'NULL')
                <p>
                    {{ $doc->NombreDocumento }} - {{ $doc->FechaDocumento }}
                </p>
                @endif
                @if($doc->id_parrafo == $parrafo->id && $doc->Archivo == 'NULL')
                  <p><a href="{{ $doc->Link }}">Link </a> - {{ $doc->FechaDocumento }}</p>
                @endif

            @endforeach
        </td>
    </tr>

@endforeach
</tbody>
</table>



<script>



$('.item-parrafo').on('click', function(){
            var token = $('meta[name="csrf-token"]').attr('content'),
            $this = $(this),
            url = $this.data('url');
            $.post(url,
        {
            _token: token,
            id: 1,
        },
        function(data, status){
            $("#list-incisos").empty().html(data);
            $("#list-parrafos").hide()
        });
    });
</script>
