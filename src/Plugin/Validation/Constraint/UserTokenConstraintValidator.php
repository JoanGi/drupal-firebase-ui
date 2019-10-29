<?php

namespace Drupal\firebase_ui\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the PodcastDuration constraint.
 */
class UserTokenConstraintValidator extends ConstraintValidator {

  /**
   * Gets the settings form route.
   *
   * @param mixed $items
   *   Items to validate.
   * @param Symfony\Component\Validator\Constraint $constraint
   *   The constraint values.
   */
  public function validate($items, Constraint $constraint) {
    // Get only the first Token. Multivalue is a To Do.
    $item = $items->first();
    // If there is no value we don't need to validate anything.
    if (!isset($item)) {
      return NULL;
    }
    // Token validation service throught Firebase.
    $tokenValidator = \Drupal::service('firebase.token_validation');
    if ($tokenValidator->validateDeviceToken($item->get('value')->getValue()) == TRUE) {
      // nothing.
    }
    else {
      return ($this->context->addViolation($constraint->notValidatedToken, ['value' => 'Not Validated']));
    }

  }

}
