<?php
require_once '../vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51PJU8CRwWA3gXNirOlh2sPZyDCUDVUZr64Z8p9WFSB0vg3JM7g05hjXHSDIC95WE1zlcJV8f5NojTo9PCrVjprxe00kCiFwhK1');

header('Content-Type: application/json');

try {
  $data = json_decode(file_get_contents('php://input'), true);

  // Validate required fields
  if (!isset($data['total']) || !isset($data['nombre'])) {
    throw new Exception("Missing required fields: 'total' or 'nombre'");
  }

  $checkout_session = \Stripe\Checkout\Session::create([
    'mode' => 'payment',
    'success_url' => 'http://localhost:8888/renta_autos/backend/success.html',
    'cancel_url' => 'http://localhost:8888/renta_autos/backend/cancel.html',
    'line_items' => [[
      'quantity' => 1,
      'price_data' => [
        'currency' => 'mxn',
        'unit_amount' => $data['total'],
        'product_data' => [
          'name' => 'Renta Autos',
          'description' => 'Renta de un ' . $data['nombre'] . ' por ' . $data['dias'] . ' dias, del ' . $data['fechaInicio'] . ' al ' . $data['fechaFin'],
        ],
      ],
    ]],
  ]);

  echo json_encode(['session' => $checkout_session]);
} catch (Exception $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}
