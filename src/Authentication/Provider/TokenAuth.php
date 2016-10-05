<?php

namespace Drupal\token_auth\Authentication\Provider;

use Drupal\Core\Authentication\AuthenticationProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\user\Authentication\Provider\Cookie;

/**
 * Class TokenAuth.
 *
 * @package Drupal\token_auth\Authentication\Provider
 */
class TokenAuth extends Cookie implements AuthenticationProviderInterface {

  /**
   * Checks whether suitable authentication credentials are on the request.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   *
   * @return bool
   *   TRUE if authentication credentials suitable for this provider are on the
   *   request, FALSE otherwise.
   */
  public function applies(Request $request) {
    $token = $request->query->get('token');
    return parent::applies($request) && isset($token);
  }

  /**
   * {@inheritdoc}
   */
  public function authenticate(Request $request) {
    $token = $request->query->get('token');
    if ($token == 'XYZ') {
      return parent::authenticate($request);
    }
    else {
      throw new AccessDeniedHttpException();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function cleanup(Request $request) {}

  /**
   * {@inheritdoc}
   */
  public function handleException(GetResponseForExceptionEvent $event) {
    $exception = $event->getException();
    if ($exception instanceof AccessDeniedHttpException) {
      $event->setException(
        new UnauthorizedHttpException('Invalid token.', $exception)
      );
      return TRUE;
    }
    return FALSE;
  }

}
