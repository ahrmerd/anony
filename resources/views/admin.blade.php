<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Picnic Day Reading 🧺</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #FF6B6B;
            --secondary: #4ECDC4;
            --accent: #FFE66D;
            --dark: #2C3E50;
            --light: #F7F9FC;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: #F7F9FC;
            color: var(--dark);
            padding: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 3rem;
            background: linear-gradient(45deg, #FF6B6B, #FF8E53);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section {
            margin-bottom: 4rem;
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary);
            border-bottom: 2px solid #eee;
            padding-bottom: 1rem;
        }

        .card {
            background: #fff;
            border: 1px solid #eee;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .card-content {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 0.5rem;
        }

        .card-meta {
            font-size: 0.9rem;
            color: #888;
            font-style: italic;
        }

        .empty-state {
            text-align: center;
            color: #aaa;
            font-style: italic;
            padding: 2rem;
        }
    </style>
</head>

<body>
    <h1>🧺 Picnic Day Messages</h1>

    <div class="section">
        <h2 class="section-title">💡 Suggestions</h2>
        @if(isset($messages['suggestion']))
            @foreach($messages['suggestion'] as $msg)
                <div class="card">
                    <div class="card-content">{{ $msg->content }}</div>
                    <div class="card-meta">Submitted {{ $msg->created_at->diffForHumans() }}</div>
                </div>
            @endforeach
        @else
            <div class="empty-state">No suggestions yet.</div>
        @endif
    </div>

    <div class="section">
        <h2 class="section-title">🤪 Weird Things</h2>
        @if(isset($messages['weird']))
            @foreach($messages['weird'] as $msg)
                <div class="card">
                    <div class="card-content">{{ $msg->content }}</div>
                    <div class="card-meta">Submitted {{ $msg->created_at->diffForHumans() }}</div>
                </div>
            @endforeach
        @else
            <div class="empty-state">No weird things yet.</div>
        @endif
    </div>

    <div class="section">
        <h2 class="section-title">👤 About Someone</h2>
        @if(isset($messages['person']))
            @foreach($messages['person'] as $msg)
                <div class="card">
                    <div class="card-content">"{{ $msg->content }}"</div>
                    <div class="card-meta">About: <strong>{{ $msg->target_person }}</strong> • Submitted
                        {{ $msg->created_at->diffForHumans() }}</div>
                </div>
            @endforeach
        @else
            <div class="empty-state">No messages about people yet.</div>
        @endif
    </div>
</body>

</html>