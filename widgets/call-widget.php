<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor call Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Call_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'Call widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Call', 'elementor-call-widget');
    }

    /**
     * Get widget icon.
     *
     * Retrieve widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-tel-field';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the call widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the call widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['phone', 'call', 'tel', 'telephone', 'url', 'link'];
    }

    /**
     * Register call widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'data',
            [
                'label' => esc_html__('Data', 'elementor-call-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => esc_html__('Phone number', 'elementor-call-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'tel',
                'placeholder' => esc_html__('0656321407', 'elementor-call-widget'),
                'default' => '+213656321407'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'display',
            [
                'label' => esc_html__('Display', 'elementor-call-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'label',
            [
                'label' => esc_html__('Button label', 'elementor-call-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => esc_html__('0656321407', 'elementor-call-widget'),
                'default' => '+213656321407'
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'elementor-call-widget'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-phone',
                    'library' => 'solid'
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => 'Typography',
                'selector' => '{{WRAPPER}} .call-elementor-widget-button',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_color',
                'label' => esc_html__('Background color', 'plugin-name'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .call-elementor-widget-button',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'plugin-name'),
                'selector' => '{{WRAPPER}} .call-elementor-widget-button',
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => esc_html__('Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .call-elementor-widget-button' => 'color: {{VALUE}}',
                ],
                'default' => 'white'
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'css',
            [
                'label' => esc_html__('Custom CSS', 'elementor-call-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'custom_css_container',
            [
                'label' => esc_html__('Container', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::CODE,
                'language' => 'css',
                'rows' => 20,
            ]
        );
        $this->add_control(
            'custom_css_button',
            [
                'label' => esc_html__('Button', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::CODE,
                'language' => 'css',
                'rows' => 20,
            ]
        );
        $this->add_control(
            'custom_css_icon',
            [
                'label' => esc_html__('Icon', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::CODE,
                'language' => 'css',
                'rows' => 20,
            ]
        );
        $this->add_control(
            'custom_css_label',
            [
                'label' => esc_html__('Label', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::CODE,
                'language' => 'html',
                'rows' => 20,
            ]
        );

        $this->end_controls_section();
    }

    protected function gen_id($length = 25)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Render call widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $id = [
            'container' => $this->gen_id(),
            'button' => $this->gen_id(),
            'icon' => $this->gen_id(),
            'label' => $this->gen_id(),

        ];
?>
        <style>
            .call-elementor-widget-container {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            <?php
            foreach ($id as $key => $value) {
                echo '#' . $value . ' {';
                echo $settings['custom_css_' . $key];
                echo '} ';
            }
            echo '</style>';
            echo '<div class="call-elementor-widget-container" id="' . $id['container'] . '">';
            echo '<a href="tel:' . $settings['number'] . '" class="call-elementor-widget-button" id="' . $id['button'] . '">';
            echo '<div class="call-elementor-widget-icon" id="' . $id['icon'] . '">';
            \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
            echo '</div>';
            echo '<span class="call-elementor-widget-label id="' . $id['label'] . '">' . $settings['label'] . '</span>';
            echo '</a>';
            echo '</div>';
        }
    }
