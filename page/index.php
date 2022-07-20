<?php
use Gt\Cipher\EncryptedUri;
use Gt\Cipher\InitVector;
use Gt\Cipher\Key;
use Gt\Cipher\Message\EncryptedMessage;
use Gt\Cipher\Message\PlainTextMessage;
use Gt\Dom\HTMLDocument;
use Gt\Http\Uri;
use Gt\Input\Input;

function go(Input $input, HTMLDocument $document):void {
	if($cipher = $input->getString("cipher")) {
		$form = $document->querySelector("form.decrypt");
		$form["cipherText"]->innerHTML = $cipher;
		$form["iv"]->value = $input->getString("iv");
	}
}

function do_reset():void {
	header("/");
	exit;
}

function do_encrypt(Input $input, HTMLDocument $document):void {
// Generate IV
	$ivBytes = null;
	if($value = $input->getString("iv")) {
		$ivBytes = base64_decode($value);
	}
	$iv = new InitVector();
	if($ivBytes) {
		$iv = $iv->withBytes($ivBytes);
	}

// Generate sender key pair
	$keyBytes = null;
	if($value = $input->getString("key")) {
		$keyBytes = base64_decode($value);
	}
	$key = new Key($keyBytes);

// Encrypt message
	$message = new PlainTextMessage($input->getString("message"), $iv);
	$cipherText = $message->encrypt($key);

// Output
	$form = $document->querySelector("form.encrypt");
	$form["message"]->innerHTML = $message;
	$form["key"]->value = $key;
	$form["iv"]->value = $iv;
	$form["cipherText"]->innerHTML = $cipherText;
	$form->querySelector("output")->hidden = false;
}

function do_decrypt(Input $input, HTMLDocument $document):void {
	$ivBytes = base64_decode($input->getString("iv"));
	$iv = (new InitVector())->withBytes($ivBytes);

	$keyBytes = base64_decode($input->getString("key"));
	$key = new Key($keyBytes);

	$cipherText = $input->getString("cipherText");
	$encryptedMessage = new EncryptedMessage($cipherText, $iv);
	$decrypted = $encryptedMessage->decrypt($key);

	$form = $document->querySelector("form.decrypt");
	$form["cipherText"]->innerHTML = $cipherText;
	$form["key"]->value = $key;
	$form["iv"]->value = $iv;
	$form["decrypted"]->innerHTML = $decrypted;
	$form->querySelector("output")->hidden = false;
}
