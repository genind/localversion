<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("����������� ��������");
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
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >����������</a>
            <ul>
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >������������ � PR</a>
            <ul>
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >������</a>
            <ul>
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >������������� ����</a>
            <ul>
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >������</a>
            <ul>
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>
    </div>

    <div class="col-2">
        <div class="item"> <a class="title" >����������� �����</a>
            <ul>
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >�������������</a>
            <ul>
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >������� � ��������</a>
            <ul>
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >���������� � �����������</a>
            <ul>
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>

        <div class="item"> <a class="title" >����������� �����������</a>
            <ul>
                <li><a href="#" >������������</a></li>

                <li><a href="#" >������������� ������������ ��� ������������</a></li>

                <li><a href="#" >�������� �� ������ � ��������������� (PR) � �������</a></li>

                <li><a href="#" >������������ �����-������ (�����-���������)</a></li>
            </ul>
        </div>
    </div>
</div>

<a href="#" data-reveal-id="feedback-form" id="feedback" ></a>





<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>