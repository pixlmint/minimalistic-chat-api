# minimalistic-chat-api
A stupid Chat API that only allows one message to exist at any time. No Frontend, Fast, Secure.

## endpoints
There are 2 API endpoints:

### `/api/read` 
Read the current message

#### Request Method
Only GET requests allowed, no query parameters required

#### Example Request Using wget
```
wget --no-check-certificate --quiet \
--method GET \
--timeout=0 \
--header '' \
'[Host]/api/read'
```

### `/api/write` 
Post a Message

#### Request Method
Only POST requests allowed

#### Headers
- *Key*: `Content-Type`
- *Value*: `application/x-www-form-urlencode`

#### Request Body
- *Key*: `chat`
- *Value*: `[Your Message]`

#### Example Request Using wget
```
wget --no-check-certificate --quiet \
  --method POST \
  --timeout=0 \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --body-data 'chat=Hello%20World' \
   '[Host]/api/write'
```
