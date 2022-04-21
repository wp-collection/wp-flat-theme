<?
    $customizer->add_section('site_settings',[
        'priority' => 2,
        'title'    => 'Site settings',
    ]);

    $customizer->add_setting('site_debug_path_line_settings',[ 'default'=>'false' ]);
    $customizer->add_control('site_debug_line_data',[
        'section'     => 'site_settings',
        'label'       => 'Debug template path line',
        'description' => 'Active/hide the editor line for page information',
        'settings'    => 'site_debug_path_line_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('site_debug_notices_settings',[ 'default'=>'false' ]);
    $customizer->add_control('site_debug_notices_data',[
        'section'     => 'site_settings',
        'label'       => 'Debug notice boxes',
        'description' => 'Active/hide the editor notice for page information',
        'settings'    => 'site_debug_notices_settings',
        'type'        => 'checkbox',
    ]);

    $customizer->add_setting('site_warning_status_settings',[ 'default'=>'false' ]);
    $customizer->add_control('site_warning_status_data',[
        'section'  => 'site_settings',
        'label'    => 'Warning message',
        'settings' => 'site_warning_status_settings',
        'type'     => 'checkbox',
    ]);

    $customizer->add_setting('site_warning_message_settings',[ 'default'=>'WARNING! THIS IS A DEMO SITE! <b>DO NOT BUY OR USE IT!</b>' ]);
    $customizer->add_control('site_warning_message_data',[
        'section'  => 'site_settings',
        'label'    => '',
        'settings' => 'site_warning_message_settings',
        'type'     => 'text',
    ]);
?>