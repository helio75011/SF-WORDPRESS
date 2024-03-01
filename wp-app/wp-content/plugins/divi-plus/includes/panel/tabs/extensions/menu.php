<div id="el-settings-panel-extensions-wrap" class="el-settings-panel-group">
    <ul class="el-settings-panel-submenu">
        <li class="el-settings-panel-submenu-tab el-settings-panel-active-tab">
            <span data-href="#el-settings-panel-extensions-general-section">General</span>
        </li>
        <li class="el-settings-panel-submenu-tab">
            <span data-href="#el-settings-panel-extensions-scheduler-section">Scheduler</span>
        </li>
        <li class="el-settings-panel-submenu-tab el-settings-panel-tab">
            <span data-href="#el-settings-panel-extensions-visibility-manager-section">Visibility Manager</span>
        </li>
        <li class="el-settings-panel-submenu-tab el-settings-panel-tab">
            <span data-href="#el-settings-panel-extensions-particle-background-section">Particle Background</span>
        </li>
    </ul>
    <div class="el-settings-panel-sections-wrap">
        <table id="el-settings-panel-extensions-general-section" class="form-table el-settings-panel-section el-settings-panel-active-section">
        <?php
            settings_fields( 'el-settings-extensions-general-group' );
            do_settings_fields( esc_html( self::$menu_slug ), 'el-settings-extensions-general-section' );
        ?>
        </table>
        <table id="el-settings-panel-extensions-scheduler-section" class="form-table el-settings-panel-section">
        <?php
            settings_fields( 'el-settings-extensions-scheduler-group' );
            do_settings_fields( esc_html( self::$menu_slug ), 'el-settings-extensions-scheduler-section' );
        ?>
        </table>
        <table id="el-settings-panel-extensions-visibility-manager-section" class="form-table el-settings-panel-section">
        <?php
            settings_fields( 'el-settings-extensions-visibility-manager-group' );
            do_settings_fields( esc_html( self::$menu_slug ), 'el-settings-extensions-visibility-manager-section' );
        ?>
        </table>
        <table id="el-settings-panel-extensions-particle-background-section" class="form-table el-settings-panel-section">
        <?php
            settings_fields( 'el-settings-extensions-particle-background-group' );
            do_settings_fields( esc_html( self::$menu_slug ), 'el-settings-extensions-particle-background-section' );
        ?>
        </table>
    </div>
</div>