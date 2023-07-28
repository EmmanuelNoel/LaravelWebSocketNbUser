{{-- resources/views/post/index.blade.php --}}

<!DOCTYPE html>
<html>

<head>
    <title>Système de Likes avec WebSockets</title>
</head>

<body>
    <h1>Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                {{ $post->content }} - Likes: <span id="post-{{ $post->id }}-likes">{{ $post->likes }}</span>
                <form action="{{ route('posts.like', $post->id) }}" method="post">
                    @csrf
                    <button type="submit">Like</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Scripts pour les WebSockets -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Scripts pour les WebSockets -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Initialiser Laravel Echo
        import Echo from 'laravel-echo';
        window.io = require('socket.io-client');

        window.Echo = new Echo({
            broadcaster: 'socket.io',
            host: window.location.hostname +
            ':6001', // Assurez-vous que le port 6001 correspond à celui de votre serveur de WebSockets
        });

        // Écouter l'événement PostLiked et mettre à jour le nombre de likes en temps réel
        @foreach ($posts as $post)
            window.Echo.private('post.' + {{ $post->id }}).listen('PostLiked', (e) => {
                document.getElementById('post-{{ $post->id }}-likes').innerText = e.likes;
            });
        @endforeach
    </script>
</body>

</html>
