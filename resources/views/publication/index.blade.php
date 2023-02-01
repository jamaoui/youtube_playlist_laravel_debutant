
<x-master title="Publications"><h3>Publications</h3>
<div class="container w-75 mx-auto">
    <div class="row">
    @foreach ($publications as $publication)
      <x-publication :publication="$publication"/>
    @endforeach
    </div>
</div>
{{ $publications->links() }}
</x-master>