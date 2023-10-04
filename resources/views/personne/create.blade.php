
<form method="POST" action="{{route('personne.create')}}">

    @csrf

    Nom : <input type="text" name="nom" placeholder="Entrer votre nom" />
    Prenom : <input type="text" name="prenom" placeholder="Entrer votre prenom" />
    Age : <input type="text" name="age" placeholder="Entrer votre age" />
    Email : <input type="text" name="email" placeholder="Entrer votre mail" />
<input type="submit" value="Valider">
</form>