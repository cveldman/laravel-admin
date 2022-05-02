Als je een notificatie verstuurd naar een user, dan met een notificatie token doen. Als je een notificatie verstuurd naar een andere notifiable, misschien gebruik maken van topic?






Als je applicatie een front-end en backend heeft zet dit in de middleware

```php

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            } else {
                return route('login');
            }
        }
    }
}

```