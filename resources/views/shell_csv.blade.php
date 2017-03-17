e1_nome_completo,e1_email,e1_data_nascimento <br>
@foreach($data as $d)
  @foreach($d as $a)
  {{ $a }},
  @endforeach;
@endforeach
