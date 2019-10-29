<?php

namespace Drupal\firebase_ui\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that the submitted duration is of the format HH:MM:SS.
 *
 * @Constraint(
 * id = "UserTokenConstraint",
 * label = @Translation("Check user device token", context = "Validation"),
 * )
 */
class UserTokenConstraint extends Constraint {
  /**
   * The message that will be shown if the format is incorrect.
   *
   * @var notValidatedToken
   */
  public $notValidatedToken = 'The token you provide has not been correctly
                               validated in your app in Firebase, please ensure
                               the token is from your app and is are correctly
                               setted';

}
