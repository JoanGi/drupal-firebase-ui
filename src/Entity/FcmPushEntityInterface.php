<?php

namespace Drupal\firebase_ui\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Fcm push entity entities.
 *
 * @ingroup firebase_ui
 */
interface FcmPushEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Fcm push entity name.
   *
   * @return string
   *   Name of the Fcm push entity.
   */
  public function getName();

  /**
   * Sets the Fcm push entity name.
   *
   * @param string $name
   *   The Fcm push entity name.
   *
   * @return \Drupal\firebase_ui\Entity\FcmPushEntityInterface
   *   The called Fcm push entity entity.
   */
  public function setName($name);

  /**
   * Gets the Fcm push entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Fcm push entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Fcm push entity creation timestamp.
   *
   * @param int $timestamp
   *   The Fcm push entity creation timestamp.
   *
   * @return \Drupal\firebase_ui\Entity\FcmPushEntityInterface
   *   The called Fcm push entity entity.
   */
  public function setCreatedTime($timestamp);

}
