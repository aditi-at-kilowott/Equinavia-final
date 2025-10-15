<?php 
$section_title       = get_field('section_title');
$section_description = get_field('section_description');
$form_label          = get_field('form_label');
$input_placeholder   = get_field('input_placeholder');
$button_text         = get_field('button_text');
?>

<section class="mailing-list">
    <div class="container mailing-list-inner">
        <div class="mailing-list-text">
            <?php if($section_title): ?>
                <h2><?php echo esc_html($section_title); ?></h2>
            <?php endif; ?>
            
            <?php if($section_description): ?>
                <p><?php echo esc_html($section_description); ?></p>
            <?php endif; ?>
        </div>
        
        <form class="mailing-list-form">
            <div class="mailing-list-group">
                <?php if($form_label): ?>
                    <label for="email-address" class="mailing-list-label"><?php echo esc_html($form_label); ?></label>
                <?php endif; ?>
                
                <div class="mailing-list-fields">
                    <input type="email" id="email-address" name="email-address" placeholder="<?php echo esc_attr($input_placeholder); ?>" required>
                    <button type="submit" class="mailing-list-btn"><?php echo esc_html($button_text); ?></button>
                </div>
            </div>
        </form>
    </div>
</section>
