
<div class="card my-2 bg-light">
    <div class="card-body">
        <blockquote class="blockquote mb-0">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-4">
                <div class="position-relative">
                  <img class="rounded-circle" src="{{ asset('storage/'.$publication->profile->image) }}" width="100px">
                  {{$publication->profile->name}}
                  <a href="{{route('profiles.show',$publication->profile->id)}}" class="stretched-link"></a>
                </div>
                
              </div>
              <div class="col">
                <p>{{$publication->titre}}</p>
                @can('update', $publication)
                  <a class="float-end btn btn-primary btn-sm" href="{{route('publications.edit',$publication->id)}}">Modifier</a>
              
                @endcan

                @can('delete', $publication)
                <form action="{{route('publications.destroy',$publication->id)}}" method="post">
                  @csrf
                  @method("DELETE")
                  <button onclick="return confirm('Voulez vous vraiment supprimer cette publication ? ')" class="mx-2 float-end btn btn-danger btn-sm">Supprimer</button>
                  </form>
                @endcan
              </div>
            </div>
          </div>
          <hr>
        <p>{{$publication->body}}</p>
        @if(!is_null($publication->image))
        <footer class="blockquote-footer">
            <img class="img-fluid" src=" {{ asset('storage/'.$publication->image)}}" alt="{{$publication->titre}}">
         </footer>
        @endif
      </blockquote>
    </div>
  </div>