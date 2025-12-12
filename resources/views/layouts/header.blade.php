<!-- TOAST -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="info-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Информация</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body">
      <i class="fa-solid fa-rotate fa-spin me-3"></i>Функция временно недоступна!
    </div>
  </div>
</div>

<!-- NAVBAR -->
<nav class="navbar header navbar-expand-lg bg-dark navbar-dark w-100 px-0">
  <div class="container-fluid d-flex justify-content-between align-items-center ">
    <div class="top-left d-flex justify-content-start align-items-center">
      <a class="navbar-brand" href="/houses" onclick="location.reload()">
        <img src="https://i.pinimg.com/originals/74/0f/5a/740f5a66187b37efe4c3a28199c3a20e.png" class="img-fluid" alt="IronThron" width="70">
      </a>
      <span class="navbar-text fs-5">Дома игры престолов</span>
    </div>
    <div class="tip-right">
      <button type="button" class="btn btn-warning" data-toast>Загрузить</button>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>

  <div class="collapse navbar-collapse" id="navbarMenu">
    <div class="d-flex w-100 justify-content-end mt-2 mt-lg-0">
      <button type="button" class="btn btn-warning d-lg-none" data-bs-toggle="toast" data-bs-target="#info-toast">Загрузить</button>
    </div>
  </div>
</nav>