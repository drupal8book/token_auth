<?php

namespace Drupal\token_auth;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of Authentication Token entities.
 */
class AuthTokenListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Label');
    $header['token'] = $this->t('Token');
    $header['enabled'] = $this->t('Enabled');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['token'] = $entity->token();
    if($entity->enabled()) {
      $row['enabled'] = "Yes";
    } else {
      $row['enabled'] = "No";
    }
    // You probably want a few more properties here...
    return $row + parent::buildRow($entity);
  }

}
