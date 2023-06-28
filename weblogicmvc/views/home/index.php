<div class="container col-xl-10 col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-lg-5 py-5">
    <div class="col-lg-7 text-center text-lg-start">
      <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">
        </?= APP_NAME ?>
      </h1>
      <p class="col-lg-10 fs-4">Faça login para entrar na aplicação.</p>
    </div>
    <div class="col-md-10 mx-auto col-lg-5">
      <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="index.php?c=auth&a=login" method="POST">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="username" placeholder="username" name="username">
          <label for="username">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="password" placeholder="password" name="password">
          <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
        <hr class="my-4">
      </form>
    </div>
  </div>
</div>