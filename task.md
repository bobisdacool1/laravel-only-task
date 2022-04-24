**Task must be done on Laravel**

1. Write migrations to 4 tables:   
   users (id, name, role_code, created_at, updated_at),  
   news (id, name, title, description, created_at, updated_at),  
   roles (code, name),   
   news-role table (news_id, role_code).
2. Establish relationships between tables: user-role one to one, news-role many to many
3. Implement API methods:  
   a list of news for the user depending on his role (example: a user with the role manager cannot see news for
   administrators, but one news may contain several "allowed" roles),  
   receiving one news (also depending on the role user),  
   getting data about the user by id.
4. The visual part is not important, it should be possible to check the received data through API testing tools (for
   example, Postman).
5. Incoming data must be in json format.

Everything should be done in php only.
