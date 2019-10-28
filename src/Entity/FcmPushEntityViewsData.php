<?php

namespace Drupal\firebase_ui\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Fcm push entity entities.
 */
class FcmPushEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
