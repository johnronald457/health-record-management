<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestlink College - Login</title>

    

    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;

  background-color: #f4f4f4;
  animation: fadeIn 1s ease-in-out; 
}

@keyframes fadeIn {
  from {
      opacity: 0;
  }
  to {
      opacity: 1;
  }
}

.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

.login-box {
  background-color: #ffffff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
  text-align: center;
  width: 280px;
  box-shadow: 5px 5px 10px #888888;
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

.logo {
  width: 100px;
  margin-bottom: 15px;
  opacity: 0;
  animation: fadeInBox 1s ease-in-out forwards; 
}

h2 {
  color: #28282b;
  margin-bottom: 15px;
  font-size: 23px;
  opacity: 0;
  animation: fadeInBox 1s ease-in-out forwards; 
}

.input-group {
  margin-bottom: 15px;
  text-align: left;
  opacity: 0;
  animation: fadeInBox 1s ease-in-out forwards; 
}

.input-group label {
  display: block;
  font-size: 14px;
  color: #333333;
  margin-bottom: 5px;
}

.input-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #dddddd;
  border-radius: 5px;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.input-group input:focus {
  border-color: #003366;
  box-shadow: 0 0 5px rgba(0, 51, 102, 0.2); 
}

.input-group button {
  width: 100%;
  padding: 10px;
  background-color: #003366;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease; 
}

.input-group button:hover {
  background-color: #002244;
  box-shadow: 0 4px 15px rgba(0, 34, 68, 0.2); 
}

.input-group button:active {
  transform: scale(0.98); 
}

.button-container {
  text-align: center;
}

.submit-button {
  display: inline-block;
  padding: 10px 80px;
  font-size: 16px;
  color: white;
  background-color: #003366; 
  border: none;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.3s, ease;
}
  
.submit-button:hover {
  background-color: #003366; 
}
  
.submit-button:active {
  background-color: #002244; 
  box-shadow: 0 5px #003366;
  transform: translateY(2px);
}
  
.footer {
  margin-top: 20px;
  font-size: 12px;
  color: #777;
  opacity: 0;
  animation: fadeInBox 1s ease-in-out forwards; 
}

.footer a {
  color: #003366;
  text-decoration: none;
}

.footer a:hover {
  color: #002244;
}

</style>
</head>

<body>

  <div class="login-container">
      <div class="login-box">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
          <h2><b>Sign in</b></h2>

              @if ($errors->any())
                <div>
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
              @endif

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
                  <button class="submit-button" type="submit">Login</button>
                </div>
            </form>
      </div>
  </div>

</body>
</html>
