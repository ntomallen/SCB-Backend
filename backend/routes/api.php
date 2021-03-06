<?php

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Information related to users:
Route::get('/users/{user}/articles', 'ArticleController@UserArticles');
Route::get('/users/{user}/posts', 'PostsController@UserPosts');
Route::resource('users', 'UserController');

// Information related to posts:
Route::get('/posts/{post}/votes', 'PostsController@Votes');
Route::put('/posts/{post}/upvote', 'PostsController@Upvote');
Route::put('/posts/{post}/downvote', 'PostsController@Downvote');
Route::resource('posts', 'PostsController');

// Information related to users:
Route::get('/articles/{article}/user', 'UserController@ArticleUser');
Route::get('/articles/{article}/posts', 'PostsController@ArticlePosts');
Route::resource('articles', 'ArticleController');

Route::get('/login', function (Request $request) {
	$accessKey = $request['accesskey'];
	return $accessKey;

	$clientID = '137575509998503';
	$redirectURI = 'https://www.facebook.com/connect/login_success.html';
	$appSecret = 'somethin';
	
	$client = new Client();
	
	$res = $client ->request('GET', 'https://graph.facebook.com/v2.9/oauth/access_token', [
		'query' => ['client_id' => $clientID,
					'redirect_uri' => $redirectURI,
					'client_secret' => $appSecret,
					'code' => $accessKey ]
	]);

	return $res;
});

Route::post('/vote', function(Request $request){
	$answer = $request->input('answerId');
	$answerId = $request->input('isUpVote');
	$userId = $request->input('userId');
	
	// Create article
	// Add answer to db
	
	return 'thanks';
});

Route::resource('article.tags', 'ArticleTagController', [
				'article'=>'articleId', 'tagId'=>'atID'
]);
