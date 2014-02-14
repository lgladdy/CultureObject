<div class="wrap">
  <?php $plugin_data = get_plugin_data(__DIR__.'/../culture-object-sync.php'); ?>
  <h2>Culture Object Sync Settings <small>Version <?php echo $plugin_data['Version']; ?> by <a href="http://www.thirty8.co.uk">Thirty8 Digital</a>.</small></h2>

  <?php
  $key = get_option('cos_core_sync_key');
  if (empty($key)) {
    $key = md5(time().rand(0,100000));
    update_option('cos_core_sync_key',$key);
  }
  ?>

  <p>The Culture Object Sync plugin requires you to set up a manual cronjob to the frequency you wish to check for updates for your chosen sync provider.</p>
  <p>You shouldn't do this too frequently to avoid causing problems with your provider. Once a day should be enough.</p>
  <p>You should load the following URL:<br /><?php echo get_site_url(); ?>?perform_culture_object_sync=true&key=<?php echo get_option('cos_core_sync_key'); ?></p>

  <form method="POST" action="options.php">
    <?php 
      settings_fields('cos_settings');
      do_settings_sections('cos_settings');
      submit_button();
    ?>
  </form>
  
</div>