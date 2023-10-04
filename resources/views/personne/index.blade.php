@foreach ($personnes as $personne)
{{$personne->nom}}
{{$personne->prenom}}
{{$personne->age}}
{{$personne->email}}

<a href="{{route('personne.edit', $personne)}}">Modifier</a>

@endforeach
