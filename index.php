<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Авторизация в личный кабинет</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="body-signin">
    <main class="form-signin">
        <form action="auth.php" method="post">
          <a href="http://edu.rsukosygin.ru/"><img class="mb-5" src="images/rsu_logo.svg" alt="" width="70%"></a>
          <h1 class="h3 mb-3 fw-normal">Личный кабинет</h1>
      
          <div class="form-floating">
            <input type="email" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Пароль</label>
          </div>
          <button class="w-100 btn btn-primary btn-lg mt-2 me-3" type="submit">Войти</button>
          <a href="sign_up.php" class="w-100 btn btn-outline-secondary btn-lg mt-2" type="submit">Регистрация</a>
          <p class="mt-5 mb-3 text-muted">&copy; 2022 РГУ им. А.Н. Косыгина</p>
        </form>
      </main>
  </body>
</html>