<?php

namespace Drupal\token_auth\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Authentication Token entity.
 *
 * @ConfigEntityType(
 *   id = "auth_token",
 *   label = @Translation("Authentication Token"),
 *   handlers = {
 *     "list_builder" = "Drupal\token_auth\AuthTokenListBuilder",
 *     "form" = {
 *       "add" = "Drupal\token_auth\Form\AuthTokenForm",
 *       "edit" = "Drupal\token_auth\Form\AuthTokenForm",
 *       "delete" = "Drupal\token_auth\Form\AuthTokenDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\token_auth\AuthTokenHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "auth_token",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/system/auth_token/{auth_token}",
 *     "add-form" = "/admin/config/system/auth_token/add",
 *     "edit-form" = "/admin/config/system/auth_token/{auth_token}/edit",
 *     "delete-form" = "/admin/config/system/auth_token/{auth_token}/delete",
 *     "collection" = "/admin/config/system/auth_token"
 *   }
 * )
 */
class AuthToken extends ConfigEntityBase implements AuthTokenInterface {

  /**
   * The Authentication Token ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Authentication Token label.
   *
   * @var string
   */
  protected $label;

  /**
   * The Token.
   *
   * @var string
   */
  protected $token;

  /**
   * Is the given auth token enabled or not.
   *
   * @var bool
   */
  protected $enabled;

  /**
   * {@inheritdoc}
   */
  public function enabled() {
    return $this->enabled;
  }

  /**
   * {@inheritdoc}
   */
  public function id() {
    return $this->id;
  }

  /**
   * {@inheritdoc}
   */
  public function label() {
    return $this->label;
  }

  /**
   * {@inheritdoc}
   */
  public function token() {
    return $this->token;
  }
}
