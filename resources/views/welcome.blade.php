<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Picnic AnonyBox 🧺</title>
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
            --glass: rgba(255, 255, 255, 0.95);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #FF9A9E 0%, #FECFEF 99%, #FECFEF 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            padding: 20px;
        }

        .container {
            background: var(--glass);
            padding: 2.5rem;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            text-align: center;
            background: linear-gradient(45deg, #FF6B6B, #FF8E53);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        p.subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
        }

        select,
        textarea,
        input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #eee;
            border-radius: 12px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
        }

        select:focus,
        textarea:focus,
        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(45deg, #FF6B6B, #FF8E53);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.2);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(255, 107, 107, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        .hidden {
            display: none;
        }

        .alert {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 500;
            animation: fadeIn 0.5s ease;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .radio-group {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
            margin-bottom: 1.5rem;
        }

        .radio-option {
            position: relative;
        }

        .radio-option input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .radio-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem 0.5rem;
            background: #fff;
            border: 2px solid #eee;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            font-size: 0.85rem;
            height: 100%;
        }

        .radio-label i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .radio-option input:checked+.radio-label {
            border-color: var(--primary);
            background: rgba(255, 107, 107, 0.05);
            color: var(--primary);
            font-weight: 700;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Picnic AnonyBox 🧺</h1>
        <p class="subtitle">Share your thoughts anonymously!</p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul style="list-style: none;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('messages.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>What kind of message?</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" name="type" id="type_suggestion" value="suggestion" checked
                            onchange="toggleFields()">
                        <label for="type_suggestion" class="radio-label">
                            <span>💡</span>
                            Suggestion
                        </label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="type" id="type_weird" value="weird" onchange="toggleFields()">
                        <label for="type_weird" class="radio-label">
                            <span>🤪</span>
                            Say Weird
                        </label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="type" id="type_person" value="person" onchange="toggleFields()">
                        <label for="type_person" class="radio-label">
                            <span>👤</span>
                            About Someone
                        </label>
                    </div>
                </div>
            </div>

            <div id="person-field" class="form-group hidden">
                <label for="target_person">Who is this about?</label>
                <select name="target_person" id="target_person">
                    <option value="">Select a person...</option>
                    @foreach($people as $person)
                        <option value="{{ $person->name }}">{{ $person->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="content" id="content-label">Your Message</label>
                <textarea name="content" id="content" placeholder="Type your thoughts here..."></textarea>
            </div>

            <button type="submit">Send Anonymous Message 🚀</button>
        </form>
    </div>

    <script>
        function toggleFields() {
            const type = document.querySelector('input[name="type"]:checked').value;
            const personField = document.getElementById('person-field');
            const contentLabel = document.getElementById('content-label');
            const contentInput = document.getElementById('content');

            if (type === 'person') {
                personField.classList.remove('hidden');
                contentLabel.innerText = "What do you want to say about them?";
                contentInput.placeholder = "Be nice (or funny)...";
            } else if (type === 'weird') {
                personField.classList.add('hidden');
                contentLabel.innerText = "Say something weird";
                contentInput.placeholder = "Make them guess who you are...";
            } else {
                personField.classList.add('hidden');
                contentLabel.innerText = "Your Suggestion";
                contentInput.placeholder = "We should have more...";
            }
        }
    </script>
</body>

</html>