<section class="page-section section section--announcement">
    <?php if ($data->get('link')->isNotEmpty()): ?>
        <a href="<?= $data->get('link') ?>">
    <?php endif ?>
        <?php snippet('responsive-image', array('field' => $data->get('thumb'), 'ratio' => 665/498)) ?>
        <div class="item-infos">
            <div class="caption-title serif bold mt1">
              <?= $data->get('title') ?>
            </div>
            <?php if ($data->get('summary')->isNotEmpty()): ?>
            <div class="small mt1">
              <?= $data->get('summary')->kt() ?>
            </div>
            <?php endif ?>
            <?= displayTags($data->get('tags')) ?>
        </div>
    <?php if ($data->get('link')->isNotEmpty()): ?>
        </a>
    <?php endif ?>
</section>
