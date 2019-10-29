<?php

namespace Drupal\firebase_ui\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Drupal\firebase_ui\Service\FirebaseUiTokenValidator;

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
    $validate = FirebaseUiTokenValidator::validateDeviceToken($item) == FALSE;
    return ($validate == TRUE ? TRUE : $this->context->addViolation($constraint->notValidatedToken, ['value' => 'Not Validated']));
  }

}
