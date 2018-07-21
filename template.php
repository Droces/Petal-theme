<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function petal_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  petal_preprocess_html($variables, $hook);
  petal_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function petal_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function petal_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function petal_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // petal_preprocess_node_page() or petal_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function petal_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function petal_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function petal_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

/**
 * Implements hook_form_alter().
 */
function petal_form_alter (&$form, &$form_state, $form_id) {
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
 * Implements hook_form_FORM_ID_alter().
 */
function petal_form_views_exposed_form_alter (&$form, &$form_state, $form_id) {
  // dpm($form, 'form');
  // dpm($form_id, 'form_id');

  // Does not work; Rearranging this form's elements requires equivalent changes to the validation handler
  // Make VBO 'Operations' fieldset collapsible and collapsed initially
  // if (substr($form['#id'], 0, 43) == 'views-exposed-form-admin-views-node-system-') {
  //   $form['fields-grouped'] = array(
  //     '#type' => 'fieldset',
  //     '#title' => t('Filter'),
  //     '#collapsible' => TRUE,
  //     '#collapsed' => TRUE,
  //     '#tree' => TRUE,
  //   );

  //   $form['fields-grouped']['title'] = $form['title'];
  //   $form['fields-grouped']['type'] = $form['type'];
  //   $form['fields-grouped']['author'] = $form['author'];
  //   $form['fields-grouped']['status'] = $form['status'];
  //   $form['fields-grouped']['vid'] = $form['vid'];
  //   $form['fields-grouped']['submit'] = $form['submit'];
  //   $form['fields-grouped']['reset'] = $form['reset'];

  //   unset($form['title']);
  //   unset($form['type']);
  //   unset($form['author']);
  //   unset($form['status']);
  //   unset($form['vid']);
  //   unset($form['submit']);
  //   unset($form['reset']);

  //   dpm($form, 'form');
  // }
}