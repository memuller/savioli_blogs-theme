jQuery ($) ->
	if($('body').hasClass('home'))
		feed = new Instafeed
			clientId: Instagram.client_id
			accessToken: Instagram.auth_token
			target: 'instafeed'
			get: 'user'
			userId: parseInt(Instagram.user_id)
			limit: 12
		feed.run()