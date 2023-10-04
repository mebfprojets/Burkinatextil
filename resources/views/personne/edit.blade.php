
<form method="POST" action="{{route('personne.update', $personne)}}">

    @csrf
    @method('PUT')
    Nom : <input type="text" name="nom" value="{{$personne->nom}}" placeholder="Entrer votre nom" />
    Prenom : <input type="text" name="prenom" value="{{$personne->prenom}}" placeholder="Entrer votre prenom" />
    Age : <input type="text" name="age" value="{{$personne->age}}" placeholder="Entrer votre age" />
    Email : <input type="text" name="email" value="{{$personne->email}}" placeholder="Entrer votre mail" />
<input type="submit" value="Valider">
</form>