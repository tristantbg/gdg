<div class="slider">
  <?php foreach ($medias as $key => $image): ?>

    <?php if($image = $image->toFile()): ?>

      <div class="slide"
      data-caption="<?= $image->caption()->kt()->escape() ?>"
      >

        <div class="content image contain">
          <?php
          if(!isset($maxWidth)) $maxWidth = 3000;
          if (isset($ratio)) {
            $placeholder = $image->crop(50, floor(50/$ratio))->dataUri();
            $src = $image->crop(1000, floor(1000/$ratio))->url();
            $srcset = $image->crop(500, floor(500/$ratio))->url() . ' 500w,';
            for ($i = 1000; $i <= $maxWidth; $i += 1000) $srcset .= $image->crop($i, floor($i/$ratio))->url() . ' ' . $i . 'w,';
          } else {
            $placeholder = $image->width(50)->dataUri();
            $src = $image->width(1000)->url();
            $srcset = $image->width(500)->url() . ' 500w,';
            for ($i = 1000; $i <= $maxWidth; $i += 1000) $srcset .= $image->width($i)->url() . ' ' . $i . 'w,';
          }
          ?>
          <img class="media lazy <?php e($key == 0, " lazyload lazypreload") ?>"
          data-flickity-lazyload="<?= $src ?>"
          data-srcset="<?= $srcset ?>"
          data-sizes="auto"
          data-optimumx="1.5"
          alt="<?= $image->page()->title()->html().' - © '.$site->title()->html() ?>" height="100%" width="auto" />
          <noscript>
            <img src="<?= $src ?>" alt="<?= $image->page()->title()->html().' - © '.$site->title()->html() ?>" width="100%" height="auto" />
          </noscript>
        </div>

      </div>

    <?php endif ?>

  <?php endforeach ?>
</div>