<?php
$passphrase = "sup3r_s3cr3t_p455w0rd";

$encrypted = trim(file_get_contents("encrypted.txt"));
$iv = hex2bin("504914019097319c9731fc639abaa6ec");

$salt = substr($encrypted, 8, 8);
$lastKey = "";
$key = "";
while(strlen($key) < 32) {
	$lastKey = hash(
		"sha256",
		$lastKey . $passphrase . $salt,
		true
	);
	$key .= $lastKey;
}
$cipher = substr($encrypted, 16);

$decrypted = openssl_decrypt(
	$cipher,
	"aes-256-ctr",
	$key,
	OPENSSL_RAW_DATA,
	$iv,
);

echo "Decrypted message: $decrypted";
