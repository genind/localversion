<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Направления обучения");
?>
<script>
    $(document).ready(function() {

        Cufon('#lerning-directions .item a.title', { fontFamily: 'PFBeauSansPro', hover: true });
        $('#lerning-directions .item a.title').click(function() {

            if(!$(this).parents('.item').hasClass('open')) {
                $(this).parents('.item').addClass('pre-open');
                Cufon.refresh('#lerning-directions .item a.title');
                $(this).parents('.item').find('ul').slideDown(function(){ $(this).parents('.item').addClass('open');
                    $(this).parents('.item').removeClass('pre-open');
                    Cufon.refresh('#lerning-directions .item a.title');
                });

            }
            else {
                $(this).parents('.item').find('ul').slideUp(function(){
                    $(this).parents('.item').removeClass('open');
                    Cufon.refresh('#lerning-directions .item a.title'); });
            }
        });
    });
</script>

<div id="lerning-directions">
    <div class="col-1">
        <div class="item"> <a class="title" >Mini-MBA</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >Менеджмент</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >Журналистика и PR</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >Дизайн</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >Бухгалтерский учет</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >Туризм</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>
    </div>

    <div class="col-2">
        <div class="item"> <a class="title" >Иностранные языки</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >Юриспруденция</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >Красота и здоровье</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >Психология и образование</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >Специальное образование</a>
            <ul>
                <li><a href="#" >Журналистика</a></li>

                <li><a href="#" >Телевизионная журналистика для телеведущего</a></li>

                <li><a href="#" >Менеджер по связям с общественностью (PR) и рекламе</a></li>

                <li><a href="#" >Руководитель пресс-службы (Пресс-секретарь)</a></li>
            </ul>
        </div>
    </div>
</div>

<a href="#" data-reveal-id="feedback-form" id="feedback" ></a>





<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>