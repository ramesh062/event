(1) Event create two different way:

	**first way**

	if you didn't add event name and listener so these command are run. it will automatically add in app/Providers/EventServiceprovider.php.

	php artisan make:event WebNotification

	php artisan make:listener SendWebNotification --event="WebNotification"
	
	** second way **
	we should define event name and listener in app/Providers/EventServiceprovider.php
		php artisan event:generate

(2) subscriber (optional)
	if you want to handle multiple event that why it will be used.

	-> first create subscriber App/Listeners/EventSubscriber.php
	-> In this subscriber two events are hanlde login and logout
	-> we can manage login data by onloginuser() method
	-> same as onlogoutuser() method destory data
(3) Add subscriber in app/Providers/EventServiceprovider.php 
	(if you used subscriber so it will be defined)

	protected $subscribe = [
        'App\Listeners\EventSubscriber',
    ];

 (4) Add listner
 	if you used subscriber it will not used otherwise it will defined in listern array

 (5) dispatch event 
 		you can fire event in your controller
 		event(new UserLogOut($logout));
