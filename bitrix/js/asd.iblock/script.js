var sListTable = '';
var sStartCh = '';
var sEndCh = '';

$(document).ready(function(){
	$('#asd_export_prop_all').live('click', function(){
		var $bChecked = $(this).attr('checked');
		$.each($('.asd_export_prop'), function(){
			if ($bChecked) {
				$(this).attr('checked', 'checked');
			} else {
				$(this).removeAttr('checked');
			}
		});
	});
	$('.list input').live('click', function(e){
		if ($(this).attr('name') == 'ID[]') {
			if (sStartCh.length>0 && e.shiftKey && sStartCh!=$(this).val()) {
				sEndCh = $(this).val();
			} else {
				sStartCh = $(this).val();
			}

			var bWasChecked = false;
			var bDoCheck = false;

			if (e.shiftKey && sStartCh.length>0 && sEndCh.length>0) {
				$('.list input').each(function(){
					if ($(this).attr('name') == 'ID[]') {
						if ($(this).val()==sStartCh || $(this).val()==sEndCh) {
							bDoCheck = !bDoCheck;
							bWasChecked = true;
						}
						if (bDoCheck) {
							this.checked = true;
							obListTable = new JCAdminList(sListTable);
							obListTable.SelectRow(this);
							$(this).attr('checked', true);
						}
					}
				});
			}

			if (bWasChecked)
				sStartCh = sEndCh = '';

		}
	});
});

function ASDSelIBChange(value) {
	BX.style(BX('asd_ib_dest_cont'), 'display', ('asd_copy' == value || 'asd_move' == value ? 'inline-block' : 'none'));
	BX.style(BX('asd_ib_dest_sect'), 'display', ('asd_copy' == value || 'asd_move' == value ? 'inline-block' : 'none'));
}

function ASDSelIBShow(lang) {
	if (-1 < BX('asd_ib_dest').selectedIndex) {
		var intIBlockID = BX('asd_ib_dest').options[BX('asd_ib_dest').selectedIndex].value;
		jsUtils.OpenWindow('/bitrix/admin/iblock_section_search.php?lang='+lang+'&IBLOCK_ID='+intIBlockID+'&n=asd_sect_id', 600, 500);
	}
}