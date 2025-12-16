# Laravel Forum Application Code Review

## Overview

The project shows good understanding of Laravel fundamentals, however there are several security issues and code quality concerns that need to be addressed.

## Security Concerns

### Critical - Mass Assignment Vulnerabilities

**Files:** `app/Models/Post.php`, `app/Models/Comment.php`

**Issue:** Both models use `$guarded = []`, which makes all fields mass assignable. This is a serious security risk as it allows attackers to modify any field, including sensitive ones.

**Current Code:**

```php
protected $guarded = []; // DANGEROUS
```

**Fix:**

```php
// For Post model
protected $fillable = ['title', 'content', 'user_id'];

// For Comment model
protected $fillable = ['content', 'user_id', 'post_id'];
```

### High - Incomplete Authorization Policies & Broken Usage

**File:** `app/policies/PostPolicy.php`

**Issue:** The PostPolicy only implements the `edit()` method and is not being used properly throughout the application. Missing critical methods like `update()`, `delete()`, and `create()` leave the application vulnerable to unauthorized actions.

**Current Policy Usage Status:**

-   ✅ **Works in Blade templates:** `@can('edit', $post)` directives function correctly
-   ❌ **Broken in routes:** `->can('edit', 'post')` uses wrong parameter (should be `$post`)
-   ❌ **Bypassed in controllers:** Manual `abort(403)` checks instead of `$this->authorize()`

**Current Code:**

```php
public function edit(User $user, Post $post): bool
{
    return $post->user->is($user);
}
// Missing: update(), delete(), create()
```

**Route Issue (routes/web.php:22-24):**

```php
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'post'); // ❌ WRONG - should be $post
```

**Controller Issue (app/Http/Controllers/PostController.php:70-76):**

```php
public function edit(Post $post){
    if($post->user->isNot(Auth::user())){ // ❌ Manual check bypasses policy
        abort(403);
    }
    return view('posts.edit', ['post' => $post]);
}
```

**Fix:** Add the missing policy methods and fix usage:

```php
public function update(User $user, Post $post): bool
{
    return $post->user->is($user);
}

public function delete(User $user, Post $post): bool
{
    return $post->user->is($user);
}

public function create(User $user): bool
{
    return $user->exists(); // or any other business logic
}
```

**Fix Route:**

```php
->can('edit', $post) // Pass the actual post instance
```

**Fix Controller:**

```php
public function edit(Post $post){
    $this->authorize('edit', $post); // ✅ Use policy
    return view('posts.edit', ['post' => $post]);
}
```

### High - Insecure Search Logic

**File:** `app/Http/Controllers/PostController.php:18-21`

**Issue:** The search functionality uses `orWhere` without proper scoping, potentially allowing users to see posts from other users if the search term matches.

**Current Code:**

```php
if(request('search')){
    $query->where('title', 'like', '%' . request('search') . '%')
          ->orWhere('content', 'like', '%' . request('search') . '%');
}
```

**Fix:** Scope the search properly:

```php
if(request('search')){
    $query->where(function($q) {
        $q->where('title', 'like', '%' . request('search') . '%')
          ->orWhere('content', 'like', '%' . request('search') . '%');
    });
}
```

### Medium - Manual Authorization Checks

**File:** `app/Http/Controllers/PostController.php`

**Issue:** Controllers use manual authorization checks (`abort(403)`) instead of leveraging Laravel's built-in policy system.

**Current Code:**

```php
if($post->user->isNot(Auth::user())){
    abort(403);
}
```

**Fix:** Use policy authorization:

```php
$this->authorize('update', $post); // or 'delete', 'edit'
```

## Code Quality Issues

### Critical - Autoloading Configuration Error

**File:** `app/policies/PostPolicy.php`

**Issue:** The PostPolicy is located in `app/policies/` (lowercase) but Laravel expects policies in `app/Policies/` (capitalized). This causes autoloading failures.

**Fix:** Move the file to `app/Policies/PostPolicy.php` and update the namespace accordingly.

### Medium - Code Style Violations

**13 style issues** detected by Laravel Pint across multiple files:

**Affected Files:**

-   `app/Http/Controllers/CommentController.php`
-   `app/Http/Controllers/PostController.php`
-   `app/Http/Controllers/RegisteredUserController.php`
-   `app/Http/Controllers/SessionController.php`
-   `app/Http/Controllers/UserController.php`
-   `app/Models/Comment.php`
-   `app/Models/Post.php`
-   `app/Models/User.php`
-   `app/policies/PostPolicy.php`
-   `database/factories/CommentFactory.php`
-   `database/factories/UserFactory.php`
-   `database/migrations/2025_11_26_145939_create_comments_table.php`
-   `routes/web.php`

**Fix:** Run `./vendor/bin/pint` to automatically fix all style violations.

### Medium - Inconsistent Request Handling

**File:** `app/Http/Controllers/PostController.php`

**Issue:** Some methods use the `request()` helper instead of dependency injection.

**Current Code:**

```php
request()->validate([...]);
Post::create([...]);
```

**Fix:** Use dependency injection:

```php
public function store(Request $request)
{
    $request->validate([...]);
    Post::create([...]);
}
```

### Low - Missing Root Route

**File:** `routes/web.php`

**Issue:** Tests expect a root route (`/`) but only `/home` is defined.

**Fix:** Add a root route or update tests:

```php
Route::get('/', function () {
    return redirect('/home');
});
```
