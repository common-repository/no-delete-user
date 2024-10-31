<?php

/**
 * @package JRY_No_Delete_User
 * @version 1.6
 */
/*
  Plugin Name: No Delete User
  Plugin URI: http://www.facebook.com/jeriyeh
  License: BSD
  Description: Prevent accidental deletion users, no delete user is allowed.
  Author: Jerry Yeh <jeriyeh@gmail.com>
  Version: 1.0.0
  Author URI: http://www.facebook.com/jeriyeh
 */

class JRY_No_Delete_User {

    function __construct() {
        add_filter('user_row_actions', array(&$this, 'remove_delete_action'));
        add_action('delete_user', array(&$this, 'no_delete_user'), 0);
    }

    function remove_delete_action($actions) {
        unset($actions['delete']); //remove delete action from user list
        return $actions;
    }

    function no_delete_user() {
        wp_die(__('You can&#8217;t delete that user. (No Delete User)'));
    }

}

if (defined('WP_ADMIN')) {
    new JRY_No_Delete_User;
}