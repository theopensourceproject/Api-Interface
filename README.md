Api-Interface
=============

This is the api interface that allows you to run api requests to The Open Source Project&#39;s database.

Documentation
=============

Action Function
-------------
Parameters<br />
	1. Action<br />
	2. Id


Actions
-------------
1. Get User Info (userinfo) - { action = userinfo, id = userid }
2. Get User Posts (userposts) - { action = userposts, id = userid }
3. Get Group Info (groupinfo) - { action = groupinfo, id = groupid }
4. Get Group Posts (groupposts) - { action = groupposts, id = groupid }
5. Get Group Members (groupmemebers) - { action = groupmembers, id = groupid }
6. Member of groups (memberof) - { action = memberof, id = userid }
7. Login (login) - { action = login, email = email, password = password } 