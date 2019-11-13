<table class="table table-bordered table-striped table-condense">
    <thead>
        <tr>
        <th>leter</th>
        <th>Título</th>
        </tr>
    </thead>
        <tbody>
@foreach($incisos as $inciso)

    <tr class="item-inciso" data-url="{{ route('transparencia.documento.inciso', ['id_inciso' => $inciso->idtrans_Incisos]) }}" onclick="$('#inc').append('<a>-> Inciso {{$inciso->Numero_Letra_Inciso}}</a>')">
        <td> {{ $inciso->Numero_Letra_Inciso}} </td>
        <td> {{ $inciso->Titulo}} </td>

    </tr>

@endforeach
</tbody>
</table>
<script>
$('.item-inciso').on('click', function(){
            var token = $('meta[name="csrf-token"]').attr('content'),
            $this = $(this),
            url = $this.data('url');
            $.post(url,
        {
            _token: token,
            id: 1,
        },
        function(data, status){
            $("#list-documentos").empty().html(data);
            $("#list-incisos").hide();
        });
    });
</script>
