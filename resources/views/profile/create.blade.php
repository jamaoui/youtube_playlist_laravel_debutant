<x-master title="Mon Profile"><h3>Ajouter profile</h3>
  @if ($errors->any())
  <x-alert type="danger">
    <h6>Errors : </h6>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{!! $error !!}</li>
      @endforeach
    </ul>
    </x-alert>
  @endif
    <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nom complet</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
              <div class="text-danger">{{$message}}</div>  
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            @error('email')
            <div class="text-danger">{{$message}}</div>  
          @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Confirmation du mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="bio" class="form-control">{{ old('bio') }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
          </div>
          <div class="d-grid my-2">
            <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
          </div>
    </form>
</x-master>