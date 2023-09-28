# Google2FaHelper
This is an example to how to use google 2fa(two factor authentication) in your site.

## Requirements
Install `Google Authenticator` in your device:
Android:
```
https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&pcampaignid=web_share
```
IOS:
```
https://apps.apple.com/us/app/google-authenticator/id388497605
```


## Usage
Run:
```
composer install
```
Open app URL in your browser to see new secret key and QRCode.

And for validation of your code, open this URL:
```
http://your_base_url/?2fa_code={your_2fa_code}
```

