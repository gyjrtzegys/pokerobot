<?php
/**
 * Telegram Bot access token и URL.
 */
$access_token = '233020562:AAHXUYm6vWqk9wgsl7TgoXaMlgL3nfmg9B4';
$api = 'https://api.telegram.org/bot' . $access_token;

/**
 * Задаём основные переменные.
 */
$output = json_decode(file_get_contents('php://input'), TRUE);
$chat_id = $output['message']['chat']['id'];
$first_name = $output['message']['chat']['first_name'];
$message = $output['message']['text'];


/**
 * Получаем команды от пользователя.
 */
 
switch($message) {
  
  case '/help':
    // Отправляем приветственный текст.
    $preload_text = 'Hello, ' . $first_name ;
    sendMessage($chat_id, $preload_text);
	
	
    break;
	
  default:
    break;
}

/**
 * Функция отправки сообщения sendMessage().
 */
function sendMessage($chat_id, $message) {
  file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message));
}
