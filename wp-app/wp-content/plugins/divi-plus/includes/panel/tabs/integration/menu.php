<div id="el-settings-panel-integration-wrap" class="el-settings-panel-group">
    <ul class="el-settings-panel-submenu">
        <li class="el-settings-panel-submenu-tab el-settings-panel-active-tab">
            <span data-href="#el-settings-panel-integration-facebook-section">Facebook</span>
        </li>
        <li class="el-settings-panel-submenu-tab">
            <span data-href="#el-settings-panel-integration-twitter-section">Twitter</span>
        </li>
    </ul>
    <div class="el-settings-panel-sections-wrap">
        <table id="el-settings-panel-integration-facebook-section" class="form-table el-settings-panel-section el-settings-panel-active-section">
        <?php
            settings_fields( 'el-settings-integration-facebook-group' );
            do_settings_fields( esc_html( self::$menu_slug ), 'el-settings-integration-facebook-section' );
        ?>
        </table>
        <table id="el-settings-panel-integration-twitter-section" class="form-table el-settings-panel-section">
        <?php
            settings_fields( 'el-settings-integration-twitter-group' );
            do_settings_fields( esc_html( self::$menu_slug ), 'el-settings-integration-twitter-section' );
        ?>
        </table>
    </div>
</div>