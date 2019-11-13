@extends('layouts.header')
  <div class="container main">
    <h1>Aviso de privacidad</h1>
    <embed src="{{ asset('vendor/pdfjs/web/viewer.html?file=aviso-privacidad.pdf')}} " width="100%" style="border:none; height:120vh;" />

</div>


@extends('layouts.footer')
