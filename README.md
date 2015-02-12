# Facebook Utilities.
This is my repository of **Facebook API** Utility functions. Right now it mostly covers posting to a page.

##Setting Up
Git clone OBV.

Other then that, you need to:
- Set up paths to Facebook SDK
- Create a facebook app (here: https://developers.facebook.com/)
- Get app_id and app_secret from facebook app console
- Get permanent token for page administration and it's a little bit tricky

###Permanent token
Let's take a shortcut here

Usually you have to take Oauth2 route, but we can cheat a little by using *Grap Api Explorer*. So:

1. Go to https://developers.facebook.com/tools/explorer/ and select your newly created application in the *Application: Graph API Explorer* field.

2. Click *get access token*. When you will be asked for permissions, you must check **public_profile, manage_pages, publish_actions** scopes

3. Now you will get *short-lived* access token. Facebook doesent want to allow for offline access and wants be more secure, so tokens with longer life are harded to get. More on that here: https://developers.facebook.com/docs/roadmap/completed-changes/offline-access-removal?locale=pl_PL

4. You can get long-lived access token through endpoint: https://graph.facebook.com/oauth/access_token?             
    client_id=APP_ID&
    client_secret=APP_SECRET&
    grant_type=fb_exchange_token&
    fb_exchange_token=EXISTING_ACCESS_TOKEN
    Just post this into your browser


5. When you get longer lived access token, post it back into Graph API explorer to exchange it into page access token. At this point you have token to access your account, but not the page. To post as page, you need a page token. Post a token into *Access token:* field and go into */{user-id}/accounts* and from results, get the token for the page you want to post to. More on that here: https://developers.facebook.com/docs/facebook-login/access-tokens?locale=pl_PL#pagetokens .

6. Get the token into your application and you should be all set.

You have some example in the example.php file.


##Notes.
It took me a while to debug, but until it's available to general public, only you will see the posts submitted by application.