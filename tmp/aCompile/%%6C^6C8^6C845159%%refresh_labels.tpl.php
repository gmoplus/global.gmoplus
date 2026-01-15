<?php /* Smarty version 2.6.31, created on 2025-07-28 12:50:06
         compiled from /home/gmoplus/global.gmoplus.com/plugins/listing_status/admin/refresh_labels.tpl */ ?>
<!-- Listing label pictures refresh button -->
<tr class="body">
	<td class="list_td"><?php echo $this->_tpl_vars['lang']['ls_rebuild_label']; ?>
</td>
	<td class="list_td" align="center">
		<input id="ls_rebuild" type="button" value="<?php echo $this->_tpl_vars['lang']['rebuild']; ?>
" style="margin: 0;width: 100px;" />
	</td>
</tr>
<tr>
	<td style="height: 5px;" colspan="3">
		<script type="text/javascript">
        lang['rebuild']          = "<?php echo $this->_tpl_vars['lang']['rebuild']; ?>
";
        lang['lb_rebuilding']    = "<?php echo $this->_tpl_vars['lang']['lb_rebuilding']; ?>
";
		lang['ls_rebuild_label'] = "<?php echo $this->_tpl_vars['lang']['ls_rebuild_label']; ?>
";
		<?php echo '

		var labelRefreshStack = 1;

		$(document).ready(function(){
			$(\'#ls_rebuild\').click(function(){
				$(this).val(lang[\'loading\']);
                printMessage(\'alert\', lang[\'loading\']);
				refreshLabel();
			});
		});

		var refreshLabel = function(){
			var url = rlUrlHome + \'request.ajax.php\';
			$.getJSON(url, {item: \'refreshLabel\', stack: labelRefreshStack}, function(response){
				if ( response.stack == \'1\' ) {
					labelRefreshStack++;
					setTimeout(\'refreshLabel()\', 500);
				}
				else if ( response.stack == \'0\' ) {
					labelRefreshStack = 0;
					$(\'#ls_rebuild\').val(lang[\'rebuild\']);
					printMessage(\'notice\', lang[\'lb_rebuilding\']);
				}
			});
		};

		'; ?>

		</script>
	</td>
</tr>
<!-- Listing label pictures refresh button end -->