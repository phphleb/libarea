<main>
  <?= insert('/content/user/setting/nav', ['data' => $data]); ?>

  <div class="box">
    <form class="max-w300" id="security" method="post">
      <?php csrf_field(); ?>
      <?= component('setting-security'); ?>
    </form>
  </div>
</main>

<aside>
  <div class="box text-sm">
    <?= __('help.security_info'); ?>
  </div>
</aside>

<?= insert(
  '/_block/form/ajax',
  [
    'url'       => url('setting.security.edit'),
    'redirect'  => url('setting', ['type' => 'security']),
    'success'   => __('msg.successfully'),
    'id'        => 'form#security'
  ]
); ?>