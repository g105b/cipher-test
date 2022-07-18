<?php
use Gt\Cipher\EncryptedMessage;
use Gt\Cipher\InitVectorFactory;
use Gt\Cipher\Message;
use Gt\Dom\HTMLDocument;
use Gt\Input\Input;

function do_encrypt(Input $input, HTMLDocument $document):void {
	$message = new Message($input->getString("message"), $input->getString("secret"));
	$document->querySelector("[name='cipher']")->innerHTML = $message->getCipherText();
	$document->querySelector("[name='iv']")->value = $message->getIv();
}

function do_decrypt(Input $input, HTMLDocument $document):void {
	$ivFactory = new InitVectorFactory();
	$iv = $ivFactory->fromString($input->getString("iv"));
	$encMessage = new EncryptedMessage($input->getString("cipher"), $input->getString("secret"), $iv);
	$document->querySelector("[name='message']")->innerHTML = $encMessage->getMessage();
}

function do_reset():void {
	header("Location: ./");
	exit;
}
