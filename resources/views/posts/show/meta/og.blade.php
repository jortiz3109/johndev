<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ $post->summary }}" />
<meta property="og:url" content="{{ route('posts.show', $post) }}" />
<meta property="og:site_name" content="{{ config('app.name') }}" />
