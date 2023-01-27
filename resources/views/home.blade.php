<h3>Salamo 3alaikom {{ $nom }} {{$prenom}}</h3>
@unless(count($languages)>0)
Pas de cours pour l'instant.
@else
    <h4>Cours : </h4>
<table border="1" width="100%">
    <tr>
        <th>Cours</th>
    </tr>
    @foreach($languages as $language)
        <tr>
            <td>{{$language}}</td>
        </tr>
    @endforeach
</table>
@endunless
