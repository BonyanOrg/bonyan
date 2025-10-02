<?php

/**
 * FAQs Component
 * 
 */
if (!function_exists('faqs_shortcode')) {
    function faqs_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'faqs_title' => 'Frequently Asked Questions',
        ), $atts));

        $faqs_items = vc_param_group_parse_atts($atts['faqs_items']);

        // ========================================
        // BACKEND DEVELOPER: EASY SWITCH TO REAL DATA
        // ========================================
        // To enable real FAQs from database, simply change this to: $use_real_faqs = true;
        $use_real_faqs = false;

        ob_start();
?>

        <!-- Start FAQs -->
        <section class="faqs-section py-5 custom-widget">
            <div class="">
                <div class="d-flex align-items-center justify-content-center justify-content-xl-start ">
                    <h2 class="bonyan-title primary-color bold"><?php echo esc_html($faqs_title); ?></h2>
                </div>
                
                <div class="faqs-accordion">
                    <?php
                    if ($use_real_faqs && !empty($faqs_items)) {
                        // REAL FAQS CODE - Uncomment when ready
                        /*
                        foreach ($faqs_items as $index => $faq) {
                            $question = isset($faq['faq_question']) ? $faq['faq_question'] : '';
                            $answer = isset($faq['faq_answer']) ? $faq['faq_answer'] : '';
                            $is_active = $index === 0 ? 'active' : '';
                        ?>
                            <div class="faq-item <?php echo $is_active; ?>">
                                <div class="faq-question" data-faq="faq-<?php echo $index; ?>">
                                    <span class="faq-text"><?php echo esc_html($question); ?></span>
                                    <div class="faq-icon">
                                        <svg class="icon-plus" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M8 3.33334V12.6667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3.33334 8H12.6667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <svg class="icon-minus" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M3.33334 8H12.6667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="faq-answer" id="faq-<?php echo $index; ?>">
                                    <div class="faq-answer-content">
                                        <?php echo wp_kses_post($answer); ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        */
                    } else {
                        // PLACEHOLDER CONTENT - Shows by default (forced sample data)
                        $sample_faqs = array(
                            array(
                                'question' => 'Why is building schools in war areas important?',
                                'answer' => 'Building schools in war areas is crucial because education provides hope, stability, and a path to a better future for children affected by conflict. It helps restore normalcy and empowers communities to rebuild their lives.'
                            ),
                            array(
                                'question' => 'How can I volunteer with your organization?',
                                'answer' => 'You can volunteer by filling out our online application form, attending our orientation sessions, or contacting our volunteer coordinator directly. We offer various opportunities including teaching, construction, medical support, and administrative roles.'
                            ),
                            array(
                                'question' => 'What types of donations do you accept?',
                                'answer' => 'We accept monetary donations, in-kind donations like medical supplies and educational materials, and volunteer time. All donations are used to support our humanitarian projects and help communities in need.'
                            ),
                            array(
                                'question' => 'How do you ensure aid reaches the right people?',
                                'answer' => 'We work with local community leaders, conduct needs assessments, and maintain strict monitoring and evaluation systems. Our teams on the ground verify distribution and maintain detailed records of all aid provided.'
                            ),
                            array(
                                'question' => 'What makes your organization different from others?',
                                'answer' => 'Our focus on sustainable development, long-term community partnerships, and culturally sensitive approaches sets us apart. We don\'t just provide aid; we work with communities to build lasting solutions.'
                            ),
                            array(
                                'question' => 'How can I stay updated on your projects?',
                                'answer' => 'You can subscribe to our newsletter, follow us on social media, or visit our website regularly for project updates, success stories, and impact reports. We also send quarterly reports to our donors.'
                            )
                        );
                        
                        foreach ($sample_faqs as $index => $faq) {
                            $is_active = $index === 0 ? 'active' : ''; // 4th item active by default (like screenshot)
                        ?>
                            <div class="faq-item <?php echo $is_active; ?>">
                                <div class="faq-question" data-faq="faq-<?php echo $index; ?>">
                                    <span class="faq-text"><?php echo esc_html($faq['question']); ?></span>
                                    <div class="faq-icon">
                                        <svg class="icon-plus" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M8 3.33334V12.6667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3.33334 8H12.6667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <svg class="icon-minus" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M3.33334 8H12.6667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="faq-answer" id="faq-<?php echo $index; ?>">
                                    <div class="faq-answer-content">
                                        <?php echo wp_kses_post($faq['answer']); ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- End FAQs -->

        <?php
        //========[{ Enqueue Widget script }]========//
        if (!function_exists('faqs_register_script')) {
            function faqs_register_script()
            {
        ?>
                <script>
                    <?php require_once(get_template_directory() . '/dist/js/components/wpb/faqs-accordion.min.js'); ?>
                </script>
        <?php
            }
            faqs_register_script();
        } ?>

<?php
        return ob_get_clean();
    }
}

add_shortcode('faqs', 'faqs_shortcode'); 