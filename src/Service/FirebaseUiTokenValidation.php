<?php

namespace Drupal\firebase_ui\Service;

use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Logger\LoggerChannelInterface;
use GuzzleHttp\ClientInterface;
use Drupal\Component\Serialization\Json;

/**
 * Service for validate throught Firebase the token send by devices.
 */
class FirebaseTokenValidation extends FirebaseServiceBase {

  /**
   * Validation endpoint.
   */
  const ENDPOINT = 'https://fcm.googleapis.com/fcm/send';

  /**
   * {@inheritdoc}
   */
  public function __construct(ConfigFactory $configFactory, ClientInterface $client, LoggerChannelInterface $loggerChannel) {
    parent::__construct($configFactory, $client, $loggerChannel);
    $config = $this->configFactory->get('firebase.settings');
    $this->key = $config->get('server_key');
    $this->endpoint = self::ENDPOINT;
  }

  /**
   * Firebase validation of user device token.
   *
   * @param int $token
   *   User Device Token.
   *
   * @return bool
   *   Return TRUE if token is validated and FALSE if not.
   */
  public function validateDeviceToken($token) {
    try {
      $response = $this->client->request('POST', $this->endpoint, [
        'headers' => [
          'Content-Type' => 'application/json',
          'Authorization' => 'key=' . $this->key,
        ],
        'body' => Json::encode(["registration_ids" => [$token]]),
      ]);
      $content = Json::decode($response->getBody()->getContents());
      return (!empty($content['success']) ? TRUE : FALSE);
    }
    catch (RequestException $e) {
      // Error connecting to Firebase API. Throw exception.
      $this->logger->error($e->getMessage());
      throw $e;
    }
  }

}
