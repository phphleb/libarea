<?php $n = 0;
foreach ($data['answers'] as $answer) {
  $n++;
  $post_url = getUrlByName('post', ['id' => $answer['post_id'], 'slug' => $answer['post_slug']]);
?>

  <?php if ($answer['answer_is_deleted'] == 0) { ?>
    <?php if ($n != 1) { ?><div class="br-top-dotted mt10 mb10"></div><?php } ?>
    <ol class="list-none">
      <li class="content_tree" id="answer_<?= $answer['answer_id']; ?>">
        <div class="content-body">
          <div class="flex text-sm">
            <a class="gray-600" href="<?= getUrlByName('profile', ['login' => $answer['login']]); ?>">
              <?= Html::image($answer['avatar'],  $answer['login'], 'ava-sm', 'avatar', 'small'); ?>
              <span class="mr5 ml5">
                <?= $answer['login']; ?>
              </span>
            </a>
            <?php if ($answer['post_user_id'] == $answer['answer_user_id']) { ?>
              <span class="sky mr5 ml0"><i class="bi-mic text-sm"></i></span>
            <?php } ?>
            <span class="mr5 ml5 gray-600 lowercase">
              <?= Html::langDate($answer['date']); ?>
            </span>
            <?php if (empty($answer['edit'])) { ?>
              <span class="mr5 ml10 gray-600">
                (<?= Translate::get('ed'); ?>.)
              </span>
            <?php } ?>
            <a rel="nofollow" class="gray-600 mr5 ml10" href="<?= $post_url; ?>#answer_<?= $answer['answer_id']; ?>"><i class="bi-hash"></i></a>
            <?= Tpl::import('/_block/show-ip', ['ip' => $answer['answer_ip'], 'user' => $user, 'publ' => $answer['answer_published']]); ?>
          </div>
          <div class="content-body">
            <?= Content::text($answer['content'], 'text'); ?>
          </div>
        </div>
        <div class="flex text-sm">
          <?= Html::votes($user['id'], $answer, 'answer', 'ps', 'mr5'); ?>

          <?php if ($answer['post_closed'] == 0) { ?>
            <?php if ($answer['post_is_deleted'] == 0 || UserData::checkAdmin()) { ?>
              <a data-post_id="<?= $answer['post_id']; ?>" data-answer_id="<?= $answer['answer_id']; ?>" class="add-comment gray-600 mr5 ml10"><?= Translate::get('reply'); ?></a>
            <?php } ?>
          <?php } ?>

          <?php if (Html::accessСheck($answer, 'answer', $user, 1, 30) === true) { ?>
            <?php if ($answer['answer_after'] == 0 || UserData::checkAdmin()) { ?>
              <a class="editansw gray-600 mr10 ml10" href="<?= getUrlByName('content.edit', ['type' => 'answer', 'id' => $answer['answer_id']]); ?>">
                <?= Translate::get('edit'); ?>
              </a>
            <?php } ?>
          <?php } ?>

          <?php if (UserData::checkAdmin()) { ?>
            <a data-type="answer" data-id="<?= $answer['answer_id']; ?>" class="type-action gray-600 ml10 mr10">
              <?= Translate::get('remove'); ?>
            </a>
          <?php } ?>

          <?php if ($user['id'] != $answer['answer_user_id'] && $user['trust_level'] > Config::get('trust-levels.tl_stop_report')) { ?>
            <a data-post_id="<?= $answer['post_id']; ?>" data-type="answer" data-content_id="<?= $answer['answer_id']; ?>" class="msg-flag gray-600 ml15">
              <i title="<?= Translate::get('report'); ?>" class="bi-flag"></i>
            </a>
          <?php } ?>
        </div>
        <div id="answer_addentry<?= $answer['answer_id']; ?>" class="none"></div>
      </li>
    </ol>

  <?php } else { ?>

    <?php if (UserData::checkAdmin()) { ?>
      <ol class="bg-red-200 text-sm hidden p15 mb10 list-none">
        <li class="content_tree" id="comment_<?= $answer['answer_id']; ?>">
          <?= Content::text($answer['content'], 'text'); ?>
          <?= Translate::get('answer'); ?> — <?= $answer['login']; ?>
          <a data-type="answer" data-id="<?= $answer['answer_id']; ?>" class="type-action right">
            <span><?= Translate::get('recover'); ?></span>
          </a>
        </li>
      </ol>
    <?php } else { ?>
      <div class="gray-600 p10 text-sm">
        ~ <?= sprintf(Translate::get('content.deleted'), Translate::get('comment')); ?>
      </div>
    <?php } ?>

  <?php } ?>
<?php } ?>