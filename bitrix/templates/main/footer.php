 	
    </div>
   
	<div id="footer">
		<div id="bot_map">
			<?$APPLICATION->IncludeComponent(	"bitrix:main.map", 
												"sitemap", 
												array(
													"CACHE_TYPE" => "N",
													"CACHE_TIME" => "3600",
													"SET_TITLE" => "Y",
													"LEVEL" => "5",
													"COL_NUM" => "3",
													"SHOW_DESCRIPTION" => "N"
												),
												false
											);
			?>
		</div>
		
		<div id="bot_contacts">
				<div>
				�������� ��������� ������������
				<br>
				� �������������� ������
				</div>
				
				<div style="margin-top:10px">
					���.: <div style="font-size:18px; display:inline;">+7 (499) 936-85-94</div>
					<br>
					����: <div style="font-size:18px; display:inline;">+7 (495) 434-02-20</div>
				</div>

				<div style="margin-top:10px">
					<a href="mailto:ippk_sales@pfur.ru" style="font-size:18px;">ippk_sales@pfur.ru</a>
				</div>
				<div style="margin-top:10px">
					<a href="http://vk.com/ippk_rudn"><img src="/images/icons/VK.png" alt="VK-icon"></a>
					<a href="http://www.facebook.com/ippkrudn"><img src="/images/icons/FB.png" alt="FB-icon"></a>
					<a href="https://twitter.com/ippk_rudn"><img src="/images/icons/TW.png" alt="TW-icon"></a>
					<a href="http://ok.ru/kursy.rudn "><img src="/images/icons/OK.png" alt="OK-icon"></a>
				</div> 

		</div>
		<script type="text/javascript">
		Cufon.now();
		</script>
	</div> <!-- #footer-->
</div> <!-- #wrapper -->


<!-- Cleversite chat button -->
	<script type='text/javascript'>
		(function() { 
			var s = document.createElement('script');
			s.type = 'text/javascript'; 
			s.async = true; 
			s.charset = 'utf-8';	
			s.src = '//cleversite.ru/cleversite/widget_new.php?supercode=1&referer_main='+encodeURIComponent(document.referrer)+'&clid=19172FNaHA&siteNew=25565'; 
			var ss = document.getElementsByTagName('script')[0]; 
			ss.parentNode.insertBefore(s, ss); 
		})(); 
	</script>
<!-- / End of Cleversite chat button -->
 </body>
</html>