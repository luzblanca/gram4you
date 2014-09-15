<?
error_reporting(error_reporting() & ~E_NOTICE & ~E_DEPRECATED);

$campaign = $_GET['utm_campaign'];
$referer = $_SERVER['HTTP_REFERER'];
if (stristr($referer, 'yandex.ru'))     { $search = 'text=';    $crawler = 'Yandex';    }
if (stristr($referer, 'rambler.ru'))    { $search = 'words=';   $crawler = 'Rambler';   }
if (stristr($referer, 'google.ru'))     { $search = 'q=';       $crawler = 'Google';    }
if (stristr($referer, 'google.com'))    { $search = 'q=';       $crawler = 'Google';    }
if (stristr($referer, 'mail.ru'))       { $search = 'q=';       $crawler = 'Mail.Ru';   }
if (stristr($referer, 'bing.com'))      { $search = 'q=';       $crawler = 'Bing';      }
if (stristr($referer, 'qip.ru'))        { $search = 'query=';   $crawler = 'QIP';       }
if (isset($crawler)) 
{
    $phrase = urldecode($referer);
    eregi($search.'([^&]*)', $phrase.'&', $phrase2);
    $phrase = $phrase2[1];
    $referer = $crawler;
}

$month_names = array(
 1=>"января",
    "февраля",
    "марта",
    "апреля",
    "мая",
    "июня",
    "июля",
    "августа",
    "сентября",
    "октября",
    "ноября",
    "декабря",
);

$promo_date = date('j');
$promo_month = date('n');

if ($promo_date < 5)
    $promo_date = 10;
elseif ($promo_date >= 20)
{
    $promo_date = 10;
    $promo_month += 1;
    if ($promo_month > 12)
        $promo_month = 1;
}
else
    $promo_date = 25;

$promo_date = $promo_date.' '.$month_names[$promo_month];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=1250">
        <meta name="description" content="Курсы английского языка в Москве">
        <meta name="keywords" content="грамматика,курсы,английский,москва" />
        <title>Gram for You</title>
        <link type="image/png" rel="icon" href="images/favicon.png" />
        <link type="text/css" rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>
        <script type="text/javascript" src="js/jquery.watermark.min.js"></script>
        <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="script.js"></script>
    </head>
    <body>
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
        (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
        try {
        w.yaCounter25873628 = new Ya.Metrika({id:25873628,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true});
        } catch(e) { }
        });
        var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="//mc.yandex.ru/watch/25873628" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

        <div id="callback_overlay"></div>
        <div id="callback_form" class="send_request_vertical">
            <form>
                <img id="close_callback_form" src="images/cross.png" alt="" />
                <p>Закажите обратный звонок</p>
                <input type="hidden" name="action" value="обратный звонок"/>
                <input type="text" name="name" class="form_name"/><br/><br/>
                <input type="text" name="phone" class="form_phone"/><br/><br/>
                <div class="post_result"></div><br/>
                <input name="referer" type="hidden" value="<?=$referer?>">
                <input name="phrase" type="hidden" value="<?=$phrase?>">
                <input name="campaign" type="hidden" value="<?=$campaign?>">
                <input type="submit" class="form_submit" value="Заказать звонок"/>
                <p class="small_text">Ваши контактные данные в безопасности<br/> и не будут переданы третьим лицам</p>
            </form>
        </div>

        <div id="background">
            <div class="header">
                <img id="image" src="images/logo.png" alt="" width="165" height="42" />
                <p id="text">семинары по английскому языку</p>
                <div id="phone"><a href="skype:+79684668787?call">8 968 466 87 87</a></div>
                <div id="callback">Закажите звонок</div>
            </div>
            <img src="images/separator.png" alt="" width="1200" height="1"/>
            <p class="large_text">Научим разбираться во всех временах<br/>английского глагола<br/>и уверенно применять их на практике</p>
            <p>Семинар «Все времена английского за 3 часа»<br/>на основе авторской разработки (Москва)</p>
            <div id="main_block">
                <img src="images/back.png" alt="" width="1200" height="447"/>
                
                <div id="circles_promo_block">
                    <img src="images/circles.png" alt="" width="450" height="370"/>
                    <p id="small"><em>Акция!</em></p>
                    <p id="big">Стоимость семинара<br/><strike>2000</strike><br/>
                        <em>1500 <span class="rouble">b</span></em><br/>до <?=$promo_date?></p>
                </div>
                <div class="send_request_vertical">
                    <form>
                        <p>Запишитесь на семинар</p>
                        <input type="hidden" name="action" value="запись на семинар"/>
                        <input type="text" name="name" class="form_name"/><br/><br/>
                        <input type="text" name="phone" class="form_phone"/><br/><br/>
                        <div class="post_result"></div><br/>
                        <input name="referer" type="hidden" value="<?=$referer?>">
                        <input name="phrase" type="hidden" value="<?=$phrase?>">
                        <input name="campaign" type="hidden" value="<?=$campaign?>">
                        <input type="submit" class="form_submit" value="Отправить заявку"/>
                        <p class="small_text">Ваши контактные данные в безопасности<br/> и не будут переданы третьим лицам</p>
                    </form>
                </div>
            </div>
            <div id="stats_block">
                <p id="left">более<br/><em>10</em><br/>лет практики</p>
                <p id="center">более<br/><em>2000</em><br/>учеников</p>
                <p id="right"><em>1</em><br/><br/>крутая<br/>таблица</p>
            </div>
            <img src="images/separator.png" alt="" width="1200" height="1"/>
            <p class="large_text">Для кого этот семинар?</p>
            <p>Вы только начали изучать английский<br/>и хотите сразу разобраться в системе времен</p>
            <p>Вы уже учите английский<br/>и хотите объединить кусочки знаний в систему и восполнить пробелы</p>
            <p>Вы давно не занимались и хотите освежить знания</p>
            <p>Вы хотите получить стимул к дальнейшему изучению языка</p>
            <div class="send_request_horizontal">
                <form>
                    <p>Запишитесь на семинар</p>
                    <input type="hidden" name="action" value="запись на семинар"/>
                    <input type="text" name="name" class="form_name"/>
                    <input type="text" name="phone" class="form_phone"/>
                    <div class="post_result"></div>
                    <input name="referer" type="hidden" value="<?=$referer?>">
                    <input name="phrase" type="hidden" value="<?=$phrase?>">
                    <input name="campaign" type="hidden" value="<?=$campaign?>">
                    <input type="submit" class="form_submit" value="Отправить заявку"/>
                </form>
            </div>
            <img src="images/separator.png" alt="" width="1200" height="1"/>
            <p class="large_text">Что такого особенного в этом семинаре?</p>
            <div id="unique_block">
                <div id="left">
                    <img src="images/100percents.png" alt="" width="130" height="125"/>
                    <p>гарантия<br/>понимания</p>
                </div>
                <div id="center">
                    <img src="images/transformer.png" alt="" width="130" height="125"/>
                    <p>уникальная<br/>таблица-транформер</p>
                </div>
                <div id="right">
                    <img src="images/100percents.png" alt="" width="130" height="125"/>
                    <p>удовольствия<br/>от занятия</p>
                </div>
            </div>
            <img src="images/separator.png" alt="" width="1200" height="1"/>
            <p class="large_text">Отзывы</p>
            
            <div id="reviews_block">
                <p id="left"><b>Аня:</b> <i>Это потрясающе! Впервые в жизни у меня есть полная уверенность когда какое время надо употребить! А что самое главное, я заметила, что используя ту методику, что дали нам на семинаре, можно не только быстро запомнить времена, но и довольно быстро научиться автоматически (не задумываясь) правильно строить фразы. Просто замечательно! Очень благодарна преподавателю!</i></p>
                <p id="center"><b>Оля:</b> <i>Любопытный семинар. Не пожалела, что сходила. Можно сказать, впервые увидела в одной схеме не только образование всех времен, но и то как они разворачиваются во времени, что дало мне понимание, когда какое время надо использовать. При этом все настолько просто, что диву даешься как раньше сам до этого не додумался. В общем, мне понравилось - рекомендую всем, кто хочет быстро и легко вспомнить все времена и запомнить их.</i></p>
                <p id="right"><b>Наталья:</b> <i>Очень здорово!!! Волшебный квадрат работает, мы его разобрали весь!! это ведь большой объем информации, но материал подан легко, доходчиво! и три часа пролетели быстро. Даже мой уровень знания языка позволил делать упражнения со всеми наравне. и, что самое главное, я за это занятие перешла на новый уровень и очень мне это понравилось.</i></p>
            </div>
            <img src="images/separator.png" alt="" width="1200" height="1"/>
            <p class="large_text">Как это работает?</p>
            <div id="details_block">
                <div id="details_1">
                    <img src="images/circle.png" alt="" width="153" height="150" />
                    <div id="label"><p>Приходишь</p></div>
                    <p>Структурируем<br/>накопленные<br/>знания</p>
                </div>
                <img id="arrow_1" src="images/arrow.png" alt="" width="77" height="25" />
                <div id="details_2">
                    <img src="images/circle.png" alt="" width="153" height="150" />
                    <div id="label"><p>Слушаешь</p></div>
                    <p>Дополняем<br/>недостающими<br/>элементами</p>
                </div>
                <img id="arrow_2" src="images/arrow.png" alt="" width="77" height="25" />
                <div id="details_3">
                    <img src="images/circle.png" alt="" width="153" height="150" />
                    <div id="label"><p>Практикуешь</p></div>
                    <p>Получаем базу<br/>на всю<br/>жизнь</p>
                </div>
                <img id="arrow_3" src="images/arrow.png" alt="" width="77" height="25" />
                <div id="details_4">
                    <img src="images/circle.png" alt="" width="153" height="150" />
                    <div id="label"><p>Пользуешься</p></div>
                    <p>Общаемся<br/>с<br/>удовольствием</p>
                </div>
            </div>
            <img src="images/separator.png" alt="" width="1200" height="1"/>
            <div id="promo_block">
                <div id="promo_block_text">
                    <p><em>Акция!</em> Стоимость семинара <strike>2000</strike> <em>1500</em> рублей до <?=$promo_date?></p>
                </div>
            </div>
            <div class="send_request_horizontal">
                <form>
                    <p>Запишитесь на семинар</p>
                    <input type="hidden" name="action" value="запись на семинар"/>
                    <input type="text" name="name" class="form_name"/>
                    <input type="text" name="phone" class="form_phone"/>
                    <div class="post_result"></div>
                    <input name="referer" type="hidden" value="<?=$referer?>">
                    <input name="phrase" type="hidden" value="<?=$phrase?>">
                    <input type="submit" class="form_submit" value="Отправить заявку"/>
                </form>
            </div>
            <img src="images/separator.png" alt="" width="1200" height="1"/>
            <div class="header">
                <img id="image" src="images/logo.png" alt="" width="165" height="42"/>
                <p id="text">семинары по английскому языку</p>
                <div id="phone"><a href="skype:+79684668787?call">8 968 466 87 87</a></div>
                <div id="callback">Закажите звонок</div>
                <div id="social"><p class="small_text">Мы в соц. сетях</p>
                    <a href="https://vk.com/gram4you" target="_blank"><img src="images/vk.png" alt=""/></a>
                    <a href="http://instagram.com/gram4you" target="_blank"><img src="images/instagram.png" alt=""/></a>
                </div>
            </div>
            <p></p>
        </div>
    </body>
</html>