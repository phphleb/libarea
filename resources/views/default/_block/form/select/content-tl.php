<fieldset>
  <label for="post_content"><?= Translate::get('for'); ?> TL</label>
  <select name="content_tl">
    <?php for ($i = 0; $i <= $user['trust_level']; $i++) {  
      if ($i == UserData::USER_FIFTH_LEVEL + 1) { break; }
    ?>
      <option <?php if ($data == $i) { ?>selected<?php } ?> value="<?= $i; ?>"><?= $i; ?></option>
    <?php } ?>
  </select>
  <div class="help"><?= Translate::get('view.post.tl'); ?>...</div>
</fieldset>