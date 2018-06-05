<?php snippet('header') ?>

<?php snippet('tag-template/template-none') ?>

<div id="page-text" class="row contained small">

  <?php if($user = $site->user()): ?>

    <div class="row four-columns">

      <?php foreach ($page->files() as $key => $file): ?>
        <a href="<?= $file->url() ?>" class="file-link" target="_blank" download>
          <?php if ($file->type() == 'image'): ?>
            <img class="lazy lazyload" data-src="<?= $file->width(500)->url() ?>" width="100%">
          <?php else: ?>
            <?php snippet('image-placeholder', array('text' => substr($file->caption(), 0, 1))) ?>
          <?php endif ?>
          <div class="artpiece-infos small mt1 c12" md="c12 co0">
            <?= $file->caption()->or($file->filename()) ?>
          </div>
        </a>
      <?php endforeach ?>

    </div>

  <?php else: ?>

  <div class="c6 co3 mt4" md="c12 co0">
    <?php if($error): ?>
    <div class="alert"><?= $page->alert()->html() ?></div>
    <?php endif ?>

    <form method="post" class="c12">
      <div class="c12 mb1">
        <label for="username"><?= $page->username()->html() ?></label>
        <input type="text" id="username" name="username" class="c12">
      </div>
      <div class="c12 mb1">
        <label for="password"><?= $page->password()->html() ?></label>
        <input type="password" id="password" name="password" class="c12">
      </div>
      <div class="c12 mb1">
        <input type="submit" name="login" value="Entrer" class="c12">
      </div>
    </form>
  </div>

  <?php endif ?>
</div>

<?php snippet('footer') ?>
