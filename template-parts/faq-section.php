<?php
$faq_heading = get_field('faq_heading');
$questions = [
    ['q' => get_field('faq_question_1'), 'a' => get_field('faq_answer_1')],
    ['q' => get_field('faq_question_2'), 'a' => get_field('faq_answer_2')],
    ['q' => get_field('faq_question_3'), 'a' => get_field('faq_answer_3')],
    ['q' => get_field('faq_question_4'), 'a' => get_field('faq_answer_4')],
    ['q' => get_field('faq_question_5'), 'a' => get_field('faq_answer_5')],
];
?>

<section class="faq-section bg-light-grey">
    <div class="container">
        <?php if($faq_heading): ?>
            <h2 class="faq-heading"><?php echo esc_html($faq_heading); ?></h2>
        <?php endif; ?>

        <div class="faq-accordion">
            <?php foreach($questions as $item): ?>
                <?php if($item['q'] && $item['a']): ?>
                    <div class="faq-item">
                        <button class="faq-question"><?php echo esc_html($item['q']); ?></button>
                        <div class="faq-answer" style="background-color: #ffffff;">
                            <p><?php echo esc_html($item['a']); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
