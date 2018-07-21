<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 */



/**
 * Implements hook_form_alter().
 */
function petal_form_alter(&$form, &$form_state, $form_id) {
  // dpm($form, 'form');
  // dpm($form_id, 'form_id');

  // Make VBO 'Operations' fieldset collapsible and collapsed initially
  if (substr($form_id, 0, 35) == 'views_form_admin_views_node_system_') {
    if (isset($form['select'])) {
      $form['select']['#attributes']['class'][] = 'collapsed';
      $form['select']['#collapsible'] = TRUE;
    }
  }
}



/**
 * Implements theme_table().
 */
function petal_table($variables) {
  return '<div class="table-container">' . theme_table($variables) . '</div>';
}
