<?

    // tab-title

    $customizer->add_section('design_of_post',[
        'panel'    => 'design_controller',
        'priority' => 6,
        'title'    => 'Design of blog : posts',
    ]);

    // thumbnail-stle

    $customizer->add_setting('post_header_style_settings',[ 'default'=>'framed-big' ]);
    $customizer->add_control('post_header_style_data',[
        'section'  => 'design_of_post',
        'label'    => 'Header style',
        'settings' => 'post_header_style_settings',
        'type'     => 'radio',
        'choices'  => [
            'off'         => 'OFF',
            'framed-slim' => 'framed slim',
            'framed-big'  => 'framed big',
            'wide-slim'   => 'wide slim',
            'wide-big'    => 'wide big',
        ],
    ]);

    // add titles ecc in-head
    $customizer->add_setting('post_title_settings',[ 'default'=>'true' ]);
    $customizer->add_control('post_title_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_post',
        'label'       => 'Active/hide title',
        'description' => ' ',
        'settings'    => 'post_title_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('post_subtitle_settings',[ 'default'=>'true' ]);
    $customizer->add_control('post_subtitle_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_post',
        'label'       => 'Active/hide sub-title',
        'settings'    => 'post_subtitle_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('post_excerpt_settings',[ 'default'=>'true' ]);
    $customizer->add_control('post_excerpt_data',[
        // 'priority'    => 1,
        'section'     => 'design_of_post',
        'label'       => 'Active/hide excerpt',
        'settings'    => 'post_excerpt_settings',
        'type'        => 'checkbox',
    ]);

    // thumbnail

    $customizer->add_setting('post_banner_settings',[ 'default'=>'in-head' ]);
    $customizer->add_control('post_banner_data',[
        'section'   => 'design_of_post',
        'label'     => 'Main banner status',
        'settings'  => 'post_banner_settings',
        'type'      => 'radio',
        'choices'   => [
            'off'      => 'OFF',
            'in-head-framed' => 'in head framed',
            'in-head'  => 'in head full',
            'in-body-framed'  => 'in body framed',
            'in-body'  => 'in body full',
        ],
    ]);

    // sidebar-small

    $customizer->add_setting( 'post_small_side_settings', ['default'=>'dynamic-left'] );
    $customizer->add_control( 'post_small_side_data', [
        'section'   => 'design_of_post',
        'label'     => 'Small Sidebar position',
        'type'      => 'radio',
        'settings'  => 'post_small_side_settings',  
        'choices'   => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

    // sidebar-big

    $customizer->add_setting( 'post_big_side_settings', ['default'=>'dynamic-right'] );
    $customizer->add_control( 'post_big_side_data', [
        'section'  => 'design_of_post',
        'label'    => 'Big Sidebar position',
        'type'     => 'radio',
        'settings' => 'post_big_side_settings',
        'choices'  => [
            'off'  => 'OFF',
            'static-left'  => 'static left',
            'static-right' => 'static right',
            'dynamic-left'  => 'dynamic left',
            'dynamic-right' => 'dynamic right',
        ],
    ]);

?>