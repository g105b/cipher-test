#!/bin/bash

passphrase="sup3r_s3cr3t_p455w0rd"

decrypted=$(openssl enc \
	-aes-256-ctr \
	-d \
	-k "$passphrase" \
	-iv "504914019097319c9731fc639abaa6ec" \
	-in encrypted.txt)

echo "Decrypted message: $decrypted"

# Output: Decrypted message: This is my message, I hope you can see it. It's very long now.
