# readnrite
```
[signup form] ---{shortname,author_name}--->[telegra.ph api]
          ^-- <--{shortname,author_name -------| |        |        
          |       access_token,auth_url}         ^        |
          |                                      | 
(store data in local storage)            (sends request) (sends response)
          ^                                      |         |
          |                                      |         |
          |
[dashboard](fetch user info from storage)---{action query,GET | POST}
    
```
