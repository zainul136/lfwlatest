<?php



use App\Http\Controllers\DeathConfirmationController;

use App\Http\Controllers\FamilyController;

use App\Http\Controllers\NavigationController;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\RelativeController;

use App\Http\Controllers\RelationshipController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use  App\Http\Controllers\ZenixadminController;


/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider and all of them will

| be assigned to the "web" middleware group. Make something great!

|

*/

// Route::get('admin/zenix/dashboard/userInformation'[ZenixadminController::class, 'userInformation']);


Route::group(['prefix' => 'admins/'], function () {
    Route::get('', [ZenixadminController::class, 'dashboard_1']);
    Route::get('userInformation',[UsersController::class,'userInformation'])->name('user-information');
    Route::delete('delete-user/{user}',[UsersController::class,'softDelete'])->name('delete-user');
    Route::get('deletedUser',[UsersController::class,'getDeletedUser'])->name('getDeletedUser');
    Route::get('users-restore/{user}',[UsersController::class,'restoreUser'])->name('restoreUser');
    Route::get('permanent-delete-user/{id}',[UsersController::class,'permanentDeletedUser'])->name('permanent-delete-user');

    Route::get('public-posts',[PostsController::class,'publicPosts'])->name('public-post');
    Route::post('post-delete/{post}',[PostsController::class,'deletePosts'])->name('delete.post');

    Route::get('private-posts',[PostsController::class,'privatePosts'])->name('privatePosts');
    Route::post('post-delete/{post}',[PostsController::class,'deletePosts'])->name('delete.post');

    Route::get('user-chats',[UserChatMessageController::class,'userChats'])->name('user-chats');
    Route::get('deceased-request',[DeceasedController::class,'deceasedRequest'])->name('deceased-request');

});



Route::get('/admindev', [ZenixadminController::class, 'dashboard_1']);
Route::get('/userInformation', [ZenixadminController::class, 'userInformation']);


Route::get('/dashboard', function () {

    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');





require __DIR__ . '/auth.php';







// ...



Auth::routes();


Route::middleware('auth')->group(function () {

    Route::get('private', [HomeController::class, 'privateHome'])->name('privateHome');
    Route::get('/profile', [NavigationController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile', [UserController::class, 'update'])->name('profile.update');

    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('profile.updated');

    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');

    Route::get('logout', [NavigationController::class, 'logout'])->name('logout');

    Route::get('home', [NavigationController::class, 'index'])->name('home');



    //Family Tree Routes Start...

        // Route::get('family-tree', [NavigationController::class, 'familyTree'])->name('family-tree');


        Route::get('family-tree', [NavigationController::class, 'familyNewTree'])->name('family-tree');

    Route::post('family-store', [FamilyController::class, 'familyStore'])->name('family.store');

    Route::post('family-child-store', [FamilyController::class, 'familyChildStore'])->name('family.child.store');

    //Family Tree Routes End...



    Route::get('messages', [NavigationController::class, 'messages'])->name('messages');

    Route::get('check-new-messages', [NavigationController::class, 'checkNewMessages'])->name('check-new-messages');



    Route::get('requests', [NavigationController::class, 'requests'])->name('requests');

    Route::get('search', [NavigationController::class, 'search'])->name('search');

    Route::get('searchFamily', [NavigationController::class, 'searchFamily'])->name('searchFamily');

    Route::get('settings', [NavigationController::class, 'settings'])->name('settings');

    Route::post('settings-update-email', [NavigationController::class, 'settingsUpdateEmail'])->name('settings-update-email');

    Route::post('settings-update-password', [NavigationController::class, 'settingsUpdatePassword'])->name('settings-update-password');



    Route::post('store-trusted-contact', [NavigationController::class, 'trustedContact'])->name('store-trusted-contact');

    Route::get('remove-trusted-contact/{id}', [NavigationController::class, 'removeTrustedContact'])->name('remove-trusted-contact');

    Route::post('store-death-confirmation', [NavigationController::class, 'storeDeathConfirmation'])->name('store-death-confirmation');

    Route::get('view-death-confirmation/{id}', [NavigationController::class, 'DeathConfirmationView'])->name('confirmation.view');

    Route::post('/mark-notification-as-read', [NavigationController::class,'markAsRead'])->name('notification.markAsRead');

    Route::get('remove-death-confirmation/{id}', [NavigationController::class, 'removeDeathConfirmation'])->name('remove-death-confirmation');

    Route::post('reject-notification', [NavigationController::class, 'rejectNotification'])->name('reject-notification');



    Route::get('faq', [NavigationController::class, 'faq'])->name('faq');

    Route::get('contact-us', [NavigationController::class, 'contact'])->name('contact-us');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::post('/post', [PostController::class, 'post'])->name('post');
    Route::get('/view-relative-post/{id}/{post_id}', [PostController::class, 'viewRelativePost'])->name('view-relative-post');

    Route::post('/addTag', [PostController::class, 'addTag'])->name('addTag');

    Route::get('/fetchTagId/{tagName}', [PostController::class, 'fetchTagId'])->name('tags.fetchTagId');

    Route::post('/upload-video', [PostController::class, 'uploadVideo']);

    Route::delete('/delete-post/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('tag/{slug}', [PostController::class, 'showPostsByTag'])->name('tag.show');

    Route::get('/searchFamily', [RelativeController::class, 'searchFamily']);

    Route::post('/getPostsByDate', [PostController::class, 'getPostsByDate'])->name('getPostsByDate');
    Route::post('deceasedProfile/getPostsByDate/{id}', [PostController::class, 'deceasedProfileGetPostsByDate'])->name('deceasedProfileGetPostsByDate');
    Route::get('deceasedProfile/{id}/tag/{slug}', [PostController::class, 'deceasedProfileGetTag'])->name('deceasedProfileGetPostsByTag');

});



Route::middleware('auth')->group(function () {

    Route::post('/addRelative', [RelativeController::class, 'addRelative'])->name('addRelative');

    Route::get('/fetchRelativeId/{relativeName}', [RelativeController::class, 'fetchRelativeId'])->name('relative.fetchRelativeId');

    Route::delete('/delete-relative/{id}', [RelativeController::class, 'destroyRelative'])->name('posts.destroyRelative');

    Route::get('relative/{slug}', [RelativeController::class, 'fetchRelativeByTag'])->name('relative.show');

    Route::post('/privatePeopleSearch', [NavigationController::class, 'privatePeopleSearch'])->name('privatePeopleSearch');

    Route::get('/fetch-data/', [NavigationController::class, 'fetchData'])->name('fetch.data');



});





Route::get('requests', [RelationshipController::class, 'showRequests'])->name('requests');

Route::get('sentRequests', [RelationshipController::class, 'showSentRequests'])->name('sentRequests');

Route::put('/approveRequest/{id}', [RelationshipController::class, 'approveRequest'])->name('approveRequest');

Route::delete('/cancel-request/{id}', [RelationshipController::class, 'cancelRequest'])->name('cancel.request');



Route::get('pendingRequests', [RelativeController::class, 'pendingRequests'])->name('pendingRequests');



/* DeathConfirmationController Routes */

Route::middleware(['auth'])->group(function () {

        Route::get('/isAlive/{id}', [DeathConfirmationController::class, 'getAliveStatus'])->name('isAlive');
        Route::get('/death-confirmation-show/{id}', [DeathConfirmationController::class,'deathConfirmationShow'])->name('deathConfirmationShow');
        Route::post('/recovery-death-confirmation/{id}', [DeathConfirmationController::class,'recoveryDeathConfirmation'])->name('recovery-death-confirmation');

        Route::get('/death-person-detials/{id}', [DeathConfirmationController::class, 'deathPersonDetails'])->name('death-person-details');

        Route::get('/dateOfDeath/{id}', [DeathConfirmationController::class, 'getDateOfDeath'])->name('dateOfDeath');

        Route::get('/placeOfDeath/{id}', [DeathConfirmationController::class, 'getPlaceOfDeath'])->name('placeOfDeath');

        Route::get('/confirmationsFrom/{id}', [DeathConfirmationController::class, 'getConfirmationsFrom'])->name('confirmationsFrom');

        Route::get('/getConfirmationStatus/{id}', [DeathConfirmationController::class, 'getConfirmationStatus'])->name('confirmationStatus');

        Route::get('/setConfirmationStatus/{id}', [DeathConfirmationController::class, 'setConfirmationStatus'])->name('setConfirmationStatus');

        Route::post('/updateAliveStatus', [DeathConfirmationController::class, 'updateAliveStatus'])->name('updateAliveStatus');

        Route::get('notifyTrustedContacts/{id}', [DeathConfirmationController::class, 'notifyTrustedContacts'])->name('notifyTrustedContacts');

        Route::get('/check-death-confirmation', [DeathConfirmationController::class,'checkDeathConfirmation'])->name('check.death.confirmation');

        Route::post('/approve-death-confirmation/{id}', [DeathConfirmationController::class,'approveDeathConfirmation'])->name('approve.death.confirmation')->middleware('web');;

        Route::post('/decline-death-confirmation/{id}', [DeathConfirmationController::class,'declineDeathConfirmation'])->name('decline.death.confirmation')->middleware('web');;

        

});



Route::get('deceasedProfile/{userId}', [NavigationController::class, 'deceasedProfile'])->name('deceasedProfile');

Route::get('profile-relative-details/{Id}', [NavigationController::class, 'relativeProfileDetails'])->name('profile-relative-details');
Route::get('messages/fetchChatRecords', [NavigationController::class, 'fetchChatRecords']);

// optimize site
Route::get('/cache', function () {
    \Artisan::call('optimize:clear');
    \Artisan::call('config:cache');
     echo 'All cache Cleared';
});


Route::get('/clear', function () {
    \Artisan::call('optimize:clear');
    \Artisan::call('config:cache');
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    echo 'All cache Cleared';
});

Route::get('/migrate', function () {
    \Artisan::call('restart');
    echo 'All cache Cleared';
});

Route::get('/', [PublicController::class, 'home'])->name('/');
Route::get('contact', [PublicController::class, 'contact'])->name('contact');
Route::get('about', [PublicController::class, 'about'])->name('about');
Route::get('features', [PublicController::class, 'features'])->name('features');
