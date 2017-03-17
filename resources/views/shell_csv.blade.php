e1_nome_completo,e1_email <br>
@foreach($data as $d)
{{ $d->e1_nome_completo }},{{ $d->e1_email }} <br>
@endforeach
