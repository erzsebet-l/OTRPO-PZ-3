import * as bootstrap from 'bootstrap'; 
import '../scss/style.scss';

import $ from 'jquery'; // импортируем jQuery для удобной работы с DOM

$(function () { // когда DOM готов, выполняем код

  //----------------TOAST----------------
  const toastButtons = $('[data-bs-toggle="toast"]'); // выбираем все кнопки, которые вызывают toast
  const toastElement = document.getElementById('info-toast'); // получаем сам элемент toast по id

  toastButtons.on('click', function () { // при клике на кнопку toast
    if (toastElement) { // если элемент toast существует
      const toast = new bootstrap.Toast(toastElement, { delay: 5000, autohide: true }); // создаем toast с задержкой 3 сек и автоскрытием
      toast.show(); // показываем toast
      console.log('TOAST: показан'); 
    }
  });


  //----------------POPOVER----------------
  $('[data-bs-toggle="popover"]').each(function () { // для каждого элемента с popover
    try {
      new bootstrap.Popover(this, { trigger: 'hover focus', html: true, container: 'body' }); // инициализируем popover, показывается при hover или фокусе
    } catch (e) { // если ошибка
      console.warn('Ошибка popover:', e); // выводим предупреждение
    }
  });
  console.log('Popovers: готовы'); 

  //----------------MODALS----------------
  const $modals = $('.modal'); // выбираем все модалки на странице
  $modals.each(function () { // для каждой модалки
    new bootstrap.Modal(this, { keyboard: false }); // создаем экземпляр модалки и отключаем закрытие по ESC
  });

  //----------------NAVIGATION MODALS----------------
  function navigateModal(targetIndex) { // функция для переключения модалок
    const $openModal = $('.modal.show'); // находим открытую модалку
    if (!$openModal.length) return; // если модалка не открыта, завершаем

    const currentIndex = $modals.index($openModal); // определяем индекс текущей открытой модалки
    const count = $modals.length; // общее количество модалок
    const index = ((targetIndex % count) + count) % count; // корректируем индекс, чтобы он был в диапазоне [0, count-1]

    console.log('Переход от мадалки', currentIndex, 'к', index); 

    const currentInstance = bootstrap.Modal.getInstance($openModal[0]); // получаем экземпляр текущей модалки
    const nextInstance = bootstrap.Modal.getInstance($modals[index]); // получаем экземпляр следующей модалки

    document.activeElement.blur(); // убираем фокус с текущего элемента 

    nextInstance.show(); // сразу показываем новую модалку

    setTimeout(() => { // через короткую задержку
      currentInstance.hide(); // скрываем старую модалку
    }, 20);
  }

  // обработка нажатий клавиш
  $(document).on('keydown', function (e) { // когда нажата клавиша
    const $openModal = $('.modal.show'); // находим открытую модалку
    if (!$openModal.length) return; // если модалка не открыта, завершаем

    const index = $modals.index($openModal); // индекс текущей модалки
    if (e.key == 'ArrowRight'){ // если нажата стрелка вправо
      console.log('Стрелка Вправо: в мадалке', index); 
    }

    if (e.key == 'ArrowLeft'){ // если нажата стрелка влево
      console.log('Стрелка Влево: в мадалке', index); 
    }

    if (e.key === 'ArrowRight') { // если стрелка вправо
      e.preventDefault(); // отменяем стандартное действие
      navigateModal(index + 1); // переключаем на следующую модалку
    }

    if (e.key === 'ArrowLeft') { // если стрелка влево
      e.preventDefault(); // отменяем стандартное действие
      navigateModal(index - 1); // переключаем на предыдущую модалку
    }

    if (e.key === 'Escape') { // если нажата ESC
      const instance = bootstrap.Modal.getInstance($openModal[0]); // получаем текущую модалку
      instance.hide(); // закрываем её
      console.log('ESC: закрыта модалка', index); 
    }
  });
});
