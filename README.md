Simple i/o test for working with [php.gt/cipher][cipher]
========================================================

This is a really simple WebEngine application that can encrypt/decrypt messages by entering the raw Cipher/IV values manually.

Hosted online at https://cipher-test.g105b.com.

The purpose is to help integrate other languages with the encryption process.

To run:

+ `git clone https://github.com/g105b/cipher-test`
+ Navigate to the project directory
+ `composer install`
+ `gt run`
+ Then head to http://localhost:8080 in your browser

To use:

1) Type a message in plain text
2) Enter a key, or use the provided one
3) Enter an IV, or use the provided one
4) Click encrypt
5) Copy the cipher message and IV somewhere safe
6) Close the browser and come back later
7) Enter the same secret as before
8) Enter the cipher you saved
9) Enter the IV you saved
10) Click decrypt
11) Your message should be on plain display.

Point 6 is only there for dramatic effect.

[cipher]: https://php.gt/cipher
