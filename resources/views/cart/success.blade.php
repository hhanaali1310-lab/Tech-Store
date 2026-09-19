<!DOCTYPE html>
<html>
<head>
    <title>Success</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink: #16212D;
            --muted: #6B7684;
            --surface: #FFFFFF;
            --line: #E1E5EA;
            --accent: #0E7C6B;
            --accent-dark: #0A5F52;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Google Sans Flex', system-ui, sans-serif;
            background: #ECEFF2;
        }

        .sc-box {
            text-align: center;
            background: var(--surface);
            padding: 3rem 2.5rem;
            border-radius: 16px;
            border: 1px solid var(--line);
            box-shadow: 0 8px 24px rgba(22, 33, 45, 0.06);
        }

        .sc-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #EAF6F2;
            color: var(--accent-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem;
            font-size: 1.6rem;
        }

        h1 {
            font-family: 'Google Sans Flex', sans-serif;
            font-weight: 600;
            color: var(--ink);
            font-size: 1.5rem;
            margin: 0;
        }

        p {
            color: var(--muted);
            margin-top: 0.6rem;
            font-size: 0.92rem;
        }

        a {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.75rem 1.5rem;
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-family: 'Google Sans Flex', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            transition: background 0.15s ease;
        }

        a:hover {
            background: var(--accent-dark);
        }
    </style>

</head>
<body>

<div class="sc-box">
    <div class="sc-icon">🎉</div>
    <h1>Order Placed Successfully</h1>
    <p>Thank you for your order!</p>

    <a href="/products">Back to Shop</a>
</div>

</body>
</html>