<?php

/**
 * @file
 * Contains fcm_push_entity.page.inc.
 *
 * Page callback for Fcm push entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Fcm push entity templates.
 *
 * Default template: fcm_push_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_fcm_push_entity(array &$variables) {
  // Fetch FcmPushEntity Entity Object.
  $fcm_push_entity = $variables['elements']['#fcm_push_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
