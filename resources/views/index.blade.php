<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.0/css/all.css">
    {{-- Подключение собственного CSS через Laravel Mix --}}
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <title>Дома игры престолов</title>
  </head>


  <body>
    <!-- TOAST -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="info-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Информация</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
          <i class="fa-solid fa-rotate fa-spin me-3"></i>Функция временно недоступна!</div>
      </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar header navbar-expand-lg bg-dark navbar-dark w-100 px-0">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="top-left d-flex justify-content-start align-items-center">
          <a class="navbar-brand" href="#" onclick="location.reload()">
            <img src="https://i.pinimg.com/originals/74/0f/5a/740f5a66187b37efe4c3a28199c3a20e.png" class="img-fluid" alt="IronThron" width="70">
          </a>
          <span class="navbar-text fs-5">Дома игры престолов</span>
        </div>
        <div class="tip-right">
          <!-- Кнопка для больших экранов -->
          <button type="button" class="btn btn-warning d-none d-lg-inline-block" data-bs-toggle="toast" data-bs-target="#info-toast"> Загрузить</button>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>

      <div class="collapse navbar-collapse" id="navbarMenu">
        <div class="d-flex w-100 justify-content-end mt-2 mt-lg-0">
          <!-- Кнопка для мобильных -->
          <button type="button" class="btn btn-warning d-lg-none" data-bs-toggle="toast" data-bs-target="#info-toast">Загрузить</button>
        </div>
      </div>
    </nav>

    <!-- MAIN -->
    <div class="container my-3">
      <h1 class="text mb-3">Дома игры престолов</h1>

      <!-- CARDS -->
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 row-cols-wide-7 g-3">
        <div class="col">
          <div class="card h-100">
            <div class="position-relative">
              <img src="https://cdn.vokrug.tv/pic/post/b/5/2/0/small_b520fe7fe471ee22eb95046e2a697fe8.jpg" class="img-fluid w-100 h-100" alt="Герб Старков">
              <span class="badge position-absolute top-0 start-0 m-2">Герб</span>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Дом Старков</h5>
              <p class="card-text">Дом Старков — один из великих домов Семи Королевств и правящий дом Севера.
              Родовой замок: Винтерфелл. Девиз: «Зима близко».
              </p>
              <button type="button" class="btn btn-detail mt-auto" data-bs-toggle="modal" data-bs-target="#modal-1">Подробнее</button>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
              <div class="position-relative">
                <img src="https://cdn.vokrug.tv/pic/post/a/b/b/5/small_abb5ea539bbd6a9edef8e5bad640ac80.jpg" class="img-fluid w-100 h-100" alt="Герб Таргариенов">
                <span class="badge position-absolute top-0 start-0 m-2">Герб</span>
              </div>
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">Дом Таргариенов</h5>
                <p class="card-text">Дом Таргариенов — правящий дом Семи Королевств почти 300 лет.
                Девиз: «Пламя и кровь».
                </p>
                <button type="button" class="btn btn-detail mt-auto" data-bs-toggle="modal" data-bs-target="#modal-2">Подробнее</button>
              </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <div class="position-relative">
              <img src="https://cdn.vokrug.tv/pic/post/7/3/d/5/small_73d5b5958ff47e8f1c55eebbb05563a8.jpg" class="img-fluid w-100 h-100" alt="Герб Ланнистеров">
              <span class="badge position-absolute top-0 start-0 m-2">Герб</span>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Дом Ланнистеров</h5>
              <p class="card-text">Дом Ланнистеров — один из великих домов Запада. Девиз: «Услышь мой рёв!».
              Родовой замок: Утёс Кастерли.
              </p>
              <button type="button" class="btn btn-detail mt-auto" data-bs-toggle="modal" data-bs-target="#modal-3">Подробнее</button>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <div class="position-relative">
              <img src="https://cdn.vokrug.tv/pic/post/7/4/9/4/small_749440bae8f9daae56b10150672a9db2.jpg" class="img-fluid w-100 h-100" alt="Герб Арренов">
              <span class="badge position-absolute top-0 start-0 m-2">Герб</span>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Дом Арренов</h5>
              <p class="card-text">Дом Арренов — правители Долины. Родовой замок: Орлиное Гнездо.
              Девиз: «Высокий как честь».
              </p>
              <button type="button" class="btn btn-detail mt-auto" data-bs-toggle="modal" data-bs-target="#modal-4">Подробнее</button>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <div class="position-relative">
              <img src="https://cdn.vokrug.tv/pic/post/3/8/8/c/small_388c5c6a7543eb4eab3c4ff817b4a7c0.jpg" class="img-fluid w-100 h-100" alt="Герб Грейджоев">
              <span class="badge position-absolute top-0 start-0 m-2">Герб</span>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Дом Грейджоев</h5>
              <p class="card-text">Дом Грейджоев — правящий дом на Железных Островах. Родовой замок: Пайк.
              Девиз: «Мы не сеем».
              </p>
              <button type="button" class="btn btn-detail mt-auto" data-bs-toggle="modal" data-bs-target="#modal-5">Подробнее</button>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <div class="position-relative">
              <img src="https://cdn.vokrug.tv/pic/post/8/e/f/2/small_8ef28b85fcf9ea31b35f79ca187efb8f.jpg" class="img-fluid w-100 h-100" alt="Герб Грейджоев">
              <span class="badge position-absolute top-0 start-0 m-2">Герб</span>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Дом Баратеонов</h5>
              <p class="card-text">Дом Баратеонов — самый младший из великих домов Семи Королевств и правящий дом Штормовых земель. Девиз — «Нам ярость».</p>
              <button type="button" class="btn btn-detail mt-auto" data-bs-toggle="modal" data-bs-target="#modal-6">Подробнее</button>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <div class="position-relative">
              <img src="https://cdn.vokrug.tv/pic/post/9/4/9/0/small_9490f75a47771fd8094f0bcd73a12904.jpg" class="img-fluid w-100 h-100" alt="Герб Грейджоев">
              <span class="badge position-absolute top-0 start-0 m-2">Герб</span>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Дом Мартеллов</h5>
              <p class="card-text">Дом Мартеллов является одним из великих домов Семи Королевств и правящим домом королевства Дорн.
              Девиз — «Непреклонные, несгибаемые, несдающиеся».
              </p>
              <button type="button" class="btn btn-detail mt-auto" data-bs-toggle="modal" data-bs-target="#modal-7">Подробнее</button>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <div class="position-relative">
              <img src="https://cdn.vokrug.tv/pic/post/2/c/c/5/small_2cc5366a169f685a59144f116e8a6cae.jpg" class="img-fluid w-100 h-100" alt="Герб Грейджоев">
              <span class="badge position-absolute top-0 start-0 m-2">Герб</span>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Дом Тиреллов</h5>
              <p class="card-text">Дом Тиреллов является одним из великих домов Семи Королевств и правящим домом Простора.
                Их девизом являются слова «Вырастая — крепнем».
              </p>
              <button type="button" class="btn btn-detail mt-auto" data-bs-toggle="modal" data-bs-target="#modal-8">Подробнее</button>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <div class="position-relative">
              <img src="https://cdn.vokrug.tv/pic/post/b/0/f/1/small_b0f1f12e84128ee75416e05c96736859.jpg" class="img-fluid w-100 h-100" alt="Герб Грейджоев">
              <span class="badge position-absolute top-0 start-0 m-2">Герб</span>
            </div>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Дом Талли</h5>
              <p class="card-text">Дом Талли — один из великих домов Семи Королевств. Их девизом являются слова «Семья, долг, честь».</p>
              <button type="button" class="btn btn-detail mt-auto" data-bs-toggle="modal" data-bs-target="#modal-9">Подробнее</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <footer class="bottom-bar bg-dark text-light border-top border-secondary py-3">
      <div class="container-fluid">
        <div class="row justify-content-between align-items-center">
          <div class="col-12 col-md-auto text-center text-md-start mb-2 mb-md-0">
            <div class="author fw-bold">Лоскутникова Елизавета</div>
          </div>
          <div class="col-12 col-md-auto d-flex justify-content-center justify-content-md-end gap-3">
            <a href="https://github.com/erzsebet-l" target="_blank" class="social-link">
              <img src="https://avatars.mds.yandex.net/i?id=7fecdca8b83644e824eaf54db6dc2602bc160548-5233303-images-thumbs&n=13" alt="Github">
            </a>
            <a href="https://messenger.360.yandex.ru/p/822a6f01-f333-9446-4ee1-9953855d7e28?utm_source=invite" target="_blank" class="social-link">
              <img src="https://www.iguides.ru/upload/iblock/463/463bd7676d638841f0962c35e35be182.png" alt="Яндекс Мессенджер">
            </a>
          </div>
        </div>
      </div>
    </footer>

    <!-- MODALS -->
    <div class="modal fade" id="modal-1" tabindex="-1" aria-labelledby="modalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel1">Дом Старков</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <img src="https://cdn.vokrug.tv/pic/post/b/5/2/0/small_b520fe7fe471ee22eb95046e2a697fe8.jpg" class="img-fluid mb-3" alt="Герб Старков">
            <p>Дом Старков — один из великих домов Семи Королевств и правящий дом Севера. Их родовым замком является Винтерфелл, одна из старейших крепостей в Семи Королевствах. На гербе Старков изображён серый лютоволк, бегущий по белому полю, а их девиз — «Зима близко». Бастарды, рождённые на Севере, получают фамилию «Сноу» (дословно «Снег»).</p>
            <p>Дом Старков был королями Севера за тысячи лет до того, как дом Таргариенов завоевал Вестерос, после чего Старки стали лордами Винтерфелла и Хранителями Севера. Благодаря чести и верности долгу дом Старков находится ближе всех благородных домов к героизму.</p> 
            <p>В течение романов Старки разделяются из-за <span class="text-primary" data-bs-toggle="popover" data-bs-trigger="focus"
            data-bs-title="Война Пяти Королей" data-bs-content="<strong>Война Пяти Королей</strong> — война,которая шла в вымышленном мире,изображённом в серии книг Джорджа Мартина «Песнь льда и огня»,а также в сериале «Игра престолов».">Войны Пяти Королей</span>, и судьба дома остаётся неопределённой, так как большинство персонажей считают (ошибочно), что все законные сыновья Неда Старка мертвы. </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-2" tabindex="-1" aria-labelledby="modalLabel2" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel2">Дом Таргариенов</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
             <img src="https://cdn.vokrug.tv/pic/post/a/b/b/5/small_abb5ea539bbd6a9edef8e5bad640ac80.jpg" class="img-fluid mb-3" alt="Герб Таргариенов">
            <p>Дом Таргариенов был правящим домом Семи Королевств на протяжении почти трёхсот лет, с 
                королевским двором, располагающимся в Королевской Гавани. На их гербе изображён красный трёхголовый 
                огнедышащий дракон на чёрном поле, а девизом является «Пламя и кровь».</p>
            <p>Таргариены были родом из Валирии на континенте Эссос. Прежде чем Валирия была уничтожена, 
                Таргариены обосновались на Драконьем Камне. Через века после Рока Валирии Эйегон Таргариен завоевал
                шесть из Семи Королевств с помощью своих драконов, а позже его потомки получили седьмое королевство
                с помощью династического брака. Драконы Таргариенов были последними известными живыми драконами, и 
                как долгое время считалось, вымерли задолго до событий «Игры престолов». О представителях рода Таргариенов
                 говорят, что они «от крови дракона»; как правило, они имеют серебристо-золотые или платиновые волосы и 
                 фиолетовые глаза, начиная от сиреневого цвета до фиолетового.</p>
            <p>За пятнадцать лет до событий первой книги Таргариены были низложены в результате
                восстания Роберта Баратеона, а будучи ещё детьми, Визерис и Дейенерис бегут на <span class="text-primary" data-bs-toggle="popover"
                data-bs-trigger="focus" title="Эссос" data-bs-content="<strong>Эссос (англ. Essos)</strong> — один из вымышленных континентов во вселенной, где происходит действие фантастической саги Джорджа Мартина «Песнь льда и огня» и её экранизаций. ">Эссос</span>.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-3" tabindex="-1" aria-labelledby="modalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel3">Дом Ланнистеров</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <img src="https://cdn.vokrug.tv/pic/post/7/3/d/5/small_73d5b5958ff47e8f1c55eebbb05563a8.jpg" class="img-fluid mb-3" alt="Герб Ланнистеров">
            <p>Дом Ланнистеров является одним из великих домов Семи Королевств и правящим домом Запада.
                Их резиденция находится в Утёсе Кастерли (варианты перевода: Бобровый Утёс, Кастерли-Рок),
                а на гербе изображён геральдический золотой лев на алом поле; их девизом являются слова «Услышь мой рёв!».
                Однако более известным, чем их официальный девиз, является фраза «Ланнистеры всегда платят свои долги».
                Ланнистеры правили как Короли Скалы до тех пор, пока дом Таргариенов не вторгся в Вестерос.
                Они остаются самой богатой семьёй в Семи Королевствах из-за золотых рудников, расположенных на их землях.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-4" tabindex="-1" aria-labelledby="modalLabel4" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel4">Дом Арренов</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <img src="https://cdn.vokrug.tv/pic/post/7/4/9/4/small_749440bae8f9daae56b10150672a9db2.jpg" class="img-fluid mb-3" alt="Герб Арренов">
            <p>Дом Арренов является одним из великих домов Семи Королевств и правителями Долины. 
                Аррены происходят от Королей Горы и Долины. Их родовой замок называется Орлиное Гнездо,
                который расположен на вершине горы и считается неприступным. Их герб отображает белую луну
                и сокола на небесно-синем поле, а их девиз — «Высокий как честь». Бастарды Долины носят фамилию «Стоун» (дословно «Камень»).</p>
            <p>Джон Аррен был главой дома до тех пор, пока не был отравлен незадолго до событий «Игры престолов».
                Его единственный сын Роберт Аррен, становится лордом Орлиного Гнезда, а его мать Лиза Талли — <span class="text-primary" data-bs-toggle="popover"
                data-bs-trigger="focus" title="Ре́гент" data-bs-content="<strong>Ре́гент (лат. regere «управлять, царствовать»)</strong> — правитель, кто правит страной при отсутствии, малолетстве или болезни государя.">регентом</span>.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-5" tabindex="-1" aria-labelledby="modalLabel5" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel5">Дом Грейджоев</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <img src="https://cdn.vokrug.tv/pic/post/3/8/8/c/small_388c5c6a7543eb4eab3c4ff817b4a7c0.jpg" class="img-fluid mb-3" alt="Герб Грейджоев">
            <p>Дом Грейджоев является одним из великих домов Семи Королевств и правящим домом на Железных Островах,
              где проживают Железнорождённые. Их родовой замок называется Пайк и расположен на одноимённом острове.
              На их гербе изображён золотой <span class="text-primary" data-bs-toggle="popover"
              data-bs-trigger="focus" title="Кра́кен" data-bs-content="<strong>Кра́кен (англ. The Kraken)</strong> — мифологическое морское чудовище огромных размеров, головоногий моллюск, известный по описаниям исландских моряков, из языка которых и происходит его название. Фигурирует в книгах, фильмах, играх и других произведениях искусства.">кракен</span> на чёрном поле, а их девизом являются слова «Мы не сеем».
              Грейджои стали верховными лордами Железных Островов после того, как дом Таргариенов покорил Семь Королевств,
              что позволило Железнорождённым выбирать, кто ими будет править.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-6" tabindex="-1" aria-labelledby="modalLabel6" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel6">Дом Баратеонов</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <img src="https://cdn.vokrug.tv/pic/post/8/e/f/2/small_8ef28b85fcf9ea31b35f79ca187efb8f.jpg" class="img-fluid mb-3" alt="Герб Баратеонов">
            <p>Дом Баратеонов — самый младший из великих домов Семи Королевств и правящий дом Штормовых земель.
              Он был основан бастардом, братом первого короля из дома Таргариенов Орисом Баратеоном.
              Родовым замком дома Баратеонов является Штормовой предел, которым управляет Ренли; резиденция королевской 
              ветви дома располагается в Королевской Гавани, на Драконьем Камне распоряжается Станнис Баратеон. 
              На гербе Баратеонов изображён коронованный чёрный олень на золотом поле; венец символизировал родство Баратеонов
              с домом Дюррандонов, древних Королей Шторма. Девиз — «Нам ярость». Бастарды, рождённые в Штормовых землях, 
              как правило, имеют фамилию «Шторм».</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-7" tabindex="-1" aria-labelledby="modalLabel6" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel7">Дом Мартеллов </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <img src="https://cdn.vokrug.tv/pic/post/9/4/9/0/small_9490f75a47771fd8094f0bcd73a12904.jpg" class="img-fluid mb-3" alt="Герб Мартеллов">
            <p>Дом Мартеллов является одним из великих домов Семи Королевств и правящим домом королевства Дорн.
              Их родовым замком является Солнечное Копьё; их герб отображает пронзённое золотым копьём красное солнце
              на оранжевом поле, а их девиз — «Непреклонные, несгибаемые, несдающиеся». Бастарды Дорна, 
              как правило, имеют фамилию «Сэнд» (дословно «Песок»). Дорн вместе с домом Мартеллов культурно, 
              этнически и политически отличается от остальной части Семи Королевств. Правители Дорна имеют титулы
              принцев или принцесс, потому что Таргариенам не удалось завоевать Дорн, но они присоединили его путём брака.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-8" tabindex="-1" aria-labelledby="modalLabel6" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel8">Дом Тиреллов</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <img src="https://cdn.vokrug.tv/pic/post/2/c/c/5/small_2cc5366a169f685a59144f116e8a6cae.jpg" class="img-fluid mb-3" alt="Герб Тиреллов">
            <p>Дом Тиреллов является одним из великих домов Семи Королевств и правящим домом Простора.
              Их родовым замком является Хайгарден; на гербе отображена золотая роза на зелёном поле, 
              а их девизом являются слова «Вырастая — крепнем». Бастардам Простора обычно даётся фамилия «Флауэрс» (дословно «Цветы»). 
              Тиреллы стали лордами Простора после того, как правивший Простором до нашествия Таргариенов дом Гарднеров был истреблён, 
              а дом Таргариенов сделал Тиреллов, бывших стюардов Гарднеров, лордами Хайгардена. Так как дом Флорентов имел больше прав на 
              Хайгарден, Тиррелы часто рассматриваются как «выскочки-стюарды» другими лордами Простора и великими домами; однако женщины 
              Тиреллов отличаются проницательностью и мудрым правлением.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-9" tabindex="-1" aria-labelledby="modalLabel6" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel9">Дом Талли</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <img src="https://cdn.vokrug.tv/pic/post/b/0/f/1/small_b0f1f12e84128ee75416e05c96736859.jpg" class="img-fluid mb-3" alt="Герб Талли">
            <p>Дом Талли — один из великих домов Семи Королевств. Их родовой замок называется Риверран, а на их гербе отображена
              прыгающая серебряная форель на поле из голубых и красных волн. Их девизом являются слова «Семья, долг, честь». 
              Бастарды, рождённые в Речных землях, как правило имеют фамилию «Риверс» (дословно «Река»). Когда дом Таргариенов 
              начал вторжение в Вестерос, лорд Талли был среди первых, кто поприветствовал захватчиков и перешёл к ним на службу. 
              В свою очередь, Таргариены сделали дом Талли правящим домом Речных земель.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
