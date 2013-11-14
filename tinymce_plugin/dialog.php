<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php _ex( 'Add Timed Content shortcodes', 'TinyMCE Dialog - Dialog titlebar', 'timed-content' ); ?></title>
<script type="text/javascript" src="<?php echo includes_url(); ?>/js/tinymce/tiny_mce_popup.js"></script>
<script type="text/javascript" src="<?php echo includes_url(); ?>/js/tinymce/utils/mctabs.js"></script>
<?php wp_print_styles(); ?>
<style>
.panel_wrapper {
	height: 340px;
}
div.ui-datepicker-div {
	font-size: 10px;
}
div.ui-timepicker-div {
	font-size: 10px;
}
div.tabs ul li {
	cursor: pointer;
}
</style>
<?php wp_print_scripts(); ?>
<script type="text/javascript">
<?php echo $this->__getRulesJS(); ?>
    var tags = { 'client': '<?php echo TIMED_CONTENT_CLIENT_TAG; ?>',
			'server': '<?php echo TIMED_CONTENT_SERVER_TAG; ?>',
			'rule' : '<?php echo TIMED_CONTENT_RULE_TAG; ?>' };
    var datepickerFormat = "<?php _ex( "MM d, yy", "Date format for jQuery UI Datepicker", 'timed-content' ); ?>";
</script>
<script type="text/javascript" src="<?php echo TIMED_CONTENT_PLUGIN_URL; ?>/tinymce_plugin/dialog.js"></script>
</head>
<body style="display: none">
<div class="tabs">
  <ul>
    <li id="client_tab" class="current" onclick="javascript:mcTabs.displayTab('client_tab','client_panel');"><span><?php _ex( 'Client', 'TinyMCE Dialog - Client tab label', 'timed-content' ); ?></span></li>
    <li id="server_tab" onclick="javascript:mcTabs.displayTab('server_tab','server_panel');"><span><?php _ex( 'Server', 'TinyMCE Dialog - Server tab label', 'timed-content' ); ?></span></li>
    <li id="rules_tab" onclick="javascript:mcTabs.displayTab('rules_tab','rules_panel');"><span><?php _ex( 'Timed Content Rules', 'TinyMCE Dialog - Timed Content Rules tab label', 'timed-content' ); ?></span></li>
  </ul>
</div>
<div class="panel_wrapper">
  <div id="client_panel" class="panel current">
    <form name="TimedContentDialogClient" id="TimedContentDialogClient" onsubmit="TimedContentDialog.client_action();return false;" action="#">
      <p><?php _ex( 'Select the actions you wish to perform and the times after the Page/Post is loaded when they should occur.', 'TinyMCE Dialog - Client tab instructions', 'timed-content' ); ?></p>
      <fieldset>
      <legend>
      <input name="do_client_show" type="checkbox" id="do_client_show" value="show" />
      <?php _ex( 'Show', 'TinyMCE Dialog - Show action label', 'timed-content' ); ?> </legend>
      <p><?php _ex( 'Time (mm:ss)', 'TinyMCE Dialog - Time count label', 'timed-content' ); ?>:
        <input id="client_show_minutes" name="client_show_minutes" type="text" class="text" size="2" disabled="disabled" />
        :
        <input id="client_show_seconds" name="client_show_seconds" type="text" class="text" size="2" disabled="disabled" />
      </p>
      <p><?php _ex( 'Fade in (ms)', 'TinyMCE Dialog - Fade-in label', 'timed-content' ); ?>:
        <input id="client_show_fade" name="client_show_fade" type="text" class="text" size="4" disabled="disabled" />
        <em>(<?php _ex( 'Optional', 'TinyMCE Dialog - Optional checkbox HTML label', 'timed-content' ); ?>)</em>
	  </p>
      </fieldset>
      <fieldset>
      <legend>
      <input name="do_client_hide" type="checkbox" id="do_client_hide" value="hide" />
      <?php _ex( 'Hide', 'TinyMCE Dialog - Hide action label', 'timed-content' ); ?> </legend>
      <p><?php _ex( 'Time (mm:ss)', 'TinyMCE Dialog - Time count label', 'timed-content' ); ?>:
        <input id="client_hide_minutes" name="client_hide_minutes" type="text" class="text" size="2" disabled="disabled" />
        :
        <input id="client_hide_seconds" name="client_hide_seconds" type="text" class="text" size="2" disabled="disabled" />
      </p>
      <p><?php _ex( 'Fade out (ms)', 'TinyMCE Dialog - Fade-out label', 'timed-content' ); ?>:
        <input id="client_hide_fade" name="client_hide_fade" type="text" class="text" size="4" disabled="disabled" />
        <em>(<?php _ex( 'Optional', 'TinyMCE Dialog - Optional checkbox HTML label', 'timed-content' ); ?>)</em>
      </p>
      </fieldset>
      <fieldset>
      <legend>
      <?php _ex( 'Display Mode', 'TinyMCE Dialog - Display Mode label', 'timed-content' ); ?></legend>
      <p><input id="client_display_tag_div" name="client_display_tag" type="radio" class="text" checked="checked" />
        <?php _ex( 'Enclose content using <code>&lt;div&gt;</code> tags (block-level)', 'TinyMCE Dialog - Display mode DIV HTML description', 'timed-content' ); ?>
      <input id="client_display_tag_span" name="client_display_tag" type="radio" class="text" />
        <?php _ex( 'Enclose content using <code>&lt;span&gt;</code> tags (inline)', 'TinyMCE Dialog - Display mode SPAN HTML description', 'timed-content' ); ?>
      </p>
      </fieldset>
      <div class="mceActionPanel">
        <input type="button" id="insert" name="insert" value="<?php _ex( 'Insert', 'TinyMCE Dialog - Insert button HTML label', 'timed-content' ); ?>" onclick="TimedContentDialog.client_action();" />
        <input type="button" id="cancel" name="cancel" value="<?php _ex( 'Cancel', 'TinyMCE Dialog - Cancel button HTML label', 'timed-content' ); ?>" onclick="tinyMCEPopup.close();" />
      </div>
    </form>
  </div>
  <div id="server_panel" class="panel">
    <form name="TimedContentDialogServer" id="TimedContentDialogServer" onsubmit="TimedContentDialog.server_action();return false;" action="#">
      <p><?php _ex( 'Select the actions you wish to perform and the dates/times when they should occur.', 'TinyMCE Dialog - Server tab instructions', 'timed-content' ); ?></p>
      <p>
          <input name="server_debug" type="checkbox" id="server_debug" value="true" />
          <?php _ex( 'Add debugging messages (Only logged-in users who can edit this Post/Page will see them)', 'TinyMCE Dialog - Server debugging label', 'timed-content' ); ?>
      </p>
      <p><?php _e( 'Current Date/Time ', 'timed-content'); ?>: <?php echo date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), current_time( 'timestamp', 0 ) ); ?></p>
      <fieldset>
      <legend>
      <input name="do_server_show" type="checkbox" id="do_server_show" value="show" />
      <?php _ex( 'Show', 'TinyMCE Dialog - Show action label', 'timed-content' ); ?> </legend>
      <p><?php _ex( 'Date', 'Date field label', 'timed-content' ); ?>:
        <input name="server_show_date" type="text" disabled="disabled" class="text" id="server_show_date" style="width: 175px;" />
          <?php _ex( 'Time', 'Time field label', 'timed-content' ); ?>:
        <input name="server_show_time" type="text" disabled="disabled" class="text" id="server_show_time" style="width: 125px;" />
      </p>
      </fieldset>
      <fieldset>
      <legend>
      <input name="do_server_hide" type="checkbox" id="do_server_hide" value="hide" />
      <?php _ex( 'Hide', 'TinyMCE Dialog - Hide action label', 'timed-content' ); ?> </legend>
      <p><?php _ex( 'Date', 'Date field label', 'timed-content' ); ?>:
        <input name="server_hide_date" type="text" disabled="disabled" class="text" id="server_hide_date" style="width: 175px;" />
          <?php _ex( 'Time', 'Time field label', 'timed-content' ); ?>:
        <input name="server_hide_time" type="text" disabled="disabled" class="text" id="server_hide_time" style="width: 125px;" />
      </p>
      </fieldset>
        <fieldset>
            <legend>
                <?php _ex( 'Timezone', 'TinyMCE Dialog - Timezone fieldset label', 'timed-content' ); ?>
            </legend>
            <p><?php _ex( 'Select a city whose timezone you wish to use', 'TinyMCE Dialog - Timezone SELECT HTML label', 'timed-content' ); ?>:
	  <select name="server_tz" id="server_tz" style="width: auto;">
	  <?php echo __timeZoneChoice( get_option( 'timezone_string' ) ); ?>
	  </select>
      </p>
            <p><?php _e( 'Wordpress Timezone', 'timed-content'); ?>: <?php echo get_option( 'timezone_string' ); ?></p>
        </fieldset>
        <div class="mceActionPanel">
        <input type="button" id="insert" name="insert" value="<?php _ex( 'Insert', 'TinyMCE Dialog - Insert button HTML label', 'timed-content' ); ?>" onclick="TimedContentDialog.server_action();" />
        <input type="button" id="cancel" name="cancel" value="<?php _ex( 'Cancel', 'TinyMCE Dialog - Cancel button HTML label', 'timed-content' ); ?>" onclick="tinyMCEPopup.close();" />
      </div>
    </form>
  </div>
  <div id="rules_panel" class="panel">
    <form name="TimedContentDialogRules" id="TimedContentDialogRules" onsubmit="TimedContentDialog.rules_action();return false;" action="#">
      <p><?php _ex( 'Select the Timed Content Rule you wish to use. Only rules without any warnings will appear below.', 'TinyMCE Dialog - Timed Content Rules tab instructions', 'timed-content' ); ?></p>
      <p><?php _ex( 'Rule', 'TinyMCE Dialog - Timed Content Rules SELECT HTML label', 'timed-content' ); ?>:
	  <select name="rules_list" id="rules_list" style="width: auto;">
		<!-- options list generated using $this->__getRulesJS() above and TimedContentDialog.init JS function in /tinymce_plugin/js/dialog.js -->
	  </select>
      </p>
      <fieldset>
      <legend>
      <?php _ex( 'Description', 'TinyMCE Dialog - Timed Content Rules description label', 'timed-content' ); ?> </legend>
      <p>
		<span id="rules_desc"></span>
      </p>
      </fieldset>
      <div class="mceActionPanel">
        <input type="button" id="insert" name="insert" value="<?php _ex( 'Insert', 'TinyMCE Dialog - Insert button HTML label', 'timed-content' ); ?>" onclick="TimedContentDialog.rules_action();" />
        <input type="button" id="cancel" name="cancel" value="<?php _ex( 'Cancel', 'TinyMCE Dialog - Cancel button HTML label', 'timed-content' ); ?>" onclick="tinyMCEPopup.close();" />
      </div>
    </form>
  </div>
</div>
</body>
