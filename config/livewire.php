<?php

return [
    /*
    |---------------------------------------------------------------------------
    | Class Name Space
    |---------------------------------------------------------------------------
    |
    | This option controls the default "namespace" for Livewire components. By
    | default Livewire will look for `App\Livewire` for components.
    |
    | If you have custom components, you can change this namespace.
    |
    */

    'class_namespace' => 'App\\Livewire',

    /*
    |---------------------------------------------------------------------------
    | Class Autoload
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire will automatically discover new components.
    | By default, Livewire will scan the `App\Livewire` directory.
    |
    | If you have components in subdirectories, you may want to disable this feature.
    |
    */

    'autoload' => [
        'manifest' => false,
    'component_autodiscovery' => true,
    'lazy_loading' => false,
    'inject_assets' => true,
        'inject_on_redirect' => true,
        'inject_markers' => true,
    ],

    /*
    |---------------------------------------------------------------------------
    | Morph Markers
    |---------------------------------------------------------------------------
    |
    | This option controls which HTML tag Livewire will use to wrap
    | its rendered components. By default, Livewire will use a `div` tag.
    |
    | If you want to use a different HTML tag, you can change it here.
    |
    */

    'morph_markers' => [
        'prefix' => 'wire:',
        'suffix' => ':end',
    ],

    /*
    |---------------------------------------------------------------------------
    | Layout View
    |---------------------------------------------------------------------------
    |
    | This option controls which view file should be used as the default layout
    | when rendering Livewire components. By default, Livewire will use the
    | `resources/views/layouts/app.blade.php` file.
    |
    | If you want to use a different layout file, you can change it here.
    |
    */

    'layout' => 'layouts.app',

    /*
    |---------------------------------------------------------------------------
    | Lazy Loading Placeholder
    |---------------------------------------------------------------------------
    |
    | This option controls what Livewire should display when a component is
    | lazy loading. By default, Livewire will display a simple loading spinner.
    |
    | If you want to use a different placeholder, you can change it here.
    |
    */

    'lazy_loading_placeholder' => [
        'default' => '...',
        'solo' => '...',
        'group' => '...',
    ],

    /*
    |---------------------------------------------------------------------------
    | Pagination Theme
    |---------------------------------------------------------------------------
    |
    | This option controls which pagination theme Livewire should use by default.
    | By default, Livewire will use the Bootstrap pagination theme.
    |
    | If you want to use a different theme, you can change it here.
    |
    | Supported themes: 'bootstrap', 'tailwind', 'semantic-ui'.
    |
    */

    'pagination_theme' => 'tailwind',

    /*
    |---------------------------------------------------------------------------
    | File Uploads
    |---------------------------------------------------------------------------
    |
    | This option controls where temporary file uploads should be stored.
    | By default, Livewire will store them in the `livewire-tmp` directory.
    |
    | If you want to use a different directory, you can change it here.
    |
    */

    'temporary_file_upload' => [
        'directory' => 'livewire-tmp',
        'middleware' => ['web', 'auth'],
    ],

    /*
    |---------------------------------------------------------------------------
    | Render On Redirect
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire should render the initial component
    | response when a redirect is detected. By default, Livewire will render
    | the component's response.
    |
    | If you want to disable this feature, you can set it to false.
    |
    */

    'render_on_redirect' => true,

    /*
    |---------------------------------------------------------------------------
    | Elixir
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire should inject its JavaScript and CSS
    | into the Elixir-managed compilation pipeline. By default, this is
    | disabled to prevent conflicts with Vite.
    |
    | If you are using Laravel Mix instead of Vite, you can enable this.
    |
    */

    'inject_assets' => true,

    /*
    |---------------------------------------------------------------------------
    | Navigate
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire should intercept the browser's
    | history and replace the current URL with the previous one.
    | By default, this is disabled to prevent unexpected behavior.
    |
    | If you want to enable this feature, you can set it to true.
    |
    */

    'navigate' => false,

    /*
    |---------------------------------------------------------------------------
    | Progress Bar
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire should show a progress bar when
    | making network requests. By default, this is enabled.
    |
    | If you want to disable this feature, you can set it to false.
    |
    */

    'progress_bar' => true,

    /*
    |---------------------------------------------------------------------------
    | Listen For Browser Events
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire should listen for browser events
    | like "livewire:init". By default, this is disabled.
    |
    | If you want to enable this feature, you can set it to true.
    |
    */

    'listen_for_browser_events' => false,

    /*
    |---------------------------------------------------------------------------
    | Disable Back Button Cache
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire should disable the browser's
    | back button cache. By default, this is enabled.
    |
    | If you want to disable this feature, you can set it to false.
    |
    */

    'disable_back_button_cache' => false,

    /*
    |---------------------------------------------------------------------------
    | Google Maps
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire should load the Google Maps
    | API when rendering components that use the `wire:load` directive.
    | By default, this is disabled.
    |
    | If you want to enable this feature, you can set it to true.
    |
    */

    'google_maps' => [
        'enabled' => false,
        'api_key' => env('GOOGLE_MAPS_API_KEY'),
    ],

    /*
    |---------------------------------------------------------------------------
    | Alpine.js
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire should include Alpine.js
    | when rendering components. By default, this is enabled.
    |
    | If you want to disable this feature, you can set it to false.
    |
    */

    'include_alpine' => true,

    /*
    |---------------------------------------------------------------------------
    | Legacy Model Binding
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire should use the legacy model binding
    | syntax. By default, this is disabled.
    |
    | If you want to enable this feature, you can set it to true.
    |
    */

    'legacy_model_binding' => false,

    /*
    |---------------------------------------------------------------------------
    | Manifest
    |---------------------------------------------------------------------------
    |
    | This option controls if Livewire should generate a manifest file
    | for its JavaScript and CSS assets. By default, this is disabled.
    |
    | If you want to enable this feature, you can set it to true.
    |
    */

    'manifest' => false,

    /*
    |---------------------------------------------------------------------------
    | Routes To Skip
    |---------------------------------------------------------------------------
    |
    | This option controls which routes Livewire should skip when
    | updating components. By default, Livewire will skip no routes.
    |
    | If you want to skip specific routes, you can add them here.
    |
    | Example: ['users/*', 'admin/*']
    |
    */

    'skip_middleware_routes' => [
        //
    ],
];
