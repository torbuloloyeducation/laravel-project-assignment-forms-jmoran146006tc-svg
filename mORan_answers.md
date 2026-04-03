1. What is the difference between GET and POST?
GET is used to retrieve/display data, it has no request body, and parameters are visible in the URL (e.g. /search?q=hello). 
POST is used to send/submit data, the payload is in the request body, hidden from the URL.

2. Why do we use @csrf in forms?
We use @csrf (Cross-Site Request Forgery) tokens in forms to prevent attackers from tricking authenticated users into submitting unauthorized requests. It works by embedding a unique, secret, and server-generated token in the form, which the server validates upon submission to ensure the request originated from its own site. 

3. What is session used for in this activity?
Sessions give us a way to persist data across requests. In this activity, the session stores the list of submitted emails so they survive page reloads and redirects. 

4. What happens if session is cleared?
All stored emails are permanently lost for that user — the /formtest page would render with an empty list since session()->get('emails', []) falls back to []. This is exactly what the /delete-emails route does with session()->forget('emails'). Sessions can also be cleared by the browser closing, the session expiring, or the server restarting