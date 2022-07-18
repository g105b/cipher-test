Simple i/o test for working with [php.gt/cipher][cipher]
========================================================

This is a really simple WebEngine application that can encrypt/decrypt messages by entering the raw Cipher/IV values manually.

The purpose is to help integrate other languages with the encryption process.

To run:

+ `git clone https://github.com/g105b/cipher-test`
+ Navigate to the project directory
+ `composer install`
+ `gt run`
+ Then head to http://localhost:8080 in your browser

To use:

1) Pick a secret, or use the provided one
2) Type a message in plain text
3) Click encrypt
4) Copy the cipher message and IV somewhere safe
5) Close the browser and come back later
6) Enter the same secret as before
7) Enter the cipher you saved
8) Enter the IV you saved
9) Click decrypt
10) Your message should be on plain display.

Point 5 is only there for dramatic effect.

[cipher]: https://php.gt/cipher
