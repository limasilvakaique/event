<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

$dataFile = 'data.json';
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Ler o conteúdo do "banco"
function readData() {
    global $dataFile;
    return json_decode(file_get_contents($dataFile), true);
}

// Salvar os dados atualizados
function writeData($data) {
    global $dataFile;
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
}

if ($uri === '/events' && $method === 'GET') {
    $data = readData();
    echo json_encode($data['events']);
    exit;
}

if ($uri === '/rsvp' && $method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!isset($input['eventId'], $input['user']['name'], $input['user']['email'])) {
        http_response_code(400);
        echo json_encode(['message' => 'Dados inválidos']);
        exit;
    }

    $data = readData();
    $data['rsvps'][] = $input;
    writeData($data);

    http_response_code(201);
    echo json_encode(['message' => 'Presença confirmada!']);
    exit;
}

// Se nenhuma rota bateu
http_response_code(404);
echo json_encode(['message' => 'Rota não encontrada']);
