<?php

class Elementor_Test_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'content-visibility';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Content Visibility', 'elementor-test-extension' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fas fa-desktop';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'general' ];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content Visibility', 'elementor-test-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
            ]
        );

            $this->add_control(
            'activate_visibility',
            [
                'label' => __( 'Active CSS Property', 'elementor-test-extension' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Active', 'elementor-test-extension' ),
                'label_off' => __( 'off', 'elementor-test-extension' ),
                'return_value' => 'yes',
                'default' => 'off',
            ]
        );
            $this->add_control(
            'content_visibility_value',
            [
                'label' => __( 'Content Visibility Value', 'elementor-test-extension' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'auto',
                'options' => [
                    'auto'  => __( 'Auto', 'elementor-test-extension' ),
                    'hidden' => __( 'Hidden', 'elementor-test-extension' ),
                ],
                 'selectors' => [
                    '{{WRAPPER}} ' => 'content-visibility: {{VALUE}};',
                ],
            ]
        );

            $this->add_control(
            'width',
            [
                'label' => __( 'Contain Intrinsic Width', 'elementor-test-extension' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 3000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 3000,
                    ],
                ],
                 'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],

                'selectors' => [
                    '{{WRAPPER}} ' => 'contain-intrinsic-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

              $this->add_control(
            'height',
            [
                'label' => __( 'Contain Intrinsic Height', 'elementor-test-extension' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 8000,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 8000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 8000,
                    ],
                ],
                 'default' => [
                    'unit' => 'px',
                    'size' => 5000,
                ],

                'selectors' => [
                    '{{WRAPPER}} ' => 'contain-intrinsic-size: {{width.SIZE}}{{width.UNIT}} {{height.SIZE}}{{height.UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        if ( 'yes' === $settings['content_visibility_value'] ) {
            echo $settings['width'] ;
        }

    }

}
