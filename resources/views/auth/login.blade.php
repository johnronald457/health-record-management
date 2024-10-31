<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" type="image/png" href="{{ asset('img/medic_logo.png') }}">
    <link rel="stylesheet" href="clusterlogin2.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            
        }

        body, html {
            height: 100%;
            background-color: #343a40;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #495057;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: #ffffff; /* Updated to #343a40 */
            padding: 40px;
            border-radius: 8px;
            width: 375px;
            text-align: center;
        
            animation: fadeInBox 1s ease-in-out;
            }
            @keyframes fadeInBox {
            from {
                opacity: 0;
                transform: translateY(20px); 
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo img {
            max-width: 100px;
            margin-bottom: 20px;
        }

        h2 {
            margin: 16px 0;
            font-size: 24px;
            font-weight: bold;
            color: #343a40; /* Updated to white for contrast */
        }

        form {
            width: 100%;
        }

        /* Input Group Styling */
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #343a40; /* Updated to white for contrast */
            font-weight: bold;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #495057;
            border-radius: 4px;
            font-size: 16px;
            color: #343a40;
            background-color: #f8f9fa;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .input-group input:focus {
            border-color: #343a40;
            box-shadow: 0 4px 12px rgba(134, 133, 133, 0.3);
            outline: none;
        }

        /* Submit Button Styling */
        button {
            width: 100%;
            padding: 12px;
            background-color: #495057;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #6c757d;
            transform: scale(1.05);
        }

        /* Sign Up Link Styling */
        .signup-link {
            margin-top: 15px;
            font-size: 14px;
            color: #495057; /* Updated to white for contrast */
        }

        .signup-link a {
            color: #495057;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
            color: #6c757d;
        }

        /* Logo text styling */
        .txt {
            font-size: 20px;
            font-weight: bold;
            color: #495057;
            text-transform: uppercase;
            text-align: center;
            position: relative;
            margin-bottom: 40px;
        }
    /* Button styling */
    .submit-button {
        width: 100%;
        padding: 12px;
        background-color: #495057;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 18px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Spinner styling */
    .submit-button.loading::after {
        content: "";
        width: 16px;
        height: 16px;
        border: 2px solid #ffffff;
        border-top-color: transparent;
        border-radius: 50%;
        position: absolute;
        right: 15px;
        animation: spinner 0.6s linear infinite;
    }

    /* Loading state */
    .submit-button.loading {
        pointer-events: none; /* Prevent multiple clicks */
        opacity: 0.8;
    }

    /* Spinner animation */
    @keyframes spinner {
        to { transform: rotate(360deg); }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="txt">
              <P><b>BESTLINK COLLEGE OF THE <br> PHILIPPINES </b></P>
            </div>
            <h2>Log in</h2>
            @if ($errors->any())
                <div>
                  <ul>
                      @foreach ($errors->all() as $error)
                        <div style="color:red;">{{ $error }}</div>
                      @endforeach
                  </ul>
                </div>
              @endif
            <form method="POST" action="{{ route('login') }}" onsubmit="showLoading(event)">
                  @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                  <button class="submit-button" type="submit">Login</button>
                  <!-- <p class="signup-link">Don't have an account? <a href="#">Sign up</a></p> -->
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add loading effect to the button on form submission
        function showLoading(event) {
            const button = document.querySelector('.submit-button');
            button.classList.add('loading');
            button.disabled = true; // Disable the button to prevent multiple clicks
        }
    </script>
</body>
</html>

