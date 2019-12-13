@extends('layouts.header')
  <div class="container main">
    <h1>Directorio</h1>

    <table class="table">
    <thead><tr><th>Nombre</th> <th>Cargo</th></tr></thead>
    <tbody>
    @foreach($directorio as $dir)
      <tr><td>{{ $dir->nombre }}</td><td>{{ $dir->cargo }}</td></tr>
    @endforeach
    </tbody>
    </table>
</div>


@extends('layouts.footer')
