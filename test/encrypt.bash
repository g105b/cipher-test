#!/bin/bash

message="This is my message, I hope you can see it. It's very long now."
passphrase="sup3r_s3cr3t_p455w0rd"

echo "$message" | openssl enc \
	-aes-256-ctr \
	-e \
	-k "$passphrase" \
	-iv "504914019097319c9731fc639abaa6ec" \
	-out encrypted.txt
