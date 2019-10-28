<?php

namespace Drupal\firebase_ui;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Fcm push entity entities.
 *
 * @ingroup firebase_ui
 */
class FcmPushEntityListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Fcm push entity ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\firebase_ui\Entity\FcmPushEntity $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.fcm_push_entity.edit_form',
      ['fcm_push_entity' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
