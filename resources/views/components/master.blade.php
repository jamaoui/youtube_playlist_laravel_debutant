<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js'])
    <title>Social network | {{$title}}</title>
    <script>
        window.onload = function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

}
        
    </script>
</head>
<body>
    @include('partials.nav')
    <main>
        <div class="container">
            <div class="row my-3">        
                @include('partials.flashbag')
            </div>
        
            {{$slot}}
        </div>
    </main>
    @include('partials.footer')
</body>
</html>