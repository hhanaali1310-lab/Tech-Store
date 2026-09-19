<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink: #16212D;
            --muted: #6B7684;
            --paper: #F4F6F8;
            --surface: #FFFFFF;
            --line: #E1E5EA;
            --accent: #0E7C6B;
            --accent-dark: #0A5F52;
        }

        body {
            font-family: 'Google Sans Flex', system-ui, sans-serif;
            background: #ECEFF2;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--ink);
        }

        .co-container {
            width: 90%;
            max-width: 420px;
            background: var(--surface);
            padding: 2.25rem;
            border-radius: 14px;
            border: 1px solid var(--line);
            box-shadow: 0 8px 24px rgba(22, 33, 45, 0.06);
        }

        .co-eyebrow {
            font-family: 'Google Sans Flex', monospace;
            font-size: 0.7rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            text-align: center;
            margin-bottom: 0.35rem;
        }

        h1 {
            font-family: 'Google Sans Flex', sans-serif;
            font-weight: 600;
            font-size: 1.6rem;
            text-align: center;
            margin: 0 0 1.5rem;
            color: var(--ink);
        }

        input {
            width: 100%;
            padding: 0.75rem 0.9rem;
            margin: 0.5rem 0;
            border: 1px solid var(--line);
            border-radius: 8px;
            outline: none;
            font-family: 'Google Sans Flex', system-ui, sans-serif;
            font-size: 0.92rem;
            color: var(--ink);
            transition: border-color 0.15s ease;
        }

        input:focus {
            border-color: var(--accent);
        }

        button {
            width: 100%;
            padding: 0.8rem;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: 'Google Sans Flex', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            margin-top: 0.75rem;
            transition: background 0.15s ease;
        }

        button:hover {
            background: var(--accent-dark);
        }

        .co-note {
            text-align: center;
            color: var(--muted);
            font-size: 0.78rem;
            margin-top: 0.85rem;
        }
    </style>

</head>
<body>

<div class="co-container">

    <div class="co-eyebrow">Almost There</div>
    <h1>🧾 Checkout</h1>

    <form action="/place-order" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Your Name" required>

        <input type="text" name="address" placeholder="Address" required>

        <input type="text" name="phone" placeholder="Phone" required>

        <button type="submit">Place Order</button>
    </form>

    <p class="co-note">Cash on Delivery available 💰</p>

</div>

</body>
</html>