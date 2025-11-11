<?php
// Pull fields
$title = get_field('slider_title');
$bg = get_field('slider_bg_color'); // values: white, black, ebebeb, b02543
$wysiwyg = get_field('slider_wysiwyg');

$images = array();
for ($i = 1; $i <= 3; $i++) {
    $img = get_field("slider_image_{$i}");
    $cap = get_field("slider_caption_{$i}");
    if ($img) {
        // $img could be array if return format is array (recommended)
        $images[] = array(
            'url' => is_array($img) ? $img['url'] : $img,
            'alt' => is_array($img) ? ($img['alt'] ?? '') : '',
            'caption' => $cap
        );
    }
}

if (empty($title) && empty($images) && empty($wysiwyg)) {
    // nothing to render
    return;
}

// Determine text color for left side
$left_text_color = ($bg === 'white' || $bg === 'ebebeb') ? 'black' : 'white';

// Map bg keys to actual CSS color
$bg_map = array(
    'white' => '#ffffff',
    'black' => '#000000',
    'ebebeb' => '#ebebeb',
    'b02543' => '#b02543',
);
$bg_color = isset($bg_map[$bg]) ? $bg_map[$bg] : '#ffffff';

$images_count = count($images);
?>
<div class="slider-component">
  <div class="slider-left" style="background-color: <?php echo esc_attr($bg_color); ?>;">
    <div class="slider-left-inner" style="color: <?php echo esc_attr($left_text_color); ?>;">
      <?php if ($title) : ?>
        <h2 class="slider-title"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>
      <?php if ($wysiwyg) : ?>
        <div class="slider-desc"><?php echo wp_kses_post($wysiwyg); ?></div>
      <?php endif; ?>
    </div>
  </div>

  <div class="slider-right">
    <div class="slider-card">
      <?php if ($images_count > 0) : ?>
        <div class="slider-images">
          <?php foreach ($images as $index => $image) : ?>
            <div class="slide<?php echo $index === 0 ? ' active' : ''; ?>" data-index="<?php echo $index; ?>">
              <?php if (!empty($image['caption'])): ?>
                <div class="slide-caption"><?php echo esc_html($image['caption']); ?></div>
              <?php endif; ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
          <?php endforeach; ?>
        </div>

        <?php if ($images_count > 1) : ?>
          <div class="slider-dots" data-count="<?php echo $images_count; ?>">
            <?php for ($d = 0; $d < $images_count; $d++) : ?>
              <button class="dot<?php echo $d === 0 ? ' active' : ''; ?>" data-index="<?php echo $d; ?>" aria-label="Slide <?php echo $d+1; ?>"></button>
            <?php endfor; ?>
          </div>
        <?php endif; ?>

      <?php else: ?>
        <div class="slider-empty">No images added to this slider.</div>
      <?php endif; ?>
    </div>
  </div>
</div>
