<?php
/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA 02110-1301, USA
 */
use_javascript(plugin_web_path('orangehrmMaintenancePlugin', 'js/PurgeAllRecords'));
use_stylesheet(plugin_web_path('orangehrmMaintenancePlugin', 'css/employeeDataSuccess'));

?>
<form id="frmPurgeEmployee" method="post" action="<?php echo url_for('maintenance/purgeEmployee'); ?>">

    <div class="box">
        <?php include_partial('global/flash_messages'); ?>

        <div class="head">
            <h1><?php echo __('Purge Employee Records'); ?></h1>
        </div>

        <div class="inner">
            <fieldset>
                <div class="input-field col s12 m12 l4">
                    <ol>
                        <?php echo $purgeform->render(); ?>
                    </ol>
                </div>
            </fieldset>
            <div class="input-field col s12 m12 l4">
                <br>
                <input class="search_employee" type="button" value="Search">
            </div>
        </div>
    </div>
    <div class="box" id="selected_employee">
    </div>
</form>

<!--confirmation modal-->
<div class="modal hide" id="deleteConfModal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3><?php echo __('OrangeHRM - Confirmation Required'); ?></h3>
    </div>
    <div class="modal-body">
        <p><?php echo __(CommonMessages::DELETE_CONFIRMATION); ?></p>
    </div>
    <div class="modal-footer">
        <input type="button" class="btn" data-dismiss="modal" id="dialogDeleteBtn" value="<?php echo __('Ok'); ?>"/>
        <input type="button" class="btn cancel" data-dismiss="modal" value="<?php echo __('Cancel'); ?>"/>
    </div>
</div>
<script>
    var ajaxUrl = "<?php echo url_for('maintenance/getEmployeeDataApi'); ?>";
</script>
