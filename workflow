Here’s the flow clearly:

User registers — data goes into the users table (name, email, password, etc).

User logs in — gets authenticated with Sanctum, receives an access token.

User visits dashboard (frontend protected route):

The dashboard calls Get Practitioner Profile API (GET /api/practitioner/profile) using the logged-in user's token.

If practitioner profile exists, the dashboard shows the data.

There is a Manage Data button on dashboard:

Clicking it opens a form (frontend).

The form uses CreateOrUpdate Practitioner API (POST /api/practitioner/create-or-update) to submit or update profile data.

Public users can:

Search practitioners by health concern.

View practitioner profiles publicly by slug (no auth needed).
