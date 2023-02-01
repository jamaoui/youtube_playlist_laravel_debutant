<x-master title="Mon Profile"><h3>Profiles</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    @foreach ($profiles as $profile)
        <x-profile-card :profile="$profile" />
    @endforeach
    </div>
{{ $profiles->links() }}
</x-master>