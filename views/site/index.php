<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$this->registerCssFile('/css/index.css'); ?>
<div class="container">
    <div class="upper__info">
        <div class="map__header"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Запорожье</div>
        <div class="contact__info">
            <div class="map__header"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>050 108 99 81
            </div>
            <div class="social__info">
                <a target="_blank" href="https://www.instagram.com/quiz_prizvanie/" class="link__instagram"></a>
                <!--                <a target="_blank" href="" class="link__facebook"></a>-->
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-offset-2 col-xl-8 col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12">
            <div class="flex_center">
                <div class="header__super">
                    <div class="header__text">Призвание</div>
                    <span>Призвание</span></div>

                <div class="start__background" data-id="registration_quiz">Сыграть в турнир
                    <div class="start__button"></div>
                </div>
            </div>
        </div>
    </div>
    <!--  <div class="bottom__info">
          <div class="bottom__quiz1">
              <div class="quiz__text">Турнир “Друзья”</div>
              <div class="quiz__date">
                  <div class="quiz__date_text"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>16
                      ноября в 20:00
                  </div>
              </div>
          </div>
          <div class="bottom__quiz2">
              <div class="quiz__text">Турнир “Гарри Поттер”</div>
              <div class="quiz__date">
                  <div class="quiz__date_text"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>20
                      ноября в 20:00
                  </div>
              </div>
          </div>
      </div>-->
</div>
<div id="popup_registration" class="popup__close">
</div>
<div id="popup_window" class="popup__window popup__close">
    <div class="reg_form">
        <div class="close__icon_button"><span class="glyphicon glyphicon-remove-circle" data-id="close_quiz"
                                              aria-hidden="true"></span></div>
        <div class="css__loader invisible" id="css_loader">
            <div class="cssload-thecube">
                <div class="cssload-cube cssload-c1"></div>
                <div class="cssload-cube cssload-c2"></div>
                <div class="cssload-cube cssload-c4"></div>
                <div class="cssload-cube cssload-c3"></div>
            </div>
        </div>
        <div class="form__register visible" id="register_form">
            <p class="form__text">Регистрация на игру</p>
            <input type="text" name="name" placeholder="Ваше имя" required id="name_text">
            <div id="name_warning" style="opacity: 0">Введите имя</div>
            <input type="tel" name="phone" placeholder="Ваш телефон" required id="phone_text">
            <div id="phone_warning" style="opacity: 0">Введите номер телефона</div>
            <input id="send_message" type="submit" class="start__quiz_button" value="Сыграть в турнир">
        </div>
        <div class="form__register invisible inactive" id="registration_done">
            <p class="form__text">Спасибо за регистрацию на турнир!</p>
            <p class="form__info">Наш менеджер свяжется с вами в ближайшее время.</p>
            <p class="form__info">Наши соц. сети</p>
            <div class="form__social">
                <a target="_blank" href="https://www.instagram.com/quiz_prizvanie/" class="link__instagram"></a>
                <!--  <a target="_blank" href="https://www.vk.com/quiz_prizvanie/" class="link__vkontakte"></a>-->
            </div>
        </div>
        <div class="form__register invisible inactive" id="registration_error">
            <p class="form__text">К сожалению, заявка не отправлена.</p>
            <p class="form__info">Повторите попытку позже!</p>
            <p class="form__info">Наши соц. сети</p>
            <div class="form__social">
                <a target="_blank" href="https://www.instagram.com/quiz_prizvanie/" class="link__instagram"></a>
                <!--  <a target="_blank" href="https://www.vk.com/quiz_prizvanie/" class="link__vkontakte"></a>-->
            </div>
        </div>
    </div>
</div>
<script src="//code.jivosite.com/widget.js" data-jv-id="NkKwU8IvGs" async></script>
<?= $this->registerJsFile('/js/main.js'); ?>
