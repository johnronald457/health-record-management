<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="clusterlogin2.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            
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
        
        }

        .logo img {
            max-width: 100px;
            margin-bottom: 20px;
        }

        h2 {
            margin: 20px 0;
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


    </style>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="txt">
              <P><b>BESTLINK COLLEGE OF THE <br> PHILIPPINES </b></P>
            </div>
            <h2>Sign in</h2>
            <form method="POST" action="{{ route('login') }}">
                  @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="input-group">
                  <button class="submit-button" type="submit">Sign in</button>
                  <p class="signup-link">Don't have an account? <a href="#">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

