# Is that password stupid?

This is a very simple library which lets you know if a password a user has
chosen is stupid. The definition of "stupid" in this case, is that it appears
as one of the top 10,000 most common passwords in the world.

The passwords were compiled from various data breaches.

# How to use it

```php
use Stupid\Password;

// Returns a boolean
$passwordIsStupid = Password::isStupid($password);
```

# How it works

The library maintains an internal list of SHA1 hashes of the top 10,000
passwords. When a password is tested, it is SHA'd and then checked against
the password list.

## SHA1? Isn't that like, hella broken?

For cryptographic purposes, yes, but this isn't about cryptography. SHA1 is nice
and fast, and means we can quickly check if the password is on the list without
having to actually include a load of passwords in this lib.

## I can just reverse the passwords from the SHAs though

Go crazy. The list is on GitHub anyway.

## Doesn't it go out of date

Sure. I'll update it from time-to-time. The last update was 7 November 2024.

# License

MIT.

# Author

Mike Hall (@mikehall314.bsky.social)
